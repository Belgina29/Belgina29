@extends("layouts.template")

@section("titre")
page contact
@endsection

@section("contenu")
<div class="checkout-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                    <h3>Billing Details</h3>
                    @if(Auth::check())
                        <h3>Bienvenue {{ Auth::user()->name }},</h3> 
                        Cliquer sur le bouton<b>Place order</b> passer commande pour valider votre commande.
                        @else
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="billing-info mb-20">
                                <label>Name</label>
                                <input type="text">
                            </div>
                        </div>   
                    </div>
            
                    <div class="checkout-account-toggle open-toggle2 mb-30">
                        <input placeholder="Email address" type="email" name="email" required>
                        <input placeholder="Password" type="password" name="password" required>
                        <input id="passwoord-confirm" type="password" class="form-control" name="password confirmation">
                        <button class="btn-hover checkout-btn" type="submit">register</button>
                    </div>
                    </form>
                    
                    <div class="additional-info-wrap">
                        <h4>Additional information</h4>
                        <div class="additional-info">
                            <label>Order notes</label>
                            <textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="message"></textarea>
                        </div>
                    </div>
                    <div class="checkout-account mt-25">
                        <input class="checkout-toggle" type="checkbox">
                        <span>Ship to a different address?</span>
                    </div>
                    <div class="different-address open-toggle mt-30">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>First Name</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Last Name</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Company Name</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-select mb-20">
                                    <label>Country</label>
                                    <select>
                                        <option>Select a country</option>
                                        <option>Azerbaijan</option>
                                        <option>Bahamas</option>
                                        <option>Bahrain</option>
                                        <option>Bangladesh</option>
                                        <option>Barbados</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Street Address</label>
                                    <input class="billing-address" placeholder="House number and street name" type="text">
                                    <input placeholder="Apartment, suite, unit etc." type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Town / City</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>State / County</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Postcode / ZIP</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Phone</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Email Address</label>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-5">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="your-order-top">
                                <ul>
                                    <li>Product</li>
                                    <li>Total</li>
                                </ul>
                            </div>
                            <div class="your-order-middle">
                                <ul>
                                @php
                                $total=0;
                                @endphp
                                @if (!empty($products))
                                @forelse($products as $key=> $product)
                                @php
                                $total+=$product['price']*$product['qty'];
                                @endphp
                                    <li><span class="order-middle-left">{{ $product['name']}}  X  {{$product['qty']}}</span> <span class="order-price">{{ $product['price'] * $product['qty'] }} </span></li>
                                    @empty
                                    <h3>Panier vide </h3>
                                    @endforelse
                                    @endif 
                                </ul>
                            </div>
                            <div class="your-order-bottom">
                                <ul>
                                    <li class="your-order-shipping">Shipping</li>
                                    <li>Free shipping</li>
                                </ul>
                            </div>
                            <div class="your-order-total">
                                <ul>
                                    <li class="order-total">Total</li>
                                    <li>{{$total}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion element-mrg">
                                <div class="panel-group" id="accordion">
                                    <div class="panel payment-accordion">
                                        <div class="panel-heading" id="method-one">
                                            <h4 class="panel-title">
                                                <a data-bs-toggle="collapse" href="#method1">
                                                    Direct bank transfer
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="method1" class="panel-collapse collapse show" data-bs-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel payment-accordion">
                                        <div class="panel-heading" id="method-two">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#method2">
                                                    Check payments
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="method2" class="panel-collapse collapse" data-bs-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel payment-accordion">
                                        <div class="panel-heading" id="method-three">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#method3">
                                                    Cash on delivery
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="method3" class="panel-collapse collapse" data-bs-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Place-order mt-25">
                        <a class="btn-hover" href="#">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection