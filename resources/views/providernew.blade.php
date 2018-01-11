@extends('app')

@section('content')
    <div class="panel-body">

        <!-- New Task Form -->
        <form action="{{ url('admin/createnewprovider')}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
            <div class="form-group">
                <label for="providername" class="col-sm-3 control-label">Provider Name</label>

                <div class="col-sm-6">
                    <input type="text" name="providername" id="providername" class="form-control" value="{{ old('providername') }}">
                </div>
                <br>
                <br>
                <label for="description" class="col-sm-3 control-label">Provider Description</label>
                <div class="col-sm-6">
                    <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add Provider
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection