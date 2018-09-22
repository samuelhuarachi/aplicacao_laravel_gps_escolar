<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Van do Hernani - Transporte escolar Campinas - Faculdade</title>
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuiWPnJFhJPafTTA6sta2OqeH4WJHlRAA"></script>

        <link href="https://bootswatch.com/3/paper/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                background: #fff;
                font-size: 14px;
            }

            h1,h2,h3 {
                color: #3240a4;
                font-weight: bold;
            }

            h4,h5,h6 {
                color: #656565;
            }

            .form-control {
                border-radius: 15px;
            }

            .invalid-feedback {
                color: red;
                font-weight:normal !important;
            }

            /* Sticky footer styles
            -------------------------------------------------- */
            html {
            position: relative;
            min-height: 100%;
            }
            body {
                /* Margin bottom by footer height */
                margin-bottom: 60px;
                line-height: 1.246;
            }
            .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            background-color: #f5f5f5;
            padding-top:10px;
            }

            .text-muted {
                margin-bottom: 0px;
                padding-bottom: 0px;
            }

            .navbar-toggle {
                color: #fff;
            }

        </style>
    </head>
    <body>

        @include('base.cliente.menu')
        
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">Vectoriza - Sistema GPS para Vans Escolares <br>
                <a href="https://www.vectoriza.com.br" target="_blank">www.vectoriza.com.br</a>
                </p>
            </div>
        </footer>
        
        <script
                src="https://code.jquery.com/jquery-1.12.4.min.js"
                integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        @yield('javascript')
        
    </body>
</html>