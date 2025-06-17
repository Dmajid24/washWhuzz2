function showProducts(category) {
    const productList = document.getElementById('product-list');
    productList.innerHTML = '';

    fetch(`/getproducts?category=${category}`)
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (data.length > 0) {
                data.forEach(product => {
                    const productElement = document.createElement('div');
                    productElement.classList.add('product-item');

                    // Buat elemen gambar
                    const img = document.createElement('img');
                    img.src = `/storage/images/product/${product.image}`;
                    img.alt = product.name;

                    // Buat container konten
                    const contentDiv = document.createElement('div');
                    contentDiv.classList.add('content');
                    contentDiv.innerHTML = `
                        <h3>${product.name}</h3>
                        <div class="productL">${product.description}</div> 
                        <div class="price">Price: Rp${product.price}</div>
                    `;

                    // Buat tombol dan tambahkan atribut data secara aman
                    const button = document.createElement('button');
                    button.classList.add('addButton');
                    button.type = 'button';
                    button.textContent = 'Add';

                    button.setAttribute('data-name', product.name);
                    button.setAttribute('data-price', product.price);
                    button.setAttribute('data-image', product.image);
                    button.setAttribute('data-category', product.category);
                    button.setAttribute('data-idProduct', product.idProduct); // tambahkan ini


                    button.addEventListener('click', () => addToCartFromElement(button));

                    // Gabungkan ke dalam card
                    productElement.appendChild(img);
                    productElement.appendChild(contentDiv);
                    productElement.appendChild(button);

                    productList.appendChild(productElement);
                });
            } else {
                productList.innerHTML = '<p>No products available for this category.</p>';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            productList.innerHTML = '<p>Something went wrong while loading products.</p>';
        });
}


// ✅ PINDAHKAN fungsi ini KE LUAR agar global (bisa dipanggil dari tombol HTML)

    function addToCartFromElement(button) {
        const idProduct = button.getAttribute('data-idProduct');
        const name = button.getAttribute('data-name');
        const price = parseInt(button.getAttribute('data-price'));
        const image = button.getAttribute('data-image');
        const category = button.getAttribute('data-category');
    
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
        const existing = cart.find(item => item.idProduct === idProduct);
        if (existing) {
            existing.qty += 1;
        } else {
            cart.push({ idProduct, name, price, qty: 1, image, category });
        }
    
        localStorage.setItem('cart', JSON.stringify(cart));
        alert(`${name} ditambahkan ke keranjang!`);
    }
    
