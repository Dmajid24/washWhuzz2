document.addEventListener('DOMContentLoaded', function() {
    const paymentOptions = document.querySelectorAll('.payment-option');
    const paymentDetails = document.getElementById('paymentDetails');
    const timerContainer = document.getElementById('timerContainer');
    const paymentTimer = document.getElementById('paymentTimer');
    const confirmPaymentBtn = document.getElementById('confirmPaymentBtn');
    
    let countdownInterval;
    let timeLeft = 300; // 5 minutes in seconds
    
    // Payment method selection
    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            const method = this.getAttribute('data-method');
            showPaymentDetails(method);
            startTimer();
        });
    });
    
    function showPaymentDetails(method) {
        // Clear any existing content
        paymentDetails.innerHTML = '';
        
        if (method === 'qris') {
            paymentDetails.innerHTML = `
                <div class="qr-container">
                    <h3>QRIS Payment</h3>
                    <p>Scan this QR code using your mobile banking app</p>
                    <div class="qr-code">
                        <!-- This would be replaced with a real QR code in production -->
                        <svg viewBox="0 0 100 100" style="width:100%;height:100%">
                            <rect width="100" height="100" fill="#fff"/>
                            <path d="M20,20h10v10H20zM30,20h10v10H30zM40,20h10v10H40zM20,30h10v10H20zM40,30h10v10H40zM20,40h10v10H20zM30,40h10v10H30zM40,40h10v10H40zM60,20h10v10H60zM70,20h10v10H70zM60,30h10v10H60zM60,40h10v10H60zM70,40h10v10H70zM20,60h10v10H20zM30,60h10v10H30zM40,60h10v10H40zM20,70h10v10H20zM40,70h10v10H40zM20,80h10v10H20zM30,80h10v10H30zM40,80h10v10H40zM60,60h10v10H60zM70,60h10v10H70zM80,60h10v10H80zM60,70h10v10H60zM80,70h10v10H80zM60,80h10v10H60zM70,80h10v10H70zM80,80h10v10H80z" fill="#000"/>
                        </svg>
                    </div>
                    <p class="timer-text">This QR code expires in <span class="timer">05:00</span></p>
                </div>
            `;
        } else if (method === 'va') {
            paymentDetails.innerHTML = `
                <div class="va-container">
                    <h3>Virtual Account Payment</h3>
                    <p>Transfer to the following virtual account number:</p>
                    <div class="va-number">8888 1234 5678 9012</div>
                    <div class="va-instructions">
                        <p><strong>Instructions:</strong></p>
                        <ol>
                            <li>Open your mobile banking app</li>
                            <li>Select "Transfer to Virtual Account"</li>
                            <li>Enter the virtual account number above</li>
                            <li>Enter the exact payment amount</li>
                            <li>Complete the transaction</li>
                        </ol>
                        <p class="timer-text">This VA expires in <span class="timer">05:00</span></p>
                    </div>
                </div>
            `;
        }
        
        paymentDetails.style.display = 'block';
        timerContainer.style.display = 'block';
        confirmPaymentBtn.disabled = false;
    }
    
    function startTimer() {
        // Clear any existing timer
        clearInterval(countdownInterval);
        
        // Reset time
        timeLeft = 300;
        updateTimerDisplay();
        
        // Start new timer
        countdownInterval = setInterval(() => {
            timeLeft--;
            updateTimerDisplay();
            
            if (timeLeft <= 0) {
                clearInterval(countdownInterval);
                paymentTimer.textContent = "00:00";
                paymentTimer.classList.add('warning');
                confirmPaymentBtn.disabled = true;
            } else if (timeLeft <= 60) {
                // Last minute warning
                paymentTimer.classList.add('warning');
            }
        }, 1000);
    }
    
    function updateTimerDisplay() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        paymentTimer.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        
        // Update timer in payment details if exists
        const detailTimer = paymentDetails.querySelector('.timer');
        if (detailTimer) {
            detailTimer.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            
            if (timeLeft <= 60) {
                detailTimer.classList.add('warning');
            } else {
                detailTimer.classList.remove('warning');
            }
        }
    }
    
    // Confirm payment button
    confirmPaymentBtn.addEventListener('click', function() {
        // In a real app, this would verify payment with your backend
        alert('Payment confirmed! Redirecting to order status...');
        window.location.href = '/order/step-4';
    });
});