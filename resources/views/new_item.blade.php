@extends('app')

@section('content')
    <div class="panel-body">
        <div class="panel-body">
            <table class="table table-striped table-bordered table-list">
                <thead>
                <tr>
                    <th><em class="fa fa-cog"></em></th>
                    <th>Product's Name</th>
                    <th>Price</th>
                    <th>Tipe</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($productArray as $product)
                    <tr>
                        <td align="center">
                        </td>
                        <td>{{ $product->product_name }}</td>
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

@endsection