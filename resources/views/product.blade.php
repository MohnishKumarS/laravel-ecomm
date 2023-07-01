@extends('master')

@section('content')
<style>
    .carousel-caption{
        background-color: rgba(207, 203, 203, 0.404);
        left: 30% !important;
    }
</style>
  <section class="">
    <div id="carouselExampleCaptions" class="carousel slide  bg-danger bg-opacity-75" data-bs-ride="carousel">
     
        <div class="carousel-inner">

            @foreach ($data as $val)
                
          <div class="carousel-item {{$val->id == 1 ? "active" : ''}}"  data-bs-interval="12000">
            <img src="/image/product/{{$val->gallery}}" class="d-block"  alt="..." style="height: 300px;width:300px">
            <div class="carousel-caption d-none d-md-block shadow">
              <h5>{{$val->p_name}}</h5>
              <p>{{$val->desc}}</p>
            </div>
          </div>

            @endforeach

         

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </section>

  <section class="mt-5">
      <div class="container">
          <h3 class="text-primary">Tending Products 🎉</h3>

          <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 bg-light py-5 shadow ">
             @foreach ($data as $val)
             <div class="col border">
                <div class="text-center">
                    <a href="product/{{$val->id}}" class="" title="{{$val->category}}">
                        <img src="/image/product/{{$val->gallery}}" alt=""  class="object-fit-contain img-fluid" style="height: 200px">
                    <div class="mt-2">
                        <p>{{$val->p_name}}</p>
                    </div>
                    </a>
                </div>
            </div>
             @endforeach
          </div>
      </div>
  </section>

@endsection