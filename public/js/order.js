document.addEventListener('DOMContentLoaded', () => {
    renderCart();
    document.querySelector('.checkout-btn')?.addEventListener('click', checkout);
});

function renderCart() {
    const cartContainer = document.getElementById('cart-container');
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    cartContainer.innerHTML = '';

    if (cart.length === 0) {
        cartContainer.innerHTML = '<p>No items in cart.</p>';
        return;
    }

    let total = 0;

    cart.forEach((item, index) => {
        const itemDiv = document.createElement('div');
        itemDiv.className = 'cart-card';
        itemDiv.innerHTML = `
            <img src="/storage/images/product/${item.image}" alt="${item.name}" />
            <div class="item-info">
                <small>${item.category}</small>
                <h3>${item.name}</h3>
                <div class="qty-price">
                    <button onclick="changeQty(${index}, -1)">-</button>
                    <span>${item.qty}</span>
                    <button onclick="changeQty(${index}, 1)">+</button>
                    <p>Rp${item.price * item.qty}</p>
                </div>
            </div>
            <button onclick="removeFromCart(${index})">🗑️</button>
        `;
        cartContainer.appendChild(itemDiv);
        total += item.price * item.qty;
    });

    // Update ringkasan harga
    const subtotalElem = document.querySelector('.summary-box .summary-line:nth-child(2) span:last-child');
    const totalElem = document.querySelector('.summary-box .summary-line.total span:last-child');
    if (subtotalElem) subtotalElem.innerText = `Rp${total}`;
    if (totalElem) totalElem.innerText = `Rp${total - 50000 + 3000}`; // contoh diskon dan fee
}

function changeQty(index, delta) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (!cart[index]) return;
    cart[index].qty += delta;
    if (cart[index].qty < 1) cart[index].qty = 1;
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
}

function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
}
