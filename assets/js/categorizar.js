document.addEventListener('DOMContentLoaded', () => {
    const categoryFilters = document.querySelectorAll('.categorizar'); // Botones de categoría
    const productsContainer = document.getElementById('products-container'); // Contenedor de productos
  
    // Almacena todos los productos originales
    const allProducts = Array.from(productsContainer.children);
  
    categoryFilters.forEach(filter => {
      filter.addEventListener('click', (event) => {
        event.preventDefault();
  
        const selectedCategory = event.target.textContent.trim();
  
        // Filtra a partir de la lista de productos originales
        const filteredProducts = allProducts.filter(product => {
          return product.dataset.category === selectedCategory;
        });
  
        // Actualiza el contenedor con los productos filtrados
        productsContainer.innerHTML = '';
        filteredProducts.forEach(product => {
          productsContainer.appendChild(product);
        });
      });
    });
  });