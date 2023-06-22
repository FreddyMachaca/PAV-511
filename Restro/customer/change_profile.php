<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();

if (isset($_POST['ChangeProfile'])) {
    // Prevenir envío de valores en blanco
    if (empty($_POST["customer_phoneno"]) || empty($_POST["customer_name"]) || empty($_POST['customer_email'])) {
        $err = "No se aceptan valores en blanco";
    } else {
        $customer_name = $_POST['customer_name'];
        $customer_phoneno = $_POST['customer_phoneno'];
        $customer_email = $_POST['customer_email'];
        $customer_id = $_SESSION['customer_id'];

        // Actualizar información en la tabla de la base de datos
        $postQuery = "UPDATE rpos_clientes SET cliente_nombre = ?, cliente_numero = ?, cliente_email = ? WHERE cliente_id = ?";
        $postStmt = $mysqli->prepare($postQuery);
        // Enlazar parámetros
        $postStmt->bind_param('sssi', $customer_name, $customer_phoneno, $customer_email, $customer_id);
        $postStmt->execute();

        if ($postStmt) {
            $success = "Perfil actualizado";
            header("refresh:1; url=dashboard.php");
            exit();
        } else {
            $err = "Por favor, intenta nuevamente o más tarde";
        }
    }
}

if (isset($_POST['changePassword'])) {
    // Cambiar contraseña
    $error = 0;

    if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
        $old_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['old_password']))));
    } else {
        $error = 1;
        $err = "La contraseña anterior no puede estar vacía";
    }

    if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
        $new_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['new_password']))));
    } else {
        $error = 1;
        $err = "La nueva contraseña no puede estar vacía";
    }

    if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
        $confirm_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['confirm_password']))));
    } else {
        $error = 1;
        $err = "La confirmación de contraseña no puede estar vacía";
    }

    if (!$error) {
        $customer_id = $_SESSION['customer_id'];
        $sql = "SELECT * FROM rpos_clientes WHERE cliente_id = '$customer_id'";
        $res = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);

            if ($old_password != $row['cliente_password']) {
                $err = "Por favor, ingresa la contraseña anterior correcta";
            } elseif ($new_password != $confirm_password) {
                $err = "La confirmación de contraseña no coincide";
            } else {
                $new_password = sha1(md5($_POST['new_password']));
                $query = "UPDATE rpos_clientes SET cliente_password = ? WHERE cliente_id = ?";
                $stmt = $mysqli->prepare($query);
                // Enlazar parámetros
                $stmt->bind_param('si', $new_password, $customer_id);
                $stmt->execute();

                if ($stmt) {
                    $success = "Contraseña cambiada";
                    header("refresh:1; url=dashboard.php");
                    exit();
                } else {
                    $err = "Por favor, intenta nuevamente o más tarde";
                }
            }
        }
    }
}

require_once('partials/_head.php');
?>

<body>
<!-- Sidenav -->
<?php require_once('partials/_sidebar.php'); ?>
<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <?php require_once('partials/_topnav.php'); ?>
    <?php
    $customer_id = $_SESSION['customer_id'];
    $ret = "SELECT * FROM rpos_clientes WHERE cliente_id = '$customer_id'";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($customer = $res->fetch_object()) {
        ?>
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../admin/assets/img/theme/restro00.jpg); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Hola <?php echo $customer->cliente_nombre; ?></h1>
                        <p class="text-white mt-0 mb-5">Esta es tu página de perfil. Puedes personalizar tu perfil como quieras y también cambiar la contraseña.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="../admin/assets/img/theme/user-a-min.png" class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div>
                                        </div>
                                        <div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3>
                                    <?php echo $customer->cliente_nombre; ?>
                                </h3>
                                <div class="h5 font-weight-300">
                                    <i class="fas fa-envelope mr-2"></i><?php echo $customer->cliente_email; ?>
                                </div>
                                <div class="h5 font-weight-300">
                                    <i class="fas fa-phone mr-2"></i><?php echo $customer->cliente_numero; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Mi cuenta</h3>
                                </div>
                                <div class="col-4 text-right">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <h6 class="heading-small text-muted mb-4">INFORMACION DEL USUARIO</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Nombre completo</label>
                                                <input type="text" name="customer_name" value="<?php echo $customer->cliente_nombre; ?>" id="input-username" class="form-control form-control-alternative">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Número de teléfono</label>
                                                <input type="text" id="input-email" value="<?php echo $customer->cliente_numero; ?>" name="customer_phoneno" class="form-control form-control-alternative">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Dirección de correo electrónico</label>
                                                <input type="email" id="input-email" value="<?php echo $customer->cliente_email; ?>" name="customer_email" class="form-control form-control-alternative">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="submit" name="ChangeProfile" class="btn btn-success form-control-alternative" value="Actualizar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <form method="post">
                                <h6 class="heading-small text-muted mb-4">CAMBIAR LA CONTRASEÑA</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Contraseña anterior</label>
                                                <input type="password" name="old_password" id="input-username" class="form-control form-control-alternative">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Nueva contraseña</label>
                                                <input type="password" name="new_password" class="form-control form-control-alternative">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Confirmar nueva contraseña</label>
                                                <input type="password" name="confirm_password" class="form-control form-control-alternative">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="submit" name="changePassword" class="btn btn-success form-control-alternative" value="Cambiar contraseña">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php require_once('partials/_footer.php');
    }
    ?>
</div>
<!-- Argon Scripts -->
<?php require_once('partials/_sidebar.php'); ?>
</body>

</html>
