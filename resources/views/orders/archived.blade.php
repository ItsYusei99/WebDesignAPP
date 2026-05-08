<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pedidos Archivados (Eliminados Lógicamente)</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            
            @if(session('success'))
                <div style="background-color: #d1fae5; border-left: 4px solid #10b981; color: #065f46; padding: 15px; margin-bottom: 20px; border-radius: 4px; font-weight: bold;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('orders.index') }}" style="color: #3b82f6; text-decoration: underline; margin-bottom: 20px; display: inline-block;">
                &larr; Volver a Pedidos Activos
            </a>
            
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead style="background-color: #f3f4f6;">
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px;">Factura</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Cliente</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Estatus</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Fecha de Borrado</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr style="background-color: #fef2f2;">
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;">{{ $order->invoice_number }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $order->client->name ?? 'N/A' }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <span style="background-color: #e5e7eb; color: #374151; padding: 4px 8px; border-radius: 12px; font-size: 14px; font-weight: bold;">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 8px; font-size: 14px;">{{ $order->deleted_at->format('d/m/Y H:i') }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <form action="{{ route('orders.restore', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" style="color: #10b981; font-weight: bold; text-decoration: underline; background: none; border: none; cursor: pointer;" onclick="return confirm('¿Restaurar este pedido a la lista activa?')">
                                    Restaurar Pedido
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="border: 1px solid #ddd; padding: 15px; text-align: center; color: #6b7280;">
                            No hay pedidos archivados en este momento.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>