@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Pulta Admin Product Panel</h3>
                            </div>

                            {{--add--}}
                            <div class="col col-xs-6 text-right">
                                <a href = "/admin/product/new">
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
                            <th>Product's Code</th>
                            <th>Product's Name</th>
                            <th>Provider</th>
                            <th>Price</th>
                            <th>Tipe</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td align="center">
                                    <form action="{{'/admin/product/edit/'.$product->product_code}}" method="GET">
                                        <button type="submit" class="btn btn-default">
                                            <a><em class="fa fa-pencil"></em></a>
                                        </button>
                                    </form>
                                    <form action="{{ url('admin/product/delete/'.$product->product_code) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">
                                            <a><em class="fa fa-trash"></em></a>
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->provider->provider_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td><?php
                                if ($product->tipe == 1){
                                    echo "Pulsa";
                                } else {
                                    echo "Data";
                                }
                                 ?>
                                 </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>
@endsection