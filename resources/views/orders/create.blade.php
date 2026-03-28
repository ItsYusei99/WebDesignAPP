<h1>Crear Nuevo Pedido - Halcón</h1>

<form action="{{ route('orders.store') }}" method="POST">
    @csrf <div style="margin-bottom: 10px;">
        <label>Número de Factura:</label><br>
        <input type="text" name="invoice_number" required placeholder="Ej: FAC-5000">
    </div>

    <div style="margin-bottom: 10px;">
        <label>Número de Cliente:</label><br>
        <input type="text" name="customer_number" required placeholder="Ej: CUST-100">
    </div>

    <div style="margin-bottom: 10px;">
        <label>Estado Inicial:</label><br>
        <select name="status">
            <option value="ordered">Ordenado</option>
            <option value="in_process">En Proceso</option>
        </select>
    </div>

    <div style="margin-bottom: 10px;">
        <label>Nombre del Proceso (opcional):</label><br>
        <input type="text" name="process_name" placeholder="Ej: Validación de pago">
    </div>

    <button type="submit" style="background-color: blue; color: white; padding: 10px;">
        Registrar Pedido
    </button>
    
    <a href="{{ route('orders.index') }}">Cancelar</a>
</form>