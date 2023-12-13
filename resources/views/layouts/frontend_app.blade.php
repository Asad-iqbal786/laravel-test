<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @stack('styles')
</head>

<body>
    
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="#"><img src="{{asset('frontend/images/logo.png')}}" alt="logo" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="{{route('homePage')}}">Home</a></li>
                        <li><a href="{{route('allProducts')}}">Products</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        @auth
                        @if(auth()->user()->role == 'admin')
                            <li>
                                <a href="{{ route('adminHomePage') }}">Admin Dashboard</a>
                            </li>
                        @elseif(auth()->user()->role == 'seller')
                            <li>
                                <a href="{{ route('sellerHomePage') }}">Seller Dashboard</a>
                            </li>
                        @elseif(auth()->user()->role == 'buyer')
                            <li>
                                <a href="{{ route('dashboard') }}">Buyer Dashboard</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                    
                    </ul>
                </nav>
                <a href="{{route('userCart')}}"><img src="{{asset('frontend/images/cart.png')}}" width="30px" height="30px"></a>
                <img src="{{asset('frontend/images/menu.png')}}" class="menu-icon" onclick="menutoggle()">
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Give Your Workout <br> A New Style!</h1>
                    <p>Success isn't always about greatness. It;s about consistency. Consistent <br> hard work gains
                        success. Greatness will come.</p>
                    <a href="" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="{{asset('frontend/images/image1.png')}}">
                </div>
            </div>
        </div>
    </div>

    @yield('main-content')

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="{{asset('frontend/images/play-store.png')}}">
                        <img src="{{asset('frontend/images/app-store.png')}}">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="{{asset('frontend/images/logo-white.png')}}">
                    <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2020 - Samwit Adhikary</p>
        </div>
    </div>

    <!-- javascript -->

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>
      @stack('scripts')


</body>

</html>