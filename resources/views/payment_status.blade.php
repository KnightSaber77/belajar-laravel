@extends('apphome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 align="center" class="panel-title">Status Transaksi Anda - {{ $payment->payment_id }}</h3>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="panel panel-default ">
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                            <tr>
                                <th>Product's Code</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <th>{{ $transaction->product_name }}</th>
                                <th>{{ $transaction->price }}</th>
                                <th>{{ $transaction->getStatusName() }}</th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection