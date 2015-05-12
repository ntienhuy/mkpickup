<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MKPickup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">


</head>
<body>
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
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Themes <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a href="../default/">Default</a></li>
                        <li class="divider"></li>
                        <li><a href="../cerulean/">Cerulean</a></li>
                        <li><a href="../cosmo/">Cosmo</a></li>
                        <li><a href="../cyborg/">Cyborg</a></li>
                        <li><a href="../darkly/">Darkly</a></li>
                        <li><a href="../flatly/">Flatly</a></li>
                        <li><a href="../journal/">Journal</a></li>
                        <li><a href="../lumen/">Lumen</a></li>
                        <li><a href="../paper/">Paper</a></li>
                        <li><a href="../readable/">Readable</a></li>
                        <li><a href="../sandstone/">Sandstone</a></li>
                        <li><a href="../simplex/">Simplex</a></li>
                        <li><a href="../slate/">Slate</a></li>
                        <li><a href="../spacelab/">Spacelab</a></li>
                        <li><a href="../superhero/">Superhero</a></li>
                        <li><a href="../united/">United</a></li>
                        <li><a href="../yeti/">Yeti</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../help/">Help</a>
                </li>
                <li>
                    <a href="#">Blog</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Download <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="download">
                        <li><a href="#">bootstrap.min.css</a></li>
                        <li><a href="#">bootstrap.css</a></li>
                        <li class="divider"></li>
                        <li><a href="#">variables.less</a></li>
                        <li><a href="#">bootswatch.less</a></li>
                        <li class="divider"></li>
                        <li><a href="#">_variables.scss</a></li>
                        <li><a href="#">_bootswatch.scss</a></li>
                    </ul>
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




    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

</body>
</html>
