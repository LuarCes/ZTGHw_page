document.addEventListener('DOMContentLoaded', () => {
    const categoryFilters = document.querySelectorAll('.categorizar'); // Botones de categoría
    const orderFilters = document.querySelectorAll('.ordenar'); // Botones de orden
    const productsContainer = document.getElementById('products-container'); // Contenedor de productos
  
    // Almacena todos los productos originales
    const allProducts = Array.from(productsContainer.children);
  
    // Mantiene el estado de los productos visibles (por defecto, todos los productos)
    let filteredProducts = [...allProducts];
  
    // Filtrar por categoría
    categoryFilters.forEach(filter => {
      filter.addEventListener('click', (event) => {
        event.preventDefault();
  
        const selectedCategory = event.target.textContent.trim();
  
        // Filtra a partir de todos los productos originales
        filteredProducts = allProducts.filter(product => {
          return product.dataset.category === selectedCategory;
        });
  
        // Actualiza el contenedor con los productos filtrados
        updateProducts(filteredProducts);
      });
    });
  
    // Ordenar por precio
    orderFilters.forEach(filter => {
      filter.addEventListener('click', (event) => {
        event.preventDefault();
  
        const order = event.target.id; // 'asc' o 'desc'
  
        // Si no hay un filtro de categoría activo, usa todos los productos originales
        const productsToSort = filteredProducts.length > 0 ? filteredProducts : allProducts;
  
        // Ordena los productos (filtrados o todos)
        const sortedProducts = [...productsToSort].sort((a, b) => {
          const priceA = parseFloat(a.dataset.price);
          const priceB = parseFloat(b.dataset.price);
  
          return order === 'asc' ? priceA - priceB : priceB - priceA;
        });
  
        // Actualiza el contenedor con los productos ordenados
        updateProducts(sortedProducts);
      });
    });
  
    // Función para actualizar el contenedor de productos
    function updateProducts(products) {
      productsContainer.innerHTML = '';
      products.forEach(product => {
        productsContainer.appendChild(product);
      });
    }
  });
  
