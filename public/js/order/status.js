document.addEventListener('DOMContentLoaded', function() {
    // This would be replaced with actual API call in production
    fetchWorkerDetails();
    
    function fetchWorkerDetails() {
        // Mock API response
        const mockResponse = {
            workers: [
                { role: "Lead Worker", name: "John Doe" },
                { role: "Co-team", name: "Jane Smith" },
                { role: "Co-team", name: "Robert Johnson" }
            ]
        };
        
        populateWorkerDetails(mockResponse.workers);
        
        // In production, you would use:
        /*
        fetch('/api/order/workers')
            .then(response => response.json())
            .then(data => populateWorkerDetails(data.workers))
            .catch(error => console.error('Error:', error));
        */
    }
    
    function populateWorkerDetails(workers) {
        const workersList = document.querySelector('.workers-list');
        workersList.innerHTML = '';
        
        workers.forEach(worker => {
            const workerCard = document.createElement('div');
            workerCard.className = 'worker-card';
            workerCard.innerHTML = `
                <div class="worker-role">${worker.role}</div>
                <div class="worker-name">${worker.name}</div>
            `;
            workersList.appendChild(workerCard);
        });
    }
    
    // This would be replaced with real-time updates in production
    // For demo purposes, we'll simulate progress updates
    setTimeout(() => {
        document.querySelectorAll('.tracker-step')[2].classList.add('active');
    }, 5000);
    
    setTimeout(() => {
        document.querySelectorAll('.tracker-step')[3].classList.add('active');
    }, 10000);
});

function handleCheckout() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    const items = cart.map(item => ({
        idProduct: item.idProduct,
        quantity: item.qty,
        price: item.price
    }));

    const total = items.reduce((sum, item) => sum + item.price * item.quantity, 0);

    fetch('/transaction', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ items, total }),
        credentials: 'same-origin' // ⬅️ Wajib agar cookie session terkirim
    })
    
    .then(async res => {
        if (res.redirected) {
            // Redirected berarti kemungkinan ke /login
            const redirectedUrl = res.url;
            if (redirectedUrl.includes('/login')) {
                alert("Kamu belum login! Silakan login terlebih dahulu.");
                window.location.href = '/login';
                return;
            }
        }
    
        const contentType = res.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            const text = await res.text();
            throw new Error("Expected JSON but got: " + text.slice(0, 100));
        }
    
        return res.json();
    })
    
    .then(data => {
        if (data.transaction_id) {
            alert('Transaksi berhasil!');
            localStorage.removeItem('cart');
            window.location.href = '/transaction/success/' + data.transaction_id;
        } else {
            alert('Terjadi kesalahan saat menyimpan transaksi.');
        }
    })
    .catch(async (error) => {
        const responseUrl = error.response?.url || '';
    
        if (responseUrl.includes('/login')) {
            alert('Kamu belum login! Silakan login dulu untuk melakukan transaksi.');
            window.location.href = '/login';
            return;
        }
    
        console.error('Checkout error:', error);
    
        if (error instanceof Error && error.message.includes('<')) {
            alert('Server mengembalikan HTML, kemungkinan ada error di backend.');
        } else {
            alert('Terjadi kesalahan saat menyimpan transaksi.');
        }
    });
    
    
}
