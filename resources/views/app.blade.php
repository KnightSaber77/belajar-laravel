<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pulta</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <script>
        $(window).resize(function() {
            var path = $(this);
            var contW = path.width();
            if(contW >= 751){
                document.getElementsByClassName("sidebar-toggle")[0].style.left="200px";
            }else{
                document.getElementsByClassName("sidebar-toggle")[0].style.left="-200px";
            }
        });
        $(document).ready(function() {
            $('.dropdown').on('show.bs.dropdown', function(e){
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
            });
            $('.dropdown').on('hide.bs.dropdown', function(e){
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
            });
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                var elem = document.getElementById("sidebar-wrapper");
                left = window.getComputedStyle(elem,null).getPropertyValue("left");
                if(left == "200px"){
                    document.getElementsByClassName("sidebar-toggle")[0].style.left="-200px";
                }
                else if(left == "-200px"){
                    document.getElementsByClassName("sidebar-toggle")[0].style.left="200px";
                }
            });
        });
    </script>
    <style>
        img {
            max-width: 100%;
            max-height: 100%;
        }

        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .panel-table .panel-body{
            padding:0;
        }

        .panel-table .panel-body .table-bordered{
            border-style: none;
            margin:0;
        }

        .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type {
            text-align:center;
            width: 120px;
        }

        .panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
        .panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
            border-right: 0px;
        }

        .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
        .panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
            border-left: 0px;
        }

        .panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td{
            border-bottom: 0px;
        }

        .panel-table .panel-body .table-bordered > thead > tr:first-of-type > th{
            border-top: 0px;
        }

        .panel-table .panel-footer .pagination{
            margin:0;
        }

        /*
        used to vertically center elements, may need modification if you're not using default sizes.
        */
        .panel-table .panel-footer .col{
            line-height: 34px;
            height: 34px;
        }

        .panel-table .panel-heading .col h3{
            line-height: 30px;
            height: 30px;
        }

        .panel-table .panel-body .table-bordered > tbody > tr > td{
            line-height: 34px;
        }

        /**/

        .panelx-table .panel-footer .col{
            line-height: 34px;
            height: 34px;
        }

        .panelx-table .panel-heading .col h3{
            line-height: 30px;
            height: 30px;
        }

        .panelx-table .panel-body .table-bordered > tbody > tr > td{
            line-height: 34px;
        }

        .panelx-table .panel-body{
            padding:0;
        }

        .panelx-table .panel-body .table-bordered{
            border-style: none;
            margin:0;
        }


        .panelx-table .panel-body .table-bordered > thead > tr > th:last-of-type,
        .panelx-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
            border-right: 0px;
        }

        .panelx-table .panel-body .table-bordered > thead > tr > th:first-of-type,
        .panelx-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
            border-left: 0px;
        }

        .panelx-table .panel-body .table-bordered > tbody > tr:first-of-type > td{
            border-bottom: 0px;
        }

        .panelx-table .panel-body .table-bordered > thead > tr:first-of-type > th{
            border-top: 0px;
        }

        .panelx-table .panel-footer .pagination{
            margin:0;
        }

        /*
        used to vertically center elements, may need modification if you're not using default sizes.
        */
        .panelx-table .panel-footer .col{
            line-height: 34px;
            height: 34px;
        }

        .panelx-table .panel-heading .col h3{
            line-height: 30px;
            height: 30px;
        }

        .panelx-table .panel-body .table-bordered > tbody > tr > td{
            line-height: 34px;
        }

        #sidebar-wrapper {
            top: 0px;
            left: -200px;
            width: 200px;
            background-color: #5677fc;
            color: white;
            position: fixed;
            height: 100%;
            z-index: 1;
        }
        .sidebar-nav {
            position: absolute;
            top: 0;
            margin: 0;
            padding: 0;
            width: 250px;
            list-style: none;
        }
        .sidebar-nav li {
            text-indent: 20px;
            line-height: 50px;
        }
        .sidebar-nav li a {
            color: white;
            display: block;
            text-decoration: none;
        }
        .sidebar-nav li a:hover {
            background: rgba(255,255,255,0.25);
            color: white;
            text-decoration: none;
        }
        .sidebar-nav li a:active, .sidebar-nav li a:focus {
            text-decoration: none;
        }
        #sidebar-wrapper.sidebar-toggle {
            transition: all 0.3s ease-out;
            margin-left: -200px;
        }
        @media (min-width: 768px) {
            #sidebar-wrapper.sidebar-toggle {
                transition: 0s;
                left: 200px;
            }
        }

        #main_content {
            background-color: #FFFFFF;
            float: left;
            width: 85%;
            margin-left: 200px;
            margin-right: 10%;
            margin-bottom: 50px;
            box-shadow: 0px 0px 0px black;
            padding-top: 5;
            text-align: justify;
            z-index: 1;
            padding-left: 10px;
            padding-right: 10px;
            color: #262626;
            opacity: 0.98;
        }
    </style>
</head>
<body id="app-layout">
<nav id="wrapper" class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a id="menu-toggle" href="#" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="navbar-brand" href="home.xhtml">
                Pulta
            </a>
        </div>
        <div id="sidebar-wrapper" class="sidebar-toggle">
            <ul class="sidebar-nav">
                <li>
                    <a href="/admin/payment">Payments</a>
                </li>
                <li>
                    <a href="/admin/provider">Providers</a>
                </li>
                <li>
                    <a href="/admin/product">Products</a>
                </li>
                <li>
                    <a href="/admin/user">Users</a>
                </li>
                <li>
                    <a href="/admin/banner">Banners</a>
                </li>
                <li>

                        <form action="{{ url('admin/logout') }}" method="GET" class="form-horizontal">
                            <button class="btn btn-danger">Logout</button>
                        </form>

                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="main_content">
    @yield('content')
</div>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>