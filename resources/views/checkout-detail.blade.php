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
        <div class="scs"><p>&#10004;</p></div>
        <div class="ttl-bc"><p>Order Detail</p></div>
        <div class="strip">
          <div class="garis"></div>
          <div class="garis"></div>
          <div class="garis"></div>
          <div class="garis"></div>
          <div class="garis"></div>
        </div>
        <div class="elipse"><p>x</p></div>
        <div class="ttl-bc"><p>Payment Detail</p></div>
        <div class="strip">
          <div class="garis"></div>
          <div class="garis"></div>
          <div class="garis"></div>
          <div class="garis"></div>
          <div class="garis"></div>
        </div>
        <div class="elipse"><p>x</p></div>
        <div class="ttl-bc"><p>Complete Order</p></div>
      </div>
    </div>
  </header>
  <div class="content">
    <div class="right-content">
      <div class="title-order">
        <p>Summary Order</p>
      </div>
      <div class="subtitle-order">
        <p>Please Re-check your order before go to next step</p>
      </div>
      <div class="card-order">
        @foreach($carts as $cart)
        <div class="card-group">
          <div class="profile">
            <div class="img">
              <img src="{{ $cart->product->users->shop->gallery->first()->getUrl() }}" alt="">
            </div>
            <div class="toko">
              <p>{{ $cart->product->users->shop->name }}</p>
            </div>
          </div>
          <div class="card-product">
            <div class="row1-product">
              <div class="img-order">
                <img src="{{ $cart->product->gallery->first()->getUrl() }}" alt="">
              </div>
              <div class="desc-order">
                <div class="ctgr-order">
                  <p>{{ $cart->product->category->name }}</p>
                </div>
                <div class="name-product-order">
                  <p>{{ $cart->product->name }}</p>
                </div>
                <div class="price-order">
                  <p>Rp. {{ $cart->product->price }}</p>
                </div>
                
              </div>
            </div>
            <div class="row3-product">
              <div class="col1">
                <p>Unit Price</p>
                <p>Rp. {{ $cart->product->price }}</p>
              </div>
              <div class="col2">
                <p>Qty</p>
                <p>2</p>
              </div>
              <div class="col2">
                <p>SubTotal</p>
                <p>Rp. {{ $cart->product->price * $cart->quantity }}</p>
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
            <p><span>Total Order ({{  $qty }} product) :</span> Rp. {{ $total }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="left-content" id="fix">
      <div class="title-order">
        <p>Order Details</p>
      </div>
      <div class="subtitle-order">
        <p>Fill and re-check your biodata to complete this step</p>
      </div>
      <div class="order-information">
      <div class="row-info">
          <p>Firstname</p>
          <p>{{ auth()->user()->profile->firstname }}</p>
        </div>
        <div class="row-info">
          <p>Lastname</p>
          <p>{{ auth()->user()->profile->lastname }}</p>
        </div>
        <div class="row-info">
          <p>Name</p>
          <p>{{ auth()->user()->name }}</p>
        </div>
        <div class="row-info">
          <p>Phone Number</p>
          <p>{{ auth()->user()->profile->phoneNumber }}</p>
        </div>
        <div class="row-info">
          <p>Email</p>
          <p>{{ auth()->user()->email }}</p>
        </div>
        <div class="btn-order">
          <a href="{{ route('checkout-payment') }}" class="button-one">Continue</a>
          <a href="{{ url('cart') }}" class="button-2">Cancel</a>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  window.onscroll = function() {myFunction()};

var header = document.getElementById("fix");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
@endsection