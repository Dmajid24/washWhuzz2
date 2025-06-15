// let cart = [];

// // Fungsi untuk menambahkan produk ke cart
// function addToCart(productId) {
//     fetch(`/getproduct?id=${productId}`)
//         .then(response => {
//             if (!response.ok) throw new Error('Gagal mengambil data produk');
//             return response.json();
//         })
//         .then(product => {
//             const existing = cart.find(p => p.id === product.idProduct);
//             if (existing) {
//                 existing.qty += 1;
//             } else {
//                 cart.push({
//                     id: product.idProduct,
//                     name: product.name,
//                     price: product.price,
//                     qty: 1
//                 });
//             }
//             renderCart();
//         })
//         .catch(error => {
//             console.error('Gagal menambahkan produk ke cart:', error);
//         });
// }

// // Fungsi untuk menampilkan cart di halaman
// function renderCart() {
//     const cartContainer = document.getElementById('cart-container');
//     cartContainer.innerHTML = '';

//     if (cart.length === 0) {
//         cartContainer.innerHTML = '<p>Keranjang kosong.</p>';
//         return;
//     }

//     let total = 0;
//     cart.forEach(item => {
//         const itemDiv = document.createElement('div');
//         itemDiv.className = 'cart-item';
//         itemDiv.innerHTML = `
//             <div>
//                 <strong>${item.name}</strong> <br>
//                 ${item.qty} x Rp${item.price} = Rp${item.price * item.qty}
//             </div>
//             <button onclick="removeFromCart(${item.id})">Hapus</button>
//         `;
//         cartContainer.appendChild(itemDiv);
//         total += item.price * item.qty;
//     });

//     const totalDiv = document.createElement('div');
//     totalDiv.innerHTML = `<hr><strong>Total: Rp${total}</strong>`;
//     cartContainer.appendChild(totalDiv);
// }

// // Fungsi untuk menghapus item dari cart
// function removeFromCart(productId) {
//     cart = cart.filter(item => item.id !== productId);
//     renderCart();
// }

// // Fungsi checkout, mengirim cart ke backend Laravel
// function checkout() {
//     if (cart.length === 0) {
//         alert("Cart kosong!");
//         return;
//     }

//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//     fetch('/checkout', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': csrfToken
//         },
//         body: JSON.stringify({ cart })
//     })
//     .then(response => {
//         if (!response.ok) throw new Error('Gagal melakukan checkout');
//         return response.json();
//     })
//     .then(data => {
//         alert(data.message || 'Checkout berhasil!');
//         cart = [];
//         renderCart();
//     })
//     .catch(error => {
//         console.error('Checkout error:', error);
//         alert('Terjadi kesalahan saat checkout.');
//     });
// }
// Saat halaman dimuat, tampilkan cart

document.addEventListener('DOMContentLoaded', () => {
    renderCart();
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

    cart.forEach(item => {
        const itemDiv = document.createElement('div');
        itemDiv.className = 'cart-item';
        itemDiv.innerHTML = `
            ${item.qty}x ${item.name} - Rp${item.price * item.qty}
            <button onclick="removeFromCart('${item.name}')">Remove</button>
        `;
        cartContainer.appendChild(itemDiv);
        total += item.price * item.qty;
    });

    const totalDiv = document.createElement('div');
    totalDiv.innerHTML = `<strong>Total: Rp${total}</strong>`;
    cartContainer.appendChild(totalDiv);
}

function removeFromCart(name) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(item => item.name !== name);
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
}

function checkout() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart.length === 0) {
        alert('Cart kosong.');
        return;
    }

    const customer = {
        fullname: document.getElementById('fullname').value,
        phone: document.getElementById('phone').value,
        address: document.getElementById('address').value
    };

    if (!customer.fullname || !customer.phone || !customer.address) {
        alert("Mohon lengkapi data customer.");
        return;
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';

    fetch('/checkout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ cart, customer })
    })
    .then(res => {
        if (!res.ok) throw new Error('Gagal checkout');
        return res.json();
    })
    .then(data => {
        alert('Checkout berhasil!');
        localStorage.removeItem('cart');
        renderCart();
        document.getElementById('customer-form').reset();
    })
    .catch(err => {
        console.error(err);
        alert('Terjadi kesalahan saat checkout.');
    });
}
