<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome'); // (Main view name also works here)
    }

    public function search(Request $request)
    {
        // We'll look for the order using the ticker number provided by the user
        $order = Order::where('invoice_number', $request->invoice)->first();
        
        return view('welcome', compact('order'));
    }
}