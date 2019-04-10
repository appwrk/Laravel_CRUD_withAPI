@extends ("formhtml")
@section ("title","Show Form")
@section ("body") 
<html>
<body>

    <table>
    <thead>
    
      <tr>
        <th>Sr.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1; ?>
    @foreach ( $users as $user)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><a href="{{url('crud/'.$user->id.'/edit')}}">Edit</a></td>
        <td>
        <form action="/crud/{{$user->id}}" method="post">
        {{csrf_field()}}
        {{method_field("delete")}}
        <button type = "submit" >Delete</button>
        </form>
        </td>
      </tr>
      @endforeach      
    </tbody>
  </table>
  <a href="{{ url('crud/create')}}">Register</a>
    </body>
</html>
@endsection