@extends('adminlte::page')
@section('title', 'Users | Lara Admin')
@section('content_header')
    <h1>Users</h1>
@stop
@section('content')
      <form action="{{url('/user/'.$users->id)}}" method="POST" id="form">
        @method('PUT')
      @csrf
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
              <input type="text" class="form-control" name="email" value={{$users->email}} required >
               @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="password">Password :</label>
              <input type="password" class="form-control" name="password" >
               @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="c_password">Conform Password :</label>
              <input type="password" class="form-control" name="c_password" >
               @if ($errors->has('c_password'))
                    <span class="text-danger">{{ $errors->first('c_password') }}</span>
                @endif
            </div>
          </div>
           <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:10px">
            <button type="submit" class="btn btn-success">Submit</button>
             <button type="submit" class="btn btn-danger">
              <a  href="{{ url('user') }}">Back</a></button>
          </div>
        </div>
       </form>
    
@stop
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () { 
    $('#form').validate({ 
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                required: true
                
            },
            c_password: {
                required: true,
                required: true
                
            },
        },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
    });
});
</script> 

@section('auth_footer')
    <p class="my-0">
        <a href="{{ @$login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop