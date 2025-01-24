function base_url() {
    return 'http://localhost/ZTGHardware';
}

function agregarAlCarrito(producto) {
    try {
        const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
        const productoExistente = productosEnCarrito.find(p => p.id === producto.id);

        if (productoExistente) {
            // Si existe, actualizar la cantidad (si es necesario)
            // ... (lógica para actualizar la cantidad)
            console.log('El producto ya está en el carrito');
        } else {
            // Si no existe, agregar el producto
            productosEnCarrito.push(producto);
            localStorage.setItem('productos', JSON.stringify(productosEnCarrito));
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
                const nuevaFila = document.createElement('tr');
                nuevaFila.innerHTML = `
                    <td><button class="eliminar" onclick='eliminarProducto(this)'>Eliminar</button></td> 
                    <td><img src="${base_url()}${producto.url_img}" alt="${producto.nombre}" width="50"></td> 
                    <td>${producto.nombre}</td>
                    <td class="precio">$${producto.precio}</td> 
                    <td><input type="number" value="1" min="1" onchange="actualizarTotal(this, ${producto.precio})"></td> 
                    <td class="total">$${producto.precio}</td> `;
                carritoProductos.appendChild(nuevaFila);
            }
        });
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
    // Obtener la fila del producto
    const fila = boton.parentNode.parentNode;

    // Obtener el nombre del producto desde la fila
    const nombreProducto = fila.querySelector('td:nth-child(3)').textContent.trim();

    // Obtener los productos del localStorage
    const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];

    // Filtrar los productos para eliminar el seleccionado
    const productosActualizados = productosEnCarrito.filter(producto => producto.nombre !== nombreProducto);

    // Guardar los productos actualizados en localStorage
    localStorage.setItem('productos', JSON.stringify(productosActualizados));

    // Eliminar la fila del producto en la tabla
    fila.remove();
}


