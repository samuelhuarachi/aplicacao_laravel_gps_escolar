@extends('base.cliente.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.vehicle.index') }}" class="btn btn-default"><i class="far fa-hand-point-left"></i> Voltar</a>
            <h3>Editando Veículo {{ $vehicle->placa }}</h3>
            <div class="progress">
                <div class="progress-bar" style="width: 30%;"></div>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <a class="pull-right" href="{{ route('admin.vehicle.delete', $vehicle->id) }}"><span class="text-danger">[Excluir Veículo]</span></a>
                </div>
            </div>
            {!! Form::model($vehicle, 
                ['route' =>'admin.vehicle.update', 'method' => 'put']) !!}
            {{ Form::hidden('id', $vehicle->id) }}
            @include('form.vehicle')
            <button type="submit" class="btn btn-primary">ATUALIZAR</button>
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