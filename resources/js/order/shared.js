// ========== CONSTANTS ==========
export const ADMIN_FEE = 3000;

// ========== STATE MANAGEMENT ==========
export let cartItems = [];
export let currentAddress = null;
export let activePromo = null;

// ========== DOM ELEMENTS ==========
export const getSharedElements = () => ({
    cartSummary: document.getElementById('cart-summary-list'),
    subtotalEl: document.getElementById('summary-subtotal'),
    discountEl: document.getElementById('summary-discount'),
    adminFeeEl: document.getElementById('summary-adminfee'),
    totalEl: document.getElementById('summary-total')
});

// ========== API FUNCTIONS ==========
export const fetchCartItems = async () => {
    try {
        const response = await fetch('/api/cart');
        if (!response.ok) throw new Error('Failed to fetch cart');
        cartItems = (await response.json()).items || [];
        return cartItems;
    } catch (error) {
        console.error('Cart fetch error:', error);
        throw error;
    }
};

export const fetchUserAddress = async () => {
    try {
        const response = await fetch('/api/address');
        if (!response.ok) throw new Error('Failed to fetch address');
        currentAddress = await response.json();
        return currentAddress;
    } catch (error) {
        console.error('Address fetch error:', error);
        throw error;
    }
};

// ========== RENDER FUNCTIONS ==========
// Render minimized cart for Steps 2-4
export const renderMiniCart = () => {
    const cartSummary = document.getElementById('cart-summary-list');
    if (!cartSummary) return; // Only exists in Steps 2-4
    
    cartSummary.innerHTML = cartItems.map(item => `
        <div class="mini-cart-item">
            <span>${item.name} × ${item.qty}</span>
            <span>Rp${(item.price * item.qty).toLocaleString('id-ID')}</span>
        </div>
    `).join('');
};

export const calculateAndRenderTotals = () => {
    const { subtotalEl, discountEl, adminFeeEl, totalEl } = getSharedElements();
    if (!subtotalEl || !discountEl || !adminFeeEl || !totalEl) return;

    const subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.qty), 0);
    const discount = activePromo ? Math.min(activePromo.discount, subtotal) : 0;
    const total = subtotal - discount + ADMIN_FEE;

    subtotalEl.textContent = `Rp${subtotal.toLocaleString('id-ID')}`;
    discountEl.textContent = `-Rp${discount.toLocaleString('id-ID')}`;
    adminFeeEl.textContent = `Rp${ADMIN_FEE.toLocaleString('id-ID')}`;
    totalEl.textContent = `Rp${total.toLocaleString('id-ID')}`;
};

// ========== INITIALIZATION ==========
// Initialize based on step
export const initializePersistentCart = async (currentStep) => {
    try {
        await fetchCartItems();
        if (currentStep >= 2) {
            renderMiniCart();
            calculateAndRenderTotals();
        }
    } catch (error) {
        console.error('Persistent cart init error:', error);
    }
};

