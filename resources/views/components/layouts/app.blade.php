<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />

    <!-- fontAwesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />

    <!-- boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />

    <!-- main stylesheet -->
    <link rel="stylesheet" href="{{asset('theme_asset/home/css/home.css')}}" />

    <!-- title -->
    <title>{{$title ?? "Mini-Ecom"}}</title>
    @livewireStyles
  </head>

  <body>
    <!-- header -->
    <div id="header">
      <div class="container">
        <div class="nav-bar">
          <a href="{{route('products.browse')}}" class="logo">
            <img src="{{asset('theme_asset/home/img/logo.jpg')}}" alt="" />
          </a>

          <div class="d-flex align-items-center">
            <a href="{{route('cart')}}">
            <div class="theme-wrap me-3">
              <div class="theme-icon-wrap">
                <i class="fa-solid fa-cart-shopping"></i>
              </div>
            </div>
          </a>
          </div>
        </div>

        <div class="navmenus">
          <div class="nav-links">
            <a href="{{route('products.browse')}}">Inicio</a>
            <div class="dropdown">
              <a
                href="#!"
                class="dropdown-toggle"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >Categorias</a>
                @php
                  $categories = App\Models\Category::all();    
                @endphp
              <ul class="dropdown-menu">
                @foreach ($categories as $category)
                  <li><a class="dropdown-item" href="{{route('category.show', $category->id)}}">{{$category->name}}</a></li>
                @endforeach
                
              </ul>
            </div>
            @auth
              @if (Auth::user()->isAdmin())
              
                <a href="{{route('admin.dashboard')}}">Administración</a>
                <ul class="hover">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                      Logout
                    </button>
                    
                  </form>
                  
                </ul>
              @else
                <a href="{{route('cart')}}">Carrito</a>
              @endif
              
            @else
              <a href="{{route('cart')}}">Carrito</a>
            @endauth
           
          </div>
          <div class="nav-toggler">
            <i class="bx bx-menu-alt-right"></i>
          </div>
        </div>
      </div>
    </div>

  <div class="container">
    {{$slot}}
  </div>

    <!-- footer 
    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#!" class="logo">
              <img src="img/logocolor.png" style="width: 175px;" alt="">
            </a>

            <p class="footer-desc">
              Single Vendor Ecommerce Script
            </p>
          </div>

          <div class="col-lg-3 mb-5 mb-lg-0">
            <ul class="footer-list">
              <h2 class="title">Categories</h2>
              <li><a href="#!">Shoe</a></li>
            </ul>
          </div>

          <div class="col-lg-3 mb-5">
            <ul class="footer-list">
              <h2 class="title">Legals</h2>
              <li><a href="#!">Contact</a></li>
              <li><a href="#!">Privacy policy</a></li>
              <li><a href="#!">Cookie policy</a></li>
              <li><a href="#!">Terms &amp; Conditions</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>-->

    <div class="backdrop-filter"></div>
  </body>

  <!-- js -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('theme_asset/home/js/home.js')}}"></script>
  @livewireScripts
</html>
