<?php
require_once '../config/conexion.php';
$conn = conexion();

$id=$_GET['id'];
$sql="DELETE FROM clientes WHERE id='$id'";
$query=mysqli_query($conn,$sql);

if($query){
    Header("Location:http://localhost/prueba_desarrollo/clientes-view.php");
}else{
    echo "<script>window.alert('El cliente NO se puede eliminar porque tiene facturas asociadas. Si desea eliminarlo, primero elimine las facturas de este cliente.'); window.location.href='../clientes-view.php';</script>";
}
?>