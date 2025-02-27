<?php
$dir = "125,avenida+romeral,villabalter";
$url = "https://nominatim.openstreetmap.org/search.php?q={$dir}&format=json&limit=1";
$opts = array('http' => array('header' => array("Referer: $url\r\n")));
$context = stream_context_create($opts);
$file = file_get_contents($url, false, $context);
$dirArray = json_decode($file, true);
echo '<pre>';
print_r($dirArray);
echo '</pre>';
echo "<p>{$dirArray[0]['lat']}</p>";
echo "<p>{$dirArray[0]['lon']}</p>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Google Maps API</title>
	<!-- AIzaSyDdPERm4mlw0gXnacOamDfcEqtq_pLjf3U -->
	<link rel="stylesheet" crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3">
	<link rel="stylesheet" type="text/css " href="css/estilos.css" />
</head>

<body>
	<?php
	if (isset($_REQUEST['codigo'])) {
		if ($_REQUEST['codigo'] == 'exito') {
			echo "<div class='alert alert-success' role='alert'>";
			echo "Vivienda agregada correctamente";
			echo "</div>";
		} else {
			echo "<div class='alert alert-danger' role='alert'>";
			echo "No se ha podido agregar la vivienda!";
			echo "</div>";
		}
	}
	?>
	<header class="container-fluid py-2">
		<h1>Inmobiliaria</h1>
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container-fluid">
				<div id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="./index.php">Mapa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#">Formulario</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<hr>
	<main class="container">
		<form action="./php/funciones.php" method="post">
			<div class="mb-3">
				<label for="tipo" class="form-label">Tipo</label>
				<select class="form-select" aria-label="Default select example" name="tipo">
					<option value="venta">Venta</option>
					<option value="alquiler">Alquiler</option>
				</select>
			</div>
			<div class="mb-3">
				<label for="direccion" class="form-label">Direccion</label>
				<input type="text" class="form-control" name="direccion" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<div class="mb-3 text-center">
				<div class="row align-items-start">
					<div class="col">
						<label for="tipoDeVia" class="form-label">Tipo de via</label>
						<input type="text" class="form-control" name="tipoDeVia" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<div class="col">
						<label for="nombreVia" class="form-label">Nombre de la via</label>
						<input type="text" class="form-control" name="nombreVia" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<div class="col">
						<label for="numeroVia" class="form-label">Numero</label>
						<input type="number" name="numeroVia" class="form-control" aria-label="Username" aria-describedby="basic-addon1" min="1">
					</div>
				</div>
			</div>
			<div class="mb-3">
				<label for="descripcion" class="form-label">Descripcion</label>
				<textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
			</div>
			<div class="mb-3">
				<label for="vivienda" class="form-label">Vivienda</label>
				<select class="form-select" aria-label="Default select example" name="vivienda">
					<option value="piso">Piso</option>
					<option value="chalet">Chalet</option>
				</select>
			</div>
			<hr>
			<div class="col-12">
				<button class="btn btn-primary" type="submit" name="guardarVivienda">Guardar vivienda</button>
			</div>
		</form>
	</main>
	<hr>
	<footer class="container-fluid bg-primary text-center text-white py-1">
		<p>&copy; Nelson Blanco Charro</p>
	</footer>
</body>

</html>