<?php
require_once '../config/conexion.php';
$conn = conexion();

$documento_cliente = $_POST['documento'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$identificador = $_POST['idCli'];

// Validar que los campos no estén vacíos
if (empty($documento_cliente) || empty($nombre) || empty($direccion)) {
    echo "<script>window.alert('Por favor complete todos los campos para realizar la actualización de datos.'); window.history.go(-1);</script>";
    exit;
}

// Validar que el documento no exista en la base de datos
$sql = "SELECT id FROM clientes WHERE nume_doc = '$documento_cliente' AND id != '$identificador'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    echo "<script>window.alert('El número de documento ya está asociado a un cliente. Por favor inténtelo nuevamente.'); window.history.go(-1);</script>";
    exit;
}

// Validar que los datos sean diferentes a los existentes en la base de datos
$sql = "SELECT * FROM clientes WHERE id='$identificador'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if ($row['nume_doc'] == $documento_cliente && $row['nombre'] == $nombre && $row['direccion'] == $direccion) {
    echo "<script>window.alert('No se ha actualizado ningún dato del cliente.'); window.location.href='../clientes-view.php';</script>";
    exit;
}

// Valida que el documento a ingresar sea umayor a 0 (ya que un documento negativo no tendría mucho sentido)
if($documento_cliente <= 0) {
    echo "<script>window.alert('El campo de documento debe ser un número entero positivo mayor a cero'); window.history.go(-1);</script>";
    exit;
}
// Si todos los datos a actualizar son correctos, entonces se procede con la actualización de datos del cliente
$sql = "UPDATE clientes SET nume_doc = '$documento_cliente', nombre = '$nombre', direccion = '$direccion' WHERE id = '$identificador'";
$query = mysqli_query($conn, $sql);
if ($query) {
    echo "<script>window.alert('Los datos se han actualizado con éxito.'); window.location.href='../clientes-view.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>