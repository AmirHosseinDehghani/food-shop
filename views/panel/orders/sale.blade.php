<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital@1&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Rubik', sans-serif; font-size: 20 " class="theme-red">
<!-- Page Loader -->

<section class="content">
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="col-xs-12 col-sm-9">
            <div class="card">
                <div class="body">
                    <div>
                        <div style="  font-family: 'Rubik', sans-serif; text-align: center"> فروشنده <strong>{{$_SESSION['target']->id}}</strong></div>
                        <div style="   text-align: left">
                            <strong>last</strong> food
                        </div>

                    </div>
                    <div  style="text-align: left">
                        <a href="https://last-food-shop.ir/" style="color: red ;text-decoration: none;"  >www.last-food-shop.ir</a>
                    </div>
                    <div>
                        <div style="text-align: right">{{$_SESSION['sale']['id']}} :شماره</div>
                        <div style="text-align: right"> تاریخ فاکتور: {{ $_SESSION['sale']['date']}} </div>
                        <div style="text-align: right"> شماره همراه/ثابت: {{ $_SESSION['target']->phone}} </div>
                    </div>
                    <br>
                    <div>
                        <div style=" width: 100%;border: 1px solid  ; text-align: center ; background-color: lightgrey">
                            فروشنده
                        </div>
                        <table
                                style=" border: 1px solid"
                                cellspacing="0" width="100%">
                            <tr>
                                <th style="    border: 1px solid  ; text-align: center">{{$_SESSION['lang']['email']}}</th>
                                <th style=" border: 1px solid  ; text-align: center ">{{$_SESSION['lang']['user']}}</th>
                            </tr>
                            <tr>
                                <td style=" width: 50%;border: 1px solid  ; text-align: center">{!! $_SESSION['user']->email!!}</td>
                                <td style=" border: 1px solid  ; text-align: center">{{$_SESSION['user']->name}}</td>

                            </tr>
                        </table>
                    </div>
                    <div>
                        <div style=" width: 100%;border: 1px solid  ; text-align: center ; background-color: lightgrey">
                            خریدار
                        </div>
                        <table
                                style=" border: 1px solid"
                                cellspacing="0" width="100%">
                            <tr>
                                <th style="    border: 1px solid  ; text-align: center">{{$_SESSION['lang']['buyer-email']}}</th>
                                <th style=" border: 1px solid  ; text-align: center">{{$_SESSION['lang']['buyer']}}</th>
                            </tr>
                            <tr>
                                <td style=" width: 50%;border: 1px solid  ; text-align: center">{!! $_SESSION['buyer']['email']!!}</td>
                                <td style=" border: 1px solid  ; text-align: center">{{$_SESSION['buyer']['name']}}</td>

                            </tr>
                        </table>
                    </div>
                    <div style=" width: 100%;border: 1px solid  ; text-align: center ; background-color: lightgrey ">
                        خرید
                    </div>

                    <table
                            style=" border: 1px solid"
                            cellspacing="0" width="100%">
                        <tr >
                            <th  style=" border: 1px solid  ; text-align: center">{{$_SESSION['lang']['Condition']}}</th>
                            <th style=" border: 1px solid  ; text-align: center">{{$_SESSION['lang']['price']}}</th>
                            <th style=" border: 1px solid  ; text-align: center">{{$_SESSION['lang']['name']}}</th>
                        </tr>
                        <tr>
                            <td style=" border: 1px solid  ; text-align: center">
                                @if(empty($_SESSION['sale']['number']))
                                    {{$_SESSION['lang']['Condition0']}}
                                @endif
                                @if($_SESSION['sale']['number'] == 1)
                                    {{$_SESSION['lang']['Condition1']}}
                                @endif
                                @if($_SESSION['sale']['number'] == 2)
                                    {{$_SESSION['lang']['Condition2']}}
                                @endif
                            </td>
                            <td style=" border: 1px solid  ; text-align: center">{{$_SESSION['price']}}</td>
                            <td style=" border: 1px solid  ; text-align: center">{{$_SESSION['sale']['name']}}</td>

                        </tr>
                    </table>
                    <table style=" border: 1px solid"
                           cellspacing="20" width="100%">
                        <thead>
                        <tr>
                            <th>
                                <div> مالیات 9%   = {{$_SESSION['index1']}} +</div>
                                <div>حق فروش سایت 5% = {{$_SESSION['index2']}} -</div>
                                <div>  مبلغ دریاقتی قروشنده با موارد بالا = {{$_SESSION['index3']}}</div>

                            </th>
                            <th>
                                <div style="text-align: right">
                                    <strong>
                                      :  محاسبه کامل دریافتی
                                    </strong>
                                </div>
                            </th>

                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        @unset($_SESSION['sale'],$_SESSION['lang'] ,$_SESSION['buyer'] ,$_SESSION['seller'])
    </div>
</section>

</body>

</html>