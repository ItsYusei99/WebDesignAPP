<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dar de Alta Nuevo Empleado (Staff Interno)
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            
            <div style="margin-bottom: 25px; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px;">
                <a href="{{ route('users.index') }}" style="color: #6366f1; text-decoration: none; font-size: 14px; font-weight: bold;">
                    &larr; Volver a la Lista General
                </a>
            </div>

            <p style="color: #6b7280; font-size: 14px; margin-bottom: 30px;">
                Complete el siguiente formulario para registrar un nuevo empleado en la plataforma "Halcón". Asegúrese de asignar el departamento correcto para definir sus permisos de acceso.
            </p>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    
                    <div>
                        <div style="margin-bottom: 18px;">
                            <label style="font-weight: bold; display: block; margin-bottom: 6px; color: #374151;">Nombre Completo:</label>
                            <input type="text" name="name" required placeholder="Ej. Juan Pérez García" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;">
                        </div>

                        <div style="margin-bottom: 18px;">
                            <label style="font-weight: bold; display: block; margin-bottom: 6px; color: #374151;">Correo Electrónico (Corporativo):</label>
                            <input type="email" name="email" required placeholder="ejemplo@halcon.com.mx" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;">
                        </div>

                        <div style="margin-bottom: 18px;">
                            <label style="font-weight: bold; display: block; margin-bottom: 6px; color: #374151;">Departamento / Rol de Acceso:</label>
                            <select name="department_id" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; background-color: white; color: #1f2937;">
                                <option value="">-- Selecciona un Rol --</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">Departamento de {{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div style="background-color: #f9fafb; padding: 20px; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <h4 style="font-weight: bold; color: #4338ca; margin-bottom: 15px; text-transform: uppercase; font-size: 13px; letter-spacing: 0.05em;">Credenciales de Acceso</h4>
                        
                        <div style="margin-bottom: 18px;">
                            <label style="font-weight: bold; display: block; margin-bottom: 6px; color: #374151;">Contraseña Temporal:</label>
                            <input type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;">
                            <p style="font-size: 11px; color: #6b7280; margin-top: 4px;">Mínimo 8 caracteres. El empleado debe cambiarla en su primer inicio de sesión.</p>
                        </div>

                        <div style="margin-bottom: 5px;">
                            <label style="font-weight: bold; display: block; margin-bottom: 6px; color: #374151;">Confirmar Contraseña:</label>
                            <input type="password" name="password_confirmation" required style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;">
                        </div>
                    </div>

                </div>

                <div style="margin-top: 40px; padding-top: 20px; border-top: 2px solid #e5e7eb; text-align: right;">
                    <a href="{{ route('users.index') }}" style="margin-right: 20px; color: #6b7280; text-decoration: underline; font-size: 14px;">
                        Cancelar
                    </a>
                    <button type="submit" style="background-color: #4f46e5; color: white; padding: 12px 30px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; transition: background-color 0.2s;">
                        Finalizar Registro e Invitar
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>