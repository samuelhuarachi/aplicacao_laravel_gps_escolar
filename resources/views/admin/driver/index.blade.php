@extends('base.cliente.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Condutores</h3>
            <div class="progress">
                <div class="progress-bar" style="width: 30%;"></div>
            </div>
            
            <a href="{{ route('admin.driver.add') }}" class="btn btn-primary">NOVO CONDUTOR <i class="fas fa-plus"></i></a>
            <br>
            <br>
            @include('table._drivers', ['user' => $user])
        </div>
    </div>
</div>

@endsection