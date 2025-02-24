document.addEventListener('DOMContentLoaded', () => {
    const categoryFilters = document.querySelectorAll('.categorizar'); 
    const orderFilters = document.querySelectorAll('.ordenar'); 
    const productsContainer = document.getElementById('products-container'); 
  
    
    const allProducts = Array.from(productsContainer.children);
  
    
    let filteredProducts = [...allProducts];
  
    
    categoryFilters.forEach(filter => {
      filter.addEventListener('click', (event) => {
        event.preventDefault();
  
        const selectedCategory = event.target.textContent.trim();
  
        
        filteredProducts = allProducts.filter(product => {
          return product.dataset.category === selectedCategory;
        });
  
       
        updateProducts(filteredProducts);
      });
    });
  
    
    orderFilters.forEach(filter => {
      filter.addEventListener('click', (event) => {
        event.preventDefault();
  
        const order = event.target.id; 
  
       
        const productsToSort = filteredProducts.length > 0 ? filteredProducts : allProducts;
  
        
        const sortedProducts = [...productsToSort].sort((a, b) => {
          const priceA = parseFloat(a.dataset.price);
          const priceB = parseFloat(b.dataset.price);
  
          return order === 'asc' ? priceA - priceB : priceB - priceA;
        });
  
        
        updateProducts(sortedProducts);
      });
    });
  
    
    function updateProducts(products) {
      productsContainer.innerHTML = '';
      products.forEach(product => {
        productsContainer.appendChild(product);
      });
    }
  });
  
