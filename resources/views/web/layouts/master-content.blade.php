<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.layouts.head')
    
</head>
<body>

  @include('web.layouts.header')


     @yield('content')






  @include('web.layouts.footer')

</body>

@include('web.layouts.script')

</html>