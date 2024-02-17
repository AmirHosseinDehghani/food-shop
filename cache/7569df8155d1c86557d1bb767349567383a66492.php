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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css"/>
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
</head>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 50%;
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

    .td {
        text-align: center;
    }

</style>
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
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->

<!-- #END# Search Bar -->
<!-- Top Bar -->


<section class="content">
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="col-xs-12 col-sm-9">
            <div class="card">
                <div class="body">
                    <table id="datatable-responsive"
                           class="table table-striped table-bordered dt-responsive nowrap"
                           style="font-family: 'Rubik', sans-serif;" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>نام فایل</th>
                            <th>فرمت فایل</th>
                            <th>دانلود</th>
                        </tr>
                        </thead>
                        <tbody id="geeks">
                        <tr>
                            <td><?php echo e($name); ?></td>
                            <td>xlsx</td>
                            <td><a href="/<?php echo e($file); ?>" download >
                                       دانلود
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>


<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="/views/public/panel/Admin-bsb/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../dist/tableToExcel.js"></script>


<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

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


<!-- Sparkline Chart Plugin Js -->
<script src="/views/public/panel/Admin-bsb/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="/views/public/panel/Admin-bsb/js/admin.js"></script>


<!-- Demo Js -->
<script src="/views/public/panel/Admin-bsb/js/demo.js"></script>
</body>

</html>
<?php /**PATH D:\food-shop\views//panel/excel/download.blade.php ENDPATH**/ ?>