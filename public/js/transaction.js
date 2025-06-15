function addToCart(idProduct) {
    fetch(`/add-to-cart/${idProduct}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            alert('Produk berhasil ditambahkan ke keranjang!');
        } else {
            alert('Gagal menambahkan produk!');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menambahkan produk.');
    });
}
