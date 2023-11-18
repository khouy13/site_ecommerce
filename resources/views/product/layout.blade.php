<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Shop') }}</title>
    
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <link href="{{ asset('css/bstrp.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" type="text/css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    

</head>
<body>
<header id="header">
        <nav id="navbar" class="navbar navbar-expand-md" style="position:fixed;top:0;right:0;left:0;z-index:10">
            <div class="container">
                <a class="navbar_a navbar-brand" href="{{ url('/') }}">
                    <span style="font-size:25px;color:orangered;font-weight: bold">AK</span><small>shop</small>
                    {{-- {{ config('app.name', 'Home') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                  

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="navbar_a nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="navbar_a nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                          
                          <a id="navbarDropdown" class="navbar_a nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }}
                          </a>

                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>

                          </div>

                           </li>
                            @endguest
                            <li class="nav-item">
                                 <a href="{{route('demande.card')}}" class="navbar_a nav-link">
                                  <span class="fa-solid fa-cart-shopping"></span>
                                  @if ($i=session()->get('nbr_produit'))
                                      <sup style="color:red;font-weight: bold;">{{$i}}</sup> 
                                  @endif
                                </a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
      </header>

<main>
    @yield('content')
</main>

<footer class="pt-2 mt-5" id="footer">
          <div class="pb-5 px-3 text-dark d-flex justify-content-around" id="foot" style="flex-wrap: wrap;align-items: center;">
             
             <div class="">
                  <h5><span style="font-size: 50px;color:orangered">AK</span>Shop</h5>
                    <p style="text-indent:3px"> 
                      is an online store for sale.
                      With good Products and reasonable prices
                      Do not hesite,send your command now
                    </p>
             </div>
          </div>
          <div class="py-4" style="border-top: solid 0.1px wheat">
                <div class="text-center d-flex justify-content-center">
                   <small class="me-3">&copy; Abderrazzak khouy</small>
                   <a href="">
                     <i class="fa-brands fa-square-facebook px-1"></i>
                   </a>
                   <a href="">
                     <i class="fa-brands fa-instagram px-1"></i>
                   </a>
                   <a href="">
                     <i class="fa-solid fa-envelope px-1"></i>
                   </a>
                   <a href="">
                     <i class="fa-solid fa-phone px-1"></i>
                  </a>
                  <a href="">
                    <i class="fa-solid fa-location-dot px-1"></i>
                  </a>
                  </div>
           <div>

</footer>

  
<script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/all.min.js"></script>
  <script src="/bootstrap.js"></script>

</body>
</html>