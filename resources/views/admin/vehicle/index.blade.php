@extends('base.cliente.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Veículos</h3>
            <div class="progress">
                <div class="progress-bar" style="width: 30%;"></div>
            </div>
        </div>
        <div class="col-md-12">
            <button data-toggle="modal" data-target="#addVehicle" class="btn btn-primary">NOVO VEÍCULO <i class="fas fa-plus"></i></button>
            <br><br>
            <div class="row">
                @foreach($user->vehicles as $vehicle)
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fas fa-bus-alt"></i> <b>{{ $vehicle->placa }}</b>
                                <span class="pull-right"><small><i class="far fa-clock"></i> criado em: {{ date('d/m/Y H:i:s', strtotime($vehicle->created_at)) }}</small></span>
                            </div>
                            <div class="panel-body">
                                <h5>Condutore(s)</h5>
                                <a href="{{ route('admin.vehicle.driver.new', [$vehicle->id]) }}" class="btn btn-default btn-xs">Condutor <i class="fas fa-plus"></i></a>
                                <br><br>
                                <table class="table table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>NOME</th>
                                            <th class="text-center">AÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vehicle->drivers as $driver)
                                            <tr>
                                                <td><i class="far fa-id-card"></i> {{ $driver->name }} {{ $driver->lastname }}</td>
                                                <td class="text-center">
                                                    <i class="far fa-edit"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5>Turno(s)</h5>
                                <a href="#" class="btn btn-default btn-xs">TURNO <i class="fas fa-plus"></i></a>
                                <br><br>
                                <table class="table table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>TURNO</th>
                                            <th class="text-center">ALUNOS</th>
                                            <th class="text-center">AÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vehicle->shifts as $shift)
                                            <tr>
                                                <td>{{ $shift->name }} ({{ substr($shift->start_at, 0, -3) }} - {{ substr($shift->finish_at, 0, -3) }})</td>
                                                <td class="text-center">{{ count($shift->students) }}</td>
                                                <td class="text-center">
                                                    <i class="far fa-edit"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addVehicle" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">NOVO VEÍCULO</h4>
            </div>
            {!! Form::open(['route' => 'admin.vehicle.new', 'class' => 'form', 'method' => 'post']) !!}
                <div class="modal-body">
                    @include('form.vehicle')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">FECHAR</button>
                    <button type="submit" class="btn btn-primary">ADICIONAR NOVO</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@section('javascript')

<script>
$(document).ready(function() {
    $(".inputToUpperCase").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
});
</script>

@endsection