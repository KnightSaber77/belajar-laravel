@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Pulta Admin Payment Panel</h3>
                            </div>

                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                            <tr>
                                <th><em class="fa fa-cog"></em></th>
                                <th>Payment ID</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td align="center">
                                        <form action="{{'/admin/payment/'.$payment->payment_id}}" method="GET">
                                            <button type="submit" class="btn btn-default">
                                                <a><em class="fa fa-search"></em></a>
                                            </button>
                                        </form>
                                        {{--ini yang mo buat edit sama delete ntar--}}
                                    </td>

                                    <td class="hidden-xs">{{$payment->payment_id}}</td>
                                    <td>{{ $payment->created_at->format('d M Y') }}</td>
                                    <td>{{ $payment->getStatusName() }}</td>
                                    <td>{{ $payment->total }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="panel-footer">
                        <br>
                        <p align = "center"><b>Pulta Payment</b></p>
                    </div>
                </div>

            </div></div></div>
@endsection