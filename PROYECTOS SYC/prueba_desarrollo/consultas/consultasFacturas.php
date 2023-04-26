<!-- ARCHIVO DE CONSULTAS PARA FACTURAS -->
<?php
require_once './config/conexion.php';

// MOSTRAR LOS REGISTROS DE LAS FACTURAS (TODOS SIN EXCEPCIÓN)
function mostrar_registros_factura($conn){
    $sql = "SELECT f.id_factura, f.fecha_fac, c.nombre, f.valor_fac, COALESCE(ef.descripcion, 'Sin estado') as descripcion 
    FROM factura f
    INNER JOIN clientes c ON f.id_cliente = c.id 
    LEFT JOIN estados_factura ef ON f.codi_estado = ef.codi_estado 
    ORDER BY c.nombre, f.valor_fac,ef.descripcion";
    $query = mysqli_query($conn, $sql);
    return $query;
}

// MOSTRAR LOS ESTADOS (IMPORTANTE PARA EL INSERT Y UPDATE)
function mostrar_estados($conn){
    $sql = "SELECT * FROM estados_factura";
    $query = mysqli_query($conn, $sql);
    return $query;
}

// CONSULTA PARA TRAER LA SUMATORIA DEL VALOR, AGRUPADA POR EL NOMBRE DEL CLIENTE Y LA DESCRIPCION DEL ESTADO DE LA FACTURA
function mostrar_total_factura($conn){
    $sql = "SELECT c.nombre, SUM(f.valor_fac), ef.descripcion 
    FROM factura f 
    JOIN clientes c ON f.id_cliente = c.id 
    JOIN estados_factura ef ON ef.codi_estado = f.codi_estado 
    GROUP BY c.nombre, ef.descripcion 
    ORDER BY c.nombre,ef.descripcion;";
    $query = mysqli_query($conn, $sql);
    return $query;
}

// MOSTRAR ESTADO ACTUAL DE LA FACTURA SELECCIONADA
function estado_actual($conn){
    $identificador=$_GET['id'];
    $sql ="SELECT id_factura, valor_fac, nume_doc,descripcion,ef.codi_estado FROM factura f
    INNER JOIN clientes c ON f.id_cliente = c.id 
    LEFT JOIN estados_factura ef ON f.codi_estado = ef.codi_estado 
    WHERE f.id_factura='$identificador'";

    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);
    return $row;
}

// DELETE DE LA FACTURA 
function eliminar_factura($conn){
$id=$_GET['id'];
$sql="DELETE FROM factura WHERE id_factura='$id'";
$query=mysqli_query($conn,$sql);
if($query){
    Header("Location:index.php");
}else{
    
}
}
?>