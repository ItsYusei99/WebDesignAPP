<h1>Panel de Administración - Halcón</h1>
<nav>
    <ul>
        <li><a href="{{ route('users.index') }}">Gestionar Usuarios</a> (Listado, Roles, Activar/Desactivar)</li>
        <li><a href="{{ route('orders.index') }}">Gestionar Pedidos</a> (Crear, Editar, Fotos)</li>
        <li><a href="{{ route('orders.archived') }}">Pedidos Archivados</a> (Recuperar eliminados)</li>
        <li><a href="/">Ir al Buscador Público</a></li>
    </ul>
</nav>