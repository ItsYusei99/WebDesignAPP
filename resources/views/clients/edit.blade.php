<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div style="margin-bottom: 20px; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px;">
                <a href="{{ route('clients.index') }}" style="color: #4b5563; text-decoration: none; font-size: 14px; font-weight: bold;">
                    &larr; Volver al Directorio de Clientes
                </a>
            </div>

            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">No. Cliente:</label>
                    <input type="text" name="customer_number" 
                           value="{{ old('customer_number', $client->customer_number) }}" 
                           class="w-full border rounded p-2 @error('customer_number') border-red-500 @enderror">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Nombre del Cliente:</label>
                    <input type="text" name="name" 
                           value="{{ old('name', $client->name) }}" 
                           class="w-full border rounded p-2 @error('name') border-red-500 @enderror">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Datos Fiscales:</label>
                    <input type="text" name="fiscal_data" 
                           value="{{ old('fiscal_data', $client->fiscal_data) }}" 
                           class="w-full border rounded p-2 @error('fiscal_data') border-red-500 @enderror">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Dirección:</label>
                    <textarea name="address" class="w-full border rounded p-2 @error('address') border-red-500 @enderror" rows="3">{{ old('address', $client->address) }}</textarea>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <a href="{{ route('clients.index') }}" class="text-gray-600 mr-4">Cancelar</a>
                    <button type="submit" style="background-color: #3b82f6; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold;">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>