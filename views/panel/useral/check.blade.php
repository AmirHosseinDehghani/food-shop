<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="/views/image/kabab.jpg" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/views/public/panel/Admin-bsb/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/views/public/panel/Admin-bsb/plugins/node-waves/waves.css" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="/views/public/panel/Admin-bsb/plugins/animate-css/animate.css" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="/views/public/panel/Admin-bsb/css/style.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital@1&display=swap" rel="stylesheet">
</head>

<body class="login-page" style="font-family: 'Rubik', sans-serif;">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">last<b>food</b></a>
    </div>

    <div class="card">

        <div class="body">
            <div class="msg" style="font-family: 'Rubik', sans-serif;"> ایمیل خود را چک کنید . اگر در قسمت اصلی نبود در قسمت  اسپم آن را پیدا خواهید کرد . کد را کپی کنید و در این قسمت آن را بگزارید
            </div>
            <form action="/verify" id="sign_in" method="POST">
                <div class="input-group">
                        <span class="material-symbols-outlined">

                        </span>
                    <div class="form-line">
                        <input style="font-family: 'Rubik', sans-serif;" type="text" class="form-control" name="verify" placeholder="کد" required autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button style="font-family: 'Rubik', sans-serif;" class="btn btn-block bg-pink waves-effect" type="submit">چک کردن کد</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="../../plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../../plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../../plugins/node-waves/waves.js"></script>

<!-- Validation Plugin Js -->
<script src="../../plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="../../js/admin.js"></script>
<script src="../../js/pages/examples/sign-in.js"></script>
</body>

</html>