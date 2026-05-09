<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Directorio de Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <div style="margin-bottom: 20px; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px;">
                <a href="{{ route('dashboard') }}" style="color: #4b5563; text-decoration: none; font-size: 14px; font-weight: bold;">
                    &larr; Volver al Dashboard Principal
                </a>
            </div>
            
            <div class="mb-6">
                <a href="{{ route('clients.create') }}" style="background-color: #3b82f6; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none; font-weight: bold; display: inline-block;">
                    + Crear Nuevo Cliente
                </a>
            </div>

            <table style="width: 100%; border-collapse: collapse; text-align: left; border: 1px solid #e5e7eb;">
                <thead style="background-color: #f3f4f6;">
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 12px;">No. Cliente</th>
                        <th style="border: 1px solid #ddd; padding: 12px;">Nombre</th>
                        <th style="border: 1px solid #ddd; padding: 12px;">Dirección</th>
                        <th style="border: 1px solid #ddd; padding: 12px; text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr class="hover:bg-gray-50">
                        <td style="border: 1px solid #ddd; padding: 12px; font-weight: bold; color: #111827;">
                            {{ $client->customer_number }}
                        </td>
                        <td style="border: 1px solid #ddd; padding: 12px;">{{ $client->name }}</td>
                        <td style="border: 1px solid #ddd; padding: 12px; font-size: 14px; color: #4b5563;">
                            {{ $client->address }}
                        </td>
                        <td style="border: 1px solid #ddd; padding: 12px; text-align: center;">
                            
                            <a href="{{ route('clients.edit', $client->id) }}" 
                               style="color: #3b82f6; text-decoration: underline; margin-right: 15px; font-size: 14px; font-weight: bold;">
                               Editar
                            </a>

                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" 
                                        style="color: #ef4444; text-decoration: underline; background: none; border: none; cursor: pointer; font-size: 14px; font-weight: bold;" 
                                        onclick="return confirm('¿Seguro que deseas eliminar a {{ $client->name }}?')">
                                    Eliminar
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($clients->isEmpty())
                <p class="text-center text-gray-500 mt-6">No hay clientes registrados en el sistema.</p>
            @endif

        </div>
    </div>
</x-app-layout>