@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h2 align="center" class="panel-title">Transaction Detail - {{ $payment_id }}</h2>
                            </div>

                        </div>
                    </div>
                </div>

                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:25%">Price</th>
                        <th></th>
                        <th style="width:25%" class="text-center">Subtotal</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">Product 1</h4>
                                    <p>{{ $product->product_code }} untuk nomor HP {{ $nomor_hp }}</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{ $product->price }}</td>
                        <td></td>
                        <td data-th="Subtotal" class="text-center">{{ $product->price }}</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Total {{ $product->price }}</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total {{ $product->price }}</strong></td>
                        <td>
                            <form action="{{url('checkout')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_code" id=product_code" value="{{ $product->product_code }}">
                                <input type="hidden" name="nomor_hp" id="nomor_hp" value="{{ $nomor_hp }}">
                                <input type="hidden" name="payment_id" id="payment_id" value="{{ $payment_id }}">
                                <button type="submit" class="btn btn-success btn-block"> Checkout <i class="fa fa-angle-right"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection