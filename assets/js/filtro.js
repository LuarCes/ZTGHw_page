const filters = document.querySelectorAll('.ordenar'); // Selecciona todos los botones de ordenación
const productsContainer = document.getElementById('products-container'); // Selecciona el contenedor de los productos

filters.forEach(filter => {
    filter.addEventListener('click', (event) => {
        event.preventDefault();

        const order = event.target.id; // Obtiene el valor del atributo id (asc o desc)

        // Obtiene todos los productos
        const products = document.querySelectorAll('.card');

        // Ordena los productos según el criterio seleccionado
        const sortedProducts = Array.from(products).sort((a, b) => {
            const priceA = parseFloat(a.dataset.price);
            const priceB = parseFloat(b.dataset.price);

            if (order === 'asc') {
                return priceA - priceB; // Ascendente
            } else if (order === 'desc') {
                return priceB - priceA; // Descendente
            }
        });

        // Limpia el contenedor y agrega los productos ordenados
        productsContainer.innerHTML = '';
        sortedProducts.forEach(product => {
            productsContainer.appendChild(product);
        });
    });
});