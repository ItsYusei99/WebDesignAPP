<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de Administración - Halcón
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div style="background-color: #1e3a8a; color: white; padding: 25px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <h3 style="font-size: 24px; font-weight: bold; margin-bottom: 5px;">¡Bienvenido de vuelta, {{ auth()->user()->name }}!</h3>
                <p style="color: #bfdbfe;">
                    Departamento asignado: <strong>{{ auth()->user()->department->name ?? 'Administración General' }}</strong>
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                
                <div style="background-color: white; border: 1px solid #e5e7eb; border-radius: 10px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); text-align: center;">
                    <div style="font-size: 40px; margin-bottom: 15px;">📦</div>
                    <h4 style="font-size: 18px; font-weight: bold; color: #374151; margin-bottom: 10px;">Gestión de Pedidos</h4>
                    <p style="font-size: 14px; color: #6b7280; margin-bottom: 20px;">Crea, rastrea y actualiza el estatus de las órdenes.</p>
                    <a href="{{ route('orders.index') }}" style="display: block; background-color: #3b82f6; color: white; padding: 10px; border-radius: 6px; font-weight: bold; text-decoration: none;">Ir a Pedidos &rarr;</a>
                </div>

                <div style="background-color: white; border: 1px solid #e5e7eb; border-radius: 10px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); text-align: center;">
                    <div style="font-size: 40px; margin-bottom: 15px;">🏢</div>
                    <h4 style="font-size: 18px; font-weight: bold; color: #374151; margin-bottom: 10px;">Directorio de Clientes</h4>
                    <p style="font-size: 14px; color: #6b7280; margin-bottom: 20px;">Administra la información y datos fiscales.</p>
                    <a href="{{ route('clients.index') }}" style="display: block; background-color: #10b981; color: white; padding: 10px; border-radius: 6px; font-weight: bold; text-decoration: none;">Ir a Clientes &rarr;</a>
                </div>

                <div style="background-color: white; border: 1px solid #e5e7eb; border-radius: 10px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); text-align: center;">
                    <div style="font-size: 40px; margin-bottom: 15px;">👥</div>
                    <h4 style="font-size: 18px; font-weight: bold; color: #374151; margin-bottom: 10px;">Gestión de Usuarios</h4>
                    <p style="font-size: 14px; color: #6b7280; margin-bottom: 20px;">Alta de personal y asignación de roles.</p>
                    <a href="{{ route('users.index') }}" style="display: block; background-color: #6366f1; color: white; padding: 10px; border-radius: 6px; font-weight: bold; text-decoration: none;">Ir a Usuarios &rarr;</a>
                </div>

                <div style="background-color: white; border: 1px solid #e5e7eb; border-radius: 10px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); text-align: center;">
                    <div style="font-size: 40px; margin-bottom: 15px;">🛠️</div>
                    <h4 style="font-size: 18px; font-weight: bold; color: #374151; margin-bottom: 10px;">Inventario</h4>
                    <p style="font-size: 14px; color: #6b7280; margin-bottom: 20px;">Catálogo de materiales de construcción.</p>
                    <a href="{{ route('products.index') }}" style="display: block; background-color: #f59e0b; color: white; padding: 10px; border-radius: 6px; font-weight: bold; text-decoration: none;">Ir a Inventario &rarr;</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>