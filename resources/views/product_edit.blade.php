@extends('app')

@section('content')
    <div class="panel-body">
        <h1 align = "center">Edit Product</h1> <br>
        <!-- New Task Form -->
        <form action="{{ url('admin/product/editproduct/'.$product->product_name)}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
            <div class="form-group">
                <label for="product_name" class="col-sm-3 control-label">Product Name</label>

                <div class="col-sm-6">
                    <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $product->product_name }}">
                </div>

                <br>
                <br>
                <label for="price" class="col-sm-3 control-label">Price</label>
                <div class="col-sm-6">
                    <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}">
                </div>


                <br>
                <br>
                <label for="provider_id" class="col-sm-3 control-label">Provider</label>
                <div class="col-sm-6">
                    <select name="provider_id" id="provider_id" class="form-control form-control-lg" value="{{ $product->provider_id }}">
                        @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}"> {{ $provider->provider_name }} </option>
                        @endforeach
                    </select>

                </div>

                <br>
                <br>
                <label for="tipe" class="col-sm-3 control-label">Type</label>
                <div class="col-sm-6">

                    <select name="tipe" id="tipe" class="form-control form-control-lg" value="{{ $product->tipe }}">
                        <option value="1">Pulsa</option>
                        <option value="2">Data</option>
                    </select>
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Edit Product
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection