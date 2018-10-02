<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>NOME</th>
            <th class="text-center">AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user->drivers as $driver)
            <tr>
                <td>{{ $driver->name }} {{ $driver->lastname }}</td>
                <td class="text-center">
                    <a href="{{ route('admin.vehicle.attach.driver', [$vehicle->id, $driver->id]) }}">Adicionar <i class="fas fa-plus"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>