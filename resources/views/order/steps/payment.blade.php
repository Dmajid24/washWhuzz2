{{-- resources/views/order/steps/payment.blade.php --}}
<div class="order-layout">
    <div class="order-main">
        <div class="payment-step">
            <h2>Payment Method</h2>
            <p class="step-description">Choose your payment preferences.</p>
            
            <div class="payment-options">
                <div class="payment-option" data-method="qris">
                    <input type="radio" name="paymentMethod" id="qris" value="qris">
                    <label for="qris">
                        <div class="payment-icon">
                            <svg class="payment-icon-img" viewBox="0 0 24 24">
                                <path d="m0,11h24v2H0v-2Zm2,10v-4H0v4c0,1.654,1.346,3,3,3h4v-2H3c-.551,0-1-.449-1-1Zm20,0c0,.551-.449,1-1,1h-4v2h4c1.654,0,3-1.346,3-3v-4h-2v4ZM21,0h-4v2h4c.551,0,1,.449,1,1v4h2V3c0-1.654-1.346-3-3-3ZM2,3c0-.551.449-1,1-1h4V0H3C1.346,0,0,1.346,0,3v4h2V3Z"/>
                            </svg>
                        </div>
                        <div class="payment-info">
                            <h3>QRIS</h3>
                            <p>Scan QR code to pay</p>
                        </div>
                    </label>
                </div>
                
                <div class="payment-option" data-method="va">
                    <input type="radio" name="paymentMethod" id="va" value="va">
                    <label for="va">
                        <div class="payment-icon">
                            <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg>
                        </div>
                        <div class="payment-info">
                            <h3>Virtual Account</h3>
                            <p>BCA, Mandiri, BRI, etc.</p>
                        </div>
                    </label>
                </div>
            </div>
            
            <div class="payment-details" id="paymentDetails">
                <!-- Dynamic content will appear here -->
            </div>
        </div>
    </div>

    <script src="{{ mix('js/order/payment.js') }}"></script>
</div>
