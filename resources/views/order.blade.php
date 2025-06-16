@extends('layouts.app')

@section('title', 'Order')

@vite(['resources/css/order.css', 'resources/css/app.css'])
<link rel="stylesheet" href="{{ asset('css/nav-footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/order.css') }}">


@section('content')
<div class="order-container">
    {{-- Progress Steps --}}
    <div class="progress-steps">
        @foreach([
            1 => 'Product Cart',
            2 => 'Customer Details',
            3 => 'Payment',
            4 => 'Order Status'
        ] as $stepNum => $title)
        <div class="step @if($step >= $stepNum) active @endif" data-step="{{ $stepNum }}">
            <div class="step-number">{{ $stepNum }}</div>
            <div class="step-title">{{ $title }}</div>
        </div>
        @endforeach
    </div>



    {{-- Main Content Area --}}
    <div class="order-main @if($step >= 2) with-sidebar @endif">
        {{-- Step Content --}}
        <div class="step-content">
            @include('order.steps.' . [
                1 => 'cart',
                2 => 'custdetail',
                3 => 'payment',
                4 => 'status'
            ][$step ?? 1])
        </div>

        {{-- Sidebar (Only for steps 2-4) --}}
        @if($step >= 2)
        <aside class="order-summary">
            <div class="summary-section">
                <div class="summary-title">Order Summary</div>
                
                <div id="cart-summary-list" class="mini-cart-items"></div>
                
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span id="summary-subtotal">Rp0</span>
                </div>
                <div class="summary-row discount">
                    <span>Discount</span>
                    <span id="summary-discount">-Rp0</span>
                </div>
                <div class="summary-row">
                    <span>Admin Fee</span>
                    <span id="summary-adminfee">Rp3,000</span>
                </div>
                <div class="summary-total">
                    <span>Total</span>
                    <span id="summary-total">Rp0</span>
                </div>

                <div class="step-cta" id="step-action-button">
                    @if($step == 2)
                        <div class="step-actions">
                            <button type="submit" class="btn-next" onclick="window.location.href='{{ route('order', ['step' => $step + 1]) }}'">
                                Continue to Payment
                            </button>
                        </div>
                    @elseif($step == 3)
                        <div class="step-actions">
                            <button type="submit" class="btn-next" onclick="window.location.href='{{ route('order', ['step' => $step + 1]) }}'">
                                Check Order Status
                            </button>
                        </div>
                    @elseif($step == 4)
                        <button type="submit" class="btn-next">Complete Order</button>
                    @else
                        <a href="{{ route('home') }}" class="btn-next">Back to Home</a>
                    @endif
                </div>
            </div>
        </aside>
        @endif
    </div>

    {{-- Navigation Buttons --}}
    <div class="step-actions">
        @if($step > 1)
            <button class="btn-prev" onclick="window.location.href='{{ route('order', ['step' => $step - 1]) }}'">
                Previous
            </button>
        @endif
    </div>
</div>
@endsection

@section('scripts')
    {{-- Always load shared JS first --}}
    <script src="{{ asset('js/order/shared.js') }}"></script>
    <script src="{{ asset('js/order.js') }}"></script>
    <script src="{{ asset('js/product.js') }}"></script>
    
    {{-- Load step-specific JS --}}
    @if($step == 1)
        <script src="{{ asset('js/order/cart.js') }}"></script>
    @elseif($step == 2)
        <script src="{{ asset('js/order/customer.js') }}"></script>
    @elseif($step == 3)
        <script src="{{ asset('js/order/payment.js') }}"></script>
    @elseif($step == 4)
        <script src="{{ asset('js/order/status.js') }}"></script>
    @endif
@endsection

