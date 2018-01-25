@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Pulta Product List</h3>
                            </div>

                        </div>
                    </div>

                    <br>
                    <div class="panel-body">
                        <form action="{{ url('addtransaction')}}" method="GET" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nomor_hp" class="col-sm-3 control-label">Phone Number</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" value="{{ old('nomor_hp') }}">
                                    <input type="hidden" name="product_code" id="product_code">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <input class="tipe" type="radio" name="tipe" id="tipe" value="1" checked="checked">Pulsa &ensp;
                                    <input class="tipe" type="radio" name="tipe" id="tipe" value="2">Data &ensp;&ensp;
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa"></i>Buy
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-default panel-table">
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                        <tr>
                            <th><em class="fa fa-cog"></em></th>
                            <th>Product's Code</th>
                            <th>Product's Name</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody id="table_products">

                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var obj = [];

        function getProduct(nomorHp, tipe) {
            $.ajax({
                url: "/product",
                data: {
                    nomor_hp : nomorHp,
                    tipe : tipe
                },
                success: function( result ) {
                    populateProducts(result);
                }
            });
        }

        $('.tipe').click(function(){
            if ($(this).is(':checked')) {
                var nomorHp = $('#nomor_hp').val();
                var tipe = $(this).val();
                getProduct(nomorHp, tipe);
            }
        });

        $('#nomor_hp').on('keyup', function(){
            var nomorHp = $(this).val();
            var tipe = $('input[name=tipe]:checked').val();
            getProduct(nomorHp, tipe);
        });


        function saveProductCode(code) {
            const productCodeInput = $('#product_code');
            productCodeInput.val(code);
            alert('Product Ditambahkan');
        }

        function populateProducts(data) {
            const dataArray = JSON.parse(data);
            console.log(JSON.stringify(dataArray, 0, 4));

            const tableElement = $('#table_products');
            tableElement.find('tr').remove();

            dataArray.forEach(function(row) {
                const code = row.product_code;
                const name = row.product_name;
                const provider_id = row.provider_id;
                const price = row.price;
                const tipe = row.tipe;

                const tdcog =
                    "<td align=\"center\">" +
                    "<form action=\"{{ url('addtransaction') }}\" method=\"GET\">" +
                        "<button type=\"submit\" class=\"btn btn-default\">" +
                            "<a><em class=\"fa fa-plus\"></em></a>" +
                        "</button>" +
                    "</form>"+

                "</td>";
                const tdAdd = "<td align=\"center\">" +
                    "<button onclick=\"saveProductCode('"+code+"')\" class=\"btn btn-default\">" +
                    "<a><em class=\"fa fa-plus\"></em></a>" +
                    "</button>" +

                    "</td>";
                const tdCode = "<td>" + code + "</td>";
                const tdName = "<td>" + name + "</td>";
                const tdPrice = "<td>" + price + "</td>";

                const finalAppend = "<tr>"+ tdAdd + tdCode+ tdName + tdPrice + "</tr>";
                tableElement.append(finalAppend);
            });
        }

    </script>
@endsection


