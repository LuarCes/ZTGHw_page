function base_url() {
    return 'http://localhost/ZTGHardware';
}

function actualizarContadorCarrito() {
    const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
    const contadorCarrito = document.querySelector('.cuenta-carrito');
    contadorCarrito.textContent = productosEnCarrito.length; 
}


function agregarAlCarrito(producto) {
    try {
        const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
        const productoExistente = productosEnCarrito.find(p => p.id === producto.id);

        if (productoExistente) {
            console.log('El producto ya está en el carrito');
        } else {
            productosEnCarrito.push(producto);
            localStorage.setItem('productos', JSON.stringify(productosEnCarrito));
            actualizarContadorCarrito();
        }
    } catch (error) {
        console.error('Error al agregar al carrito:', error);
    }

    producto.eliminado = false;
}

function mostrarCarrito() {
    try {
        const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
        const carritoProductos = document.getElementById('carrito-productos'); 

        carritoProductos.innerHTML = '';

        productosEnCarrito.forEach(producto => {
            if (!producto.eliminado) {
                const urlImagen = baseUrl + "assets/images/articulos/" + producto.id + ".png";

                const nuevaFila = document.createElement('tr');
                nuevaFila.innerHTML = `
                    <td><button class="eliminar" onclick='eliminarProducto(this)'><img src="${binIconUrl}" width="30" alt="Eliminar"></button></td> 
                    <td><img src="${urlImagen}" width="50"></td> 
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

function actualizarTotal(input, precio) {
    const cantidad = input.value;
    const total = input.parentElement.nextElementSibling;
    total.textContent = `$${(cantidad * precio).toFixed(2)}`;
}



function eliminarProducto(boton) {
    const fila = boton.parentNode.parentNode;
    const nombreProducto = fila.querySelector('td:nth-child(3)').textContent.trim();
    const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
    const productosActualizados = productosEnCarrito.filter(producto => producto.nombre !== nombreProducto);

    localStorage.setItem('productos', JSON.stringify(productosActualizados));

    fila.remove();
    actualizarTotalPagar();
    actualizarContadorCarrito(); 
}

window.onload = function() {
    mostrarCarrito();
    actualizarContadorCarrito();
};

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



