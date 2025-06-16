document.addEventListener('DOMContentLoaded', function() {
    // Load order summary from API
    loadOrderSummary();
    
    // Check for saved customer data
    const savedCustomerData = localStorage.getItem('customerDetails');
    if (savedCustomerData) {
        populateForm(JSON.parse(savedCustomerData));
    }
    
    // Populate block numbers
    const blockSelect = document.getElementById('addressBlock');
    for (let i = 1; i <= 200; i++) {
        const option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        blockSelect.appendChild(option);
    }
    
    // Form submission
    const form = document.getElementById('customerDetailsForm');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate form
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        
        // Save form data
        const formData = {
            firstName: document.getElementById('firstName').value,
            lastName: document.getElementById('lastName').value,
            phoneNumber: document.getElementById('phoneNumber').value,
            addressArea: document.getElementById('addressArea').value,
            addressBlock: document.getElementById('addressBlock').value,
            additionalNotes: document.getElementById('additionalNotes').value
        };
        
        localStorage.setItem('customerDetails', JSON.stringify(formData));
        
        // Proceed to next step (payment)
        window.location.href = '/order/step-3';
    });
    
    // Back button
    document.querySelector('.btn-prev').addEventListener('click', function() {
        window.location.href = '/order/step-1';
    });
    
    // Helper functions
    function loadOrderSummary() {
        // In a real app, this would come from an API
        const orderSummary = {
            items: [
                { name: 'Product 1', price: 50000, quantity: 2 },
                { name: 'Product 2', price: 75000, quantity: 1 }
            ],
            subtotal: 175000,
            deliveryFee: 15000,
            discount: 0,
            total: 190000
        };
        
        // Populate items
        const itemsContainer = document.querySelector('.mini-cart-items');
        itemsContainer.innerHTML = '';
        
        orderSummary.items.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.className = 'mini-cart-item';
            itemElement.innerHTML = `
                <span>${item.name} × ${item.quantity}</span>
                <span>Rp${(item.price * item.quantity).toLocaleString()}</span>
            `;
            itemsContainer.appendChild(itemElement);
        });
        
        // Update totals
        document.getElementById('subtotal').textContent = `Rp${orderSummary.subtotal.toLocaleString()}`;
        document.getElementById('deliveryFee').textContent = `Rp${orderSummary.deliveryFee.toLocaleString()}`;
        document.getElementById('discount').textContent = `-Rp${orderSummary.discount.toLocaleString()}`;
        document.getElementById('total').textContent = `Rp${orderSummary.total.toLocaleString()}`;
    }
    
    function populateForm(data) {
        document.getElementById('firstName').value = data.firstName || '';
        document.getElementById('lastName').value = data.lastName || '';
        document.getElementById('phoneNumber').value = data.phoneNumber || '';
        document.getElementById('addressBlock').value = data.addressBlock || '';
        document.getElementById('additionalNotes').value = data.additionalNotes || '';
    }
    
    // In production, this would initialize Google Maps
    function initMap() {
        // const map = new google.maps.Map(document.getElementById('mapContainer'), {
        //     center: { lat: -6.2088, lng: 106.8456 }, // Jakarta coordinates
        //     zoom: 15
        // });
        
        // Add click listener to select location
        // map.addListener('click', function(e) {
        //     // Handle location selection
        // });
    }
    
    // Initialize the map
    initMap();
});