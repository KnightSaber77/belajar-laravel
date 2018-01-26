@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default panelx-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Pulta Admin Payment Panel - Payment {{ $payment->payment_id }}</h3>
                            </div>

                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                            <tr>
                                <th>Phone Number</th>
                                <th>Product Code</th>
                                <th>Status</th>
                                <th>Price</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td class="hidden-xs">{{$transaction->nomor_hp}}</td>
                                    <td>{{ $transaction->product_name }}</td>
                                    <td>{{ $transaction->getStatusName() }}</td>
                                    <td>{{ $transaction->price }}</td>
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