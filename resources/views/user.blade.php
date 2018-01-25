@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Pulta Admin User Panel</h3>
                            </div>

                            <div class="col col-xs-6 text-right">
                                <a href = "/admin/user/new">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-plus"></i>Add Product
                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                            <tr>
                                <th><em class="fa fa-cog"></em></th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Description</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td align="center">
                                        <form action="{{'/admin/user/edit/'.$admin->username}}" method="GET">
                                            <button type="submit" class="btn btn-default">
                                                <a><em class="fa fa-pencil"></em></a>
                                            </button>
                                        </form>
                                        <form action="{{ url('admin/user/delete/'.$admin->username) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">
                                                <a><em class="fa fa-trash"></em></a>
                                            </button>
                                        </form>
                                        {{--ini yang mo buat edit sama delete ntar--}}
                                    </td>

                                    <td>{{ $admin->username}}</td>
                                    <td>{{ $admin->password }}</td>
                                    <td>{{ $admin->description }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="panel-footer">
                        <br>
                        <p align = "center"><b>Pulta Provider</b></p>
                    </div>
                </div>

            </div></div></div>
@endsection