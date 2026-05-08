<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halcon - Rastreo de Pedidos</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

   
    <nav class="bg-blue-900 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 text-white text-2xl font-bold tracking-wider">
                    🦅 HALCON
                </div>
                <div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-white hover:text-blue-200 px-3 py-2 rounded-md font-medium text-sm">Ir al Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white bg-blue-700 hover:bg-blue-600 px-4 py-2 rounded-md font-medium text-sm transition">Iniciar Sesión (Staff)</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    
    <main class="flex-grow flex items-center justify-center p-6">
        <div class="max-w-md w-full bg-white rounded-xl shadow-2xl overflow-hidden">
            <div class="bg-blue-600 p-6 text-center">
                <h2 class="text-2xl font-bold text-white">Rastrea tu pedido</h2>
                <p class="text-blue-100 mt-2 text-sm">Ingresa tus datos para conocer el estatus de tu material de construcción.</p>
            </div>

            <div class="p-8">
               
                @if (session('error'))
                    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
                        <p class="font-bold">Aviso</p>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                @endif

                
                <form action="{{ route('rastreo.search') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="customer_number">Número de Cliente</label>
                        <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="customer_number" name="customer_number" type="text" placeholder="Ej. CUST-001" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="invoice_number">Número de Factura</label>
                        <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="invoice_number" name="invoice_number" type="text" placeholder="Ej. FAC-100" required>
                    </div>

                    <div class="flex items-center justify-between">
                        <button class="w-full bg-blue-600 hover:bg-blue-800 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300" type="submit">
                            Buscar Pedido
                        </button>
                    </div>
                </form>

                
                @if(isset($order))
                    <div class="mt-8 border-t pt-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 text-center">Resultados de tu búsqueda</h3>
                        
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <p class="text-sm text-gray-600"><strong>Cliente:</strong> {{ $order->client->name }}</p>
                            <p class="text-sm text-gray-600 mt-2"><strong>Factura:</strong> {{ $order->invoice_number }}</p>
                            
                            <div class="mt-4 flex items-center justify-between bg-white p-3 rounded shadow-sm border border-gray-100">
                                <span class="text-sm font-bold text-gray-700">Estatus:</span>
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                                    @if($order->status == 'Ordered') bg-yellow-100 text-yellow-800 
                                    @elseif($order->status == 'In process') bg-blue-100 text-blue-800 
                                    @elseif($order->status == 'In route') bg-purple-100 text-purple-800 
                                    @elseif($order->status == 'Delivered') bg-green-100 text-green-800 
                                    @endif">
                                    {{ $order->status }}
                                </span>
                            </div>

                            
                            @if($order->status == 'Delivered' && $order->photo_delivery)
                                <div class="mt-4">
                                    <p class="text-sm font-bold text-gray-700 mb-2">Evidencia de entrega:</p>
                                    <img src="{{ asset('storage/' . $order->photo_delivery) }}" alt="Foto de entrega" class="w-full rounded shadow-md border border-gray-300">
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center py-4 text-sm mt-auto">
        &copy; {{ date('Y') }} Halcon Distribuidora de Materiales de Construcción. Todos los derechos reservados.
    </footer>
</body>
</html>