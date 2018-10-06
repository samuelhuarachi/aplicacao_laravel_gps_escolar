<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ESCOLAR GPS - Sistema de gps em tempo real, para vans escolares</title>
        
        <link rel="icon" type="image/png" href="/images/icon.png" />

        
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

            .navbar-toggle {
                color: #fff;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                <span class="glyphicon glyphicon-menu-hamburger"></span> MENU
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">CONTATO <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">QUEM SOMOS</a></li>
                            <li><a href="#">ESCOLAS ATENDIDAS</a></li>
                            <li><a href="#">ORÇAMENTO</a></li>
                            
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('student.index') }}"><span class="glyphicon glyphicon-user"></span> ÁREA DO ALUNO</a></li>
                        </ul>
                        </div>
                    </div>
                </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <p>Bora vender</p>
                </div>
            </div>
        </div>

        <br>
        <br>
        
        <script
                src="https://code.jquery.com/jquery-1.12.4.min.js"
                integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        
    </body>
</html>
