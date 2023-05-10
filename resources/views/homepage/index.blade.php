@extends('layouts.app')

@section('content')
    <!-- TOP BANNER  style="background-image:url('uploads/parallax.jpg');"-->
    <div id="home" class="parallax_x first-section pt-0" data-stellar-background-ratio="0.4">
        <div style="filter: brightness(0.6);">
            <video id="homeHero--video" class="homeHero--video" style="width: 100%;" preload="true" loop="true"
                fullscreen="true" autoplay="true" muted="" poster="/videos/bg.png">
                <source data-video-src="/videos/bg.mp4" type="video/webm" src="/videos/bg.mp4">
            </video>
        </div>

        <div class="container center_absolute">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="big-tagline clearfix">
                        <h2>Book this Property with Castle Milk</h2>
                        <p class="lead">Book your reservation now with us. We will provide the best service. </p>
                        <a data-scroll href="#gallery" class="btn btn-light btn-radius grd1 btn-brd">View Gallery</a>
                    </div>
                </div>
                @php
                    $cookie_user = json_decode(\Illuminate\Support\Facades\Cookie::get('curr_user'));
                    
                @endphp
                <div class="col-md-6 wow slideInRight hidden-xs hidden-sm">
                    <div class="contact_form">
                        {{-- {{ print_r(Session::all()) }} --}}
                        <h3><i class="fa fa-envelope-o grd1 global-radius"></i>
                            {{ $cookie_user != '' ? 'QUICK APPOINTMENT' : 'Get The Details Now!' }}</h3>


                        <form id="contactform1" class="row" name="contactform" method="post"
                            action="{{ route('submit-property-access') }}">
                            @if ($errors->any())
                                <div class="alert alert-danger flex-grow-1">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <fieldset class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="name1" id="first_name1" class="form-control"
                                        placeholder="First Name" required {{ $cookie_user != '' ? 'read-only' : '' }}
                                        {{ $cookie_user != '' ? 'read-only' : '' }}
                                        value="{{ $cookie_user != '' ? $cookie_user->name : '' }}">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="email" name="email1" id="email1" class="form-control"
                                        placeholder="Your Email" required {{ $cookie_user != '' ? 'read-only' : '' }}
                                        value="{{ $cookie_user != '' ? $cookie_user->email : '' }}">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4">
                                    <input type="text" name="phone1" id="phone_number" class="form-control"
                                        placeholder="Your Phone" required {{ $cookie_user != '' ? 'read-only' : '' }}
                                        value="{{ $cookie_user != '' ? $cookie_user->phone_number : '' }}">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    @if ($cookie_user == '')
                                        <button type="submit" value="SEND" id="submit1"
                                            class="btn btn-light btn-radius btn-brd grd1 btn-block">Get Access to
                                            Property</button>
                                    @else
                                        <a href="{{ route('property-details') }}">Show Details </a>
                                    @endif
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end section -->
    <div id="features" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-12 col-md-offset-2">
                    <small>All Awesome Property Details</small>
                    <h3>Property Details</h3>
                    <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non
                        aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                </div>
                <!-- end col -->
            </div>

            <!-- end how-its-work -->
            <hr class="invis">
            <div class="row text-center">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <a href="uploads/estate_01.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i
                                    class="flaticon-unlink"></i></a>
                            <img src="uploads/estate_01.jpg" alt="" class="img-responsive img-rounded">
                        </div>
                        <h3>Spacious and Large Garden</h3>
                        <p>Aliquam sagittis ligula et sem lacinia, ut facilisis enim sollicitudin. Proin nisi est, convallis
                            nec purus vitae, iaculis posuere sapien. Cum sociis natoque.</p>
                    </div>
                    <!-- end service -->
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <a href="uploads/estate_03.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i
                                    class="flaticon-unlink"></i></a>
                            <img src="uploads/estate_03.jpg" alt="" class="img-responsive img-rounded">
                        </div>
                        <h3>With its Own Pool</h3>
                        <p>Duis at tellus at dui tincidunt scelerisque nec sed felis. Suspendisse id dolor sed leo rutrum
                            euismod. Nullam vestibulum fermentum erat. It nam auctor. </p>
                    </div>
                    <!-- end service -->
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media wow fadeIn">
                            <a href="uploads/estate_02.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i
                                    class="flaticon-unlink"></i></a>
                            <img src="uploads/estate_02.jpg" alt="" class="img-responsive img-rounded">
                        </div>
                        <h3>In Forests- Fresh Clean Air</h3>
                        <p>Etiam materials ut mollis tellus, vel posuere nulla. Etiam sit amet lacus vitae massa sodales
                            aliquam at eget quam. Integer ultricies et magna quis.</p>
                    </div>
                    <!-- end service -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
        <div class="sep1"></div>
    </div>
    <!-- end section -->



    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/css/intlTelInput.css" />
    <style>
        .iti {
            width: 100%
        }
    </style>

    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script>
        var input = document.querySelector("#phone_number");
        window.intlTelInput(input, {
            separateDialCode: true,
            preferredCountries: ["us", "uk", "pk", "no"]
        });

        let form = document.querySelector("#contactform1")
        form.addEventListener("submit", function(e) {

            let code = document.querySelector(".iti__selected-dial-code").innerHTML

            document.querySelector("#phone_number").value = code + document.querySelector("#phone_number").value

        })
    </script>
@endsection
