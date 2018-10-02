@extends('base.cliente.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Alunos</h3>
            <div class="progress">
                <div class="progress-bar" style="width: 30%;"></div>
            </div>

            <a href="{{ route('admin.student.add') }}" class="btn btn-primary">NOVO ALUNO <i class="fas fa-plus"></i></a>
            <br>
            <br>
            @include('table._students', ['user' => $user])
        </div>
    </div>
</div>

@endsection