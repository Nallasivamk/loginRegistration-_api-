@extends('adminlte::page')
@section('title', 'Users | Lara Admin')
@section('content_header')
    <h1>Users</h1>
@stop
@section('content')

       <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" value={{$users->name}} name="name" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Email">Email:</label>
              <input type="text" class="form-control" name="email" value={{$users->email}} min =8 required >
               @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
          </div>
       <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:10px">
            <button type="submit" class="btn btn-warning">
            	<a  href="{{ url('user') }}">Back</a></button>
            	<button type="submit" class="btn btn-danger">
            	<a  href="{{ url('user/delete/' . $users->id) }}">Delete</a></button>
          </div>
        </div>
    
@stop


@section('auth_footer')
    <p class="my-0">
        <a href="{{ @$login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop