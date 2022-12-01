@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/product-seller.css')}}">
@endsection

@section('content')
@include('components.sidebar')
<div class="contents">
  <div class="sub-content">
      <a href="">All Product</a>
  </div>
  <div class="row-1">
      <div class="search-product">
          <div class="row">

              <div class="col-md-6">

                  <div class="form">
                      <i class="fa fa-search"></i>
                      <input type="text" class="form-control form-input" placeholder="Search anything...">
                  </div>

              </div>

          </div>
      </div>
      <div class="add-product">
          <a href="">
              <button>Add Product</button>
          </a>
      </div>
  </div>

  <div class="product-tabs">
      <table border="1px">
          <tr>
              <th>Id</th>
              <th>Image</th>
              <th>Name</th>
              <th>Stock</th>
              <th>Price</th>
              <th>Type</th>
              <th colspan="2">Action</th>
          </tr>
          <tr>
              <td>12345</td>
              <td>
                  <img src="assets/web3.jpg" alt="">
              </td>
              <td style="text-align: start; font-size: 14px;">design web kece abies kak</td>
              <td>1400</td>
              <td>Rp.222222</td>
              <td>
                  <p
                      style="padding:5px; margin-left: 30px; width: 100px; background-color: #8DB2FF; color: white; border-radius: 5px;  font-size: 14px;">
                      Software</p>
              </td>
              <td>
                  <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                  </label>
              </td>
              <td>
                  <a href="" style="font-weight: 600;">
                      Detail
                  </a>
              </td>
          </tr>
          <tr>
              <td>12345</td>
              <td>
                  <img src="assets/web3.jpg" alt="">
              </td>
              <td style="text-align: start; font-size: 14px;">design web kece abies kak</td>
              <td>1400</td>
              <td>Rp.222222</td>
              <td>
                  <p
                      style="padding:5px; margin-left: 30px; width: 100px; background-color: #5874AF; color: white; border-radius: 5px;  font-size: 14px;">
                      Software</p>
              </td>
              <td>
                  <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                  </label>
              </td>
              <td>
                  <a href="" style="font-weight: 600;">
                      Detail
                  </a>
              </td>
          </tr>

      </table>
  </div>
</div>
@endsection