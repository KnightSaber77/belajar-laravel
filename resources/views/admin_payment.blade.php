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
                        <h3>Filter</h3>
                        <form action="/admin/payment" method="get">
                            {{csrf_field()}}
                            <label for="start_date" class="col-sm-3 control-label">Start Date</label>
                            <div class="col-sm-6">
                                <input type="date" name="start_date" id="start_date" class="form-control-lg" required="required"
                                       value="<?php
                                       if (!empty(old('start_date'))) {
                                            echo old('start_date');
                                       } else {
                                           echo Carbon\Carbon::now()->toDateString('Y/m/d');
                                       }
                                       ?>">
                            </div>

                            <br>
                            <br>
                            <label for="end_date" class="col-sm-3 control-label">End Date</label>
                            <div class="col-sm-6">
                                <input type="date" name="end_date" id="end_date" class="form-control-lg" required="required"
                                       value="<?php
                                       if (!empty(old('end_date'))) {
                                           echo old('end_date');
                                       } else {
                                           echo Carbon\Carbon::now()->toDateString('Y/m/d');
                                       }
                                       ?>">
                            </div>

                            <br>
                            <br>
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-6">
                                <select name="status" id="status" class="form-control-lg">
                                    <option <?php if (old('status') == 0) echo "selected='selected'"?> value="0">All</option>
                                    <option <?php if (old('status') == 1) echo "selected='selected'"?> value="1">Paid</option>
                                    <option <?php if (old('status') == 2) echo "selected='selected'"?> value="2">Pending</option>
                                    <option <?php if (old('status') == 3) echo "selected='selected'"?> value="3">Failed</option>
                                </select>
                            </div>

                            <br>
                            <br>
                            <label for="payment_id" class="col-sm-3 control-label">Payment ID</label>
                            <div class="col-sm-6">
                                <input type="text" name="payment_id" id="payment_id" class="form-control" value="{{ old('payment_id') }}">
                            </div>

                            <br>
                            <br>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-search"></i>
                                        Filter Payments
                                    </button>
                                </div>
                            </div>

                            <br>
                        </form>
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