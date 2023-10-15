<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
// Add Staff
if (isset($_POST['addStaff'])) {
    // Prevent Posting Blank Values
    if (empty($_POST["staff_number"]) || empty($_POST["staff_name"]) || empty($_POST['staff_email']) || empty($_POST['staff_password']) || empty($_POST['staff_address']) || empty($_POST['staff_phone']) || empty($_POST['staff_job_title']) || empty($_POST['staff_dob']) || empty($_POST['staff_ci']) || empty($_POST['staff_hourly_rate']) || empty($_POST['staff_bank_info'])) {
        $err = "Blank Values Not Accepted";
    } else {
        $staff_number = $_POST['staff_number'];
        $staff_name = $_POST['staff_name'];
        $staff_email = $_POST['staff_email'];
        $staff_password = sha1(md5($_POST['staff_password']));
        $staff_address = $_POST['staff_address'];
        $staff_phone = $_POST['staff_phone'];
        $staff_job_title = $_POST['staff_job_title'];
        $staff_dob = $_POST['staff_dob'];
        $staff_ci = $_POST['staff_ci'];
        $staff_hourly_rate = $_POST['staff_hourly_rate'];
        $staff_bank_info = $_POST['staff_bank_info'];

        // Insert Captured information to a database table
        $postQuery = "INSERT INTO rpos_personal (personal_num, personal_nombre, personal_email, personal_password, personal_direccion, personal_telefono, personal_puesto, personal_fecha_nacimiento, personal_ci, personal_salario_hora, personal_datos_bancarios) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $postStmt = $mysqli->prepare($postQuery);
        // Bind parameters
        $rc = $postStmt->bind_param('sssssssssss', $staff_number, $staff_name, $staff_email, $staff_password, $staff_address, $staff_phone, $staff_job_title, $staff_dob, $staff_ci, $staff_hourly_rate, $staff_bank_info);
        $postStmt->execute();
        // Declare a variable which will be passed to the alert function
        if ($postStmt) {
            $success = "Staff Added" && header("refresh:1; url=hrm.php");
        } else {
            $err = "Please Try Again Or Try Later";
        }
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
                        <h3>Por favor llena todos los espacios</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Numero de personal</label>
                                    <input type="text" name="staff_number" class="form-control" value="<?php echo $alpha; ?>-<?php echo $beta; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Nombre del personal</label>
                                    <input type="text" name="staff_name" class="form-control" value="">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Correo electrónico del personal</label>
                                    <input type="email" name="staff_email" class="form-control" value="">
                                </div>
                                <div class="col-md-6">
                                    <label>Contraseña del personal</label>
                                    <input type="password" name="staff_password" class="form-control" value="">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Dirección</label>
                                    <input type="text" name="staff_address" class="form-control" value="">
                                </div>
                                <div class="col-md-6">
                                    <label>Número de teléfono</label>
                                    <input type="text" name="staff_phone" class="form-control" value="">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Puesto de trabajo</label>
                                    <input type="text" name="staff_job_title" class="form-control" value="">
                                </div>
                                <div class="col-md-6">
                                    <label>Fecha de nacimiento</label>
                                    <input type="text" name="staff_dob" class="form-control" value="">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Cédula de Identidad (CI)</label>
                                    <input type="text" name="staff_ci" class="form-control" value="">
                                </div>
                                <div class="col-md-6">
                                    <label>Salario/hora</label>
                                    <input type="text" name="staff_hourly_rate" class="form-control" value="">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Datos Cuenta bancaria</label>
                                    <input type="text" name="staff_bank_info" class="form-control" value="">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="submit" name="addStaff" value="Agregar Personal" class="btn btn-success" value="">
                                </div>
                            </div>
                        </form>
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
