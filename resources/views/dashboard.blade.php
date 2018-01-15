@extends('app')

@section('content');

    <div class="container">
        <form action="{{ url('admin/logout') }}" method="GET" class="form-horizontal">
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>
@endsection
