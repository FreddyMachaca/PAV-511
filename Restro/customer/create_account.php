<?php
session_start();
include('config/config.php');

// Verificar si se envió el formulario de registro
if (isset($_POST['addCustomer'])) {
    // Verificar que no haya campos en blanco
    if (empty($_POST["customer_phoneno"]) || empty($_POST["customer_name"]) || empty($_POST['customer_email']) || empty($_POST['customer_password'])) {
        $err = "No se aceptan valores en blanco";
    } else {
        $customer_name = $_POST['customer_name'];
        $customer_phoneno = $_POST['customer_phoneno'];
        $customer_email = $_POST['customer_email'];
        $customer_password = sha1(md5($_POST['customer_password'])); // Hash de la contraseña
        $customer_id = $_POST['customer_id'];
        $customer_direccion = $_POST['customer_direccion'];
        $customer_restricciones = $_POST['customer_restricciones'];

        // Insertar la información capturada en la tabla de la base de datos
        $postQuery = "INSERT INTO rpos_clientes (cliente_id, cliente_nombre, cliente_numero, cliente_email, cliente_password, cliente_direccion, cliente_restricciones_dieteticas) VALUES (?,?,?,?,?,?,?)";
        $postStmt = $mysqli->prepare($postQuery);
        // Enlazar parámetros
        $postStmt->bind_param('sssssss', $customer_id, $customer_name, $customer_phoneno, $customer_email, $customer_password, $customer_direccion, $customer_restricciones);
        $postStmt->execute();

        if ($postStmt) {
            $success = "Cuenta de cliente creada";
            header("refresh:1; url=index.php");
            exit();
        } else {
            $err = "Por favor, intenta nuevamente o más tarde";
        }
    }
}

require_once('partials/_head.php');
require_once('config/code-generator.php');
?>

<body class="bg-dark">
<div class="main-content">
    <div class="header bg-gradient-primar py-7">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">Crear cuenta</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form method="post" role="form">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input class="form-control" required name="customer_name" placeholder="Nombre completo" type="text">
                                    <input class="form-control" value="<?php echo $cus_id;?>" required name="customer_id" type="hidden">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input class="form-control" required name="customer_phoneno" placeholder="Número de teléfono" type="text">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" required name="customer_email" placeholder="Email" type="email">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" required name="customer_password" placeholder="Contraseña" type="password">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-pin"></i></span>
                                    </div>
                                    <input class="form-control" required name="customer_direccion" placeholder="Dirección" type="text">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-fat-remove"></i></span>
                                    </div>
                                    <input class="form-control" name="customer_restricciones" placeholder="Restricciones dietéticas (opcional)" type="text">
                                </div>
                                <small class="text-danger">Campo no obligatorio</small>
                            </div>
                            <div class="text-center"></div>
                            <div class="form-group">
                                <div class="text-left">
                                    <button type="submit" name="addCustomer" class="btn btn-primary my-4">Crear cuenta</button>
                                    <a href="index.php" class="btn btn-success pull-right">Iniciar sesión</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               <!--
               <div class="row mt-3">
                    <div class="col-6">
                        <a href="../admin/forgot_pwd.php" target="_blank" class="text-light"><small>¿Olvidaste la contraseña?</small></a>
                    </div>
                </div>
                -->
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php require_once('partials/_footer.php'); ?>
<!-- Argon Scripts -->
<?php require_once('partials/_scripts.php'); ?>
</body>

</html>
