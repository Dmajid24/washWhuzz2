import { 
    ADMIN_FEE,
    cartItems,
    currentAddress,
    activePromo,
    fetchCartItems,
    fetchUserAddress,
    calculateTotal
} from './shared.js';

// DOM Elements
const cartList = document.getElementById('cart-list');
const cartLoading = document.getElementById('cart-loading');
const cartEmpty = document.getElementById('cart-empty');
const addressLoading = document.getElementById('address-loading');
const addressInfo = document.getElementById('address-info');
const promoInput = document.getElementById('promo-input');
const applyPromoBtn = document.getElementById('apply-promo-btn');
const promoMessage = document.getElementById('promo-message');
const checkoutBtn = document.getElementById('checkout-btn');

// State
let cartItems = [];
let currentAddress = null;
let activePromo = null;

// Initialize the page
document.addEventListener('DOMContentLoaded', () => {
    // Fetch cart items
    fetchCartItems();
    
    // Fetch user address
    fetchUserAddress();
    
    // Set up event listeners
    applyPromoBtn.addEventListener('click', applyPromo);
    checkoutBtn.addEventListener('click', proceedToCheckout);
});

const initCartStep = async () => {
    try {
        await fetchCartItems();
        await fetchUserAddress();
        renderCartItems();
        
        // Set up event listeners
        applyPromoBtn?.addEventListener('click', applyPromo);
        checkoutBtn?.addEventListener('click', proceedToCheckout);
    } catch (error) {
        // Handle errors
    }
};

// Initialize only if on cart step
if (document.querySelector('#step-1')) {
    initCartStep();
}

/**
 * Fetches cart items from API and renders them
 * Expected API response format:
 * {
 *   items: [
 *     {
 *       id: string,
 *       name: string,
 *       category: string,
 *       price: number,
 *       qty: number,
 *       image: string,
 *       note?: string
 *     }
 *   ]
 * }
 */
async function fetchCartItems() {
    try {
        const response = await fetch('/api/cart');
        if (!response.ok) throw new Error('Failed to fetch cart');
        
        const data = await response.json();
        cartItems = data.items || [];
        
        renderCartItems();
        calculateTotal();
    } catch (error) {
        console.error('Error fetching cart:', error);
        cartLoading.style.display = 'none';
        cartList.innerHTML = '<div class="error-message">Failed to load cart items. Please try again.</div>';
    }
}

/**
 * Renders cart items to the DOM
 */
const renderCartItems = () => {
    cartLoading.style.display = 'none';
    
    if (cartItems.length === 0) {
        cartEmpty.style.display = 'block';
        return;
    }
    
    cartEmpty.style.display = 'none';
    cartList.innerHTML = '';
    
    cartItems.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.className = 'cart-item';
        itemElement.innerHTML = `
            <img src="${item.image}" alt="${item.name}" class="cart-img">
            <div class="cart-info">
                <div class="cart-category">${item.category}</div>
                <div class="cart-name">${item.name}</div>
                <div class="cart-note">${item.note || 'Add a note to seller'}</div>
            </div>
            <div class="cart-qty">
                <button class="qty-btn minus" data-id="${item.id}">-</button>
                <span class="qty-value">${item.qty}</span>
                <button class="qty-btn plus" data-id="${item.id}">+</button>
            </div>
            <div class="cart-price">Rp${item.price.toLocaleString('id-ID')}</div>
            <button class="remove-item-btn" data-id="${item.id}">×</button>
        `;
        cartList.appendChild(itemElement);
    });
    
    // Add event listeners for quantity buttons
    document.querySelectorAll('.qty-btn.minus').forEach(btn => {
        btn.addEventListener('click', decreaseQuantity);
    });
    
    document.querySelectorAll('.qty-btn.plus').forEach(btn => {
        btn.addEventListener('click', increaseQuantity);
    });
    
    document.querySelectorAll('.remove-item-btn').forEach(btn => {
        btn.addEventListener('click', removeItem);
    });
}

/**
 * Fetches user address from API
 * Expected API response format:
 * {
 *   name: string,
 *   phone: string,
 *   address: string,
 *   note?: string
 * }
 */
async function fetchUserAddress() {
    try {
        const response = await fetch('/api/address');
        if (!response.ok) throw new Error('Failed to fetch address');
        
        currentAddress = await response.json();
        renderAddress();
    } catch (error) {
        console.error('Error fetching address:', error);
        addressLoading.textContent = 'Failed to load address. Please try again.';
    }
}

/**
 * Renders address information to the DOM
 */
function renderAddress() {
    addressLoading.style.display = 'none';
    addressInfo.style.display = 'block';
    
    document.getElementById('address-name').textContent = currentAddress.name;
    document.getElementById('address-phone').textContent = currentAddress.phone;
    document.getElementById('address-detail').textContent = currentAddress.address;
    document.getElementById('address-note').textContent = currentAddress.note || 'No additional notes';
}

/**
 * Applies promo code
 * Expected API request format:
 * {
 *   promoCode: string
 * }
 * Expected API response format:
 * {
 *   valid: boolean,
 *   discount: number,
 *   message: string
 * }
 */
async function applyPromo() {
    const promoCode = promoInput.value.trim();
    if (!promoCode) {
        showPromoMessage('Please enter a promo code', 'error');
        return;
    }
    
    try {
        const response = await fetch('/api/promo/validate', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ promoCode })
        });
        
        const data = await response.json();
        
        if (data.valid) {
            activePromo = {
                code: promoCode,
                discount: data.discount
            };
            showPromoMessage(data.message || 'Promo applied successfully!', 'success');
            calculateTotal();
        } else {
            activePromo = null;
            showPromoMessage(data.message || 'Invalid promo code', 'error');
            calculateTotal();
        }
    } catch (error) {
        console.error('Error applying promo:', error);
        showPromoMessage('Failed to apply promo. Please try again.', 'error');
    }
}

/**
 * Shows promo message with appropriate styling
 */
function showPromoMessage(message, type) {
    promoMessage.textContent = message;
    promoMessage.className = 'promo-message ' + type;
    promoMessage.style.display = 'block';
    
    // Hide message after 5 seconds
    setTimeout(() => {
        promoMessage.style.display = 'none';
    }, 5000);
}

/**
 * Calculates and updates the total price
 */
function calculateTotal() {
    // Calculate subtotal (sum of all items' price * quantity)
    const subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.qty), 0);
    
    // Calculate discount (if promo is active)
    const discount = activePromo ? Math.min(activePromo.discount, subtotal) : 0;
    
    // Calculate total (subtotal - discount + admin fee)
    const total = subtotal - discount + ADMIN_FEE;
    
    // Update the DOM
    document.getElementById('summary-subtotal').textContent = `Rp${subtotal.toLocaleString('id-ID')}`;
    document.getElementById('summary-discount').textContent = `-Rp${discount.toLocaleString('id-ID')}`;
    document.getElementById('summary-adminfee').textContent = `Rp${ADMIN_FEE.toLocaleString('id-ID')}`;
    document.getElementById('summary-total').textContent = `Rp${total.toLocaleString('id-ID')}`;
    
    // Enable/disable checkout button based on cart
    checkoutBtn.disabled = cartItems.length === 0;
}

/**
 * Decreases quantity of an item
 */
async function decreaseQuantity(event) {
    const itemId = event.target.dataset.id;
    const item = cartItems.find(item => item.id === itemId);
    
    if (item && item.qty > 1) {
        try {
            // Call API to update quantity
            const response = await fetch(`/api/cart/${itemId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ qty: item.qty - 1 })
            });
            
            if (response.ok) {
                item.qty -= 1;
                renderCartItems();
                calculateTotal();
            }
        } catch (error) {
            console.error('Error decreasing quantity:', error);
        }
    }
}

/**
 * Increases quantity of an item
 */
async function increaseQuantity(event) {
    const itemId = event.target.dataset.id;
    const item = cartItems.find(item => item.id === itemId);
    
    if (item) {
        try {
            // Call API to update quantity
            const response = await fetch(`/api/cart/${itemId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ qty: item.qty + 1 })
            });
            
            if (response.ok) {
                item.qty += 1;
                renderCartItems();
                calculateTotal();
            }
        } catch (error) {
            console.error('Error increasing quantity:', error);
        }
    }
}

/**
 * Removes an item from cart
 */
async function removeItem(event) {
    const itemId = event.target.dataset.id;
    
    try {
        // Call API to remove item
        const response = await fetch(`/api/cart/${itemId}`, {
            method: 'DELETE'
        });
        
        if (response.ok) {
            // Remove item from local state
            cartItems = cartItems.filter(item => item.id !== itemId);
            renderCartItems();
            calculateTotal();
        }
    } catch (error) {
        console.error('Error removing item:', error);
    }
}

/**
 * Proceeds to checkout
 */
async function proceedToCheckout() {
    if (cartItems.length === 0) return;
    
    try {
        // Prepare checkout data
        const checkoutData = {
            items: cartItems,
            address: currentAddress,
            promoCode: activePromo?.code || null,
            subtotal: calculateSubtotal(),
            discount: activePromo?.discount || 0,
            adminFee: ADMIN_FEE,
            total: calculateTotalAmount()
        };
        
        // Call checkout API
        const response = await fetch('/api/checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(checkoutData)
        });
        
        if (response.ok) {
            const data = await response.json();
            // Redirect to payment or order confirmation page
            window.location.href = `/checkout/success?orderId=${data.orderId}`;
        }
    } catch (error) {
        console.error('Error during checkout:', error);
        alert('Failed to proceed with checkout. Please try again.');
    }
}

// Helper functions for calculations
function calculateSubtotal() {
    return cartItems.reduce((sum, item) => sum + (item.price * item.qty), 0);
}

function calculateTotalAmount() {
    const subtotal = calculateSubtotal();
    const discount = activePromo ? Math.min(activePromo.discount, subtotal) : 0;
    return subtotal - discount + ADMIN_FEE;
}

// ========== STEP NAVIGATION ==========
function goToStep(step) {
    if (validateCurrentStep()) {
        initializeStep(step);
        window.history.pushState({}, '', `/order?step=${step}`);
    }
}

function validateCurrentStep() {
    switch (currentStep) {
        case 1: // Cart step
            if (cartItems.length === 0) {
                alert('Please add items to your cart first');
                return false;
            }
            return true;
        case 2: // Customer details
            // Add validation logic
            return true;
        // ... other steps
        default:
            return true;
    }
}

// ========== INITIALIZATION ==========
document.addEventListener('DOMContentLoaded', () => {
    // Parse initial step from URL
    const urlParams = new URLSearchParams(window.location.search);
    const step = parseInt(urlParams.get('step')) || 1;
    
    initializeStep(step);
    
    // Event listeners for navigation buttons
    document.querySelectorAll('.btn-next').forEach(btn => {
        btn.addEventListener('click', () => goToStep(currentStep + 1));
    });
    
    document.querySelectorAll('.btn-prev').forEach(btn => {
        btn.addEventListener('click', () => goToStep(currentStep - 1));
    });
    
    // Existing cart event listeners
    applyPromoBtn?.addEventListener('click', applyPromo);
    checkoutBtn?.addEventListener('click', proceedToCheckout);
});