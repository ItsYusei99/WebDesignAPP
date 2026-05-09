<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventario de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <div style="margin-bottom: 20px; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px;">
                <a href="{{ route('dashboard') }}" style="color: #4b5563; text-decoration: none; font-size: 14px; font-weight: bold;">
                    &larr; Volver al Dashboard Principal
                </a>
            </div>
            
            <a href="{{ route('products.create') }}" style="background-color: #3b82f6; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none; font-weight: bold; display: inline-block; margin-bottom: 20px;">
                + Crear Nuevo Producto
            </a>

            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead style="background-color: #f3f4f6;">
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 10px;">Nombre</th>
                        <th style="border: 1px solid #ddd; padding: 10px;">Stock</th>
                        <th style="border: 1px solid #ddd; padding: 10px;">Precio</th>
                        <th style="border: 1px solid #ddd; padding: 10px; text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 10px; font-weight: bold;">{{ $product->name }}</td>
                        <td style="border: 1px solid #ddd; padding: 10px;">{{ $product->stock }} unidades</td>
                        <td style="border: 1px solid #ddd; padding: 10px;">${{ number_format($product->price, 2) }}</td>
                        <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">
                            
                            <a href="{{ route('products.edit', $product->id) }}" 
                               style="color: #3b82f6; text-decoration: underline; margin-right: 15px; font-size: 14px;">
                               Editar
                            </a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" 
                                        style="color: #ef4444; text-decoration: underline; background: none; border: none; cursor: pointer; font-size: 14px;" 
                                        onclick="return confirm('¿Seguro que deseas eliminar {{ $product->name }}?')">
                                    Eliminar
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>