<h2>Actualizar Orden: {{ $order->invoice_number }}</h2>
<form action="{{ route('orders.updateStatus', $order) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Cambiar Estatus:</label>
    <select name="status">
        <option value="ordered" {{ $order->status == 'ordered' ? 'selected' : '' }}>Ordenado</option>
        <option value="in_process" {{ $order->status == 'in_process' ? 'selected' : '' }}>En Proceso</option>
        <option value="in_route" {{ $order->status == 'in_route' ? 'selected' : '' }}>En Ruta</option>
        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Entregado</option>
    </select>
    <br><br>
    <label>Nombre del Proceso:</label>
    <input type="text" name="process_name" value="{{ $order->process_name }}">
    <br><br>
    <label>Foto de Evidencia (Solo Ruta/Entregado):</label>
    <input type="file" name="evidence_photo">
    <br><br>
    <button type="submit">Actualizar Estatus y Foto</button>
</form>