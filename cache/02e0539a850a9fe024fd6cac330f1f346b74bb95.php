<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Forgot Password | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/views/public/panel/Admin-bsb/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/views/public/panel/Admin-bsb/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/views/public/panel/Admin-bsb/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/views/public/panel/Admin-bsb/css/style.css" rel="stylesheet">
</head>

<body class="fp-page" style="font-family: Calibri">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form action="<?php echo e('check'); ?>" method="POST">
                    <div class="msg">
                        already you are set a key to the forgot password.
                        are you remember the key
                    </div>
                    <?php if(isset($doc)): ?>
                        <div class="alert alert-danger text-center"><?php echo e($doc); ?></div>
                    <?php endif; ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">key</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="key" placeholder="key" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">check my key</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="<?php echo e('/'); ?>">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="/views/public/panel/Admin-bsb/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="/views/public/panel/Admin-bsb/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="/views/public/panel/Admin-bsb/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="/views/public/panel/Admin-bsb/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="/views/public/panel/Admin-bsb/js/admin.js"></script>
    <script src="/views/public/panel/Admin-bsb/js/pages/examples/forgot-password.js"></script>
</body>

</html><?php /**PATH D:\food-shop\views//panel/forgot-password.blade.php ENDPATH**/ ?>