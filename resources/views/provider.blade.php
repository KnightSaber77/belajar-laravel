@extends('app')

@section('content')
    <div class="container">
        <p align = "center">
            <div class="panel panel-default">

                <form id="create" action="/admin/provider/new" method="VIEW" class="form-horizontal">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-1">
                                <button type="submit" action="/admin/provider/new" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Provider
                                </button>
                            </div>
                        </div>
                        <br>  <hr>


                    </div>
                </form>

            </div>
        </p>
    </div>
@endsection
