@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <h3 class="panel-title">Pulta Admin Provider Panel</h3>
                        </div>

                            <div class="col col-xs-6 text-right">
                                <a href = "/admin/provider/new">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-plus"></i>Add Provider
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
                            <th>Provider's Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($providers as $provider)
                            <tr>
                                <td align="center">
                                    <form action="{{'/admin/provider/edit/'.$provider->id}}" method=""POST>
                                        <button type="submit" class="btn btn-default">
                                            <a><em class="fa fa-pencil"></em></a>
                                        </button>
                                    </form>
                                    <form action="{{ url('admin/provider/delete/'.$provider->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">
                                            <a><em class="fa fa-trash"></em></a>
                                        </button>
                                    </form>
                                    {{--ini yang mo buat edit sama delete ntar--}}
                                </td>

                                <td class="hidden-xs">{{$provider->id}}</td>
                                <td>{{ $provider->provider_name}}</td>
                                <td>{{ $provider->description}}</td>
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