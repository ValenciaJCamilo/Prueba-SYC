<?php
require_once './config/conexion.php';
require_once './consultas/consultasClientes.php';

$conn = conexion();
$regCli = mostrar_registros_cliente($conn);
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
                <h2 class="panel-title-name">Clientes</h2>
            </div>
            <!--BOTÓN CREAR-->
            <div class="new-record-container">
                <label for="btn-modal-add-record" class="btn-add-record" title="Crear cliente">
                    <i class="uil uil-plus-circle"></i>Nuevo Cliente
                </label>
                <a class="btn-add-record btn-reporteValores" title="Ir a las facturas" href="./index.php">
                    <i class="uil uil-file-graph"></i>Facturas
                </a>
            </div>
            <!--MODAL CREAR-->
            <input type="checkbox" id="btn-modal-add-record">
                <div class="container-modal-add-record">
                <div class="content-modal-add-record">
                <div class="title-info">
                    <div class="title-container">
                        <h3 class="content-modal-titulo">Nuevo cliente</h3>
                    </div>
                </div>
                    <p class="content-modal-recordatorio">Recuerde que * indica que el campo es obligatorio.</p>
                    <form action="./consultas/crearCliente.php" method="POST" data-form="save" autocomplete="off">
                        <div class="input-field">
                            <input name="documento" type="number" placeholder="Número de documento*" pattern="[0-9]+" title="Por favor, complete el campo"   />
                        </div>
                        <div class="input-field">
                            <input name="nombre" type="text" placeholder="Nombre completo*" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚüÜ\s]+" title="Por favor, digite el nombre del cliente completo" >
                        </div>
                        <div class="input-field">
                            <input name="direccion" type="text" placeholder="Dirección*" title="Por favor, digite  la dirección de residencia" >
                        </div>
                        <div class="botones-accion-modal">
                            <input type="submit" class="btn-submit-add-record" value="Crear" />
                            <label for="btn-modal-add-record" class="btn-close-add-record">Cerrar</label>
                        </div>
                    </form>
                </div>
                <label for="btn-modal-add-record" class="cerrar-modal"></label>
            </div>
            </div>
            <!--TABLA-->
            <div class="table-container">
                <table id="tablaCliente" class="tb-fact-records">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Número de documento</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once './config/conexion.php';
                            $counter=1;
                            while($row=mysqli_fetch_array($regCli)){
                        ?>
                        <tr>
                            <td data-titulo="#"><?php echo $counter ?></td>
                            <td data-titulo="NÚMERO DE DOCUMENTO" class="responsive-file"><?php echo $row['nume_doc']?></td>
                            <td data-titulo="NOMBRE" class="responsive-file"><?php echo $row['nombre']?></td>
                            <td data-titulo="DIRECCIÓN" class="responsive-file"><?php echo $row['direccion']?></td>
                            <td data-titulo="ACCIÓN" class="responsive-file">
                            <div class="action-options-container">
                                <div class="btn-group-action">
                                    <a href="./editarCliente-view.php?id=<?php echo $row['id']?>" class="btn-edit-record" title="Editar cliente"><i class="uil uil-edit btn-edit-record"></i></a>
                                    <a class="btn-delete-record" title="Eliminar cliente" onclick="eliminarCliente(<?php echo $row['id']?>)"><i class="uil uil-trash-alt"></i></a>
                                </div>
                                </div>
                            </td>
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