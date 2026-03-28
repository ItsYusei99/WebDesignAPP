<h2>Gestión de Pedidos</h2>
<a href="{{ route('orders.create') }}">Crear Nuevo Pedido</a> | 
<a href="{{ route('orders.archived') }}">Ver Archivados</a>

<table border="1" style="width:100%; margin-top:10px;">
    <thead>
        <tr>
            <th>Factura</th>
            <th>Cliente</th>
            <th>Status</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->invoice_number }}</td>
            <td>{{ $order->customer_number }}</td>
            <td>{{ $order->status }}</td>
            <td>
                <a href="{{ route('orders.edit', $order) }}">Editar / Cambiar Status</a>
                <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Eliminar (Lógico)</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>