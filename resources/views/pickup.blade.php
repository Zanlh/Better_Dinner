@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">{{ auth()->user()->name }}'s Orders</span>
                    <span class="badge badge-secondary badge-pill"> Total {{ Cart::getTotalQuantity() }} Cart</span>
                </h4>
                <ul class="list-group mb-3">
                   
                        @foreach ($cartItems as $item)
                        
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $item['name'] }}</h6>
                                    <small class="text-muted">Quantity: {{ $item['quantity'] }} </small><br>
                                </div>
                                <span class="text-muted">${{ $item['price'] }}</span>
                            </li>
                        @endforeach
                          
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (AUD)</span>
                        <strong> Total: ${{ Cart::getTotal() }}</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                    <div class="bg-white rounded-lg shadow-sm" style="padding-bottom: 50px">
                        <!-- Credit card form tabs -->
                        <h4>Payment</h4>
                        <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                            <li class="nav-item">
                                <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                    <i class="fa fa-credit-card"></i>
                                    Credit Card
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                                    <i class="fa fa-paypal"></i>
                                    Paypal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="pill" href="#nav-tab-bank" class="nav-link rounded-pill">
                                    <i class="fa fa-university"></i>
                                    Bank Transfer
                                </a>
                            </li>
                        </ul>
                        <!-- End -->


                        <!-- Credit card form content -->
                        <div class="tab-content">

                            <!-- credit card info-->
                            <div id="nav-tab-card" class="tab-pane fade show active">
                                <p class="alert alert-success">Some text success or error</p>
                                <form role="form" action="{{route('pickupconfirm')}}" method="POST" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Full name </label>
                                        <input type="text" name="username" placeholder="JOHN CITIZEN" required=""
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="cardNumber">Card number</label>
                                        <div class="input-group">
                                            <input type="text" name="cardNumber" placeholder="Your card number"
                                                class="form-control" required="">
                                            <div class="input-group-append">
                                                <span class="input-group-text text-muted">
                                                    <i class="fa fa-cc-visa mx-1"></i>
                                                    <i class="fa fa-cc-amex mx-1"></i>
                                                    <i class="fa fa-cc-mastercard mx-1"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">Expiration</span></label>
                                                <div class="input-group">
                                                    <input type="number" placeholder="MM" name="" class="form-control"
                                                        required="">
                                                    <input type="number" placeholder="YY" name="" class="form-control"
                                                        required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4">
                                                <label title="Three-digits code on the back of your card">CVV
                                                    <i class="fa fa-question-circle"></i>
                                                </label>
                                                <input type="text" required="" class="form-control">
                                            </div>
                                        </div>



                                    </div>
                                    <button type="submit"
                                        class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Confirm
                                    </button>
                                </form>
                            </div>
                            <!-- End -->

                            <!-- Paypal info -->
                            <div id="nav-tab-paypal" class="tab-pane fade">
                                <p>Pay Online Using Paypal</p>
                                <p>
                                    <button type="button" class="btn btn-primary rounded-pill"><i
                                            class="fa fa-paypal mr-2"></i> Log into Paypal</button>
                                </p>
{{--                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do--}}
{{--                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.--}}
{{--                                </p>--}}
                            </div>
                            <!-- End -->

                            <!-- bank transfer info -->
                            <div id="nav-tab-bank" class="tab-pane fade">
                                <h6>Bank account details</h6>
                                <dl>
                                    <dt>Bank</dt>
                                    <dd> THE Australia BANK</dd>
                                </dl>
                                <dl>
                                    <dt>Account number</dt>
                                    <dd>1231231230</dd>
                                </dl>
                                <dl>
                                    <dt>Pay-ID</dt>
                                    <dd>04041515274</dd>
                                </dl>
                                <p class="text-muted">Pay Now using pay id for faster and easier payment
                                </p>
                            </div>
                            <!-- End -->
                        </div>
                        <!-- End -->

                    </div>

            </div>
        </div>
    </div>

    


@endsection
