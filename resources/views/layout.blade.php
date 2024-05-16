<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
<link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <script src="{{asset('/js/jq.js')}}"></script>
    <script src="{{asset('/js/main.js')}}"></script>
</head>
<body>

@include('menu')
<div>
    @yield('content')
</div>

</body>
</html>
