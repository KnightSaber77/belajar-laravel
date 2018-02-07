@extends('app')

@section('content')
    <div class="panel-body">
        <h1 align = "center">Add Provider</h1> <br>
        <!-- New Task Form -->
        <form action="{{ url('admin/provider/new')}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
            <div class="form-group">
                <label for="provider_name" class="col-sm-3 control-label">Provider Name</label>

                <div class="col-sm-6">
                    <input type="text" name="provider_name" id="provider_name" class="form-control" value="{{ old('provider_name') }}">
                </div>

                <br>
                <br>
                <label for="description" class="col-sm-3 control-label">Provider Description</label>
                <div class="col-sm-6">
                    <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
                </div>

                <br>
                <br>
                <label for="prefixes" class="col-sm-3 control-label">Provider Prefixes</label>
                <div class="col-sm-6">
                    <input type="text" name="prefixes" id="prefixes" class="form-control" value="{{ old('prefixes') }}">
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