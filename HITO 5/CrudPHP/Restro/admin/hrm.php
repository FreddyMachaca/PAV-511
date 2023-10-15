<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
// Delete Staff
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "DELETE FROM rpos_personal WHERE personal_id = ?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=hrm.php");
    } else {
        $err = "Try Again Later";
    }
}
require_once('partials/_head.php');
?>

<body>
<!-- Sidenav -->
<?php
require_once('partials/_sidebar.php');
?>
<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header pb-8 pt-5 pt-md-8">
        <span class="mask bg-gradient-dark opacity-8"></span>
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <a href="add_staff.php" class="btn btn-outline-success"><i class="fas fa-user-plus"></i>Agregar Nuevo Personal</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">NUMERO DE PERSONAL</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">CORREO ELECTRÓNICO</th>
                                <th scope="col">DIRECCIÓN</th>
                                <th scope="col">NÚMERO DE TELÉFONO</th>
                                <th scope="col">PUESTO DE TRABAJO</th>
                                <th scope="col">FECHA DE NACIMIENTO</th>
                                <th scope="col">CÉDULA DE IDENTIDAD (CI)</th>
                                <th scope="col">SALARIO/HORA</th>
                                <th scope="col">DATOS CUENTA BANCARIA</th>
                                <th scope="col">COMPORTAMIENTO</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $ret = "SELECT * FROM rpos_personal";
                            $stmt = $mysqli->prepare($ret);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            while ($staff = $res->fetch_object()) {
                                ?>
                                <tr>
                                    <td><?php echo $staff->personal_num; ?></td>
                                    <td><?php echo $staff->personal_nombre; ?></td>
                                    <td><?php echo $staff->personal_email; ?></td>
                                    <td><?php echo $staff->personal_direccion; ?></td>
                                    <td><?php echo $staff->personal_telefono; ?></td>
                                    <td><?php echo $staff->personal_puesto; ?></td>
                                    <td><?php echo $staff->personal_fecha_nacimiento; ?></td>
                                    <td><?php echo $staff->personal_ci; ?></td>
                                    <td><?php echo $staff->personal_salario_hora; ?></td>
                                    <td><?php echo $staff->personal_datos_bancarios; ?></td>
                                    <td>
                                        <a href="hrm.php?delete=<?php echo $staff->personal_id; ?>">
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                                Borrar
                                            </button>
                                        </a>

                                        <a href="update_staff.php?update=<?php echo $staff->personal_id; ?>">
                                            <button class="btn btn-sm btn-primary">
                                                <i class="fas fa-user-edit"></i>
                                                Actualizar
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php
        require_once('partials/_footer.php');
        ?>
    </div>
</div>
<!-- Argon Scripts -->
<?php
require_once('partials/_scripts.php');
?>
</body>

</html>
