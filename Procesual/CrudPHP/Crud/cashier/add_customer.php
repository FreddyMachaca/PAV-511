<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
// Add Customer
if (isset($_POST['addCustomer'])) {
    // Prevent Posting Blank Values
    if (empty($_POST["customer_phoneno"]) || empty($_POST["customer_name"]) || empty($_POST['customer_email']) || empty($_POST['customer_password']) || empty($_POST['customer_address']) || empty($_POST['customer_dietary_restrictions'])) {
        $err = "Blank Values Not Accepted";
    } else {
        $customer_name = $_POST['customer_name'];
        $customer_phoneno = $_POST['customer_phoneno'];
        $customer_email = $_POST['customer_email'];
        $customer_password = sha1(md5($_POST['customer_password'])); // Hash This
        $customer_id = $_POST['customer_id'];
        $customer_address = $_POST['customer_address'];
        $customer_dietary_restrictions = $_POST['customer_dietary_restrictions'];

        // Insert Captured information to a database table
        $postQuery = "INSERT INTO rpos_clientes (cliente_id, cliente_nombre, cliente_numero, cliente_email, cliente_password, cliente_direccion, cliente_restricciones_dieteticas) VALUES(?,?,?,?,?,?,?)";
        $postStmt = $mysqli->prepare($postQuery);
        // Bind parameters
        $rc = $postStmt->bind_param('sssssss', $customer_id, $customer_name, $customer_phoneno, $customer_email, $customer_password, $customer_address, $customer_dietary_restrictions);
        $postStmt->execute();
        // Declare a variable which will be passed to the alert function
        if ($postStmt) {
            $success = "Customer Added";
            header("refresh:1; url=customes.php");
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
    <div style="background-image: url(../admin/assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
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
                                    <input type="text" name="customer_name" class="form-control">
                                    <input type="hidden" name="customer_id" value="<?php echo $cus_id; ?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Número de teléfono del cliente</label>
                                    <input type="text" name="customer_phoneno" class="form-control" value="">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Correo electrónico del cliente</label>
                                    <input type="email" name="customer_email" class="form-control" value="">
                                </div>
                                <div class="col-md-6">
                                    <label>Contraseña del cliente</label>
                                    <input type="password" name="customer_password" class="form-control" value="">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Dirección del cliente</label>
                                    <input type="text" name="customer_address" class="form-control" value="">
                                </div>
                                <div class="col-md-6">
                                    <label>Restricciones dietéticas del cliente</label>
                                    <input type="text" name="customer_dietary_restrictions" class="form-control" value="">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="submit" name="addCustomer" value="Agregar Cliente" class="btn btn-success">
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
