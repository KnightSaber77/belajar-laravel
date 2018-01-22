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
                        <form action="{{ url('product')}}" method="GET" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nomor_hp" class="col-sm-3 control-label">Phone Number</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" value="{{ old('nomor_hp') }}">
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
        $('#nomor_hp').on('keyup', function(){
            var nomorHp = $(this).val();
            $.ajax({
                url: "/product",
                data: {
                    nomor_hp : nomorHp
                },
                success: function( result ) {
                    populateProducts(result);
                }
            });
        });

        function populateProducts(data) {
            const dataArray = JSON.parse(data);
            console.log(JSON.stringify(dataArray, 0, 4));

            const tableElement = $('#table_products');
            tableElement.find('tr').remove();

            dataArray.forEach(function(row) {
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
                const tdName = "<td>" + name + "</td>";
                const tdPrice = "<td>" + price + "</td>";

                const finalAppend = "<tr>"+ tdcog + tdName + tdPrice + "</tr>";
                tableElement.append(finalAppend);
            });
        }

    </script>
@endsection


