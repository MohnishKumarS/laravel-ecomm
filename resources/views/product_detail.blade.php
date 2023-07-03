@extends('master')

@section('content')

  <div class="product-detail">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 col-md-12">
                  <div>
                      <img src="/image/product/{{$pro->gallery}}" alt="" class="img-fluid">
                  </div>
              </div>
              <div class="col-lg-6 col-md-12">
                  <div>
                      <div  onclick="window.history.go(-1); return false;"><small class="bg-dark text-white p-1 px-3 rounded-2"><i class="bi bi-backspace-fill me-2 "></i>Back</small></div>
                      <h3 class="mt-3">{{$pro->desc}}</h3>
                      <div class="mt-3"><small><span class="btn btn-success btn-sm">4.7<i class="bi bi-star-fill"></i></span><span class="text-secondary fw-bold ms-2">11,462 Ratings & 703 Reviews</span></small></div>
                      <h1 class="mt-3">₹ {{$pro->price}}  <span class="text-secondary fs-4 ms-3"><s>₹{{$pro->price + 5000}}</s></span> <span class="text-success ms-2 fs-5">(11% off)</span></h1>
                      <div class="mt-3"><span class="bg-danger text-white p-1 px-2">Limited time deal</span></div>
                      <div class="h6 mt-3"><p>Category : <span>{{$pro->category}}</span></p></div>
                      <div class="mt-5">
                          @if (Session::has('success'))
                              <div class="alert alert-success">
                                <i class="bi bi-bag-check-fill me-2"></i> {{session('success')}}
                              </div>
                          @endif
                          <div class="row">
                              <div class="col">
                                  <form action="/add-cart" method="post">
                                    @csrf
                                      <input type="hidden" name="product_id" value="{{$pro['id']}}">
                                    <button class="btn btn-warning w-100" ><i class="bi bi-cart-fill me-2"></i>Add to Cart</button>
                                  </form>
                              </div>
                              <div class="col">
                                <a class="btn btn-success w-100"><i class="bi bi-lightning-charge-fill me-2"></i>Buy Now</a>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection