<!doctype html>
<html class="no-js" lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DIGISIAP</title>
    <meta name="robots" content="follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" href="{{ url('assets/images/logo/rel.png') }}" sizes="16x16">
    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/vendor/bootstrap.min.css') }}">
    
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/vendor/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/vendor/themify.css') }}">
    <!-- othres CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    
    <script src="{{ url('assets/js/pagination.js') }}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('assets/pagination/jquery.paginate.css')}}" />
    
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    
    <style>
        .paginate { padding: 0; margin: 0; }
        .paginate > li { list-style: none; padding: 10px 20px; border: 1px solid #ddd; margin: 10px 0; }
    </style>


    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5df5cf4243be710e1d222319/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
        <style>
            .float{
            	position:fixed;
            	width:60px;
            	height:60px;
            	bottom:40px;
            	right:40px;
            	background-color:#25d366;
            	color:#FFF;
            	border-radius:50px;
            	text-align:center;
              font-size:30px;
            	box-shadow: 2px 2px 3px #999;
              z-index:100;
            }
            
            .my-float{
            	margin-top:16px;
            }
            
            .asda{
                overflow-y: scroll;
                background: green;
            }
        </style>
        
</head>

<body>
    <a href="https://api.whatsapp.com/send?phone=6281511298931&text=Halo%20Admin,%20Apakah%20bisa%20membantu%20saya?" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
    <div class="main-wrapper">
        <header class="header-area transparent-bar sticky-bar header-padding-3">
            <div class="main-header-wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-1 col-lg-1">
                            <div class="logo mt-45">
                                <!--<a href="{{ url('/') }}"><img style="width:120px;" src="{{ url('assets/images/logo/logo-01.svg') }}" alt="logo"></a>-->
                                <a href="{{ url('/') }}"><img style="width:120px; position:absolute; margin-top:-6px;" class src="{{ url('assets/images/logo/merkan.png') }}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 d-flex justify-content-center">
                            <div class="main-menu menu-common-style menu-lh-3 menu-margin-4 menu-ngtv-mrg-1 menu-font-2">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li class="angle-shape">
                                            <a href="#">Business Groups</a>
                                            <ul class="mega-menu mega-menu-hm7">
                                                <li><a class="menu-title">TRADING</a>
                                                    <ul>
                                                        @if (isset($product))
                                                            @foreach($product as $productt)
                                                                @if ($productt->parentCategories == 'TRADING')
                                                                <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=TRADING') }}">{{$productt->productCategories}}</a></li>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </li>
                                                <li><a class="menu-title">SERVICE</a>
                                                    <ul>
                                                        @if (isset($product))
                                                            @foreach($product as $productt)
                                                                @if ($productt->parentCategories == 'SERVICE')
                                                                <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=service') }}">{{$productt->productCategories}}</a></li>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </li>
                                                <!--<li><a class="menu-title">PERCETAKAN</a>-->
                                                <!--    <ul>-->
                                                <!--        @if (isset($product))-->
                                                <!--            @foreach($product as $productt)-->
                                                <!--                @if ($productt->parentCategories == 'PROMOTION')-->
                                                <!--                <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=promotion') }}">{{$productt->productCategories}}</a></li>-->
                                                <!--                @endif-->
                                                <!--            @endforeach-->
                                                <!--        @endif-->
                                                <!--    </ul>-->
                                                <!--</li>-->
                                                <!--<li><a class="menu-title">OTOMOTIF</a>-->
                                                <!--    <ul>-->
                                                <!--        @if (isset($product))-->
                                                <!--            @foreach($product as $productt)-->
                                                <!--                @if ($productt->parentCategories == 'ADVERTISING')-->
                                                <!--                <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=advertising') }}">{{$productt->productCategories}}</a></li>-->
                                                <!--                @endif-->
                                                <!--            @endforeach-->
                                                <!--        @endif-->
                                                <!--    </ul>-->
                                                <!--</li>-->
                                                <!--<li><a class="menu-title">KONVEKSI</a>-->
                                                <!--    <ul>-->
                                                <!--        @if (isset($product))-->
                                                <!--            @foreach($product as $productt)-->
                                                <!--                @if ($productt->parentCategories == 'KONVEKSI')-->
                                                <!--                <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=konveksi') }}">{{$productt->productCategories}}</a></li>-->
                                                <!--                @endif-->
                                                <!--            @endforeach-->
                                                <!--        @endif-->
                                                <!--    </ul>-->
                                                <!--</li>-->
                                                <!--<li><a class="menu-title">REKLAME DIGITAL</a>-->
                                                <!--    <ul>-->
                                                <!--        @if (isset($product))-->
                                                <!--            @foreach($product as $productt)-->
                                                <!--                @if ($productt->parentCategories == 'REKLAME DIGITAL')-->
                                                <!--                <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=reklame digital') }}">{{$productt->productCategories}}</a></li>-->
                                                <!--                @endif-->
                                                <!--            @endforeach-->
                                                <!--        @endif-->
                                                <!--    </ul>-->
                                                <!--</li>-->
                                                <!--<li><a class="menu-title">SABLON</a>-->
                                                <!--    <ul>-->
                                                <!--        @if (isset($product))-->
                                                <!--            @foreach($product as $productt)-->
                                                <!--                @if ($productt->parentCategories == 'SABLON')-->
                                                <!--                <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=sablon') }}">{{$productt->productCategories}}</a></li>-->
                                                <!--                @endif-->
                                                <!--            @endforeach-->
                                                <!--        @endif-->
                                                <!--    </ul>-->
                                                <!--</li>-->
                                            </ul>
                                            <ul class="submenu">
                                                
                                            </ul>
                                        </li>
                                        <li><a href="{{ url('about') }}">About us</a></li>
                                        <li><a href="{{ url('contact') }}">Contact</a>
                                        </li>
                                        <li><a href="{{ url('faq') }}">FAQ</a>
                                        </li>
                                        <li><a href="{{ url('documentation') }}">Documentation</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="header-right-wrap mt-40 stick-mt-40">
                                <div class="search-wrap-2 search-wrap-2-mrg border-style">
                                    <button class="search-active">
                                        <i class="la la-search"></i>
                                    </button>
                                </div>
                                <div class="setting-wrap setting-wrap-mrg border-style">
                                    @if(Session::has('Login'))
                                        <a href="{{ url('profile') }}">
                                            <i class="la la-cog"></i>
                                            My Profile
                                        </a>
                                    @else
                                        <a href="{{ url('sign') }}">
                                            <i class="la la-cog"></i>
                                            Login / Register
                                        </a>
                                    @endif
                                </div>
                                
                                <div class="cart-wrap cart-wrap-2 border-style">
                                    @if(Session::has('Login'))
                                        <button class="cart-active" onclick="location.href='{{url('cart')}}';" >
                                            <span class="mini-cart-price-2">Rp {{strrev(implode('.',str_split(strrev(strval($price)),3)))}},-</span>
                                            <i class="la la-shopping-cart"></i>
                                            <span class="count-style-2">{{$totalCart}}</span>
                                        </button>
                                    @else
                                        <button class="cart-active">
                                            <span class="mini-cart-price-2">Need login</span>
                                            <i class="la la-shopping-cart"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main-search start -->
                <div class="main-search-active">
                    <div class="sidebar-search-icon">
                        <button class="search-close"><span class="la la-close"></span></button>
                    </div>
                    <div class="sidebar-search-input">
                        <form action="{{url('/search')}}" method="get">
                        @csrf
                            <div class="form-search">
                                <input id="search" name="search" class="input-text" value="" placeholder="Search Now" type="search" required>
                                <button>
                                    <i class="la la-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="header-small-mobile">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="mobile-logo">
                                <a href="{{url('/')}}">
                                    <!--<a href="{{ url('/') }}"><img style="width:120px;" src="{{ url('assets/images/logo/merkan.png') }}" alt="logo"></a>-->
                                    <img style="width:200px;" src="{{ url('assets/images/logo/merkan.png') }}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="header-right-wrap">
                                <div class="cart-wrap common-style">
                                    <button class="cart-active">
                                        <i class="la la-shopping-cart"></i>
                                        @if(Session::has('Login'))
                                            <a class="cart-active" onclick="location.href='{{url('cart')}}';">
                                                <span class="count-style">{{$totalCart}} Items</span>
                                            </a>
                                        @else
                                            <span class="count-style">Need login</span>
                                        @endif
                                    </button>
                                </div>
                                <div class="mobile-off-canvas">
                                    <a class="mobile-aside-button" href="#"><i class="la la-navicon la-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="mobile-off-canvas-active">
            <a class="mobile-aside-close"><i class="la la-close"></i></a>
            <div class="header-mobile-aside-wrap">
                <div class="mobile-search">
                    <form class="search-form" action="{{url('/search')}}" method="get">
                    @csrf
                        <input id="search" name="search" class="input-text" value="" placeholder="Search Now" type="search" required>
                        <button class="button-search"><i class="la la-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap">
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li class="menu-item-has-children"><a href="#">Business Groups</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children"><a href="#">TRADING</a>
                                            <ul class="dropdown">
                                                @if (isset($product))
                                                    @foreach($product as $productt)
                                                        @if ($productt->parentCategories == 'TRADING')
                                                        <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=TRADING') }}">{{$productt->productCategories}}</a></li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">SERVICE</a>
                                            <ul class="dropdown">
                                                @if (isset($product))
                                                    @foreach($product as $productt)
                                                        @if ($productt->parentCategories == 'SERVICE')
                                                        <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=service') }}">{{$productt->productCategories}}</a></li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        <!--<li class="menu-item-has-children"><a href="#">PERCETAKAN</a>-->
                                        <!--    <ul class="dropdown">-->
                                        <!--        @if (isset($product))-->
                                        <!--            @foreach($product as $productt)-->
                                        <!--                @if ($productt->parentCategories == 'PROMOTION')-->
                                        <!--                <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=promotion') }}">{{$productt->productCategories}}</a></li>-->
                                        <!--                @endif-->
                                        <!--            @endforeach-->
                                        <!--        @endif-->
                                        <!--    </ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children"><a href="#">OTOMOTIF</a>-->
                                        <!--    <ul class="dropdown">-->
                                        <!--        @if (isset($product))-->
                                        <!--            @foreach($product as $productt)-->
                                        <!--                @if ($productt->parentCategories == 'ADVERTISING')-->
                                        <!--                <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=advertising') }}">{{$productt->productCategories}}</a></li>-->
                                        <!--                @endif-->
                                        <!--            @endforeach-->
                                        <!--        @endif-->
                                        <!--    </ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children"><a href="#">KONVEKSI</a>-->
                                        <!--    <ul class="dropdown">-->
                                        <!--        @if (isset($product))-->
                                        <!--            @foreach($product as $productt)-->
                                        <!--                @if ($productt->parentCategories == 'KONVEKSI')-->
                                        <!--                <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=konveksi') }}">{{$productt->productCategories}}</a></li>-->
                                        <!--                @endif-->
                                        <!--            @endforeach-->
                                        <!--        @endif-->
                                        <!--    </ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children"><a href="#">REKLAME DIGITAL</a>-->
                                        <!--    <ul class="dropdown">-->
                                        <!--        @if (isset($product))-->
                                        <!--            @foreach($product as $productt)-->
                                        <!--                @if ($productt->parentCategories == 'REKLAME DIGITAL')-->
                                        <!--                <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=reklame digital') }}">{{$productt->productCategories}}</a></li>-->
                                        <!--                @endif-->
                                        <!--            @endforeach-->
                                        <!--        @endif-->
                                        <!--    </ul>-->
                                        <!--</li>-->
                                        <!--<li class="menu-item-has-children"><a href="#">SABLON</a>-->
                                        <!--    <ul class="dropdown">-->
                                        <!--        @if (isset($product))-->
                                        <!--            @foreach($product as $productt)-->
                                        <!--                @if ($productt->parentCategories == 'SABLON')-->
                                        <!--                <li><a href="{{ url('/shop/category?name='.$productt->productCategories.'&parent=sablon') }}">{{$productt->productCategories}}</a></li>-->
                                        <!--                @endif-->
                                        <!--            @endforeach-->
                                        <!--        @endif-->
                                        <!--    </ul>-->
                                        <!--</li>-->
                                    </ul>
                                </li>
                                <li><a href="{{ url('about') }}">About us</a></li>
                                <li><a href="{{ url('contact') }}">Contact</a>
                                </li>
                                <li><a href="{{ url('faq') }}">FAQ</a>
                                </li>
                                <li><a href="{{ url('documentation') }}">Documentation</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-curr-lang-wrap">
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-account-active" href="#">Account <i class="la la-angle-down"></i></a>
                        <div class="lang-curr-dropdown account-dropdown-active">
                            <ul>
                                @if(Session::has('Login'))
                                    <li><a href="{{ url('profile') }}">My Profile</a></li>
                                @else
                                    <li><a href="{{ url('sign') }}">Login / Register</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mobile-social-wrap">
                    <a class="facebook" href="https://www.facebook.com/merkan.ol"><i class="ti-facebook"></i></a>
                    <a class="twitter" href="#"><i class="ti-twitter-alt"></i></a>
                    <a class="pinterest" href="#"><i class="ti-pinterest"></i></a>
                    <a class="instagram" href="https://www.instagram.com/merkanolshop"><i class="ti-instagram"></i></a>
                    <a class="google" href="#"><i class="ti-google"></i></a>
                </div>
            </div>
        </div>
        @yield('content')
        <footer class="footer-area">
            <div class="footer-top bg-gray pt-120 pb-85">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12 col-sm-6">
                            <div class="footer-widget mb-30">
                                <!--<a href="#"><img style="width:150px;" src="{{ url('assets/images/logo/logo-01.svg') }}" alt="logo"></a>-->
                                <a href="{{ url('/') }}"><img style="width:120px;" src="{{ url('assets/images/logo/merkan.png') }}" alt="logo"></a>
                                <div class="footer-social">
                                    <span>Follow us:</span>
                                    <ul>
                                        <li><a href="https://www.facebook.com/merkan.ol"><i class=" ti-facebook "></i></a></li>
                                        <li><a href="#"><i class=" ti-twitter-alt "></i></a></li>
                                        <li><a href="https://www.instagram.com/merkanolshop"><i class=" ti-instagram "></i></a></li>
                                        <li><a href="#"><i class=" ti-pinterest "></i></a></li>
                                        <li><a href="#"><i class=" ti-vimeo-alt "></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-12 col-sm-6">
                            <div class="footer-widget mb-30 footer-mrg-hm1">
                                <div class="footer-title">
                                    <h3>Useful Link</h3>
                                </div>
                                <div class="footer-list">
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{url('faq')}}">FAQ</a></li>
                                        <li><a href="{{ url('documentation') }}">Documentation</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-2 col-12 col-sm-6">
                            <div class="footer-widget mb-30">
                                <div class="footer-title">
                                    <h3>About us</h3>
                                </div>
                                <div class="footer-list">
                                    <ul>
                                        <li><a href="{{url('about')}}">About</a></li>
                                        <li><a href="{{url('contact')}}">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="footer-widget mb-30">
                                <div class="footer-title">
                                    <h3>Newsletter</h3>
                                </div>
                                <div class="subscribe-style mt-45">
                                    <p>Subscribe to get all new updates</p>
                                    <div id="mc_embed_signup" class="subscribe-form mt-20">
                                        <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="{{url('subs')}}">
                                            @csrf
                                            <div id="mc_embed_signup_scroll" class="mc-form">
                                                <input class="email" type="email" required="" placeholder="Enter your email" name="EMAIL" value="">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom bg-gray-2 ptb-20">
                <div class="container">
                    <div class="copyright text-center">
                        <p>Copyright © <a href="{{url('/')}}">Mersikanulsi</a>. All Right Reserved</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- JS
============================================ -->
    
    <!-- Modernizer JS -->
    <script src="{{ url('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <!-- Modernizer JS -->
    <script src="{{ url('assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ url('assets/js/vendor/popper.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ url('assets/js/vendor/bootstrap.min.js') }}"></script>

    <!-- Slick Slider JS -->
    <script src="{{ url('assets/js/plugins/countdown.js') }}"></script>
    <script src="{{ url('assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ url('assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ url('assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ url('assets/js/plugins/instafeed.js') }}"></script>
    <script src="{{ url('assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ url('assets/js/plugins/jquery-ui-touch-punch.js') }}"></script>
    <script src="{{ url('assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ url('assets/js/plugins/owl-carousel.js') }}"></script>
    <script src="{{ url('assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ url('assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ url('assets/js/plugins/slick.js') }}"></script>
    <script src="{{ url('assets/js/plugins/wow.js') }}"></script>
    <script src="{{ url('assets/js/plugins/textillate.js') }}"></script>
    <script src="{{ url('assets/js/plugins/elevatezoom.js') }}"></script>
    <script src="{{ url('assets/js/plugins/sticky-sidebar.js') }}"></script>
    <script src="{{ url('assets/js/plugins/smoothscroll.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ url('assets/js/main.js') }}"></script>

    <script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
    <script>
    function submitForm() {
        // Kirim request ajax
        $.post("{{ route('donation.store') }}",
        {
            _method: 'POST',
            _token: '{{ csrf_token() }}',
            amount: $('input#grandTotal').val(),
            address: $('textarea#address').val(),
            payment_name: $('input#payment_name').val(),
            payment_email: $('input#payment_email').val(),
        },
        function (data, status) {
            snap.pay(data.snap_token, {
                // Optional
                onSuccess: function (result) {
                    location.reload();
                },
                // Optional
                onPending: function (result) {
                    location.reload();
                },
                // Optional
                onError: function (result) {
                    location.reload();
                }
            });
        });
        return false;
    }
    </script>
</body>

</html>