<!-- resources/views/order/steps/custdetail.blade.php -->
<div class="order-layout">
    <div class="order-main">
        <div class="customer-details-step">
            <h2>Customer Details</h2>
            <p class="step-description">Check your personal information before you checkout.</p>
            
            <form id="customerDetailsForm" class="customer-form">
                <div class="form-section">
                    <h3>Personal Info</h3>
                    
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" required>
                    </div>
                </div>
                
                <div class="form-section">
                    <h3>Address Info</h3>
                    <p class="click-map">Click the map to select your location</p>
                    
                    <div class="map-container" id="mapContainer">
                        <!-- This will be replaced with a Google Maps iframe in production -->
                        <div class="map-placeholder">Map will appear here</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="addressArea">Area</label>
                        <input type="text" id="addressArea" name="addressArea" value="{{Auth::user()->province}}" readonly>
                    </div>
                    
                    <div class="form-group">

                        <div class="form-group">
                            <label for="addressBlock">City</label>
                            <input type="text" id="addressBlock" name="addressBlock" value="{{Auth::user()->city}}" readonly>
                        </div>
                            {{-- <label for="addressBlock">City</label>
                            <select id="addressBlock" name="addressBlock" required>
                                <option value="">Select Block</option>
                                <!-- Options will be populated by JavaScript -->
                            </select> --}}
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="additionalNotes">Street Address</label>
                        <textarea id="additionalNotes" name="additionalNotes" rows="3">{{Auth::user()->address}}</textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

