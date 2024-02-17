<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | last Food Shop</title>
    <!-- Favicon-->
    <link rel="icon" href="\public\image\logo.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/views/public/panel/Admin-bsb/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap RTL Css -->
    <link href="/views/public/panel/Admin-bsb/plugins/bootstrap-rtl/css/bootstrap-rtl.min.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/views/public/panel/Admin-bsb/plugins/node-waves/waves.css" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="/views/public/panel/Admin-bsb/plugins/animate-css/animate.css" rel="stylesheet"/>

    <!-- Morris Chart Css-->
    <link href="/views/public/panel/Admin-bsb/plugins/morrisjs/morris.css" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="/views/public/panel/Admin-bsb/css/style.css" rel="stylesheet">

    <!-- Custorm RTL Css -->
    <link href="/views/public/panel/Admin-bsb/css/style-rtl.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="/views/public/panel/Admin-bsb/css/themes/all-themes.css" rel="stylesheet"/>
</head>
<style>

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 50%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    h1 {
        color: green;
    }

    .input {
        background-position: 10px 12px; /* Position the search icon */
        background-repeat: no-repeat; /* Do not repeat the icon image */
        width: 100%; /* Full-width */
        font-size: 16px; /* Increase font-size */
        padding: 12px 20px 12px 40px; /* Add some padding */
        border: 1px solid #ddd; /* Add a grey border */
        margin-bottom: 12px; /* Add some space below the input */
    }
</style>
<body class="theme-red" style="font-family: 'Rubik', sans-serif; ">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p style="font-family: 'Rubik', sans-serif; ">صبور باش!</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->


<section class="content" style="font-family: 'Rubik', sans-serif; ">
    <div class="container-fluid">
        <div class="block-header">
            <h2 style="font-family: 'Rubik', sans-serif; ">{{$lang['title']}}</h2>
        </div>

        <!-- Widgets -->
        <div class="col-xs-12 col-sm-10">
            <div class="card">
                <div class="body">
                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation">
                                <a id="list_of_products_id" href="#list_of_products"
                                   aria-controls="settings"
                                   role="tab" data-toggle="tab"
                                   style="font-family: 'Rubik', sans-serif; ">
                                    {{$lang['title2']}}
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in" id="list_of_products">
                                @if(isset($_SESSION['doc']))
                                    <div style="font-family: 'Rubik', sans-serif; "
                                         class="alert alert-success text-center">{{$_SESSION['doc']}}</div>
                                @endif
                                @unset($_SESSION['doc'])
                                <div class="search-icon">
                                    <input style="font-family: 'Rubik', sans-serif; " class="input" type="text" id="gfg"
                                           placeholder="جستوجو ">
                                </div>


                                <table id="myTable"
                                       class="table table-striped table-bordered dt-responsive nowrap"
                                       cellspacing="0" width="100%"
                                       style="font-family: 'Rubik', sans-serif; ">
                                    <thead>
                                    <tr>
                                        <th>{{$lang['name']}}</th>
                                        <th>{{$lang['description']}}</th>
                                        <th>{{$lang['price']}}</th>
                                        <th>{{$lang['image']}}</th>
                                        <th>{{$lang['seller']}}</th>
                                        <th>{{$lang['category']}}</th>
                                        <th>{{$lang['do']}}</th>

                                    </tr>
                                    </thead>
                                    <tbody id="geeks">
                                    <tr>
                                        @if(!empty($products))
                                            @foreach($products as $product)
                                                <td>{{$product->name}}</td>
                                                <td>{!!  $product->description!!}</td>
                                                <?php $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                                                $english = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
                                                $product->price = str_replace($english, $persian, $product->price); ?>
                                                <td>{{$product->price}}</td>
                                                <td><img style="width: 50px" src="/{{$product->image}}"></td>
                                                <td>@foreach($users as $user)
                                                        @if($user->id==$product->user_id)
                                                            {{$user->name}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($categories as $category)
                                                        @if($category->id==$product->category_id)
                                                            {{$category->name}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>

                                                    <a
                                                            href="/buyer/add-to-oder/{{$product->id}}"
                                                            class="btn btn-success">
                                                        افزودن به سبد خرید <span class="fa fa-trash"></span>
                                                    </a>
                                                </td>
                                    </tr>
                                    @endforeach
                                    @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script>
    // A $( document ).ready() block.
    $(document).ready(function () {
        tabName = '<?php echo $_GET['tab'] ?? null; ?>'
        $('#' + tabName).click();
    });
</script>
<script>
    $(document).ready(function () {
        $("#gfg").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#geeks tr").filter(function () {
                $(this).toggle($(this).text()
                    .toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<!-- Jquery Core Js -->
<script src="/views/public/panel/Admin-bsb/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="/views/public/panel/Admin-bsb/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->


<!-- Slimscroll Plugin Js -->
<script src="/views/public/panel/Admin-bsb/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="/views/public/panel/Admin-bsb/plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="/views/public/panel/Admin-bsb/plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="/views/public/panel/Admin-bsb/plugins/raphael/raphael.min.js"></script>
<script src="/views/public/panel/Admin-bsb/plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<script src="/views/public/panel/Admin-bsb/plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="/views/public/panel/Admin-bsb/plugins/flot-charts/jquery.flot.js"></script>
<script src="/views/public/panel/Admin-bsb/plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="/views/public/panel/Admin-bsb/plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="/views/public/panel/Admin-bsb/plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="/views/public/panel/Admin-bsb/plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="/views/public/panel/Admin-bsb/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="/views/public/panel/Admin-bsb/js/admin.js"></script>
<script src="/views/public/panel/Admin-bsb/js/pages/index.js"></script>

<!-- Demo Js -->
<script src="/views/public/panel/Admin-bsb/js/demo.js"></script>
</body>

</html>