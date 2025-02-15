function base_url() {
    return 'http://localhost/ZTGHardware';
}

function actualizarContadorCarrito() {
    const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
    const contadorCarrito = document.querySelector('.cuenta-carrito');
    contadorCarrito.textContent = productosEnCarrito.length; 
}


function agregarAlCarrito(producto, cantidadIngresada = 1) {
    try {
        let productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
        let productoExistente = productosEnCarrito.find(p => p.id === producto.id);
        let indice = 0; // Inicializamos el índice

        if (!productoExistente) {
            productosEnCarrito.push(producto);
        } else {
            // Si el producto ya existe, buscamos el último índice utilizado y lo incrementamos
            let productosRepetidos = productosEnCarrito.filter(p => p.id === producto.id);
            if (productosRepetidos.length > 0) {
                let indicesUsados = productosRepetidos.map(p => p => p.indice || 0); // Manejar undefined
                indice = Math.max(...indicesUsados) + 1;
            }
        }

        producto.indice = indice; // Asignamos el índice al producto
        localStorage.setItem('productos', JSON.stringify(productosEnCarrito));

       

        actualizarContadorCarrito();
    } catch (error) {
        console.error('Error al agregar al carrito:', error);
    }
}


function mostrarCarrito() {
    try {
        const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
        const carritoProductos = document.getElementById('carrito-productos'); 
        
        // 🔄 BORRAR contenido viejo antes de volver a renderizar
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
                    <td><input class="contador" type="number" value="${producto.cantidad}" min="1" max="${producto.stock}" data-id="${producto.id}" onchange="actualizarTotal(this, ${producto.precio},${producto.stock})">
                    <span>(Stock: ${producto.stock})</span></td> 
                    
                    <td class="total">$${producto.precio * producto.cantidad}</td> `; // 🔄 REFLEJAR CAMBIO EN LA INTERFAZ
                
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
    if (isNaN(cantidad) || cantidad < 1) cantidad = 1;
    if (cantidad > stock) cantidad = stock;

    input.value = cantidad;
    let idProducto = input.dataset.id;

    // Actualizar el total en la fila
    let fila = input.closest('tr');
    let celdaTotal = fila.querySelector('.total');
    let nuevoTotal = precio * cantidad;
    celdaTotal.textContent = `$${nuevoTotal.toFixed(2)}`;

    actualizarTotalPagar();

    // Enviar la actualización a la base de datos
    let formData = new FormData();
    formData.append("id", idProducto);
    formData.append("cantidad", cantidad);

    fetch(base_url() + "/index.php/abmArticulos/actualizar_carrito?nocache=" + new Date().getTime(), {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
.then(data => {
    if (data.success) {
        console.log("Cantidad actualizada en la base de datos.");
        
        // 🔄 ACTUALIZAR localStorage con la nueva cantidad
        let productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
        let producto = productosEnCarrito.find(p => p.id === idProducto);
        if (producto) {
            producto.cantidad = cantidad;
            localStorage.setItem('productos', JSON.stringify(productosEnCarrito));
        }

        // 🔄 REFRESCAR la vista del carrito
        mostrarCarrito();
    } else {
        console.error("Error al actualizar cantidad:", data.error);
    }
})
.catch(error => console.error("Error en la petición:", error));
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



