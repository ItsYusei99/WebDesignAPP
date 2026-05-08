<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreo de Pedidos - Halcón</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Rastrea tu Pedido</h2>
        
        <form action="{{ route('public.search') }}" method="GET" class="mb-6">
            <label class="block text-sm font-bold mb-2">Número de Factura (Invoice Number)</label>
            <input type="text" name="invoice" value="{{ $query ?? '' }}" class="border rounded w-full py-2 px-3 mb-3" required>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded w-full">Buscar</button>
        </form>

        @if($query)
            @if($order)
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    <p><strong>Cliente:</strong> {{ $order->client->name }}</p>
                    <p><strong>Estatus:</strong> <span class="uppercase font-bold">{{ $order->status }}</span></p>
                    <p><strong>Dirección:</strong> {{ $order->delivery_address }}</p>
                    @if($order->photo_delivery)
                        <p class="mt-2 font-bold text-sm">Evidencia de entrega disponible.</p>
                    @endif
                </div>
            @else
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    No se encontró ningún pedido con ese número de factura.
                </div>
            @endif
        @endif
    </div>
</body>
</html>