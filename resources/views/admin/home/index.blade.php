@extends('base.cliente.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Dashboard</h3>
            <div class="progress">
                <div class="progress-bar" style="width: 30%;"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">VEÍCULOS</h3>
                </div>
                <div class="panel-body">
                    <center><h3>{{ count($user->vehicles) }}</h3></center>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">ALUNOS</h3>
                </div>
                <div class="panel-body">
                    <center><h3>{{ count($user->students) }}</h3></center>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">CONDUTORES</h3>
                </div>
                <div class="panel-body">
                    <center><h3>{{ count($user->drivers) }}</h3></center>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection