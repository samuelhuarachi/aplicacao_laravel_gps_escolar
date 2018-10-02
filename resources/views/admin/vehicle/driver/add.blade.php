@extends('base.cliente.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.vehicle.index') }}" class="btn btn-default"><i class="far fa-hand-point-left"></i> Voltar</a>
        
            <h3>Adicionar condutor ao veículo {{ $vehicleFind->placa }} <i class="fas fa-shuttle-van"></i></h3>
            <br>
        </div>
        <div class="col-md-6">
            @include('table._driver-attach', ['user' => $user->current(), 'vehicle' => $vehicleFind])
        </div>
    </div>
</div>

@endsection