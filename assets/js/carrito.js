


function mostrarCarritoForm() {
    try {
        const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
        const cantidades = JSON.parse(localStorage.getItem('cantidades')) || {};
        const carritoProductos = document.getElementById('carrito-productos');

        carritoProductos.innerHTML = '';

        productosEnCarrito.forEach(producto => {
            const idUnico = `${producto.id}-${producto.indice}`;
            const cantidad = cantidades[idUnico] || 1;

            const nuevaFila = document.createElement('tr');
            nuevaFila.innerHTML = `
                <td>${producto.nombre}</td>
                <td class="precio">$${producto.precio}</td>
                <td>${cantidad}</td>
                <td class="total">$${(producto.precio * cantidad).toFixed(2)}</td>
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
    const cantidades = JSON.parse(localStorage.getItem('cantidades')) || {};
    let totalPagar = 0;

    productosEnCarrito.forEach(producto => {
        let cantidad = cantidades[producto.id] || 1;
        totalPagar += producto.precio * cantidad;
    });

    document.getElementById('total-pagar').textContent = `$${totalPagar.toFixed(2)}`;
}

document.addEventListener('DOMContentLoaded', mostrarCarritoForm);