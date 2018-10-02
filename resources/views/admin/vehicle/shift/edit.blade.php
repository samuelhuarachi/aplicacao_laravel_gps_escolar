@extends('base.cliente.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.vehicle.index') }}" class="btn btn-default"><i class="far fa-hand-point-left"></i> Voltar</a>

            <h3>Editando Turno</h3>
            <br>
            {!! Form::model($shift, ['route' => 'admin.vehicle.shift.update', 'method' => 'put']) !!}
            {{ Form::hidden('id', $shift->id) }}
            @include('form.shift')
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