<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de Pedidos
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            
            <div style="margin-bottom: 20px; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px;">
    <a href="{{ route('dashboard') }}" style="color: #4b5563; text-decoration: none; font-size: 14px; font-weight: bold; transition: color 0.2s;">
        &larr; Volver al Dashboard Principal
    </a>
</div>
            
            @if(session('success'))
                <div style="background-color: #d1fae5; border-left: 4px solid #10b981; color: #065f46; padding: 15px; margin-bottom: 20px; border-radius: 4px; font-weight: bold;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <div style="margin-bottom: 20px; display: flex; justify-content: space-between;">
                <a href="{{ route('orders.create') }}" style="background-color: #3b82f6; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none; font-weight: bold; display: inline-block;">
                    + Crear Nuevo Pedido
                </a>
                <a href="{{ route('orders.archived') }}" style="background-color: #6b7280; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none; font-weight: bold; display: inline-block;">
                    Ver Archivados
                </a>
            </div>

            <div style="background-color: #f9fafb; border: 1px solid #e5e7eb; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <form action="{{ route('orders.index') }}" method="GET" style="display: flex; gap: 15px; align-items: flex-end; flex-wrap: wrap;">
                    
                    <div>
                        <label style="font-size: 12px; font-weight: bold; color: #374151;">Factura:</label><br>
                        <input type="text" name="invoice_number" value="{{ request('invoice_number') }}" placeholder="Ej. FAC-100" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 150px;">
                    </div>

                    <div>
                        <label style="font-size: 12px; font-weight: bold; color: #374151;">No. Cliente:</label><br>
                        <input type="text" name="customer_number" value="{{ request('customer_number') }}" placeholder="Ej. CUST-01" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 150px;">
                    </div>

                    <div>
                        <label style="font-size: 12px; font-weight: bold; color: #374151;">Fecha:</label><br>
                        <input type="date" name="date" value="{{ request('date') }}" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div>
                        <label style="font-size: 12px; font-weight: bold; color: #374151;">Estatus:</label><br>
                        <select name="status" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">Todos</option>
                            <option value="Ordered" {{ request('status') == 'Ordered' ? 'selected' : '' }}>Ordered</option>
                            <option value="In process" {{ request('status') == 'In process' ? 'selected' : '' }}>In process</option>
                            <option value="In route" {{ request('status') == 'In route' ? 'selected' : '' }}>In route</option>
                            <option value="Delivered" {{ request('status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                        </select>
                    </div>

                    <div style="padding-bottom: 2px;">
                        <button type="submit" style="background-color: #1f2937; color: white; padding: 8px 15px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">
                            Buscar
                        </button>
                        <a href="{{ route('orders.index') }}" style="color: #6b7280; text-decoration: underline; margin-left: 10px; font-size: 14px;">Limpiar</a>
                    </div>
                </form>
            </div>

            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead style="background-color: #f3f4f6;">
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px;">Factura</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Cliente</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Fecha</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Estatus</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;">{{ $order->invoice_number }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            {{ $order->client->name ?? 'N/A' }} 
                            <br><span style="font-size: 12px; color: #6b7280;">{{ $order->client->customer_number ?? '' }}</span>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px; font-size: 14px;">{{ $order->created_at->format('d/m/Y') }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <span style="background-color: #dbeafe; color: #1e40af; padding: 4px 8px; border-radius: 12px; font-size: 14px; font-weight: bold;">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <a href="{{ route('orders.edit', $order) }}" style="color: #4f46e5; text-decoration: underline; font-weight: bold; margin-right: 15px;">
                                Editar / Estatus
                            </a>
                            
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" style="color: red; text-decoration: underline; font-weight: bold; background: none; border: none; cursor: pointer;" onclick="return confirm('¿Seguro que deseas archivar este pedido?')">
                                    Eliminar (Lógico)
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="border: 1px solid #ddd; padding: 15px; text-align: center; color: #6b7280;">
                            No se encontraron pedidos con esos filtros.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>