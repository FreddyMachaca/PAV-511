<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

require_once('partials/_head.php');
require_once('partials/_analytics.php');

// Obtener el número de clientes
$customers = 0;
$stmt = $mysqli->prepare("SELECT COUNT(*) FROM rpos_clientes");
$stmt->execute();
$stmt->bind_result($customers);
$stmt->fetch();
$stmt->close();

// Obtener el número de productos
$products = 0;
$stmt = $mysqli->prepare("SELECT COUNT(*) FROM rpos_productos");
$stmt->execute();
$stmt->bind_result($products);
$stmt->fetch();
$stmt->close();

// Obtener el número de pedidos
$orders = 0;
$stmt = $mysqli->prepare("SELECT COUNT(*) FROM rpos_pedidos");
$stmt->execute();
$stmt->bind_result($orders);
$stmt->fetch();
$stmt->close();

// Obtener el total de ventas
$sales = 0;
$stmt = $mysqli->prepare("SELECT SUM(pago_monto) FROM rpos_pagos");
$stmt->execute();
$stmt->bind_result($sales);
$stmt->fetch();
$stmt->close();
?>

<body>
<!-- Sidenav -->
<?php require_once('partials/_sidebar.php'); ?>
<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <?php require_once('partials/_topnav.php'); ?>
    <!-- Header -->
    <div style="background-image: url(../admin/assets/img/theme/restro00.jpg); background-size: cover;" class="header pb-8 pt-5 pt-md-8">
        <span class="mask bg-gradient-dark opacity-8"></span>
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">CLIENTES</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $customers; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">PRODUCTOS</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $products; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                            <i class="fas fa-utensils"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">PEDIDOS</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $orders; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">VENTAS</h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $sales; ?>Bs</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Órdenes recientes</h3>
                            </div>
                            <div class="col text-right">
                                <a href="orders_reports.php" class="btn btn-sm btn-primary">Ver todo</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th class="text-success" scope="col">CÓDIGO</th>
                                <th scope="col">CLIENTE</th>
                                <th class="text-success" scope="col">PRODUCTO</th>
                                <th scope="col">PRECIO UNITARIO</th>
                                <th class="text-success" scope="col">CANTIDAD</th>
                                <th scope="col">TOTAL</th>
                                <th scop="col">ESTADO</th>
                                <th class="text-success" scope="col">FECHA</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $ret = "SELECT * FROM rpos_pedidos ORDER BY created_at DESC LIMIT 7";
                            $stmt = $mysqli->prepare($ret);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            while ($order = $res->fetch_object()) {
                                $total = ($order->prod_precio * $order->prod_cant);
                                ?>
                                <tr>
                                    <th class="text-success" scope="row"><?php echo $order->pedido_code; ?></th>
                                    <td><?php echo $order->cliente_nombre; ?></td>
                                    <td class="text-success"><?php echo $order->prod_nombre; ?></td>
                                    <td><?php echo $order->prod_precio; ?>Bs</td>
                                    <td class="text-success"><?php echo $order->prod_cant; ?></td>
                                    <td><?php echo $total; ?>Bs</td>
                                    <td><?php echo $order->pedido_status ? "<span class='badge badge-success'>Pagado</span>" : "<span class='badge badge-danger'>No Pagado</span>"; ?></td>
                                    <td class="text-success"><?php echo date('d/M/Y g:i', strtotime($order->created_at)); ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Pagos Recientes</h3>
                            </div>
                            <div class="col text-right">
                                <a href="payments_reports.php" class="btn btn-sm btn-primary">Ver todo</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th class="text-success" scope="col">CÓDIGO</th>
                                <th scope="col">CANTIDAD</th>
                                <th class='text-success' scope="col">CÓDIGO DE PEDIDO</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $ret = "SELECT * FROM rpos_pagos ORDER BY created_at DESC LIMIT 7";
                            $stmt = $mysqli->prepare($ret);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            while ($payment = $res->fetch_object()) {
                                ?>
                                <tr>
                                    <th class="text-success" scope="row">
                                        <?php echo $payment->pago_code; ?>
                                    </th>
                                    <td>
                                        <?php echo $payment->pago_monto; ?>Bs
                                    </td>
                                    <td class='text-success'>
                                        <?php echo $payment->pedido_code; ?>
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
        <?php require_once('partials/_footer.php'); ?>
    </div>
</div>
<!-- Argon Scripts -->
<?php require_once('partials/_scripts.php'); ?>
</body>

</html>
