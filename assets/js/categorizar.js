document.addEventListener('DOMContentLoaded', () => {
  const productsContainer = document.getElementById('products-container');

  if (!productsContainer) {
      console.error("El contenedor de productos no se encontró.");
      return;
  }

  const allProducts = Array.from(productsContainer.children);

  document.querySelectorAll('.fila th').forEach(th => {
      th.addEventListener('click', (event) => {
          event.preventDefault();

          
          const link = th.querySelector('.categorizar');
          if (!link) return; 

          const selectedCategory = link.textContent.trim();
          const filteredProducts = allProducts.filter(product => 
              product.dataset.category === selectedCategory
          );

          productsContainer.innerHTML = '';
          filteredProducts.forEach(product => productsContainer.appendChild(product));
      });
  });
});
