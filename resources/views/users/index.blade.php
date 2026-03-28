<h2>Lista General de Usuarios</h2>
<a href="{{ route('users.create') }}">Crear Nuevo Usuario</a>
<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Departamento</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->department->name ?? 'Sin asignar' }}</td>
            <td>{{ $user->is_active ? 'Activo' : 'Inactivo' }}</td>
            <td><a href="{{ route('users.edit', $user) }}">Editar</a></td>
        </tr>
        @endforeach
    </tbody>
</table>