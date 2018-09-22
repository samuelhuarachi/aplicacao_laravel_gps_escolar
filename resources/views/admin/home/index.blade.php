@extends('base.cliente.base')

@section('content')

<div class="row">
    <div class="col-md-4">

        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">MEUS VEÍCULOS</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Veículo</th>
                            <th>Ano</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Topic</td>
                            <td>2006</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Mercedez</td>
                            <td>2010</td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
        
    </div>
</div>


@endsection