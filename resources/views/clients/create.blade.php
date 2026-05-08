<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Nuevo Cliente
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <form action="{{ route('clients.store') }}" method="POST">
                @csrf
                
                <div style="margin-bottom: 15px;">
                    <label style="font-weight: bold; display: block; margin-bottom: 5px;">Número de Cliente:</label>
                    <input type="text" name="customer_number" required placeholder="Ej. CUST-001" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="font-weight: bold; display: block; margin-bottom: 5px;">Razón Social (Nombre):</label>
                    <input type="text" name="name" required placeholder="Ej. Constructora del Norte S.A. de C.V." style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="font-weight: bold; display: block; margin-bottom: 5px;">Datos Fiscales (RFC, Régimen, etc.):</label>
                    <textarea name="fiscal_data" required rows="3" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                </div>

                <div style="margin-bottom: 25px;">
                    <label style="font-weight: bold; display: block; margin-bottom: 5px;">Dirección de Entrega Principal:</label>
                    <textarea name="address" required rows="3" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                </div>

                <div style="margin-top: 30px; padding-top: 15px; border-top: 1px solid #eee;">
                    <button type="submit" style="background-color: #10b981; color: white; padding: 12px 25px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
                        Guardar Cliente
                    </button>
                    <a href="{{ route('clients.index') }}" style="margin-left: 15px; color: #6b7280; text-decoration: underline;">
                        Cancelar
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>