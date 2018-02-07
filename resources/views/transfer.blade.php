@extends('apphome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h2 align="center" class="panel-title"> Transaksi Sukses - Kode {{ $payment->payment_id }}</h2>
                            </div>

                        </div>
                    </div>

                    <div class="panel-body">
                        <h2 align="center">Transaksi Sukses</h2>
                        <h3 align="center">
                            Silahkan lakukan pembayaran ke rekening <br>
                            BCA 888818881811
                        </h3>
                    </div>
                    <br>

                    <h3 align="center">Lacak status pesanan anda di<a href = "/lacak"> sini </a></h3>
                </div>

            </div>
        </div>
    </div>

@endsection