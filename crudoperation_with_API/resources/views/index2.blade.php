@extends ("formhtml")
@section ("title","Create Form")
@section ("body") 
<html>

<h1 style="text-align:center;">FORM</h1>
        <form method="post" action="/crud/@yield('userid')">
        {{csrf_field()}}
        @section("editmethod")
        @show
        <p>
            <label>Name:</label>
            <input type="text" name="name" value="@yield('username')">
        </p>
        <p>
            <label>E-Mail:</label>
            <input type="text" name="email" value="@yield('useremail')">
        </p>        
        <p>
            <input type="submit" value="submit">
        </p>
        </form>
        <a href="{{ url('crud')}}">Back</a>
</html>
@endsection