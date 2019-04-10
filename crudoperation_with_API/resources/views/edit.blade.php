@extends ("index2")
@section('userid',$user->id)
@section('username',$user->name)
@section('useremail',$user->email)
@section('editmethod')
{{method_field('PUT')}}
@endsection