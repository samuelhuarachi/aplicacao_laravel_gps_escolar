<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Van do Hernani - Transporte escolar Campinas - Faculdade</title>
        
        
        <link href="https://bootswatch.com/3/paper/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                background: #fffff5;
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
                            <li><a href="{{ route('area-cliente.index') }}"><span class="glyphicon glyphicon-user"></span> ÁREA DO CLIENTE</a></li>
                        </ul>
                        </div>
                    </div>
                </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center><h1>Van do Hernani & Rosana</h1>
                        <small>Agradecemos sua visita<br>Será um prazer atendê-lo(a)</small></center>

                
                    <img class="pull-right" width="300px" src="images/van.jpg">
                    <h3>NOSSOS CONTATOS</h3>
                    <p>Contato: (19) 3208-1282</p>
                    <p>Email: contato@vandohernani.com.br</p>
                    <h3>QUEM SOMOS</h3>
                    <p>Estamos no mercado há mais de 10 anos oferecendo serviço de transporte escolar
                    na região de Campinas</p>
                    <p>Motorista: Hernan e Samuel</p>
                    <p>Monitora: Bruna e Rosana</p>
                    <h3>QUAIS ESCOLAS ATENDEMOS?</h3>
                    <p>Capi - Vila Costa e Silva</p>
                    <p>Gustavo Marcondes - Taquaral</p>
                    <p>São José - Taquaral</p>
                    <h3>QUERO RECEBER UM ORÇAMENTO</h3>
                    <p>Preencha o formulário abaixo para solicitar um orçamento <br> Retornaremos o valor do orçamento através de uma ligação</p>
                    

                    <form action="orcamento.php" method="POST" style="max-width: 480px;">
                        @csrf
                        <h4>ESCOLA DESEJADA</h4>
                        <input type="radio" name="escoladesejada" value="saojose"> São José - Taquaral<br>
                        <input type="radio" name="escoladesejada" value="capi"> Capi - Vila Costa e Silva<br>
                        <input type="radio" name="escoladesejada" value="gustavomarcondes"> Gustavo Marcondes - Taquaral<br> 

                        <h4>QUANTIDADE DE ALUNOS</h4>
                        <input type="radio" name="qtdalunos" value="1" checked> 1<br>

                        <h4>PERÍODO</h4>
                        <input type="radio" name="periodo" value="manha"> Manhã<br>
                        <input type="radio" name="periodo" value="tarde"> Tarde<br>

                        <h4>FREQUENCIA</h4>
                        <input type="radio" name="frequencia" value="buscarelevar"> Buscar e levar<br>
                        <input type="radio" name="frequencia" value="levar"> Somente levar<br>
                        <input type="radio" name="frequencia" value="buscar"> Somente buscar<br>
                        
                    <h4>DADOS PARA CONTATO</h4>
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome">
                        <label for="telefone">Telefone ou Celular</label>
                        <input type="text" class="form-control" name="telefone">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email">

                    <h4>SUA LOCALIZAÇÃO</h4>
                    <div class="form-group">
                        <label for="cep">Cep</label>
                        <input type="text" class="form-control" name="cep">
                        <label for="rua">Rua</label>
                        <input type="text" class="form-control" name="rua">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" name="complemento">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" name="bairro">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade" value="Campinas">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="estado" value="São Paulo">
                    </div>

                    <button type="submit" class="btn btn-default">Solicitar orçamento</button>
                    </form>
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
