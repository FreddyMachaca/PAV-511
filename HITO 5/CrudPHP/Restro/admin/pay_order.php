<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();

if (isset($_POST['pay'])) {
    //Prevent Posting Blank Values
    if (empty($_POST["pay_code"]) || empty($_POST["pay_amt"]) || empty($_POST['pay_method'])) {
        $err = "Blank Values Not Accepted";
    } else {

        $pago_code = $_POST['pay_code'];
        $pedido_code = $_GET['order_code'];
        $cliente_id = $_GET['customer_id'];
        $pago_monto  = $_POST['pay_amt'];
        $pago_metodo = $_POST['pay_method'];
        $pago_id = $_POST['pay_id'];

        $order_status = $_GET['order_status'];

        //Insert Captured information to a database table
        $postQuery = "INSERT INTO rpos_pagos (pago_id, pago_code, pedido_code, cliente_id, pago_monto, pago_metodo) VALUES(?,?,?,?,?,?)";
        $upQry = "UPDATE rpos_pedidos SET pedido_status =? WHERE pedido_code =?";

        $postStmt = $mysqli->prepare($postQuery);
        $upStmt = $mysqli->prepare($upQry);
        //bind paramaters

        $rc = $postStmt->bind_param('ssssss', $pago_id, $pago_code, $pedido_code, $cliente_id, $pago_monto, $pago_metodo);
        $rc = $upStmt->bind_param('ss', $order_status, $pedido_code);

        $postStmt->execute();
        $upStmt->execute();
        //declare a varible which will be passed to alert function
        if ($upStmt && $postStmt) {
            $success = "Paid" && header("refresh:1; url=receipts.php");
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
    $pedido_code = $_GET['order_code'];
    $ret = "SELECT * FROM  rpos_pedidos WHERE pedido_code ='$pedido_code' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($order = $res->fetch_object()) {
    $total = ($order->prod_precio * $order->prod_cant);
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
                        <form method="POST"  enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>ID de pago</label>
                                    <input type="text" name="pay_id" readonly value="<?php echo $payid;?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Código de pago</label>
                                    <input type="text" name="pay_code" value="<?php echo $mpesaCode; ?>" class="form-control" value="">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Cantidad (Bs)</label>
                                    <input type="text" name="pay_amt" readonly value="<?php echo $total;?>" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Método de pago</label>
                                    <select class="form-control" name="pay_method">
                                        <option selected>Dinero</option>
                                        <option>Paypal</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="submit" name="pay" value="Pagar pedido" class="btn btn-success" value="">
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
require_once('partials/_scripts.php'); }
?>
</body>
</html>