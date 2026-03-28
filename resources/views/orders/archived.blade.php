<h2>Pedidos Archivados</h2>
<a href="{{ route('orders.index') }}">Volver a lista activa</a>
<table border="1">
    @foreach($archivedOrders as $order)
    <tr>
        <td>{{ $order->invoice_number }}</td>
        <td>
            <form action="{{ route('orders.restore', $order->id) }}" method="POST">
                @csrf
                <button type="submit">Recuperar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>