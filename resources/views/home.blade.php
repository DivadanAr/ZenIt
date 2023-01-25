@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/home.css')}}">
@endsection

@section('content')
<div class="content">
  <div class="header-content">
    <div class="left-row">
      <div class="bg-tio">
        <img src="{{ asset('assets/img/TIO REVISI TKJ-02.png')}}" alt="Tio" >
      </div>
    </div>
    <div class="middle-row">
      <h1>Our Quality Ask Be</h1>
      <div class="middle-title">
        <h1>Different</h1>
      </div>
      <div class="box-top-left"></div>
      <div class="box-bottom-left"></div>
      <div class="box-top-right"></div>
      <div class="box-bottom-right"></div>
      <div class="btn-explore">
        <a  href="{{ url('product') }}">
          <button>Explore Now!</button>
        </a>
      </div>
    </div>
    <div class="right-row">
      <div class="bg-bian">
        <img src="{{ asset('assets/img/INDIVIDUAL PROP-03.png')}}" alt="Bianca">
      </div>
    </div>
  </div>

  <div class="sorted">
    <h3>We Sorted Our Product By</h3>
    <div class="jurusan">
      <a href="{{ url('/product?BRF=on') }}">
      <div class="bc">
        <img src="{{ asset('assets/img/bc.png')}}" alt="Broadcasting">
      </div>
      </a>
      <a href="{{ url('/product?ANIMASI=on') }}">
        <div class="mm">
          <img src="{{ asset('assets/img/mm.png')}}" alt="Animasi">
        </div>
      </a>
      <a href="{{ url('/product?PPLG=on') }}">
        <div class="rpl">
          <img src="{{ asset('assets/img/rpl.png')}}" alt="PPLG" >
        </div>
      </a>
      <a href="{{ url('/product?TJKT=on') }}">
        <div class="tjkt">
          <img src="{{ asset('assets/img/tjkt.png')}}" alt="TJKT">
        </div>
      </a>
      <a href="{{ url('/product?TE=on') }}">
        <div class="te">
          <img src="{{ asset('assets/img/te.png')}}" alt="TE">
        </div>
      </a>
    </div>
  </div>
  <div class="featured-product" data-aos="zoom-in-up">
    @if($products->last())
    <h1>Featured Product</h1>
    <h2>This Week</h2>
    <div class="product">
      <div class="img-product">
        <img src="{{ $products->last()->gallery->first()->getUrl() }}" alt="">
      </div>
      <div class="desc-product">
        <div class="name-product">
          <h3>{{ $products->last()->name }}</h3>
        </div>
        <div class="price-featured">
          <p>Rp {{ number_format($products->last()->price,0,',','.') }}</p>
        </div>
        <div class="description">
          <p>{{ $products->last()->desc }}</p>
        </div>
        <div class="btn-featured">
          {{-- <a href="checkout-delivery.html">
          <button class="btn-buy"><i class="fa-solid fa-bag-shopping"></i>Buy Now</button></a> --}}
          <a href="{{ url('cart', $products->last()->id) }}" class="btn-cart"><i class="fa-solid fa-cart-shopping"></i>Add to cart</a>
        </div>
      </div>
    </div>
    @endif
  </div>
  <div class="our-product" data-aos="zoom-in-up">
    <h1>Our Product</h1>
      <div id="wrapper">
        <div id="carousel">
          <div id="content">
            <div class="product-carousel">
              <div class="row-product">
              @foreach($products as $product)
                <div class="card-product">
                  <div class="img-card">
                    <img src="{{ $product->gallery->first()->getUrl() }}" alt="">
                  </div>
                  <div class="desc-product">
                    <div class="category-product">
                      <p>{{ $product->major }}</p>
                    </div>
                    <div class="name-product">
                      <a style="width: 150px; display:inline-block;" href="{{ route('product.show', $product->slug) }}">
                        <p>{{ $product->name }}</p>
                        </a>
                    </div>
                    <div class="row-price">
                      <div class="price">
                        <p>Rp {{ number_format($product->price,0,',','.') }}</p>
                      </div>
                      @if(Auth::check())
                      <div class="button-detail">
                        <button class="modal__button" id="open-modal" onClick="Open_click2('{{ $product->gallery->first()->getUrl() }}', '{{ $product->major }}', '{{ $product->name }}', '{{ $product->price }}', '{{ url('/cart/modal', $product->id) }}')"><i class="fa-solid fa-cart-shopping"></i></button>
                        <button class="modal__button" id="open-modal" onClick="Open_click2('{{ $product->gallery->first()->getUrl() }}', '{{ $product->major }}', '{{ $product->name }}', '{{ $product->price }}', '{{ url('/favorite/add', $product->id) }}', 'fav{{ $loop->iteration }}' )">
                        @if(in_array($product->id, $favorites))
                        <i class="fa-solid fa-heart" id="fav{{ $loop->iteration }}"></i>
                        @else
                        <i class="fa-regular fa-heart" id="fav{{ $loop->iteration }}"></i>
                        @endif
                        </button>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              @endforeach
              


              </div>
            </div>
          </div>
        </div>
        <button id="prev">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" >
            <path fill="none" d="M0 0h24v24H0V0z" />
            <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" fill="white"/>
          </svg>
        </button>
        <button id="next">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" >
            <path fill="none" d="M0 0h24v24H0V0z" />
            <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" fill="white"/>
          </svg>
        </button>
      </div>
    <div class="our-btn">
      <a href="{{ url('product') }}">
        <button>All Category</button>
      </a>
    </div>
  </div>
</div>

<div class="modal__container" id="modal-container">
    <div class="modal__content">
      <div class="header" id="textmodal">Add to Cart</div>
      <div class="cart-content">
        <div class="left-modal">
          <div class="img-modal">
            <img src="" alt=""  id="img-cart-modal">
          </div>
          <div class="desc-modal">
            <p id="ctgry-cart-modal"></p>
            <p id="name-cart-modal"></p>
            <p id="">Software</p>
          </div>
        </div>
        <div class="right-modal">
          <p id="price-cart-modal"></p>
        </div>
      </div>
    </div>
</div>

<footer>
  <div class="footer">
    <div class="konten">
      <div class="kategori">
        <ul>
          <li>
            <p>Kategori</p>
          </li>
          <li><a href="">RPL</a></li>
          <li><a href="">TJKT</a></li>
          <li><a href="">BRC</a></li>
          <li><a href="">TE</a></li>
          <li><a href="">Animasi</a></li>
        </ul>
      </div>
      <div class="help-center">
        <ul>
          <li>
            <p>Help Center</p>
          </li>
          <li><a href="">FAQS</a></li>
          <li><a href="">Terms & Conditions</a></li>
          <li><a href="">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="school-info">
        <ul>
          <li>
            <p>School Info</p>
          </li>
          <li><a
              href="https://smktarunabhakti.net/index.php/whytarbak-before-import/identitas-sekolah-before-import/">About
              Us</a>
          </li>
          <li><a
              href="https://smktarunabhakti.net/index.php/struktur-kurikulum-sekolah-menengah-kejuruan-madrasah-aliyah-kejuruan-before-import/">Curicullum</a>
          </li>
          <li><a
              href="https://smktarunabhakti.net/index.php/kurikulum-before-import/kompetensi-keahlian-smk-taruna-bhakti-before-import/">Subject</a>
          </li>
        </ul>
      </div>

      <div class="logo-copyright">
        <img src="{{ asset('assets/img/logoTb.png')}}" alt="">
        <p>Copyright ©2022 SMK Taruna Bhakti </p>
      </div>
    </div>
    <div class="sosmed">
      <p>Contact Us</p>
      <ul>
        <li>
          <a target="_blank" href="https://www.instagram.com/smktarunabhakti.depok/">
            <img src="{{ asset('assets/img/instagram.png')}}" alt="">
          </a>
        </li>
        <li>
          <a target="_blank" href="https://www.youtube.com/c/SMKTarunaBhaktiDepok">
            <img src="{{ asset('assets/img/youtube.png')}}" alt="">
          </a>
        </li>
        <li>
          <a target="_blank" href="https://www.facebook.com/smktarunabhaktidepok">
            <img src="{{ asset('assets/img/facebook.png')}}" alt="">
          </a></li>

        <li>
          <a target="_blank" href="https://mail.google.com/mail/u/0/?hl=en#inbox">
            <img src="{{ asset('assets/img/email.png')}}" alt="">
          </a>
        </li>
      </ul>
    </div>
  </div>
</footer>



<script src="{{ asset('assets/js/home.js')}}"></script>
<script src="{{ asset('assets/js/cartmodal.js')}}"></script>

@endsection
