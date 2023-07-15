<?php
session_start();
include_once "encabezado.php";
if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>

<link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <script src="../js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../css/sweet-alert.css">
    <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../main.css">  
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../js/modernizr.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/main.js"></script>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
            </div>
            <div class="full-reset" style="padding: 10px 0; color:#fff;">
                <p class="text-center" style="padding-top: 15px;">Menu</p>
            </div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="../index.php">&nbsp;&nbsp; Inicio</a></li>
                    <li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Registro de usuarios</div>
                        <ul class="list-unstyled">
                            <li><a href="../registro.php">&nbsp;&nbsp; Nuevo cliente</a></li>
                            <li><a href="../registroadco.php">&nbsp;&nbsp; Nuevo coach</a></li>
                            <li><a href="../usuarios.php">&nbsp;&nbsp; Lista de usuarios</a></li>
                            <li><a href="../dato_fi.php">&nbsp;&nbsp; Datos fisicos</a></li>

                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Suscripciones</div>
                        <ul class="list-unstyled">
                            <li><a href="../suscripmembre.php">&nbsp;&nbsp; Nueva suscripcion</a></li>
                            <li><a href="../misuscripciones.php">&nbsp;&nbsp; Usuarios suscritos</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Servicios</div>
                        <ul class="list-unstyled">
                            <li><a href="../compras.php">&nbsp;&nbsp; Nuevo servicio</a></li>
                            <li><a href="../listaser.php">&nbsp;&nbsp; Mis servisios</a></li>
                            <li><a href="../venderser.php">&nbsp;&nbsp; Vender servicio</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Compras</div>
                        <ul class="list-unstyled">
                            <li><a href="../compras.php">&nbsp;&nbsp; Nueva compra</a></li>
                            <li><a href="../miscompras.php">&nbsp;&nbsp; Mis compras</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button">&nbsp;&nbsp; Ventas</div>
                        <ul class="list-unstyled">
                            <li><a href="../ventas.php">&nbsp;&nbsp; Nueva venta</a></li>
                            <li><a href="../misventas.php">&nbsp;&nbsp; Mis ventas</a></li>
                        </ul>
                    </li>
                    <li><a href="../inventario.php">&nbsp;&nbsp; Inventario</a></li>
                    <li><a href="../reporte.php">&nbsp;&nbsp; Reportes</a></li>
                </ul>
            </div>
        </div>
    </div>
	<br>
	<br>
	<br>


<div class="col-xs-12">
	<h1>Vender</h1>
	<?php
	if (isset($_GET["status"])) {
		if ($_GET["status"] === "1") {
	?>
			<div class="alert alert-success">
				<strong>¡Correcto!</strong> Venta realizada correctamente
			</div>
		<?php
		} else if ($_GET["status"] === "2") {
		?>
			<div class="alert alert-info">
				<strong>Venta cancelada</strong>
			</div>
		<?php
		} else if ($_GET["status"] === "3") {
		?>
			<div class="alert alert-info">
				<strong>Ok</strong> Producto quitado de la lista
			</div>
		<?php
		} else if ($_GET["status"] === "4") {
		?>
			<div class="alert alert-warning">
				<strong>Error:</strong> El producto que buscas no existe
			</div>
		<?php
		} else if ($_GET["status"] === "5") {
		?>
			<div class="alert alert-danger">
				<strong>Error: </strong>El producto está agotado
			</div>
		<?php
		} else {
		?>
			<div class="alert alert-danger">
				<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
			</div>
	<?php
		}
	}
	?>
	<br>
	<form method="post" action="agregarAlCarrito.php">
		<label for="codigo">Código de barras:</label>
		<input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
	</form>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<!-- <th>Código</th> -->
				<th>Descripción</th>
				<th>Precio de venta</th>
				<th>Cantidad</th>
				<th>Total</th>
				<th>Quitar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($_SESSION["carrito"] as $indice => $producto) {
				$granTotal += $producto->total;
			?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<!-- <td><?php echo $producto->codigo ?></td> -->
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td>
						<form action="cambiar_cantidad.php" method="post">
							<input name="indice" type="hidden" value="<?php echo $indice; ?>">
							<input min="1" name="cantidad" class="form-control" required type="number" step="0.1" value="<?php echo $producto->cantidad; ?>">
						</form>
					</td>
					<td><?php echo $producto->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<h3>Total: <?php echo $granTotal; ?></h3>
	<form action="./terminarVenta.php" method="POST">
		<input name="total" type="hidden" value="<?php echo $granTotal; ?>">
		<button type="submit" class="btn btn-success">Terminar venta</button>
		<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
	</form>
</div>
<?php include_once "pie.php" ?>