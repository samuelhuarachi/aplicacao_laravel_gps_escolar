@extends('base.cliente.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.vehicle.index') }}" class="btn btn-default"><i class="far fa-hand-point-left"></i> Voltar</a>

            <h3>Novo Turno</h3>
            <br>
            {!! Form::open(['route' => 'admin.vehicle.shift.new', 'class' => 'form', 'method' => 'post']) !!}
                {{ Form::hidden('vehicle_id', $vehicle->id) }}
                @include('form.shift')
                <button type="submit" class="btn btn-primary">ADICIONAR NOVO</button>
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection

@section('javascript')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>

$('.time').mask('00:00');

</script>
@endsection