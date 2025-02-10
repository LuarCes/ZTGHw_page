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
            productosEnCarrito.push({
                id: producto.id,
                nombre: producto.nombre,
                precio: producto.precio,
                stock: producto.stock, 
                eliminado: false
            });


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
            console.log('Producto:', producto);

            if (!producto.eliminado) {
                const urlImagen = baseUrl + "assets/images/articulos/" + producto.id + ".png";

                const nuevaFila = document.createElement('tr');
                nuevaFila.innerHTML = `
                    <td><button class="eliminar" onclick='eliminarProducto(this)'><img src="${binIconUrl}" width="30" alt="Eliminar"></button></td> 
                    <td><img src="${urlImagen}" width="50"></td> 
                    <td>${producto.nombre}</td>
                    <td class="precio">$${producto.precio}</td> 
                    <td><input class="contador" type="number" value="1" min="1" max="${producto.stock}" onchange="actualizarTotal(this, ${producto.precio},${producto.stock})">
                    <span>(Stock: ${producto.stock})</span></td> 
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

function actualizarTotal(input, precio, stock) {
    let cantidad = parseInt(input.value);

    if (isNaN(cantidad) || cantidad < 1) {
        cantidad = 1; // Si el valor es inválido o menor que 1, lo ajustamos a 1
    } else if (cantidad > stock) {
        cantidad = stock; // Si el usuario intenta comprar más que el stock, lo ajustamos
    }

    input.value = cantidad;

    // Actualizar el total en la fila correspondiente
    const fila = input.closest('tr');
    const celdaTotal = fila.querySelector('.total');
    const nuevoTotal = precio * cantidad;
    celdaTotal.textContent = `$${nuevoTotal.toFixed(2)}`;

    actualizarTotalPagar();
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
    const carritoProductos = document.getElementById('carrito-productos');
    const filas = carritoProductos.querySelectorAll('tr');
    let totalPagar = 0;

    filas.forEach(fila => {
        const cantidadInput = fila.querySelector('.contador');
        const precio = parseFloat(fila.querySelector('.precio').textContent.replace('$', ''));
        const cantidad = parseInt(cantidadInput.value);

        totalPagar += precio * cantidad;
    });

    document.getElementById('total-pagar').textContent = `$${totalPagar.toFixed(2)}`;
}



