@extends('master')

@section('content')

<div class="myorder">
    <div class="container">
        <h3>Your Orders</h3>
        {{-- {{$order}} --}}
        @forelse ($order as $val)
        <div class="card">
            <h5 class="card-header">{{$val->status}} on <span class="fs-6 ms-3 text-muted fw-normal">({{$val->updated_at}})</span></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-md-4">
                        <img src="/image/product/{{$val->gallery}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <p class=""><a href="/product/{{$val->product_id}}">{{$val->desc}}</a></p>
                        <p>Price : ₹{{$val->price}}</p>
                        <p>Category : {{$val->category}}</p>
                        <p>Payment method : {{$val->payment_method}}</p>
                    </div>
                    <div class="col-lg-5 col-md-12 d-flex  justify-content-center align-items-center">
                        <div class="text-center">
                            <button class="btn btn-warning w-75">View Return / Refund status</button>
                            <button class="btn btn-light border w-75 mt-3">Write a product review</button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        @empty
        <div class="container" style="padding: 50px 0">
            <div class="alert alert-warning text-center fs-3 my-5" role="alert">
                You have not placed any orders...
              </div>
        </div>
        @endforelse


      
    </div>
</div>

@endsection