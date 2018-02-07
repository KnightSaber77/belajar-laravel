@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Pulta Admin Banner Panel</h3>
                            </div>

                            <div class="col col-xs-6 text-right">
                                <a href = "/admin/banner/new">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-plus"></i>Add Banner
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
                                <th class="hidden-xs">ID</th>
                                <th>Banner's Name</th>
                                <th>Path</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td align="center">
                                        <form action="{{ url('admin/banner/delete/'.$banner->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">
                                                <a><em class="fa fa-trash"></em></a>
                                            </button>
                                        </form>
                                        {{--ini yang mo buat edit sama delete ntar--}}
                                    </td>

                                    <td class="hidden-xs">{{$banner->id}}</td>
                                    <td>{{ $banner->name}}</td>
                                    <td><a href="{{ $banner->path }}"><img src="{{ $banner->path }}"></a></td>
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