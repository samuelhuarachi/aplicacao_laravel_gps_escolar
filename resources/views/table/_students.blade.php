<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>NOME</th>
            <th>E-MAIL</th>
            <th class="text-center">AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user->students as $student)
            <tr>
                <td>{{ $student->name }} {{ $student->lastname }}</td>
                <td>{{ $student->email }}</td>
                <td class="text-center">
                    <i class="far fa-edit"></i>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>