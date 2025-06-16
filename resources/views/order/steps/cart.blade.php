{{-- resources/views/order/steps/cart.blade.php --}}
<div class="order-layout">
    <!-- Cart Section -->
    <section class="card-list">
        <div class="cart-title">Your Cart</div>
        <div class="cart-desc">Check your item before you checkout.</div>
        
        <div id="cart-empty" class="empty-state" style="display: none;">
            Your cart is empty. Please add some products.
        </div>
        
        <div id="cart-container" class="cart-container">
            <p>No items in cart.</p>
        </div>

        
        <div class="promo-section">
            <label class="promo-label" for="promo-input">Have a Promo Code?</label>
            <div class="promo-input-container">
                <input type="text" id="promo-input" class="promo-input" placeholder="Type Here">
                <button id="apply-promo-btn" class="apply-promo-btn">Apply</button>
            </div>
            <div id="promo-message" class="promo-message"></div>
        </div>
    </section>

    <!-- Sidebar Section -->
    <aside>
        <div class="address-section">
            <div class="address-title">Address Information</div>
            <div class="address-loading" id="address-loading">Loading address...</div>
            <div class="address-info" id="address-info" >
                <div class="address-name" id="address-name">{{Auth::user()->name}}</div>
                <div class="address-phone" id="address-phone">{{Auth::user()->phone}}</div>
                <div class="address-detail" id="address-detail">{{Auth::user()->address}}</div>
                <div class="address-note" id="address-note"></div>
            </div>
            <button class="change-address-btn" onclick="window.location.href='/profile'">Change Address</button>
        </div>
        
        <div class="summary-section">
            <div class="summary-title">Payment Summary</div>
            <div class="summary-row">
                <span>Subtotal</span>
                <div class="summary-line subtotal"><span></span></div>
            </div>
            <div class="summary-row discount">
                <span>Discount Promo</span>
                <span id="summary-discount">-Rp0</span>
            </div>
            <div class="summary-row">
                <span>Admin Fee</span>
                <div id="summary-adminfee" class="summary-adminfee"><span>Rp3,000</span></div>
                
            </div>
            <div class="summary-total">
                <span>Total</span>
                <span id="summary-total">Rp0</span>
            </div>
            <div class="step-cta" id="step-action-button">
            <div class="step-actions">
                <button type="submit" class="btn-next" onclick="window.location.href='{{ route('order', ['step' => $step + 1]) }}'">
                    Checkout
                </button>
            </div>
            </div>
        </div>
    </aside>
</div>