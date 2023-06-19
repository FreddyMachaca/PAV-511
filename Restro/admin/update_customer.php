<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
// Update Customer
if (isset($_POST['updateCustomer'])) {
    // Prevent Posting Blank Values
    if (empty($_POST["customer_phoneno"]) || empty($_POST["customer_name"]) || empty($_POST['customer_email']) || empty($_POST['customer_password']) || empty($_POST['customer_address']) || empty($_POST['customer_dietary_restrictions'])) {
        $err = "Blank Values Not Accepted";
    } else {
        $cliente_nombre = $_POST['customer_name'];
        $cliente_numero = $_POST['customer_phoneno'];
        $cliente_email = $_POST['customer_email'];
        $cliente_password = sha1(md5($_POST['customer_password'])); // Hash This
        $cliente_address = $_POST['customer_address'];
        $cliente_dietary_restrictions = $_POST['customer_dietary_restrictions'];
        $update = $_GET['update'];

        // Update Captured information in the database table
        $postQuery = "UPDATE rpos_clientes SET cliente_nombre =?, cliente_numero =?, cliente_email =?, cliente_password =?, cliente_direccion =?, cliente_restricciones_dieteticas =? WHERE  cliente_id =?";
        $postStmt = $mysqli->prepare($postQuery);
        // Bind parameters
        $rc = $postStmt->bind_param('sssssss', $cliente_nombre, $cliente_numero, $cliente_email, $cliente_password, $cliente_address, $cliente_dietary_restrictions, $update);
        $postStmt->execute();
        // Declare a variable which will be passed to the alert function
        if ($postStmt) {
            $success = "Customer Updated" && header("refresh:1; url=customes.php");
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
    $update = $_GET['update'];
    $ret = "SELECT * FROM rpos_clientes WHERE cliente_id = '$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($cust = $res->fetch_object()) {
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
                                    <label>Nombre del cliente</label>
                                    <input type="text" name="customer_name" value="<?php echo $cust->cliente_nombre; ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Número de teléfono del cliente</label>
                                    <input type="text" name="customer_phoneno" value="<?php echo $cust->cliente_numero; ?>" class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Correo electrónico del cliente</label>
                                    <input type="email" name="customer_email" value="<?php echo $cust->cliente_email; ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Contraseña del cliente</label>
                                    <input type="password" name="customer_password" class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Dirección del cliente</label>
                                    <input type="text" name="customer_address" value="<?php echo $cust->cliente_direccion; ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Restricciones dietéticas del cliente</label>
                                    <input type="text" name="customer_dietary_restrictions" value="<?php echo $cust->cliente_restricciones_dieteticas; ?>" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="submit" name="updateCustomer" value="Actualizar Cliente" class="btn btn-success">
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
        }
        ?>
    </div>
</div>
<!-- Argon Scripts -->
<?php
require_once('partials/_scripts.php');
?>
</body>

</html>
