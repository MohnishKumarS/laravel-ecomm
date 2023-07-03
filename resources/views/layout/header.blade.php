<?php
use App\Http\Controllers\ProductController;
$count = ProductController::cartItem();
if(empty($count)){
  $count = 0;
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">E-Comm</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/product">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/myorders">Orders</a>
          </li>
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> --}}
        
        </ul>
        <form class="d-flex m-auto" role="search" method="post" action="{{url('/product-search')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input class="form-control me-2" type="search" placeholder="Search" id="search" name="search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <div class="me-4">
          <h6><a href="/cartlist"><i class="bi bi-cart-plus me-2"></i>Cart({{$count}})</a></h6>
        </div>

        <div>

          @if (Session::has('user'))
          <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
          @else
          <a href="/login" class="btn btn-success btn-sm">Login</a>
          <a href="/register" class="btn btn-info btn-sm">Register</a>
          @endif
         
        </div>
      </div>
    </div>
  </nav>

  <script>
    $( function() {
      var availableTags = [
   
      ];

      $.ajax({
        url : "/product_list",
        method: "get",
        success:function(data){
          console.log(data);
          startautoComplete(data)
        }
      })

      function startautoComplete(availableTags){
        $( "#search" ).autocomplete({
        source: availableTags
      });
      }
    } );
    </script>