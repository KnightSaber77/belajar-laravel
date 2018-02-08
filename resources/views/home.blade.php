@extends('apphome')

@section('content')
    <section class="section-white">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="banner_pulta/pulta.png" alt="...">
                                <div class="carousel-caption">
                                    <h2>Welcome To Pulta</h2>
                                </div>
                            </div>
                            @foreach ($banners as $banner)
                                <div class="item">
                                    <img src={{ $banner->path }} alt="...">
                                    <div class="carousel-caption">
                                        <h2>{{ $banner->name }}</h2>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </section>

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
                        <form id="formadd" action="{{ url('addtocart')}}" method="GET" class="form-horizontal">
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
                                </div>
                            </div>
                        </form>
                        <a href="cart">
                            <button  class="btn btn-success btn-block">
                                Check Cart
                            </button>
                        </a>
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
            document.getElementById("formadd").submit();
            alert('Produk Ditambahkan');
        }

        function populateProducts(data) {
            const dataArray = JSON.parse(data);
            //console.log(JSON.stringify(dataArray, 0, 4));

            const tableElement = $('#table_products');
            tableElement.find('tr').remove();

            dataArray.forEach(function(row) {
                const code = row.product_code;
                const name = row.product_name;
                const provider_id = row.provider_id;
                const price = row.price;
                const tipe = row.tipe;


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


