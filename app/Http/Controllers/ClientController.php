<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Muestra el directorio de clientes de la distribuidora.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Formulario para dar de alta a un nuevo cliente.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Guarda el nuevo cliente tras validar sus datos fiscales.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_number' => 'required|unique:clients,customer_number',
            'name'            => 'required|string|max:255',
            'fiscal_data'     => 'required|string',
            'address'         => 'required|string',
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Cliente registrado exitosamente en el sistema Halcón.');
    }

    /**
     * Muestra el perfil detallado de un cliente.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Formulario para editar los datos de un cliente existente.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Actualiza la información del cliente en la base de datos.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            // La excepción del ID permite guardar sin cambiar el número de cliente
            'customer_number' => 'required|unique:clients,customer_number,' . $client->id,
            'name'            => 'required|string|max:255',
            'fiscal_data'     => 'required|string',
            'address'         => 'required|string',
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Información del cliente actualizada correctamente.');
    }

    /**
     * Elimina permanentemente a un cliente del directorio.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Cliente eliminado del sistema.');
    }
}