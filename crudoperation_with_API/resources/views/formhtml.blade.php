<html>
    <head>
        <title>@yield("title")</title>
    </head>
    <body>
    @section("body")
    @show
    </body>
</html>
@if($errors->any())
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
@endif
@if (session()->has("message"))
    {{session()->get("message")}}

@endif
