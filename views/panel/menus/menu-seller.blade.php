<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>خوش اومدی زیبا!</title>
    <!-- Favicon-->
    <link rel="icon" href="/views/image/kabab.jpg" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital@1&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
<style>

</style>
</head>
<body style="font-family: 'Rubik', sans-serif; ">
<div>
    <nav  class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                   data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>

            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar" style="font-family: 'Rubik', sans-serif; ">
            <!-- User Info -->
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
                    <li class="header">{{$menuLang['main_navigation']}}</li>
                    <li class="active">
                        <a href="{{'/seller/home'}}">
                            <i class="material-icons">home</i>
                            <span>{{$menuLang['home']}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{'/categories-seller-form'}}">
                            <i class="material-icons">folder</i>
                            <span>{{$menuLang['category']}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{'/seller/product-seller-form'}}">
                            <i class="material-icons">label</i>
                            <span>{{$menuLang['product']}}</span>
                        </a>
                    </li>



                </ul>
            </div>

            <div class="legal">
                <div class="copyright">
                    <a style="font-family: 'Playfair Display', serif; " href="javascript:void(0);">LAST FOOD - FAST FOOD SHOP</a>
                </div>
            </div>


        </aside>

    </section>
</div>
</body>
