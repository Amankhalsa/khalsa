@extends('admin.admin_master')
@section('title', 'Profile')

@section('admin')

<div class="card-body">

<div class="card-header bg-warning text-white font-weight-bold">
<h2>User Profile Update </h2>
</div>


<form class="form-pill" action="{{route('update_profile')}}" method="post"> 
@csrf
    <div class="form-group">
        <label for="exampleFormControlInput3">User name : </label>
        <input  class="form-control" id="name" type="text" name="name" 
     value="{{ $user['name']}}">
</div>
         <div class="form-group">
        <label for="exampleFormControlInput3">User email : </label>
        <input  class="form-control" id="email" type="email" name="email" 
       value="{{ $user['email']}}" />
</div>
<button class="btn btn-danger" tyle="submit"> Update </button>
</form>
</div>

@endsection