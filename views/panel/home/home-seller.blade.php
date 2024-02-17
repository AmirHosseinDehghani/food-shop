<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>خوش اومدی زیبا ! </title>
    <!-- Favicon-->
    <link rel="icon" href="/public/image/logo.png" type="image/x-icon">

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital@1&display=swap" rel="stylesheet">

    <link href="https://opensource.com/https//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css" rel="stylesheet" type="text/css" />

    <style>
        .ct-series-a .ct-slice-pie {
            fill: hsl(100, 20%, 50%); /* filling pie slices */
            stroke: white; /*giving pie slices outline */
            stroke-width: 5px;  /* outline width */
        }

        .ct-series-b .ct-slice-pie {
            fill: hsl(10, 40%, 60%);
            stroke: white;
            stroke-width: 5px;
        }

        .ct-series-c .ct-slice-pie {
            fill: hsl(120, 30%, 80%);
            stroke: white;
            stroke-width: 5px;
        }

        .ct-series-d .ct-slice-pie {
            fill: hsl(90, 70%, 30%);
            stroke: white;
            stroke-width: 5px;
        }
        .ct-series-e .ct-slice-pie {
            fill: hsl(60, 140%, 20%);
            stroke: white;
            stroke-width: 5px;
        }

    </style>
</head>

<body class="theme-red" style="font-family: 'Rubik', sans-serif;">
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
        <p style="font-family: 'Rubik', sans-serif;">صبور باش!</p>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <a href="/seller/product-seller-form">
                <div class="col-lg-6 col-md-4 col-sm-7 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text" style="font-family: 'Rubik', sans-serif;">{{$lang['number_the_products']}}
                                : {{$productNumber}}</div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </a>
            <a target="_blank" href="https://mail.google.com/">
                <div class="col-lg-6 col-md-4 col-sm-7 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text" style="font-family: 'Rubik', sans-serif;">{{$lang['check_email']}}
                                : {{$_SESSION['user']->email}}</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div>

        <div class="col-lg-6  col-xs-12" id="myChart1" style="font-family: 'Rubik', sans-serif; height:300px "></div>
        <div class="col-lg-6  col-xs-12" id="myChart2" style="font-family: 'Rubik', sans-serif;height:300px "></div>
    </div>


</section>
<script src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    google.charts.load('current',{packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    google.visualization.NumberFormat.useNativeCharactersIfAvailable(true);

    // Your Function
    function drawChart() {
        const data = google.visualization.arrayToDataTable([

            ['Contry', 'جمع فروش'],
            ['پیتزا', {{$pizza}}],
            ['پاستا', {{$pasta}}],
            ['ساندویچ ایرانی', {{$iranian}}],
            ['برگر', {{$burger}}],
        ]);

// Set Options
        const options = {
            title: 'مجموع فروش شما در هر دسته بندی',

        };


// Draw
        const chart = new google.visualization.BarChart(document.getElementById('myChart1'));
        chart.draw(data,{fontName:'Rubik'}, options);

    }

</script>
<script>
    google.charts.load('current',{packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Your Function
    function drawChart() {
        const data = google.visualization.arrayToDataTable([

            ['Contry', 'جمع فروش'],
            ['پیتزا', {{$pizza}}],
            ['پاستا', {{$pasta}}],
            ['ساندویچ ایرانی', {{$iranian}}],
            ['برگر', {{$burger}}],
        ]);

// Set Options
        const options = {
            title: 'مجموع فروش شما در هر دسته بندی',

        };


// Draw
        const chart = new google.visualization.PieChart(document.getElementById('myChart2'));
        chart.draw(data,{fontName:'Rubik'}, options);

    }
</script>

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
