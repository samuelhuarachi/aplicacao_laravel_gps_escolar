@extends('base.cliente.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Financeiro</h3>
            <div class="progress">
                <div class="progress-bar" style="width: 30%;"></div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>PLACA</th>
                                <th>DIAS</th>
                                <th>CRIADO EM</th>
                                <th>FINALIZADO EM</th>
                                <th class="text-center">VALOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Esse trecho de código, consome muita
                                memória, dar um jeito de arrumar isso,
                                pré processar isso e armazenar em cache --}}
                            @foreach($user->allVehicles as $vehicle)
                                <tr>
                                    <td>{!! $vehicle->active == true ? "<img src='/images/active2.png' />" : "" !!} {{ $vehicle->placa }}</td>
                                    <td>{{ $billingService->getCostByVehicle($vehicle, $start, $finish, $costPerDay)->days() }} DIA(S)</td>
                                    <td>{{ date("d/m/Y", strtotime($vehicle->created_at)) }}</td>
                                    <td>{!! $vehicle->close_at ? date("d/m/Y", strtotime($vehicle->close_at)) : "-" !!}</td>
                                    <td class="text-center">
                                        R$ {{ $currencyService->realFormat($billingService->getCostByVehicle($vehicle, $start, $finish, $costPerDay)->cost()) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection