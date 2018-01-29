@extends('apphome')

@section('content')
    <div class="panel-body">
        <h1 align = "center">Lacak Transaksi</h1> <br>
        <!-- New Task Form -->
        <form action="{{ url('status')}}" method="get" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
            <div class="form-group">
                <label for="payment_id" class="col-sm-3 control-label">Payment ID</label>

                <div class="col-sm-6">
                    <input type="text" name="payment_id" id="payment_id" class="form-control" value="{{ old('payment_id') }}">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-search"></i>Lacak
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection