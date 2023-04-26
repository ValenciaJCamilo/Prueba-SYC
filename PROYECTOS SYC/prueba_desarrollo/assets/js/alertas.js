function eliminarFactura(id) {
    if (confirm('¿Estás seguro de que deseas eliminar esta factura?')) {
        window.location.href = 'http://localhost/prueba_desarrollo/consultas/eliminarFactura.php?id=' + id;
    }
}
function eliminarCliente(id) {
    if (confirm('¿Estás seguro de que deseas eliminar esta cliente?')) {
        window.location.href = 'http://localhost/prueba_desarrollo/consultas/eliminarCliente.php?id=' + id;
    }
}