<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital@1&display=swap" rel="stylesheet">
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

        <!-- Widgets -->
        <div class="col-xs-12 col-sm-9">
            <div class="card">
                <div class="body">
                    <form action="<?php echo e('/buyer/pay-order'); ?>" method="post">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <h4 style="font-family: 'Rubik', sans-serif;"><?php echo e($order->name); ?></h4>
                                <h5 style="font-family: 'Rubik', sans-serif;">
                                    <?php echo $order->description; ?>

                                </h5>
                                <h5 style="font-family: 'Rubik', sans-serif;">
                                    <?php $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                                    $english = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
                                    $order->price = str_replace($english, $persian, $order->price); ?>
                                    <?php echo e($order->price); ?>

                                </h5>
                                <img style="width: 50px" src="\public\image\logo.png">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <?php $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                            $english = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
                            $price = str_replace($english, $persian, $price); ?>
                            <h4 style="font-family: 'Rubik', sans-serif;"> قیمت = <?php echo e($price); ?></h4>
                        </div>
                        <div>
                            <input style="font-family: 'Rubik', sans-serif;" type="submit" class="btn btn-success"
                                   value="پرداخت">
                        </div>
                        <div style="font-family: 'Rubik', sans-serif;">
                            <a href="<?php echo e('/buyer/excel'); ?>">
                                <div>
                                    <h5 style="font-family: 'Rubik', sans-serif;">چاپ به صورت excel</h5>
                                </div>
                            </a>
                        </div>
                    </form>
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

</html><?php /**PATH D:\food-shop\views//panel/orders/pay.blade.php ENDPATH**/ ?>