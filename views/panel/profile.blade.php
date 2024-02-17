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
        <p style="font-family: 'Rubik', sans-serif;">صبور باش!</p>
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
            <h2 style="font-family: 'Rubik', sans-serif;">{{$lang['title']}}</h2>
        </div>

        <!-- Widgets -->
        <div class="col-xs-12 col-sm-9">
            <div class="card">
                <div class="body">
                    <div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation"><a id="profile_settings" href="#profile" aria-controls="settings"
                                                       role="tab"
                                                       data-toggle="tab" style="font-family: 'Rubik', sans-serif;">{{$lang['title_setting']}}</a></li>
                            <li role="presentation"><a id="change_password_settings" href="#change_password"
                                                       aria-controls="settings"
                                                       role="tab" data-toggle="tab" style="font-family: 'Rubik', sans-serif;">{{$lang['change_password']}}</a>
                            </li>
                            <li role="presentation"><a id="upload_profile_id" href="#upload_profile"
                                                       aria-controls="settings" role="tab"
                                                       data-toggle="tab" style="font-family: 'Rubik', sans-serif;">{{$lang['upload_profile']}}</a></li>
                            <li role="presentation"><a href="#profile_image_setting" aria-controls="settings" role="tab"
                                                       data-toggle="tab" style="font-family: 'Rubik', sans-serif;">{{$lang['profile_image_setting']}}</a></li>
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane fade in" id="profile">
                                @if(isset($_SESSION['profile-edit']))
                                    <div style="font-family: 'Rubik', sans-serif;" class="alert alert-info     text-center">{{$_SESSION['profile-edit']}}</div>
                                    @unset($_SESSION['profile-edit'])
                                @endif
                                <form method="post" action="{{'/edit-profile'}}" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="NameSurname"
                                               class="col-sm-2 control-label" style="font-family: 'Rubik', sans-serif;">{{$lang['name']}}</label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input style="font-family: 'Rubik', sans-serif;" type="text" class="form-control" id="NameSurname" name="name"
                                                       placeholder="{{$lang['name']}}"
                                                       value="{{$_SESSION['user']->name}}"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email" class="col-sm-2 control-label" style="font-family: 'Rubik', sans-serif;">{{$lang['email']}}</label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input style="font-family: 'Rubik', sans-serif;" type="email" class="form-control" id="Email" name="email"
                                                       placeholder="{{$lang['email']}}"
                                                       value="{{$_SESSION['user']->email}}"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger" style="font-family: 'Rubik', sans-serif;">{{$lang['submit']}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="change_password">
                                @if(isset($_SESSION['profile-password-success']))
                                    <div style="font-family: 'Rubik', sans-serif;" class="alert alert-info text-center">{{$_SESSION['profile-password-success']}}</div>
                                    @unset($_SESSION['profile-password-success'])
                                @endif
                                @if(isset($_SESSION['profile-password-error']))
                                    <div style="font-family: 'Rubik', sans-serif;" class="alert alert-danger text-center">{{$_SESSION['profile-password-error']}}</div>
                                    @unset($_SESSION['profile-password-error'])
                                @endif
                                <form method="post" action="{{'/edit-password'}}" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="OldPassword"
                                               class="col-sm-3 control-label" style="font-family: 'Rubik', sans-serif;">{{$lang['old_password']}}</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input style="font-family: 'Rubik', sans-serif;" type="password" class="form-control" id="old_password"
                                                       name="old_password" placeholder="{{$lang['old_password']}}"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="NewPassword"
                                               class="col-sm-3 control-label" style="font-family: 'Rubik', sans-serif;">{{$lang['new_password']}}</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input style="font-family: 'Rubik', sans-serif;" type="password" class="form-control" id="password"
                                                       name="password" placeholder="{{$lang['new_password']}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="NewPasswordConfirm"
                                               class="col-sm-3 control-label" style="font-family: 'Rubik', sans-serif;">{{$lang['new_password_confirm']}}</label>
                                        <div class="col-sm-9">
                                            <div class="form-line">
                                                <input style="font-family: 'Rubik', sans-serif;" type="password" class="form-control" id="PasswordConfirm"
                                                       name="PasswordConfirm"
                                                       placeholder="{{$lang['new_password_confirm']}}"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-danger" style="font-family: 'Rubik', sans-serif;">{{$lang['submit']}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="upload_profile">
                                @if(isset($_SESSION['profile-icon-set']))
                                    <div style="font-family: 'Rubik', sans-serif;" class="alert alert-success text-center">{{$_SESSION['profile-icon-set']}}</div>
                                    @unset($_SESSION['profile-icon-set'])
                                @endif
                                @if(isset($_SESSION['profile-have-icon']))
                                    <div style="font-family: 'Rubik', sans-serif;" class="alert alert-warning text-center">{{$_SESSION['profile-have-icon']}}</div>
                                    @unset($_SESSION['profile-have-icon'])
                                @endif
                                @if(isset($_SESSION['profile-icon-error']))
                                    <div style="font-family: 'Rubik', sans-serif;" class="alert alert-danger text-center">{{$_SESSION['profile-icon-error']}}</div>
                                    @unset($_SESSION['profile-icon-error'])
                                @endif

                                    <form method="post" action="{{'/upload-profile'}}" enctype="multipart/form-data"
                                          class="form-horizontal">
                                        @if($_SESSION['user']->avatar == 'public/image/user.png')
                                        <div class="form-group">
                                            <label for="Profile"
                                                   class="col-sm-3 control-label" style="font-family: 'Rubik', sans-serif;">{{$lang['your_file']}}</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="file" class="form-control" name="file" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit"
                                                        class="btn btn-danger" style="font-family: 'Rubik', sans-serif;">{{$lang['upload']}}</button>
                                            </div>
                                        </div>
                                        @endif
                                    </form>

                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="profile_image_setting">
                                @if(isset($profileDelete))
                                    <div style="font-family: 'Rubik', sans-serif;" class="alert alert-success text-center">{{$profileDelete}}</div>
                                @endif
                                @if(isset($profileISEmpty))
                                    <div style="font-family: 'Rubik', sans-serif;" class="alert alert-danger text-center">{{$profileISEmpty}}</div>
                                @endif
                                <table id="myTable"
                                       class="table table-striped table-bordered dt-responsive nowrap"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th  style="font-family: 'Rubik', sans-serif;"  > {{$lang['your_profile']}}</th>
                                        <th style="font-family: 'Rubik', sans-serif;" >{{$lang['type_image']}}</th>

                                    </tr>
                                    </thead>
                                    <tbody id="geeks">
                                    <tr>
                                        <td>
                                            <a href="/{{$_SESSION['user']->avatar}}">
                                                <img class="image" src="{{$_SESSION['user']->avatar}}" width="60"
                                                     height="60">
                                            </a>
                                        </td>
                                        <td>

                                            @if($_SESSION['user']->avatar=='public/image/user.png')

                                                {{$lang['default_image']}}
                                            @else
                                                {{$lang['your_image']}}

                                            @endif
                                        </td>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>

<!-- Jquery Core Js -->
<script src="/views/public/panel/Admin-bsb/plugins/jquery/jquery.min.js"></script>
<!-- click -->
<script>
    // A $( document ).ready() block.
    $(document).ready(function () {
        tabName = '<?php echo $_GET['tab'] ?? null; ?>'
        $('#' + tabName).click();
    });
</script>

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
