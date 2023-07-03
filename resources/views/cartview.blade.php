@extends('master')

@section('content')

<div class="cart">
    <h2 class="m-3">Shopping Cart</h2>
    <hr>

   
    @if (count($cart) == 0)
            <div class="container" style="padding: 50px 0">
                <div class="alert alert-warning text-center fs-3 my-5" role="alert">
                    Your Shopping Cart is empty.
                  </div>
            </div>

    @else
            {{-- -------------- carts in some item ------- --}}
            <div class="row px-3">
                <div class="col-lg-8">
                 @foreach ($cart as $val)
                 <div class="row border-bottom py-2">
                   
                     <div class="col-lg-2">
                         <img src="/image/product/{{$val->gallery}}" alt="" class="img-fluid" >
                     </div>
             
                     <div class="col-lg-6">
                         <h5 class="mt-3">{{$val->desc}}</h5>
                         <div class="mt-3"><small><span class="btn btn-success btn-sm">4.7<i class="bi bi-star-fill"></i></span><span class="text-secondary fw-bold ms-2">11,462 Ratings & 703 Reviews</span></small></div>
                         <h4 class="mt-3">₹ {{$val->price}}  <span class="text-secondary fs-4 ms-3"><s>₹{{$val->price + 5000}}</s></span> <span class="text-success ms-2 fs-5">(11% off)</span></h4>
                         <div class="mt-3"><span class="bg-danger text-white p-1 px-2">Limited time deal</span></div>
                         <div class="h6 mt-3"><p>Category : <span>{{$val->category}}</span></p></div>
                     </div>
             
                     <div class="col-lg-2">
                         <div class="d-flex align-items-center h-100">
                             <a href="/removecart/{{$val->cart_id}}" class="btn btn-warning" >Remove cart</a>
                         </div>
                     </div>
                 
                 </div>
                 @endforeach
                </div>
         
                <div class="col-lg-4">
                 <div class="card" >
                     <div class="card-body">
                       <h5 class="card-title text-body-secondary">Price Details</h5>
                       <hr>
                         <div class="d-flex justify-content-between">
                             <p class="card-text">Price</p>
                             <p class="card-text fw-bold fs-5">₹ {{$total}}</p>
                         </div>
                         <div class="d-flex justify-content-between">
                             <p class="card-text">Delivery Charges</p>
                             <p class="card-text fw-bold fs-5">₹40</p>
                         </div>
                         <hr>
                         <div class="d-flex justify-content-between">
                             <h5 class="card-text">Total Amount</h5>
                             <h5 class="card-text fw-bold">₹ {{$total + 40}}</h5>
                         </div>
                         <hr>
                         {{-- ------------ place order -------------- --}}
                        <form action="/placeorder" method="post">
                         @csrf
                         <div>
                             <input type="text" name="location" id="" class="form-control" placeholder="Enter a city name">
                         </div>
                         <div class="form-check mt-2">
                             <label for="">Payment method</label> <br>
                             <input type="radio" value="Cash" name="payment" class=""><span class="ms-2">COD</span> 
                             <input type="radio" value="Debit card" name="payment" class="ms-3"><span class="ms-2">Debit card</span>
                             <input type="radio" value="UPI" name="payment" class="ms-3"><span class="ms-2">UPI</span>
                           </div>
                        
                           
                         <div class="mt-3">
                             <button class="btn btn-success opacity-75 w-100">Proceed to Buy</button>
                         </div>
                        </form>
                     </div>
                   </div>
                </div>
            </div>
        
    @endif
  
</div>

@endsection