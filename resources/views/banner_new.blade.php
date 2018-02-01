@extends('app')

@section('content')
    <div class="panel-body">
        <h1 align="center">File Upload</h1> <br>
        <form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="description" class="col-sm-3 control-label">Banner Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                </div>

                <br>
                <br>
                <br>
                <label for="image" class="col-sm-3 control-label"> Image</label>
                <div class="col-sm-6">
                    <input type="file"  name="file" id="file">
                </div>

            </div>

            <br>
            <br>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add Banner
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection