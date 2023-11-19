<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

// Update Profile
if (isset($_POST['ChangeProfile'])) {
    $admin_id = $_SESSION['admin_id'];
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];

    $query = "UPDATE rpos_admin SET admin_name = ?, admin_email = ? WHERE admin_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('sss', $admin_name, $admin_email, $admin_id);
    $stmt->execute();

    if ($stmt) {
        $success = "Account Updated";
        header("refresh:1; url=dashboard.php");
    } else {
        $err = "Please Try Again Or Try Later";
    }
}

// Change Password
if (isset($_POST['changePassword'])) {
    $admin_id = $_SESSION['admin_id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $query = "SELECT * FROM rpos_admin WHERE admin_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $admin_id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();

        if (sha1(md5($old_password)) != $row['admin_password']) {
            $err = "Please Enter Correct Old Password";
        } elseif ($new_password != $confirm_password) {
            $err = "Confirmation Password Does Not Match";
        } else {
            $new_password = sha1(md5($new_password));

            $query = "UPDATE rpos_admin SET admin_password = ? WHERE admin_id = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('ss', $new_password, $admin_id);
            $stmt->execute();

            if ($stmt) {
                $success = "Password Changed";
                header("refresh:1; url=dashboard.php");
            } else {
                $err = "Please Try Again Or Try Later";
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
    $admin_id = $_SESSION['admin_id'];
    $query = "SELECT * FROM rpos_admin WHERE admin_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $admin_id);
    $stmt->execute();
    $res = $stmt->get_result();

    while ($admin = $res->fetch_object()) {
        ?>
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(assets/img/theme/restro00.jpg); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Hola <?php echo $admin->admin_name; ?></h1>
                        <p class="text-white mt-0 mb-5">Esta es tu página de perfil. Puedes personalizar tu perfil como quieras y también cambiar la contraseña.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--8">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <!-- Profile card -->
                    <!-- Card content -->

                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="assets/img/theme/user-a-min.png" class="rounded-circle">
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
                                    <?php echo $admin->admin_name; ?></span>
                                </h3>
                                <div class="h5 font-weight-300">
                                    <i class="ni location_pin mr-2"></i><?php echo $admin->admin_email; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End profile card -->
                </div>

                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Mi Cuenta</h3>
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
                                                <label class="form-control-label" for="input-username">Nombre de usuario</label>
                                                <input type="text" name="admin_name" value="<?php echo $admin->admin_name; ?>" id="input-username" class="form-control form-control-alternative">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Dirección de correo electrónico</label>
                                                <input type="email" id="input-email" value="<?php echo $admin->admin_email; ?>" name="admin_email" class="form-control form-control-alternative">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="submit" id="input-email" name="ChangeProfile" class="btn btn-success form-control-alternative" value="Actualizar">
                                            </div>
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
                                                <input type="submit" id="input-email" name="changePassword" class="btn btn-success form-control-alternative" value="Cambiar Contraseña">
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
        <?php require_once('partials/_footer.php'); ?>

        <?php
    }
    ?>
</div>

<!-- Argon Scripts -->
<?php require_once('partials/_sidebar.php'); ?>
</body>
</html>
