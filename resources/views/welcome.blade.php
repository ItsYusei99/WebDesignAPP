<h1>Distribuidora Halcón - Rastreo</h1>
<form action="{{ route('home') }}" method="GET">
    <input type="text" name="invoice" placeholder="Número de Factura" required>
    <button type="submit">Buscar</button>
</form>

@if($order)
    <div style="margin-top:20px; border:1px solid #000; padding:10px;">
        <h3>Pedido: {{ $order->invoice_number }}</h3>
        <p>Estado: {{ strtoupper($order->status) }}</p>

        @if($order->status == 'delivered')
            <p><strong>Fecha de entrega:</strong> {{ $order->updated_at }}</p>
            @if($order->evidence_photo)
                <img src="{{ asset('storage/' . $order->evidence_photo) }}" width="300">
            @endif
        @else
            <p><strong>En proceso:</strong> {{ $order->process_name }}</p>
            <p><strong>Fecha actualización:</strong> {{ $order->updated_at }}</p>
        @endif
    </div>
@elseif(request()->has('invoice'))
    <p>No se encontró el pedido.</p>
@endif