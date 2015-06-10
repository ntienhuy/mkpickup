<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MKPickup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}" media="screen">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.1/jquery.form-validator.min.js"></script>
    <script src="{{ asset('js/datepicker-vi.js') }}"></script>
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script src="{{ asset('/js/vi.js') }}"></script>
    <!-- DataTables CSS --><link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
    <!-- DataTables --><script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
    <!-- DataTables --><script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
</head>
<body>
<div id="wrapper" >

    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="../" class="navbar-brand">MKPickup</a>
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{action('WelcomeController@index')}}">Trang chủ</a>
                    </li>
                    <li>
                        <a href="{{action('ShowRouteController@index')}}">Đặt xe</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://mkpickup.com/" target="_blank">MKPickup.com</a></li>
                </ul>

            </div>
        </div>
    </div>


    <div class="container">

        <div class="page-header" id="banner">
            <div class="row">
            </div>
        </div>
        @yield('content')
        <div id="footer" class="footer-container footer navbar-bottom>">
            <div class="row">
                <div class="col-lg-12">
                    <p>Công ty thương mại dịch vụ MKPickup | Thiết kế by BS team - 2015</p>
                </div>
            </div>
        </div>
    </div>




</div>

</body>
</html>
