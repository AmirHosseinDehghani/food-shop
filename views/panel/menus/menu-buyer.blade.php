<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>خوش اومدی زیبا</title>
    <!-- Favicon-->

    <link rel="icon" href="/views/image/kabab.jpg" type="image/x-icon">
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
</head>
<div style="font-family: 'Rubik', sans-serif; ">
    <nav class="navbar" style="font-family: 'Rubik', sans-serif; ">
        <div class="container-fluid">
            <div class="navbar-header">
            </div>
        </div>
    </nav>

    <section>
        <aside id="leftsidebar" class="sidebar" style="font-family: 'Rubik', sans-serif; ">
            <div class="user-info">
                <div>
                    <img class="img-circle" src="/{{$_SESSION['user']->avatar}}" width="50" height="50">
                    <div style="color: white" class="name" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false">{{$_SESSION['user']->name}} </div>
                    <div class="email" style="color: white">{{$_SESSION['user']->type}}</div>
                    <div class="info-container">
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="{{'/profile-form'}}"><i class="material-icons">person</i>{{$menuLang['profile']}}</a></li>
                                <li><a href="{{'/logout'}}"><i class="material-icons">input</i>{{$menuLang['exit']}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                <div class="menu">
                    <ul class="list">
                        <li class="header">منو اصلی</li>
                        <li class="active">
                            <a href="{{'/buyer/home'}}">
                                <i class="material-icons">home</i>
                                <span>{{$menuLang['home']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{'/buyer/product-buyer-form'}}">
                                <i class="material-icons">text_fields</i>
                                <span>{{$menuLang['product']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{'/buyer/order-form'}}">
                                <i class="material-icons">layers</i>
                                <span>{{$menuLang['order']}}</span>
                            </a>
                        </li>
                    </ul>
                </div>

            <div class="legal">
                <div class="copyright">
                    <a style="font-family: 'Playfair Display', serif; "  href="javascript:void(0);">LAST FOOD - FAST FOOD SHOP</a>
                </div>
            </div>

        </aside>

        <!-- #END# Right Sidebar -->
    </section>
</div>
