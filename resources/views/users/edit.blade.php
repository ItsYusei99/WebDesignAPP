<h2>Editar Usuario: {{ $user->name }}</h2>
<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf @method('PUT')
    <input type="text" name="name" value="{{ $user->name }}" placeholder="Nombre">
    <br>
    <select name="department_id">
        @foreach($departments as $dept)
            <option value="{{ $dept->id }}" {{ $user->department_id == $dept->id ? 'selected' : '' }}>
                {{ $dept->name }}
            </option>
        @endforeach
    </select>
    <br>
    <label>Estatus:</label>
    <select name="is_active">
        <option value="1" {{ $user->is_active ? 'selected' : '' }}>Activo</option>
        <option value="0" {{ $user->is_active ? 'selected' : '' }}>Inactivo</option>
    </select>
    <br>
    <button type="submit">Actualizar</button>
</form>