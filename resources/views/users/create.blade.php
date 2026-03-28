<h1>Crear Nuevo Usuario</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    
    <div style="margin-bottom: 10px;">
        <label>Nombre:</label><br>
        <input type="text" name="name" required placeholder="Nombre completo">
    </div>

    <div style="margin-bottom: 10px;">
        <label>Correo Electrónico:</label><br>
        <input type="email" name="email" required placeholder="correo@ejemplo.com">
    </div>

    <div style="margin-bottom: 10px;">
        <label>Contraseña:</label><br>
        <input type="password" name="password" required>
    </div>

    <div style="margin-bottom: 10px;">
        <label>Departamento / Rol:</label><br>
        <select name="department_id" required>
            <option value="">Selecciona un departamento</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" style="background-color: green; color: white; padding: 10px;">
        Guardar Usuario
    </button>
    
    <a href="{{ route('users.index') }}">Cancelar</a>
</form>