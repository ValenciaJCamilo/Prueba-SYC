<?php
require_once './config/conexion.php';
require_once './consultas/consultasFacturas.php';
$conn = conexion();
$cargueEstados = mostrar_estados($conn);
$row = estado_actual($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Desarrollo del punto número uno 'Prueba de Desarrollo', de la prueba técnica para aplicar a la empresa de Sistemas y Computadores SYC'">
    <link rel="stylesheet" href="./assets/style/style.css">
    <meta name="author" content="Juan Camilo Valencia Silva" />
    <meta name="copyright" content="Sistemas y Computadores SYC" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet">
    <!--ICONSCOUT-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.0/css/line.css">
    <!--SWEETALERT2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Editar Factura</title>
</head>
<body>
    <section class="general-container">
        <div class="overview-general">
            <!--TÍTULO-->
            <div class="title">
                <h1 class="panel-title-name">Editar Factura</h1>
            </div>
            <section class="container-modal-edit-record">
                <div class="content-modal-edit-record">
                    <form action="./consultas/actualizarFactura.php" method="POST" data-form="update" autocomplete="off">
                        <input type="hidden" name="idFact" value="<?php echo $row['id_factura']?>">
                        <div class="input-field">
                            <input name="documento" type="number" placeholder="Número de documento del cliente*" pattern="[0-9]+" title="Por favor, complete el campo" value="<?php echo $row['nume_doc']?>"/>
                        </div>
                        <div class="input-field">
                            <input name="valor" type="number" placeholder="Valor *" pattern="[0-9]+" title="Por favor, complete el campo con un número entero positivo" value="<?php echo $row['valor_fac']?>">
                        </div>
                        <div class="input-field ">
                            <div class="select-option">
                                <select name="tipoEstadoFactura" class="combobox-titulo" title="Si desea, seleccione algún estado">
                                    <option value="">Estado</option>
                                    <?php
                                    while ($rowSelected = mysqli_fetch_array($cargueEstados)) {
                                        if ($rowSelected['codi_estado'] == $row['codi_estado']) {
                                            echo '<option selected value="' . $rowSelected['codi_estado'] . '">' . $rowSelected['descripcion'] . '</option>';
                                        } else {
                                            echo '<option value="' . $rowSelected['codi_estado'] . '">' . $rowSelected['descripcion'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="botones-accion-modal">
                            <button type="submit" class="btn-edit-record" title="Actualizar">Guardar cambios</button>
                            <a href="#" class="btn-close-edit-record" title="Inicio" onclick="javascript:history.back();">Volver atrás</a>
                        </div>
                    </form>
                </div>
            </section>
    </section>
</body>
</html>