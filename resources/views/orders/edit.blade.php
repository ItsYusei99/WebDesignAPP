<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Actualizar Estatus y Evidencias: Factura {{ $order->invoice_number }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label style="font-weight: bold; display: block; margin-bottom: 8px;">Estatus del Pedido:</label>
                    <select name="status" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                        <option value="Ordered" {{ $order->status == 'Ordered' ? 'selected' : '' }}>Ordered (Pedido)</option>
                        <option value="In process" {{ $order->status == 'In process' ? 'selected' : '' }}>In process (En proceso)</option>
                        <option value="In route" {{ $order->status == 'In route' ? 'selected' : '' }}>In route (En ruta)</option>
                        <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered (Entregado)</option>
                    </select>
                </div>

                <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">

                @if(auth()->user()->department && auth()->user()->department->name == 'Route')
                    <div style="background-color: #f8fafc; padding: 15px; border-left: 4px solid #3b82f6; margin-bottom: 20px;">
                        <h3 style="color: #1e40af; font-weight: bold; margin-bottom: 15px;">Zona Exclusiva de Repartidores (Route)</h3>
                        
                        <div style="margin-bottom: 20px;">
                            <label style="font-weight: bold; display: block; margin-bottom: 8px;">Foto de Carga (Evidencia Inicial):</label>
                            <input type="file" name="photo_loading" accept="image/*" style="display: block;">
                            @if($order->photo_loading)
                                <p style="font-size: 12px; color: green; margin-top: 5px;">Ya existe una foto cargada.</p>
                            @endif
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="font-weight: bold; display: block; margin-bottom: 8px;">Foto de Entrega (Evidencia Final):</label>
                            <input type="file" name="photo_delivery" accept="image/*" style="display: block;">
                            @if($order->photo_delivery)
                                <p style="font-size: 12px; color: green; margin-top: 5px;">Ya existe una foto de entrega.</p>
                            @endif
                        </div>
                    </div>
                @else
                    <div style="background-color: #f3f4f6; padding: 15px; text-align: center; color: #6b7280; font-style: italic; border-radius: 5px; margin-bottom: 20px;">
                        La subida de evidencias fotográficas es exclusiva del departamento de Ruta.
                    </div>
                @endif

                <div style="margin-top: 30px;">
                    <button type="submit" style="background-color: #10b981; color: white; padding: 12px 25px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
                        Actualizar Pedido
                    </button>
                    <a href="{{ route('orders.index') }}" style="margin-left: 15px; color: #6b7280; text-decoration: underline;">
                        Cancelar
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>