<!-- ARCHIVO DE CONSULTAS PARA FACTURAS -->
<?php
require_once './config/conexion.php';

// MOSTRAR LOS REGISTROS DE LAS FACTURAS (TODOS SIN EXCEPCIÓN)
function mostrar_registros_cliente($conn){
    $sql = "SELECT * FROM clientes
    ORDER BY nombre";
    $query = mysqli_query($conn, $sql);
    return $query;
}

// MOSTRAR CLIENTE SELECCIONADO EDITAR
function cliente_editar($conn){
    $identificador=$_GET['id'];
    $sql ="SELECT id,nume_doc, nombre, direccion 
    FROM clientes
    WHERE id='$identificador'";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);
    return $row;
}
?>