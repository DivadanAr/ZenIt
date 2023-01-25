@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/setting-cust.css')}}">
@endsection

@section('content')
<div class="container">
    <h3 style="display: flex; align-items: center; gap: 10px;"><iconify-icon icon="mdi:gear"></iconify-icon>Setting & Help Center</h3>

    <div class="setting-content">

        <div class="account">
            <p class="account-title">Account</p>
            <div class="account-content">
                <a href="{{ route('profile.cust') }}">
                    <div class="profile">
                        <div class="profile-content">
                            <iconify-icon icon="ic:baseline-account-circle" class="profile-icon"></iconify-icon>
                            <p>Account</p>
                        </div>
                        <p>></p>
                    </div>
                </a>

                <a href="{{ route('editprofile.cust') }}">
                    <div class="edit-profile">
                        <div class="edit-profile-content">
                            <iconify-icon icon="bxs:edit" class="edit-profile-icon"></iconify-icon>
                            <p>Edit Profile</p>
                        </div>
                        <p>></p>
                    </div>
                </a>

                <a href="{{ url('favorite') }}">
                <div class="favorite">
                    <div class="favorite-content">
                        <iconify-icon icon="akar-icons:heart" class="favorite-icon"></iconify-icon>
                        <p>Favorite Product</p>
                    </div>
                    <p>></p>
                </div>
                </a>
            </div>
        </div>
        
        
        <div class="order">
            <p class="order-title">Order</p>
            <div class="order-content">

                <a href="{{ route('cust.order') }}">

                    <div class="my-order">
                        <div class="my-order-content">
                            <iconify-icon icon="icon-park-outline:transaction-order" class="my-order-icon"></iconify-icon>
                            <p>My Order</p>
                        </div>
                        <p>></p>
                    </div>
                </a>

                <a href="">
                    <div class="order-history">
                        <div class="order-history-content">
                            <iconify-icon icon="fa:history" class="order-history-icon"></iconify-icon>
                            <p>Order History</p>
                        </div>
                        <p>></p>
                    </div>
                </a>
            </div>
        </div>

        <div class="help-centre">
            <p class="help-centre-title">Help Centre</p>
            <div class="help-centre-content">
                <a href="{{ url('404') }}">
                    <div class="privacy-policy">
                        <div class="privacy-policy-content">
                            <iconify-icon icon="fluent-mdl2:page" class="privacy-policy"></iconify-icon>
                            <p>Privacy Policy</p>
                        </div>
                        <p>></p>
                    </div>
                </a>

                <a href="{{ url('404') }}">
                    <div class="terms-conditions">
                        <div class="terms-conditions-content">
                            <iconify-icon icon="fa:history" class="terms-conditions-icon"></iconify-icon>
                            <p>Terms & Conditions</p>
                        </div>
                        <p>></p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
