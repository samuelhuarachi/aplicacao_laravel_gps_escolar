@extends('base.cliente.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.vehicle.index') }}" class="btn btn-default"><i class="far fa-hand-point-left"></i> Voltar</a>
            
            <h3>Novo Condutor - {{ $vehicleFind->placa }}</h3>
            <br>
            {!! Form::open(['class' => 'form', 'method' => 'post']) !!}
                @include('form.driver')
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection