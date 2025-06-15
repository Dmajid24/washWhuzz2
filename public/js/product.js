function showProducts(category) {
    const productList = document.getElementById('product-list');
    productList.innerHTML = '';

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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

                    productElement.innerHTML = `
                        <img src="/storage/images/product/${product.image}" alt="${product.name}">
                        <div class="content">
                            <h3>${product.name}</h3>
                            <div class="productL">${product.description}</div> 
                            <div class="price">Price: ${product.price}</div>
                        </div>
                        <button type="button" class="addButton" onclick="addToCartFromElement(this)">Add</button>
                    `;

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
    const productCard = button.closest('.product-item');
    const name = productCard.querySelector('h3').textContent;
    const priceText = productCard.querySelector('.price').textContent;
    const price = parseInt(priceText.replace(/[^\d]/g, ''));

    // Load cart dari localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    const existing = cart.find(item => item.name === name);
    if (existing) {
        existing.qty += 1;
    } else {
        cart.push({ name, price, qty: 1 });
    }

    // Simpan kembali ke localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    alert(`${name} ditambahkan ke keranjang!`);

    // Jika di halaman order, render ulang cart
    if (window.location.pathname.includes('order')) {
        if (typeof renderCart === 'function') {
            renderCart(); // dari order.js
        }
    }

    console.log('Cart:', JSON.parse(localStorage.getItem('cart')));
}
