<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de Usuarios y Roles (Staff Interno)
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

            <div style="margin-bottom: 20px;">
                <a href="{{ route('users.create') }}" style="background-color: #6366f1; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none; font-weight: bold; display: inline-block;">
                    + Dar de Alta Nuevo Empleado
                </a>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; text-align: left; min-width: 600px;">
                    <thead style="background-color: #f3f4f6; border-bottom: 2px solid #e5e7eb;">
                        <tr>
                            <th style="padding: 12px 15px; color: #374151;">Nombre</th>
                            <th style="padding: 12px 15px; color: #374151;">Correo Electrónico</th>
                            <th style="padding: 12px 15px; color: #374151;">Departamento / Rol</th>
                            <th style="padding: 12px 15px; color: #374151;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr style="border-bottom: 1px solid #e5e7eb; transition: background-color 0.2s;">
                            <td style="padding: 12px 15px; font-weight: bold; color: #111827;">
                                {{ $user->name }}
                            </td>
                            <td style="padding: 12px 15px; color: #4b5563;">
                                {{ $user->email }}
                            </td>
                            <td style="padding: 12px 15px;">
                                <span style="background-color: #e0e7ff; color: #3730a3; padding: 4px 10px; border-radius: 12px; font-size: 13px; font-weight: bold;">
                                    {{ $user->department->name ?? 'Sin Asignar' }}
                                </span>
                            </td>
                            <td style="padding: 12px 15px;">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" style="color: #ef4444; font-weight: bold; text-decoration: underline; background: none; border: none; cursor: pointer;" onclick="return confirm('¿Seguro que deseas eliminar el acceso a este empleado?')">
                                        Eliminar Acceso
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>