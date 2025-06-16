{{-- resources/views/order/steps/status.blade.php --}}
<div class="order-layout">
    <div class="order-main">
        <div class="status-step">
            <h2>Order Status</h2>
            <p class="step-description">Check your worker here in real time.</p>
            
            <div class="tracker-container">
                <div class="tracker-progress">
                    <div class="tracker-step active">
                        <div class="tracker-bullet"></div>
                        <div class="tracker-info">
                            <h3>Order Picked Up</h3>
                            <p class="tracker-time">12.00 PM</p>
                        </div>
                    </div>
                    
                    <div class="tracker-step active">
                        <div class="tracker-bullet"></div>
                        <div class="tracker-info">
                            <h3>Worker on the Way</h3>
                            <p class="tracker-time">12.10 PM</p>
                        </div>
                    </div>
                    
                    <div class="tracker-step">
                        <div class="tracker-bullet"></div>
                        <div class="tracker-info">
                            <h3>Work in Progress</h3>
                            <p class="tracker-time">12.30 PM</p>
                        </div>
                    </div>
                    
                    <div class="tracker-step">
                        <div class="tracker-bullet"></div>
                        <div class="tracker-info">
                            <h3>Finished</h3>
                            <p class="tracker-time">13.30 PM</p>
                        </div>
                    </div>
                </div>
                
                <div class="tracker-map">
                    <div class="map-placeholder">
                        <div class="map-marker">
                            <div class="marker-pin"></div>
                            <div class="marker-pulse"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="workers-section" id="workersSection">
                <h3>Workers Detail</h3>
                <div class="workers-list">
                    <!-- Worker details will be populated by API -->
                </div>
            </div>
        </div>
    </div>
</div>