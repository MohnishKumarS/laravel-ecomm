<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecomm Project</title>
    {{-- ------ links -------------- --}}
    @include('layout.csslinks')
</head>
<body>
      {{-- ---------- header ------------- --}}
       {{View::make('layout.header')}}
      
    {{-- ------------ content ------------ --}}
    @yield('content')



       {{-- ---------- Footer ------------- --}}
       @include('layout.footer')
</body>
</html>