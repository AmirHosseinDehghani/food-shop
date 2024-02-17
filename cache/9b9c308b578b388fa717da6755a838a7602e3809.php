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
        <p>صبور باش!</p>
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


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2 style="font-family: 'Rubik', sans-serif;"><?php echo e($lang['title']); ?></h2>
        </div>

        <!-- Widgets -->
        <div class="col-xs-12 col-sm-9">
            <div class="card">
                <div class="body">
                    <div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation"><a id="product_add_id" href="#product_list" aria-controls="settings"
                                                       role="tab"
                                                       data-toggle="tab"><?php echo e($lang['title3']); ?> </a></li>
                            <li role="presentation"><a id="product_list_id" href="#add" aria-controls="settings"
                                                       role="tab" data-toggle="tab"><?php echo e($lang['title2']); ?></a></li>
                            <li role="presentation"><a id="sale_list_id" href="#sale" aria-controls="settings"
                                                       role="tab" data-toggle="tab"><?php echo e($lang['title4']); ?></a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in" id="product_list">

                                <?php if(isset($_SESSION['productTypeError'])): ?>
                                    <div class="alert alert-danger text-center"><?php echo e($_SESSION['productTypeError']); ?></div>
                                    <?php unset($_SESSION['productTypeError']); ?>
                                <?php endif; ?>
                                <form method="post" action="<?php echo e('/add-product'); ?>" class="form-horizontal"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="NameSurname"
                                               class="col-sm-2 control-label"><?php echo e($lang['name']); ?></label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input style="font-family: 'Rubik', sans-serif;" type="text" class="form-control" id="name" name="name"
                                                       placeholder="<?php echo e($lang['name']); ?> " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><?php echo e($lang['category']); ?></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12" style="float: right;">
                                            <select name="category_id" id="category_id">
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"> <?php echo e($category->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="NameSurname"
                                               class="col-sm-2 control-label"><?php echo e($lang['price']); ?></label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input style="font-family: 'Rubik', sans-serif;" type="number" class="form-control" id="price"
                                                       name="price"
                                                       placeholder="<?php echo e($lang['price']); ?> " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="NameSurname"
                                               class="col-sm-2 control-label"><?php echo e($lang['icon']); ?> </label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input  type="file" class="form-control" id="avatar" name="avatar"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email"
                                               class="col-sm-2 control-label"><?php echo e($lang['description']); ?></label>
                                        <div class="col-sm-10">
                                            <textarea style="font-family: 'Rubik', sans-serif;" name="description" id="editor">

                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-success col-sm-2  "><?php echo e($lang['submit']); ?></button>

                                        </div>
                                    </div>
                                    <div>

                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="sale">

                                <div class="body">
                                    <div class="search-icon">
                                        <input class="input" id="gfg" type="text"
                                               placeholder="جست و جو">
                                    </div>
                                    <table id="datatable-responsive"
                                           class="table table-striped table-bordered dt-responsive nowrap"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>
                                                <img style="width: 50px" src="\public\image\logo.png">
                                            </th>
                                            <th>
                                                last food
                                            </th>

                                            <td class="col-xs-12 col-sm-9">
                                                <p>
                                                    www.last-food-shop.ir
                                                </p>
                                            </td>

                                            <th>
                                                آخرین غذا
                                            </th>
                                            <td>
                                                <a href="/seller/product-excel" class="btn btn-success">
                                                    <span class="fa fa-trash"> دانلود اکسل</span>
                                                </a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <th><?php echo e($lang['name']); ?></th>
                                            <th><?php echo e($lang['description']); ?></th>
                                            <th><?php echo e($lang['price']); ?></th>
                                            <th><?php echo e($lang['Condition']); ?></th>
                                            <th><?php echo e($lang['print']); ?></th>

                                        </tr>
                                        </thead>
                                        <tbody id="geeks">

                                        <tr>
                                            <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td><?php echo e($sale->name); ?></td>
                                                <td><?php echo $sale->description; ?></td>
                                                <?php $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                                                $english = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
                                                $sale->price = str_replace($english, $persian, $sale->price); ?>
                                                <td><?php echo e($sale->price); ?></td>
                                                <td>
                                                    <?php if(empty($sale->number)): ?>
                                                        <?php echo e($lang['Condition0']); ?>

                                                    <?php endif; ?>
                                                    <?php if($sale->number == 1): ?>
                                                        <?php echo e($lang['Condition1']); ?>

                                                    <?php endif; ?>
                                                    <?php if($sale->number == 2): ?>
                                                        <?php echo e($lang['Condition2']); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="/seller/product/print/<?php echo e($sale->id); ?>"
                                                       style="color:white"
                                                       class="btn btn-info"><?php echo e($lang['print']); ?></a>
                                                </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="tab-pane fade in" id="add">
                                <?php if(isset($_SESSION['doc'])): ?>
                                    <div class="alert alert-info text-center"><?php echo e($_SESSION['doc']); ?></div>
                                    <?php unset($_SESSION['doc']); ?>
                                <?php endif; ?>

                                <div class="search-icon">
                                    <input class="input" id="gfg" type="text"
                                           placeholder="جست و جو ">
                                </div>
                                <table id="datatable-responsive"
                                       class="table table-striped table-bordered dt-responsive nowrap"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th><?php echo e($lang['name']); ?></th>
                                        <th><?php echo e($lang['description']); ?></th>
                                        <th><?php echo e($lang['price']); ?></th>
                                        <th><?php echo e($lang['icon']); ?></th>
                                        <th><?php echo e($lang['do']); ?></th>

                                    </tr>
                                    </thead>
                                    <tbody id="geeks">
                                    <tr>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td><?php echo e($product->name); ?></td>
                                            <td><?php echo $product->description; ?></td>
                                            <?php $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                                            $english = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
                                            $product->price = str_replace($english, $persian, $product->price); ?>
                                            <td><?php echo e($product->price); ?></td>
                                            <td><img style="width: 50px" src="/<?php echo e($product->image); ?>"></td>
                                            <td>
                                                <a onclick="return confirm('ایا از حذف دسته بندی مطمئن هستید؟')"
                                                   href="/seller/product/delete/<?php echo e($product->id); ?>"
                                                   class="btn btn-danger">
                                                    <?php echo e($lang['delete']); ?>

                                                </a>
                                                <a href="/seller/product/edit-form/<?php echo e($product->id); ?>"
                                                   class="btn btn-success">
                                                    <?php echo e($lang['edit']); ?></a>
                                            </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="/views/public/panel/Admin-bsb/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../dist/tableToExcel.js"></script>
<script>
    var DataTable = require('datatables.net');

    let table = new DataTable('#myTable', {
        // config options...
    });
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

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>


<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });


</script>
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
<?php /**PATH D:\food-shop\views/panel/product/product-seller.blade.php ENDPATH**/ ?>