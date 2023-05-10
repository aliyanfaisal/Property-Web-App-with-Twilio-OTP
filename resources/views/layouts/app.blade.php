<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Site Metas -->
    <title>Castle Milk Rentals</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/style.css">
    <!-- Colors CSS -->
    {{-- <link rel="stylesheet" href="/css/colors.css"> --}}
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- Custom CSS -->
    {{-- <link rel="stylesheet" href="/css/custom.css"> --}}
    <!-- Modernizer for Portfolio -->
    {{-- <script src="js/modernizer.js"></script> --}}
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->

</head>

<body class="realestate_version">
    <style>
        .position-absolute {
            position: absolute !important;
        }
    </style>
    <div id="toast-target"></div>

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="/images/loaders/loader-realestate.gif" alt="">
    </div>

    <!-- end loader -->
    <!-- END LOADER -->
    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default" data-spy="affix">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="/images/logos/castle-logo.png" width="220" alt="image" />
                    </a>
                </div>
                <div id="navbar" class="navbar-collapsex collapse show">
                    <ul class="nav navbar-dark navbar-right">
                        <li><a data-scroll href="#home">Home</a></li>
                        <li><a data-scroll href="#features">Features <span class="hidden-xs">*</span></a></li>
                        <li><a data-scroll href="#agent">About Seller</a></li>
                        <li><a data-scroll href="#gallery">Gallery</a></li>
                        <li><a data-scroll href="#support">Contact</a></li>
                        <li class="social-links"><a href="#"><i class="fa fa-twitter global-radius"></i></a></li>
                        <li class="social-links"><a href="#"><i class="fa fa-facebook global-radius"></i></a></li>
                        <li class="social-links"><a href="#"><i class="fa fa-linkedin global-radius"></i></a></li>
                        <!-- Authentication Links -->

                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <section id="afb_main">
        @yield('content')
    </section>



    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="">
                    <p class="footer-company-name text-center">All Rights Reserved MiamiBeach.News
                        &copy;
                        2023
                    </p>
                </div>

            </div>
        </div>
        <!-- end container -->
    </div>
    <!-- end copyrights -->
    <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>


    <!-- ALL JS FILES -->
    <script src="/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="/js/custom.js"></script>
    <!-- <script src="/js/portfolio.js"></script> -->
    <!-- <script src="/js/hoverdir.js"></script>     -->
    <!-- <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script> -->
    <!-- MAP & CONTACT -->
    <!-- <script src="/js/map.js"></script> -->

    @if (session('message'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    @endif
    <script>
        @if (session('message'))
            Swal.fire({
                text: '{{ session('message') }}',
                target: '#custom-target',
                customClass: {
                    container: 'position-absolute'
                },
                toast: true,
                showConfirmButton: false,
                showCloseButton: true,
                position: 'top-right'
            })
        @endif
    </script>
</body>

</html>
