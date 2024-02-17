<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital@1&display=swap" rel="stylesheet">
</head>
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
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2 style="font-family: 'Rubik', sans-serif; ">{{$lang['title']}}</h2>
        </div>

        <!-- Widgets -->
        <div class="col-xs-12 col-sm-9">
            <div class="card">
                <div class="body">

                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation">
                                <a id="order_id" href="#order_form" aria-controls="settings"
                                                       role="tab" data-toggle="tab"
                                                       style="font-family: 'Rubik', sans-serif; ">
                                    {{$lang['title2']}}
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in" id="order_form">
                                <table id="datatable-responsive"
                                       class="table table-striped table-bordered dt-responsive nowrap"
                                       cellspacing="0" width="100%"
                                       style="font-family: 'Rubik', sans-serif; ">
                                    <thead>
                                    <tr>
                                        <th>{{$lang['name']}}</th>
                                        <th>{{$lang['description']}}</th>
                                        <th>{{$lang['price']}}</th>
                                        <th>{{$lang['seller']}}</th>
                                        <th>{{$lang['do']}}</th>
                                        <th>چاپ به صورت pdf</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($orders as $order)
                                            <td>{{$order->name}}</td>
                                            <td> {!! $order->description !!}</td>
                                            <td>{{$order->price}}</td>

                                            <td>@foreach($users as $user)
                                                    @if($user->id==$order->seller)
                                                        {{$user->name}}
                                                    @endif
                                                @endforeach
                                            </td>

                                            <td>
                                                <a
                                                        href="/buyer/delete-order/{{$order->id}}"
                                                        class="btn btn-danger">
                                                    {{$lang['delete']}} <span class="fa fa-trash"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a
                                                        href="/buyer/print-order/{{$order->id}}" class="btn btn-info">
                                                    چاپ <span class="fa fa-trash"></span>
                                                </a>
                                            </td>

                                    </tr>
                                    @endforeach
                                    @if(isset($price))
                                        <tr>
                                            <th>
                                                <img style="width: 50px" src="\public\image\logo.png">
                                            </th>
                                            <th>
                                                last food
                                            </th>

                                            <td class="col-xs-12 col-sm-9">
                                                {{$price}}
                                            </td>

                                            <th>
                                                {{$lang['success']}}
                                            </th>
                                            <td>
                                                <a
                                                        href="/buyer/pay-form" class="btn btn-success">
                                                    <span class="fa fa-trash">{{$lang['success']}}</span>
                                                </a>
                                            </td>
                                            <th>
                                                <img style="width: 50px" src="\public\image\logo.png">
                                            </th>

                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Visitors -->

        <!-- #END# Visitors -->
        <!-- Latest Social Trends -->

        <!-- #END# Latest Social Trends -->
        <!-- Answered Tickets -->

        <!-- #END# Answered Tickets -->
    </div>
    </div>
</section>
<script>
    // A $( document ).ready() block.
    $(document).ready(function () {
        tabName = '<?php echo $_GET['tab'] ?? null; ?>'
        $('#' + tabName).click();
    });
</script>
<!-- Jquery Core Js -->
<script src="/views/public/panel/Admin-bsb/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="/views/public/panel/Admin-bsb/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="/views/public/panel/Admin-bsb/plugins/bootstrap-select/js/bootstrap-select.js"></script>

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