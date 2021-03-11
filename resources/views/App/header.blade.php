<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E Store - eCommerce HTML Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        support@email.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +012-345-6789
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="{{url('/')}}" class="nav-item nav-link">Home</a>
                            <a href="{{url('/product_list')}}" class="nav-item nav-link">Products</a>
                            @if(Auth::user())
                            <a href="{{url('/my-account')}}" class="nav-item nav-link">my account</a>
                            @endif
                        </div>
                        <div class="navbar-nav ml-auto">
                            @guest
                            @if (Route::has('register'))
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                                    <a href="{{url('/login')}}" class="dropdown-item">Login</a>
                                    <a href="{{url('/register')}}" class="dropdown-item">Register</a>
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}</a>
                            <div class="dropdown-menu">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                            
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                        </div>
                        </div>
                         @endguest
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('img/logo.png')}}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    @if(Auth::user())
                    <div class="col-md-3">
                        <div class="user">
                            <a href="{{url('/WishList',Auth::user()->id)}}" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>{{$wishes ?? ''}}</span>
                            </a>
                            
                            <a href="{{url('/showcart',Auth::user()->id)}}" class="btn cart" name="cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>{{$count ?? ''}}</span>
                            </a>
                           
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->       
        