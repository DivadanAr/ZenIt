@extends('layout/main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/checkout.css')}}">
@endsection

@section('content')

<div class="main-content">
    <header>
        <div class="left-header">
            <div class="img-header">
                <img src="{{ asset('assets/img/logo.png')}}" alt="">
            </div>
            <div class="title-header">
                <p>Order Overview</p>
            </div>
        </div>
        <div class="right-header">
            <div class="breadcrumb">
                <div class="scs">
                    <p>&#10004;</p>
                </div>
                <div class="ttl-bc">
                    <p>Order Detail</p>
                </div>
                <div class="strip">
                    <div class="garis"></div>
                    <div class="garis"></div>
                    <div class="garis"></div>
                    <div class="garis"></div>
                    <div class="garis"></div>
                </div>
                <div class="scs">
                    <p>&#10004;</p>
                </div>
                <div class="ttl-bc">
                    <p>Payment Detail</p>
                </div>
                <div class="strip">
                    <div class="garis"></div>
                    <div class="garis"></div>
                    <div class="garis"></div>
                    <div class="garis"></div>
                    <div class="garis"></div>
                </div>
                <div class="elipse">
                    <p>x</p>
                </div>
                <div class="ttl-bc">
                    <p>Complete Order</p>
                </div>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="right-content" id="right">
            <div class="title-order">
                <p>Summary Order</p>
            </div>
            <div class="subtitle-order">
                <p>Please Re-check your order before go to next step</p>
            </div>
            <div class="card-order">
                @foreach($products as $product)
                <div class="card-group">
                    <div class="profile">
                        <div class="img">
                            <img src="{{ $product->product->users->shop->gallery->first()->getUrl() }}" alt="">
                        </div>
                        <div class="toko">
                            <p>{{ $product->product->users->shop->name }}</p>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="row1-product">
                            <div class="img-order">
                                <img src="{{ $product->product->gallery->first()->getUrl() }}" alt="">
                            </div>
                            <div class="desc-order">
                                <div class="ctgr-order">
                                    <p>{{ $product->product->category->name }}</p>
                                </div>
                                <div class="name-product-order">
                                    <p>{{ $product->product->name }}</p>
                                </div>
                                <div class="price-order">
                                    <p>Rp. {{ $product->product->price }}</p>
                                </div>

                            </div>
                        </div>
                        <div class="row2-product">
                            <div class="type">
                                <p>{{ $product->product->category->name }}</p>
                            </div>
                        </div>
                        <div class="row3-product">
                            <div class="col1">
                                <p>Unit Price</p>
                                <p>Rp. {{ $product->product->price }}</p>
                            </div>
                            <div class="col2">
                                <p>Qty</p>
                                <p>{{ $product->quantity }}</p>
                            </div>
                            <div class="col2">
                                <p>Total</p>
                                <p>Rp. {{ $product->product->price * $product->quantity }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="total-order">
                    <div class="title-total">
                        <p>Total</p>
                    </div>
                    <div class="total-price-order">
                        <p><span>Total pesanan ( {{  $qty }} ) :</span> Rp. {{ $total }}</p>
                        <hr>
                        <p><span>Total pesanan ( {{  $qty }} ) :</span> Rp. </p>
                    </div>
                </div>
            </div>
            <div class="shipping-method">
                <div class="title-shipping">
                    <form action="{{ route('transaction-store') }}" method="POST">
                        @csrf
                    <p>Available shipping method</p>
                </div>
                <div class="method">
                        <div class="card-shipping">
                            <div class="left-shiping">
                                <div class="shipping-logo">
                                    <img src="{{ asset('assets/img/fedexlogo.png') }}" alt="">
                                </div>
                                <div class="shipping-delivery">
                                    <p>Fedex Delivery</p>
                                    <p>Delivery 2-3 days work</p>
                                </div>
                            </div>
                            <div class="right-shipping">
                                <input type="radio" name="shipping_method" value="FedEx">
                            </div>
                        </div>
                        <div class="card-shipping">
                            <div class="left-shiping">
                                <div class="shipping-logo">
                                    <img src="{{ asset('assets/img/JNELOGO.png') }}" alt="">
                                </div>
                                <div class="shipping-delivery">
                                    <p>JNE</p>
                                    <p>Delivery 2-3 days work</p>
                                </div>
                            </div>
                            <div class="right-shipping">
                                <input type="radio" name="shipping_method" value="JNE">
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="left-content" id="left">
            <div class="title-order">
                <p>Order Details</p>
            </div>
            <div class="subtitle-order">
                <p>Fill and re-check your biodata to complete this step</p>
            </div>
            <div class="order-info">

                    <div class="email">
                        <label for="email">Email Address</label>
                        <input type="email" name="shipping_email" id="email" placeholder="Email" value="{{ Auth()->user()->email }}">
                    </div>

                    <div class="receiver">
                        <label for="receiver">receiver Name</label>
                        <input type="text" name="shipping_name" id="receiver" placeholder="Name" value="{{ auth()->user()->profile->firstname .' '. auth()->user()->profile->lastname }}">
                    </div>

                    <div class="receiver">
                        <label for="receiver">receiver Phone</label>
                        <input type="text" name="shipping_phone" id="receiver" placeholder="PhoneNumber" value="{{ auth()->user()->profile->phoneNumber }}">
                    </div>

                    <div class="address">
                        <label for="address">Address</label>
                        <textarea name="adress" id="" cols="50" rows="5" placeholder="Type your address here">{{ auth()->user()->profile->Address }}</textarea>
                    </div>

                    <div class="payment">
                        <div class="title-payment">
                            <p>Payment Method</p>
                        </div>

                        @foreach ($pay as $p )
                            @if($p->active)
                        <div class="card-payment">
                            <div class="left-payment">
                                <div class="payment-logo">
                                    <img src="{{ asset('storage/bank/' . $p->code . '.png') }}" alt="">
                                </div>
                                <div class="payment-method">
                                    <p>{{ $p->name }}</p>
                                </div>
                            </div>
                                <div class="right-payment">
                                    <input type="radio" name="method" value="{{ $p->code }}">
                                </div>
                        </div>
                            @endif
                        @endforeach

                    <div class="btn-order">

                        <input type="hidden" name="total" value="{{ $total }}">

                        <div class="card-footer text-right                       ">
                            <button class="btn btn-primary mr-1" type="submit">Continue</button>
                        </div>

                            <button type="button" class="btn-cancel">Cancel</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
{{-- <script>
      window.onscroll = function() {myFunction()};

var left = document.getElementById("left");
var sticky = left.offsetTop + 400;

console.log(left.offsetTop + 1154)

function myFunction() {
  if (window.pageYOffset > sticky) {
    left.classList.add("sticky");
  } else {
    left.classList.remove("sticky");
  }
}
</script> --}}
@endsection
