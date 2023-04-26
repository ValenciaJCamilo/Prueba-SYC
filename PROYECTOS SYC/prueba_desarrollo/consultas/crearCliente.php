<?php
require_once '../config/conexion.php';
$conn = conexion();

//Obtener el valor del campo "documento" enviado por el formulario
$documento_cliente = $_POST['documento'];
// Validar que los campos no estén vacíos
if (empty($documento_cliente) || empty($_POST['nombre']) || empty($_POST['direccion'])) {
    echo "<script>window.alert('Todos los campos son obligatorios. Por favor, verifique los datos e intente de nuevo.'); window.history.go(-1);</script>";
    exit();
}
//Validar si el número de documento existe en la tabla de clientes
$sql = "SELECT * FROM clientes WHERE nume_doc = '$documento_cliente'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
     // Si cliente ya existe en la tabla, mostrar un mensaje de error
     echo "<script>window.alert('El número de documento ingresado ya está asociado a otro cliente. Por favor, verifique los datos e intente de nuevo.'); window.history.go(-1);</script>";
    } else {
        // Validar que el campo documento_cliente sean solo números enteros positivos
        if (!is_numeric($documento_cliente) || intval($documento_cliente) <= 0) {
            echo "<script>window.alert('El número de documento ingresado es inválido. Por favor, verifique los datos e intente de nuevo.'); window.history.go(-1);</script>";
            exit();
        }
        $row_cliente = mysqli_fetch_assoc($result);
        $id_cliente = $row_cliente['id'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
         // El cliente no existe en la tabla, crearlo
        $sql = "INSERT INTO clientes (nume_doc, nombre, direccion) VALUES ('$documento_cliente', '$nombre','$direccion')";
        $query = mysqli_query($conn, $sql);
    
        if($query) {
            echo "<script>window.alert('El cliente ha sido creado exitosamente!'); window.location.href='../clientes-view.php';</script>";
        } else {
            echo "<script>window.alert('Error al intentar crear el cliente:('); window.history.go(-1);</script>";
        }
    }