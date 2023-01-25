@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/product.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/product-not-found.css')}}">
@endsection

@section('content')

<div class="content">
    <div class="filter-content" style="height: 90%; overflow-y:scroll; padding-bottom: 80px;">
        <form action="" method="GET">
            <div class="filter">
                <div class="header-filter">
                    <p>Filter</p>
                    <button type="submit" class="button-filter">Apply Filter</button>
                </div>
                <div class="major">
                    <div class="header-major">
                        <p>Major</p>
                    </div>
                    <div class="list-major">
                        <ul class="menu-major">
                            <li>
                                <label for="check1">
                                    <div class="list-item">
                                        <div class="img-major">
                                            <img src="{{ asset('assets/img/bc.png')}}" alt="">
                                        </div>
                                        <div class="title-major">
                                            <p>Broadcast</p>
                                        </div>
                                    </div>
                                </label>
                                <div class="checklist-major">
                                    <input type="checkbox" name="BRF" id="check1">
                                </div>
                            </li>
                            <li>
                                <label for="check2">
                                    <div class="list-item">
                                        <div class="img-major">
                                            <img src="{{ asset('assets/img/mm.png')}}" alt="">
                                        </div>
                                        <div class="title-major">
                                            <p>Animasi</p>
                                        </div>
                                    </div>
                                </label>
                                <div class="checklist-major">
                                    <input type="checkbox" name="ANIMASI" id="check2">
                                </div>
                            </li>
                            <li>
                                <label for="check3">
                                    <div class="list-item">
                                        <div class="img-major">
                                            <img src="{{ asset('assets/img/rpl.png')}}" alt="check3">
                                        </div>
                                        <div class="title-major">
                                            <p>PPLG</p>
                                        </div>
                                    </div>
                                </label>
                                <div class="checklist-major">
                                    <input type="checkbox" name="PPLG" id="check3">
                                </div>
                            </li>
                            <li>
                                <label for="check4">
                                    <div class="list-item">
                                        <div class="img-major">
                                            <img src="{{ asset('assets/img/tjkt.png')}}" alt="">
                                        </div>
                                        <div class="title-major">
                                            <p>TJKT</p>
                                        </div>
                                    </div>
                                </label>
                                <div class="checklist-major">
                                    <input type="checkbox" name="TJKT" id="check4">
                                </div>
                            </li>
                            <li>
                                <label for="check5">
                                    <div class="list-item">
                                        <div class="img-major">
                                            <img src="{{ asset('assets/img/te.png')}}" alt="">
                                        </div>
                                        <div class="title-major">
                                            <p>TE</p>
                                        </div>
                                    </div>
                                </label>
                                <div class="checklist-major">
                                    <input type="checkbox" name="TE" id="check5">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="price-filter">
                    <div class="header-price">
                        <p>Price</p>
                    </div>
                    <div class="price-inp">
                        <div class="min-price">
                            <label for="min">Min</label>
                            <input type="number" name="min" id="min" placeholder="Rp">
                        </div>
                        <div class="max-price">
                            <label for="max">Max</label>
                            <input type="number" name="max" id="max" placeholder="Rp">
                        </div>
                    </div>
                </div>

                <div class="category-filter">
                    <div class="header-category">
                        <p>Category</p>
                    </div>
                    <ul class="menu-category">
                        @foreach($menu_categories as $menu_category)
                        <li><a class="dropdown-item"
                                href="{{ route('product.cate.filter', $menu_category->slug) }}">{{ $menu_category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="category-filter">
                <div class="header-category">
                    <p>Tags</p>
                </div>
                <ul class="menu-category">
                    @foreach($menu_tags as $menu_tag)
                    <li><a class="dropdown-item"
                            href="{{ route('product.tag.filter', $menu_tag->slug) }}">{{ $menu_tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
    </div>
</div>

<div class="main-content">
    <div class="product-content">
        <div class="header-product-content">
            <div class="main-header">
                <div class="title-header">
                    <p>Explore</p>
                </div>
                <div class="filter-dropdown">
                    <label for="filter"><img src="{{ asset('assets/img/setting.png') }}" alt=""></label>
                    <select name="sort" id='sort' class="option-filter">
                        <option id="1" value="" selected="">Sort-By</option>
                        <option value="latest">Latest</option>
                        <option value="cheapest">Cheapest</option>
                        <option value="expensive">Most Expensive</option>
                        <option value="name-A-Z">A-Z</option>
                        <option value="name-Z-A">Z-A</option>
                    </select>
                </div>
            </div>
            <div class="filter-product">
                <div class="filter-label">
                    @foreach($tags as $maj)
                    <div class="label-menu">
                        <p>{{ $maj }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- <div class="header-product-content">
        <!-- <ul class="breadcrumb">
          <li><a href="loginseller.html">Home</a></li>
          <li>explore</li>
        </ul> -->
        <p class="title-content">Explore</p>
        <div class="filter-product">
          <div class="filter-label">
            @foreach($tags as $maj)
            <div class="label-menu">
              <p>{{ $maj }}</p>
    </div>
    @endforeach
</div>
</form>
</form>
</div>
</div>
</div> --}}
<div class="product">
    <div class="row-top-product">
        @if ($products->count() <= 0) @include('components.product-not-found') @else @foreach($products as $product)
            <div class="card-product">
            <div class="img-card">
                <a href="{{ route('product.show', $product->slug) }}">
                    <img src="{{ $product->gallery->first()->getUrl() }}" alt="" id="img-prod">
                </a>
            </div>
            <div class="desc-product">
                <div class="category-product">
                    <p id="ctgry">{{ $product->major }}</p>
                </div>
                <div class="name-product">
                    <a href="{{ route('product.show', $product->slug) }}">
                        <p id="name-prod">{{ $product->name }}</p>
                    </a>
                </div>
                <div class="row-price">
                    <div class="price">
                        <p id="prc-prod">Rp {{ number_format($product->price,0,',','.') }}</p>
                    </div>
                    @if(Auth::check())
                    <div class="other-btn">
                        <div class="btn-detail">
                            <button class="modal__button" type='button' id="open-modal"
                                onClick="Open_click('{{ $product->gallery->first()->getUrl() }}', '{{ $product->major }}', '{{ $product->name }}', '{{ number_format($product->price,0,',','.') }}', '{{ url('/cart/modal', $product->id) }}')"><i
                                    class="fa-solid fa-cart-shopping"></i></button>
                            <button class="modal__button" type='button' id="open-modal"
                                onClick="Open_click2('{{ $product->gallery->first()->getUrl() }}', '{{ $product->major }}', '{{ $product->name }}', '{{ number_format($product->price,0,',','.') }}', '{{ url('/favorite/add', $product->id) }}', 'fav{{ $loop->iteration }}')">
                                @if(in_array($product->id, $favorites))
                                <i class="fa-solid fa-heart" id="fav{{ $loop->iteration }}"></i>
                                @else
                                <i class="fa-regular fa-heart" id="fav{{ $loop->iteration }}"></i>
                                @endif
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
    </div>
    @endforeach
    @endif
</div>
<div class="btn-paginate">
    {!! $products->withQueryString()->links() !!}
</div>
</div>
</div>
</div>
<div class="modal__container" id="modal-container">
    <div class="modal__content">
        <div class="header" id="textmodal">Add to Cart</div>
        <div class="cart-content">
            <div class="left-modal">
                <div class="img-modal">
                    <img src="" alt="" id="img-cart-modal">
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

<script src="{{ asset('assets/js/cartmodal.js')}}"></script>

@endsection