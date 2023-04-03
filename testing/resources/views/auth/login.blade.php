@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
            
            <div class="panel-heading" style="background-color: #0f1f31; color:#cccccc;">
                <center><h1 class="panel-title">Login</h1></center>
            </div>

            
            <div class="panel-body">
                <form method="POST" action="{{route('login')}}">

                    {{csrf_field()}}

                                   
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="Ingrese su correo ">
                            {!! $errors->first('email', '<span class="help-block">:message </span>') !!}
                    </div>
                    

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}" >
                        <label for="password">Contrasena  </label>
                            <input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña">
                            {!! $errors->first('password', '<span class="help-block">:message </span>') !!}
                    </div>

                    <button class="btn btn-primary btn-block">Ingreso</button>
                    <br>
                    <a href="{{route('password.request')}}">Olvido Su Contraseña?</a>
                </form>


            </div>

            </div>
        </div>
    </div>


@endsection()