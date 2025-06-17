document.addEventListener('DOMContentLoaded', () => {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    const total = cart.reduce((sum, item) => sum + item.price * item.qty, 0);

    // Jalankan ini di semua step yang menampilkan summary (step 2, 3, 4)
    updateSummary(total);

    // Jalankan renderCart hanya di step 1 (cart)
    if (document.getElementById('cart-container')) {
        renderCart();
        document.querySelector('.checkout-btn')?.addEventListener('click', handleCheckout);
    }
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
        total += item.price * item.qty;
        tax = total * 0.11; // contoh pajak 11%
        cartContainer.appendChild(itemDiv);


        
    });



    // Update ringkasan harga
    const subtotalElem = document.querySelector('.summary-line.subtotal span');
    const taxElem = document.querySelector('.summary-adminfee span');
    const totalElem = document.querySelector('.summary-total span');
    if (subtotalElem) subtotalElem.innerText = `Rp${total}`;
    if (taxElem) taxElem.innerText = `RP ${tax}`; // contoh pajak
    if (totalElem) totalElem.innerText = `Rp${total + tax}`; // contoh diskon dan fee

   
    
}

function updateSummary(total) {
    const tax = total * 0.11;

    const subtotalElem = document.querySelector('.summary-line.subtotal span');
    const taxElem = document.querySelector('#summary-adminfee span');
    const totalElem = document.querySelector('#summary-total');

    if (subtotalElem) subtotalElem.innerText = `Rp${total.toLocaleString('id-ID')}`;
    if (taxElem) taxElem.innerText = `Rp${tax.toLocaleString('id-ID')}`;
    if (totalElem) totalElem.innerText = `Rp${(total + tax).toLocaleString('id-ID')}`;
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

async function handleCheckout() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    const items = cart.map(item => ({
        idProduct: item.idProduct,
        quantity: item.qty,
        price: item.price
    }));

    const total = items.reduce((sum, item) => sum + item.price * item.quantity, 0);

    try {
        const response = await fetch('/checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ items, total })
        });

        const data = await response.json();

        console.log(response); // <- sekarang aman dipanggil
        console.log(data);     // <- ini juga

        if (response.ok) {
            alert('Checkout sukses! ID transaksi: ' + data.transaction_id);
            localStorage.removeItem('cart');
            location.href = '/transactions/history';
        } else {
            alert('Gagal: ' + data.message);
        }
    } catch (err) {
        console.error(err);
        alert('Terjadi kesalahan saat checkout.');
    }
}

  
  
  