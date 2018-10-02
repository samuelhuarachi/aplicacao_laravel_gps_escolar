@extends('base.cliente.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.student.index') }}" class="btn btn-default"><i class="far fa-hand-point-left"></i> Voltar</a>
        
            <h3>Novo Aluno</h3>

            {!! Form::open(['route' => 'admin.student.new', 'class' => 'form', 'method' => 'post']) !!}
                @include('form.student')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection