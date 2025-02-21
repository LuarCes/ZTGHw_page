


function mostrarCarritoForm() {
    try {
        const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
        const carritoProductos = document.getElementById('carrito-productos');

        carritoProductos.innerHTML = '';

        productosEnCarrito.forEach(producto => {

            const nuevaFila = document.createElement('tr');
            nuevaFila.innerHTML = `
                <td>${producto.nombre}</td>
                <td class="precio">$${Number(producto.precio).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                <td>${producto.cantidad}</td>
                <td class="total">$${(producto.precio * producto.cantidad).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td> `;

            carritoProductos.appendChild(nuevaFila);
        });

        actualizarTotalPagar();
    } catch (error) {
        console.error('Error al mostrar el carrito en la compra:', error);
    }
}


function actualizarTotalPagar() {
    const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
    let totalPagar = 0;

    productosEnCarrito.forEach(producto => {
        totalPagar += producto.precio * producto.cantidad;
    });

    document.getElementById('total-pagar').textContent = `$${totalPagar.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;

}

document.addEventListener('DOMContentLoaded', mostrarCarritoForm);





function enviarFormulario() {
    const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
    const carritoTexto = JSON.stringify(productosEnCarrito, null, 2);
    document.getElementById('mensaje').innerHTML = `<pre>${carritoTexto}</pre>`;
    const carritoProductos = document.getElementById('carrito-productos');
    carritoProductos.innerHTML = ''; 

    const promesas = productosEnCarrito
        .filter(producto => !producto.eliminado)  
        .map(producto => {
            let formData = new FormData();
            formData.append("id", producto.id);
            formData.append("cantidad", producto.cantidad);

            return fetch(base_url() + "/index.php/abmCarrito/enviarForm", {
                method: "POST",
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        mostrarCarrito();
                        return true;
                    } else {
                        console.error(`❌ Error al actualizar cantidad:`, data.error);
                        return false;
                    }
                })
                .catch(error => {
                    console.error(`⚡ Error en la petición:`, error);
                    return false;
                });
        });
}






