


function mostrarCarritoForm() {
    try {
        const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
        const carritoProductos = document.getElementById('carrito-productos'); 

        carritoProductos.innerHTML = '';

        productosEnCarrito.forEach(producto => {
            if (!producto.eliminado) {

                const nuevaFila = document.createElement('tr');
                nuevaFila.innerHTML = `
                    <td>${producto.nombre}</td>
                    <td class="precio">$${producto.precio}</td> 
                    <td><input class="contador" type="number" value="1" min="1" onchange="actualizarTotal(this, ${producto.precio})"></td> 
                    <td class="total">$${producto.precio}</td> `;
                carritoProductos.appendChild(nuevaFila);
            }
        });
        actualizarTotalPagar();
        actualizarContadorCarrito(); 
    } catch (error) {
        console.error('Error al mostrar el carrito:', error);
    }
}


function actualizarTotalPagar() {
    const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
    let totalPagar = 0;

    productosEnCarrito.forEach(producto => {
        const cantidadInput = document.querySelector(`input[data-id="${producto.id}"]`);
        const cantidad = cantidadInput ? parseInt(cantidadInput.value) : 1;
        totalPagar += producto.precio * cantidad;
    });

    document.getElementById('total-pagar').textContent = `${totalPagar.toFixed(2)}`;
}

document.addEventListener('DOMContentLoaded', mostrarCarritoForm);