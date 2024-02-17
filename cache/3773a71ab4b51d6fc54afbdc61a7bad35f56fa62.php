<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | last Food Shop</title>
    <!-- Favicon-->
    <link rel="icon" href="/views/image/logo.png" type="image/x-icon">

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

    <div class="block-header">
        <h2>categories and products</h2>
    </div>

    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
            <div class="body bg-teal" >
                <img src="views/image/kabab.jpg" width="40" height="40">
                <div class="font-bold m-b--35"><h3><?php echo e($category->name); ?></h3></div>
                <ul class="dashboard-stat-list">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($product->category_id == $category->id): ?>
                            <?php if(!empty($product)): ?>
                            <li>
                                <h4><?php echo e($product->name); ?></h4>
                                <h5>description:<?php echo e($product->description); ?></h5>
                            </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li>
                                <h4>empty</h4>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

</html>
<?php /**PATH D:\food-shop\views/panel/home-buyer.blade.php ENDPATH**/ ?>