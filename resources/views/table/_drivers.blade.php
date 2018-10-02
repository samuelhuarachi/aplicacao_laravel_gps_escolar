<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>NOME</th>
            <th>RG</th>
            <th class="text-center">AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user->drivers as $driver)
            <tr>
                <td>{{ $driver->name }} {{ $driver->lastname }}</td>
                <td>{{ $driver->rg }}</td>
                <td class="text-center">
                    <i class="far fa-edit"></i>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>