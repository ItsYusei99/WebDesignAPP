<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Nuevo Pedido</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                
                <!-- Mandamos el estatus inicial por defecto de manera oculta -->
                <input type="hidden" name="status" value="Ordered">

                <div style="margin-bottom: 15px;">
                    <label style="font-weight: bold; display: block; margin-bottom: 5px;">Cliente:</label>
                    <select name="client_id" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="">-- Selecciona un Cliente --</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }} ({{ $client->customer_number }})</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="font-weight: bold; display: block; margin-bottom: 5px;">Número de Factura (Invoice Number):</label>
                    <input type="text" name="invoice_number" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="font-weight: bold; display: block; margin-bottom: 5px;">Dirección de Entrega:</label>
                    <textarea name="delivery_address" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                </div>

                <button type="submit" style="background-color: #10b981; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
                    Guardar Pedido
                </button>
                <a href="{{ route('orders.index') }}" style="margin-left: 15px; color: gray; text-decoration: underline;">Cancelar</a>
            </form>

        </div>
    </div>
</x-app-layout>