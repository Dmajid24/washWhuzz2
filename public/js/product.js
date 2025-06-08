function showProducts(category) {
    const productList = document.getElementById('product-list');
    
    // Clear existing products
    productList.innerHTML = '';

    // Fetch data from Laravel route with the selected category
    fetch(`/getproducts?category=${category}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();  // Parse response to JSON
    })
    .then(data => {
        if (data.length > 0) {
            // Loop through products and create HTML elements for each product
            data.forEach(product => {
                const productElement = document.createElement('div');
                productElement.classList.add('product-item');

                // Create HTML for each product
                productElement.innerHTML = `
                 <img src="/storage/${product.image}" alt="${product.name}">
                <div class="content">
                   
                    <h3>${product.name}</h3>
                    <div class="productL">${product.description}</div> 
                    <div class="price"><strong>Price: ${product.price}</strong></div>
                </div>
                <button clas="addButton">Add</button>
                `;
                
                // Add product to the product list container
                productList.appendChild(productElement);
            });
        } else {
            // If no products are found, display a message
            productList.innerHTML = '<p>No products available for this category.</p>';
        }

        // Scroll to the product list to make sure it's visible
    });
}
