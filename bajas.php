<!doctype html>
<html>

<head>
        <meta charset="utf-8">
        <title>Automoviles</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/p1.css">        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
    <div id="contenedor" class="container-fluid">

        <div id="banner" class="jumbotron">
            <h1>Sistema de Autos</h1>
            <img class="img-responsive" src="media/logo.jpeg" style="height: 100px;" />
        </div>

        <div id="navcontainer">
            <ul id="globalnav">
                <li><a href="altas.html">Altas</a></li>
                <li><a href="bajas.php">Bajas</a></li>
                <li><a href="cambios.php">Cambios</a></li>
                <li><a href="buscar.html">Buscar</a></li>
                <li><a href="reportes.php">Reportes</a></li>
            </ul>
        </div>
        
        <div id="bajas"> 
            <h2>Baja de autos</h2>
            <div class="body">
            	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				Introduce las placas del auto a dar de baja:
				<input type="text" maxlength="6" name="placas"/><br>
				<input type="submit" value="DAR DE BAJA" class="btn btn-danger">
				</form>

				<?php			
					if($_POST)
					{
						include 'config/cred_info.php';

						$conn = new mysqli($servername, $username, $password, $dbname);

						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

						$deleteStatement = "DELETE FROM autos WHERE placas = ?"; 
						$stmt = $conn->prepare($deleteStatement);
						$stmt->bind_param("s", $_POST["placas"]); 
						$res = $stmt->execute() ; 
						$stmt->close() ; 
						$conn->close() ; 
                        echo "<p>Baja exitosa</p>";
					}
				?>


            </div>
        </div>

    </div>
    </body>
</html>