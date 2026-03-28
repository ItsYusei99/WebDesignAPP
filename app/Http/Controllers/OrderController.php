<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // General list of requests, ordered from last one to first one
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        Order::create($request->all());
        return redirect()->route('orders.index');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->except(['evidence_photo']));
        return redirect()->route('orders.index');
    }

    // Special method to update the status and upload the photo
    public function updateStatus(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->process_name = $request->process_name;

        if ($request->hasFile('evidence_photo') && in_array($request->status, ['in_route', 'delivered'])) {
            $path = $request->file('evidence_photo')->store('evidences', 'public');
            $order->evidence_photo = $path;
        }

        $order->save();
        return back();
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function archived()
    {
        $archivedOrders = Order::onlyTrashed()->get();
        return view('orders.archived', compact('archivedOrders'));
    }

    public function restore($id)
    {
        Order::withTrashed()->find($id)->restore();
        return redirect()->route('orders.archived');
    }
    public function publicSearch(Request $request)
{
    $order = null;
    if ($request->has('invoice')) {
        $order = Order::where('invoice_number', $request->invoice)->first();
    }
    return view('welcome', compact('order'));
}
}
