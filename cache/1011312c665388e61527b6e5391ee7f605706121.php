<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
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
</head>

<body class="theme-red">
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
        <p>Please wait...</p>
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
                            <div class="text"><?php echo e($lang['number_the_products']); ?> : <?php echo e($productNumber); ?></div>
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
                            <div class="text"><?php echo e($lang['check_email']); ?> : <?php echo e($_SESSION['user']->email); ?></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-4 col-sm-7 col-xs-12">
            <div id="b" style=" height: 250px; width: 100%;"></div>
            <br>
        </div>

        <div class="col-lg-6 col-md-4 col-sm-7 col-xs-12">
            <div id="a" style="height: 250px; width: 100%;"></div>
        </div>

    </div>

</section>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
    window.onload = function () {

        var chart = new CanvasJS.Chart("a", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "تعداد سفارشات هر دسته بندی"
            },
            axisY: {
                title: "last food"
            },
            data: [{
                type: "column",
                showInLegend: false,
                dataPoints: [
                    {y: <?php echo e($burger); ?>, label: "تعداد فروش برگر"},
                    {y: <?php echo e($iranian); ?>, label: "تعداد فروش سلندویچ ایرانی"},
                    {y: <?php echo e($pasta); ?>, label: "تعداد فروش پاستا"},
                    {y: <?php echo e($pizza); ?>, label: "تعداد فروش پیتزا"},
                ]
            }]
        });

        chart.render();
        var chart = new CanvasJS.Chart("b", {
            animationEnabled: true,

            title: {
                text: "جمع فروش شما(تومان)"
            },

            axisY2: {
                interlacedColor: "rgba(1,77,101,.2)",
                gridColor: "rgba(1,77,101,.1)",

            },
            data: [{
                type: "bar",
                name: "companies",
                axisYType: "secondary",
                color: "#255",
                dataPoints: [
                    {y: <?php echo e($sale); ?>, label: "جمع فروش "},
                ]
            }]
        });
        chart.render();

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
<?php /**PATH D:\food-shop\views//panel/home/home-seller.blade.php ENDPATH**/ ?>