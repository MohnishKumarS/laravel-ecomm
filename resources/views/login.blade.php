@extends('master')

@section('content')

<div class="login">
    <div class="row">
        <div class="col-lg-5 col-md-7 col-sm-8 m-auto my-5">
            <div class="bg-light py-5 px-4 border rounded-5 shadow">
                <h3 class="text-secondary text-center">LOGIN</h3>
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>

                @endif
             
                <form action="/login" method="post">
                    @csrf
                <div class="form-group mb-3 mt-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" name="name" value="{{Request::old('name')}}">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password">
                </div>
                <div class="form-group my-4">
                    <button class="btn btn-success w-100 rounded-pill" type="submit">Login</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection