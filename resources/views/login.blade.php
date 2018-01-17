@extends('app')

@section('content')

    <div class="panel-body">
        <h1 align = "center">Login Panel</h1> <br>
        <form id = "login" action="/admin/login" method="post" name="Login_Form" class="form-horizontal">
            {{csrf_field()}}
            <div class = "form-group">
                <label for="username" class="col-sm-3 control-label">Username</label>

                <div class="col-sm-6">
                    <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
                </div>
                <br>
                <br>
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button  type="submit" class="btn btn-default">
                        Login
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
