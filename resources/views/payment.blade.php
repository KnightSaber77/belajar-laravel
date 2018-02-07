@extends('apphome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h2 align="center" class="panel-title">Your Cart Now</h2>
                            </div>

                        </div>
                    </div>
                </div>

                <?php
                    $totalPrice = 0;
                ?>
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:20%">Price</th>
                        <th></th>
                        <th style="width:20%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                                    <div class="col-sm-10">
                                        <h4 class="nomargin">Product</h4>
                                        <p>{{ $cart->product_code  }} untuk nomor HP {{ $cart->nomor_hp }}</p>
                                    </div>
                                </div>
                            </td>

                            <td data-th="Price">{{ $cart->product->price }}</td>
                            <td></td>
                            <td data-th="Subtotal" class="text-center">{{ $cart->product->price  }}</td>
                            <?php
                                $totalPrice += $cart->product->price;
                            ?>
                            <td class="actions" data-th="">
                                <form action="{{ url('cart/delete/'.$cart->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Total {{ $totalPrice }}</strong></td>
                    </tr>
                    <tr>
                        <td><a href="/" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total {{ $totalPrice }}</strong></td>
                        <td>
                            <form action="{{url('checkout')}}" method="get">
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