<?php
require_once './config/conexion.php';
require_once './consultas/consultasFacturas.php';

$conn = conexion();
$regVal = mostrar_total_factura($conn);
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
    <title>Prueba de Desarrollo</title>
</head>
<body>    
    <section class="general-container">
        <div class="overview-general">
            <!--TÍTULO-->
            <div class="title">
                <h1 class="panel-title-name">PRUEBA DE DESARROLLO</h1>
            </div>
            <div class="title">
                <h2 class="panel-title-name">Valor completo de las facturas por estado y usuario</h2>
                <p class="ph-sub">Las facturas que tengan estado definido como 'Sin estado' no serán mostradas en la tabla.</h2>
            </div>
            <div class="new-record-container">
                <a class="btn-add-record btn-reporteValores" title="Ir a las facturas" href="./index.php">
                    <i class="uil uil-file-graph"></i>Facturas
                </a>
            </div>
            <!--TABLA-->
            <div class="table-container">
                <table id="tablaTotal" class="tb-fact-records">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Valor Total</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once './config/conexion.php';
                            $counter=1;
                            while($row=mysqli_fetch_array($regVal)){
                        ?>
                        <tr>
                            <td data-titulo="#"><?php echo $counter ?></td>
                            <td data-titulo="CLIENTE" class="responsive-file"><?php echo $row['nombre']?></td>
                            <td data-titulo="VALOR TOTAL" class="responsive-file">$<?php echo $row['SUM(f.valor_fac)']?></td>
                            <td data-titulo="DESCRIPCIÓN" class="responsive-file"><?php echo $row['descripcion']?></td>
                        </tr>
                        <?php
                            $counter++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        <div>
    </section>
</body>
<script src="./assets/js/alertas.js"></script>
</html>