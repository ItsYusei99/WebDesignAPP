<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;

class OrderController extends Controller
{
 
public function index(\Illuminate\Http\Request $request)
    {
        // Iniciamos la consulta trayendo también los datos del cliente
        $query = Order::with('client');

        // Filtro 1: Por Número de Factura
        if ($request->filled('invoice_number')) {
            $query->where('invoice_number', 'like', '%' . $request->invoice_number . '%');
        }

        // Filtro 2: Por Número de Cliente (Buscamos dentro de la relación)
        if ($request->filled('customer_number')) {
            $query->whereHas('client', function($q) use ($request) {
                $q->where('customer_number', 'like', '%' . $request->customer_number . '%');
            });
        }

        // Filtro 3: Por Fecha
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // Filtro 4: Por Estatus
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Ejecutamos la consulta con los filtros aplicados (si los hay)
        $orders = $query->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all(); // Necesitamos los clientes para el menú desplegable
        return view('orders.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoice_number' => 'required|unique:orders,invoice_number',
            'delivery_address' => 'required|string',
        ]);

        // Al crear, el estatus por defecto será 'Ordered' como pide el requerimiento
        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Orden creada exitosamente.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $clients = Client::all();
        return view('orders.edit', compact('order', 'clients'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoice_number' => 'required|unique:orders,invoice_number,' . $order->id,
            'delivery_address' => 'required|string',
            'status' => 'required|in:Ordered,In process,In route,Delivered',
            'photo_loading' => 'nullable|image|max:2048',
            'photo_delivery' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        // Lógica para guardar las fotos si el usuario (Ruta) las sube
        if ($request->hasFile('photo_loading')) {
            $data['photo_loading'] = $request->file('photo_loading')->store('evidences', 'public');
        }
        if ($request->hasFile('photo_delivery')) {
            $data['photo_delivery'] = $request->file('photo_delivery')->store('evidences', 'public');
        }

        $order->update($data);
        return redirect()->route('orders.index')->with('success', 'Orden actualizada exitosamente.');
    }

    public function updateStatus(Request $request, \App\Models\Order $order)
    {
        // 1. Validamos que el estatus sea correcto y las fotos sean válidas
        $request->validate([
            'status' => 'required|in:Ordered,In process,In route,Delivered',
            'photo_loading' => 'nullable|image|max:2048',
            'photo_delivery' => 'nullable|image|max:2048',
        ]);

        $data = ['status' => $request->status];

        // 2. Guardamos las fotos en la carpeta 'public/evidences' si es que se subieron
        if ($request->hasFile('photo_loading')) {
            $data['photo_loading'] = $request->file('photo_loading')->store('evidences', 'public');
        }
        if ($request->hasFile('photo_delivery')) {
            $data['photo_delivery'] = $request->file('photo_delivery')->store('evidences', 'public');
        }

        // 3. Actualizamos la base de datos
        $order->update($data);

        return redirect()->route('orders.index')->with('success', 'Estatus y evidencias actualizados correctamente.');
    }

    public function destroy(Order $order)
    {
        $order->delete(); 
        return redirect()->route('orders.index')->with('success', 'Orden eliminada lógicamente.');
    }

    public function archived()
    {
        $orders = Order::onlyTrashed()->with('client')->get();
        return view('orders.archived', compact('orders'));
    }

    public function restore($id)
    {
        $order = \App\Models\Order::withTrashed()->findOrFail($id);
        
        $order->restore();

        return redirect()->route('orders.index')->with('success', '¡El pedido ' . $order->invoice_number . ' fue restaurado con éxito!');
    }
}
