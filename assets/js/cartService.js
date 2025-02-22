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
        

        if (!productoExistente) {
            producto.cantidad = cantidadIngresada;
            productosEnCarrito.push(producto);
            localStorage.setItem('productos', JSON.stringify(productosEnCarrito));
        }

        actualizarContadorCarrito();
        cambiarBotonACarrito(producto.id);
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
                    <td class="img-carrito"><img src="${urlImagen}" width="50"></td> 
                    <td class="nom-carrito">${producto.nombre}</td>
                    <td class="precio">$${Number(producto.precio).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                    <td class="cant-carrito"><input class="contador" type="number" value="${producto.cantidad}" min="1" max="${producto.stock}" data-id="${producto.id}" onchange="actualizarTotal(this, ${producto.precio},${producto.stock})">
                    <br><span class="stock-carrito">(Stock: ${producto.stock})</span></td> 
                    
                    <td class="total">$${(producto.precio * producto.cantidad).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td> `;
                
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
    celdaTotal.textContent = `$${nuevoTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;

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
        const precio = parseFloat(
            fila.querySelector('.precio').textContent
                .replace(/\$/g, '')  
                .replace(/,/g, '')   
        );
        const cantidad = parseInt(cantidadInput.value);

        totalPagar += precio * cantidad;
    });

    document.getElementById('total-pagar').textContent = 
        `$${totalPagar.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
}



function cambiarBotonACarrito(idProducto) {
    const boton = document.getElementById(`boton-${idProducto}`);
    if (boton) {
        boton.textContent = 'En carro 🛒';
        boton.style.backgroundColor = 'green';
        boton.style.color = 'white';
        boton.disabled = true; 
    }
}


function revisarBotonesCarrito() {
    const productosEnCarrito = JSON.parse(localStorage.getItem('productos')) || [];
    productosEnCarrito.forEach(producto => {
        cambiarBotonACarrito(producto.id); 
    });
}

window.onload = function() {
    mostrarCarrito();
    actualizarContadorCarrito();
    revisarBotonesCarrito(); 
};


function revisarStockProductos() {
    const botones = document.querySelectorAll('[id^="boton-"]');
    botones.forEach(boton => {
        const stock = parseInt(boton.getAttribute('data-stock'));
        if (stock <= 0) {
            boton.textContent = 'Sin stock 😢';
            boton.style.backgroundColor = 'red';
            boton.style.color = 'white';
            boton.disabled = true;
        }
    });
}

window.addEventListener('load', revisarStockProductos);
