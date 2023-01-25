@extends('layout/main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/ourTeam.css')}}">
@endsection

@section('content')

<div class="header">
    <nav>
        <img src="{{ asset('assets/img/logo-web.png')}}" alt="">
        <ul>
            <li>
                <a href="">About Us</a>
            </li>
            <li>
                <a href="">Our profile</a>
            </li>
            <li>
                <a href="">FAQ</a>
            </li>
            <li>
                <a href="">Terms And Conditions</a>
            </li>
            <li>
                <a href="">Privacy And Policy</a>
            </li>
        </ul>
    </nav>
    <div class="left-row">
        <h2>Zenit Platform</h2>
        <p>Zenit was built for a school e-commerce. this will be used by all user, <br>
            we sell our school product that was made by Student in Our School.</p>
    </div>
    <img class="ourTeam" src="{{ asset('assets/img/ourteam.JPG')}}" alt="">
</div>
<div class="contene">
    <div class="leftR">
        <div class="wwd">
            <p>What We Do</p>
            <p>We create E-Commerce for our school, before our team created for this project, our teacher mr. Erraldo
                ask our class, who wanna did this project and then we got task for created this project
            </p>
            <p> We build a School E-Commerce, with a different with other website, We build a site that sell a product
                from our school. Student in our school will sell their product as their major.
            </p>
            <img src="{{ asset('assets/img/team.png')}}" alt="">
        </div>
    </div>
    <div class="rightR">
        <div class="vision">
            <p>Our Vision</p>
            <p>To help school activities by making interactive and helpful programs, in order to make our school a
                suitable place for people to actually learn and try something new.
            </p>
        </div>
        <div class="mision">
            <p>Our Mission</p>
            <p>Working together to get our job done as a team
            </p>
        </div>
        <div class="hope-wish">
            <p>Hopes and Wishes</p>
            <p>Working together to get our job done as a team
            </p>
        </div>
    </div>
</div>
<div class="mot">
    <h1>Meet Our Team</h1>
    <h4>Learn more about our story and the hard-working 
        <br> people behind the Zenit.</h4>

    <div class="row1">
        <div class="row1-one">
            <div class="job">
                <p>
                    <img src="{{ asset('assets/img/job.png')}}" alt="">
                    Back End
                </p>
            </div>
            <div class="pict">
               <img src="" alt="">
               <p>Adri Bagas W</p>
           </div>
        </div>
         <div class="row1-sec">
            <div class="job">
                <p>
                    <img src="{{ asset('assets/img/job.png')}}" alt="">
                    Back End
                </p>
            </div>
            <div class="pict">
                <img src="" alt="">
                <p>Fachry Zulfikar</p>
            </div>
        </div>
    </div>
     <div class="row2">
        <div class="row1-one">
            <div class="job">
                <p>
                    <img src="{{ asset('assets/img/job.png')}}" alt="">
                    Front End
                </p>
            </div>
            <div class="pict">
               <img src="" alt="">
               <p>Sheyla Aulya</p>
           </div>
        </div>
         <div class="row1-sec">
            <div class="job">
                <p>
                    <img src="{{ asset('assets/img/job.png')}}" alt="">
                    UI/UX
                </p>
            </div>
            <div class="pict">
                <img src="" alt="">
                <p>Kiagus Ahmad F.A</p>
            </div>
        </div>
         <div class="row1-sec">
            <div class="job">
                <p>
                    <img src="{{ asset('assets/img/job.png')}}" alt="">
                    Front End
                </p>
            </div>
            <div class="pict">
                <img src="" alt="">
                <p>Divadan Arya P</p>
            </div>
        </div>
    </div>
      <div class="row3">
        <div class="row1-one">
            <div class="job">
                <p>
                    <img src="{{ asset('assets/img/job.png')}}" alt="">
                    Back End
                </p>
            </div>
            <div class="pict">
               <img src="" alt="">
               <p>Siti Nurul Homisah</p>
           </div>
        </div>
         <div class="row1-sec">
            <div class="job">
                <p>
                    <img src="{{ asset('assets/img/job.png')}}" alt="">
                    Back End
                </p>
            </div>
            <div class="pict">
                <img src="" alt="">
                <p>Ibrahim Khalis</p>
            </div>
        </div>
    </div>
</div>
<div class="sop">
    <div class="left">
        <h1>See Our Profile</h1>
        <p>Hello, we are from PPLG SMK Taruna Bhakti, representation of XI PPLG 2, Presenting our lastest project, Zenit School E-Commerce</p>
        <a href="">See Profile</a>
    </div>
    <img src="{{ asset('assets/img/ourteam.JPG')}}" alt="">
</div>
<footer>
    <p> <i class="fa fa-copyright" aria-hidden="true"></i>
        Copyright 2022 Zenit, SMK Taruna Bhakti.</p>
</footer>
@endsection
