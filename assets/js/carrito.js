


function mostrarCarritoForm() {
    try {
        const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
        const cantidades = JSON.parse(localStorage.getItem('cantidades')) || {};
        const carritoProductos = document.getElementById('carrito-productos');

        carritoProductos.innerHTML = '';

        productosEnCarrito.forEach(producto => {

            const nuevaFila = document.createElement('tr');
            nuevaFila.innerHTML = `
                <td>${producto.nombre}</td>
                <td class="precio">$${producto.precio}</td>
                <td>${producto.cantidad}</td>
                <td class="total">${(producto.precio * producto.cantidad).toFixed(2)}</td>
            `;

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

    document.getElementById('total-pagar').textContent = `$${totalPagar.toFixed(2)}`;
}

document.addEventListener('DOMContentLoaded', mostrarCarritoForm);


function enviarFormulario(){
    const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];

    const carritoTexto = JSON.stringify(productosEnCarrito,null,2);

    document.getElementById('mensaje').innerHTML= `<pre>${carritoTexto}</pre>`;

    const carritoProductos = document.getElementById('carrito-productos'); 


    
    carritoProductos.innerHTML = ''; // Limpiar la vista del carrito

    productosEnCarrito.forEach(producto => {

        if (!producto.eliminado) {
            let formData = new FormData();
            formData.append("id", producto.id);
            formData.append("cantidad", producto.cantidad);

            // Enviar la solicitud POST al controlador
            fetch(base_url() + "/index.php/abmCarrito/enviarForm", {
                method: "POST",
                body: formData
            })
            .then(response => response.json()) // Asegúrate de que el servidor devuelva JSON
            .then(data => {
                if (data.success) {
                    console.log("Cantidad actualizada en la base de datos.");
                    
                    // ACTUALIZAR localStorage con la nueva cantidad (si el stock se ha actualizado)
                    let productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
                    let producto = productosEnCarrito.find(p => p.id === producto.id);
                    if (producto) {
                        producto.cantidad = producto.cantidad - data.cantidadRestada; // restamos la cantidad comprada
                        localStorage.setItem('productos', JSON.stringify(productosEnCarrito));
                    }
                    
                    // REFRESCAR la vista del carrito
                    mostrarCarrito();
                } else {
                    console.error("Error al actualizar cantidad:", data.error);
                }
            })
            .catch(error => console.error("Error en la petición:", error));
        }
    });
}

