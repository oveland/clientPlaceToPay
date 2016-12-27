<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Laravel')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="https://use.fontawesome.com/ef3c5d9c4d.js"></script>

    <script src="https://unpkg.com/vue/dist/vue.js"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            margin: 0;
        }

        .full-height {
            height: 60vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            margin-top: 10vh;
            font-size: 84px;
        }

        .links > a {
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .body-content{
            height: 70vh !important;
        }
        i{
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>
<body class="fuelux">
<div class="body-content">
    @if (Route::has('login'))
    <div class="top-right links">
        @if (Auth::check())
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ url('/login') }}">Login</a>
        <a href="{{ url('/register') }}">Register</a>
        @endif
    </div>
    @endif

    <div class="content main-content" style="display: none">
        @yield('body')
    </div>
</div>

<footer class="col-md-6 col-md-offset-3">
    <div class="links text-center">
        <a href="https://github.com/oveland/clientPlaceToPay" class="text-">View Source in Github</a>
    </div>
    <hr>
    <div class="text-center">
        By <a href="https://www.linkedin.com/in/oscar-vel%C3%A1squez-750519b6/">
            Oscar Iván Velásquez @ December - 2016
        </a>
    </div>
    <hr>
</footer>

<script type="application/javascript"> $(document).ready(function () { $('.main-content').fadeIn(1000); });</script>

</body>
</html>
