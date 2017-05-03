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
        

        <div id="cambios">

        <?php if(!$_POST) { ?>

            <h2>Cambios en Información de autos</h2>
            Introduce la placa del auto a modificar:
            <form action="cambios.php" method="POST">
                <input type="text" maxlength="6" name="buscar"/>
                <input  class="btn btn-primary" type="submit" name="Enviar" value="Enviar">
            </form>

        <?php } else { 

            include 'config/cred_info.php';
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("SELECT * FROM autos WHERE placas = ?");
            $stmt->bind_param("s", $_POST["buscar"]);
            $stmt->execute();
            $stmt->bind_result($placas, $precio, $marca, $modelo, $version,  $ano, $kilometraje, $cilindros , $hp, $colorInt, $colorExt, $transmision, $combustible, $ac, $tipo);
            $stmt->fetch();

        ?>

            <form action="cambios2.php" method="POST"> 

                <div class="body" id="formCambios" style="display:block">
                    <div class="body row">
                    <div class="col-md-6">
                    <p>Modifica los campos que requieras:</p>
                    Placas:<input type="text" name="placas" readonly class="form-control" value="<?php echo $placas; ?>"><br/>
                    Precio<input type="number" name="precio" min="0" class="form-control" value="<?php echo $precio; ?>"><br/>
                    Marca:<input type="text" name="marca" class="form-control" value="<?php echo $marca; ?>"><br/>
                    Modelo:<input type="text" name="modelo" class="form-control" value="<?php echo $modelo; ?>"><br/>
                    Version:<input type="text" name="version" class="form-control" value="<?php echo $version; ?>"><br/>
                    Tipo:<input type="text" name="tipo" class="form-control" value="<?php echo $tipo; ?>"><br/>
                    Año:<input type="number" name="ano" min="1900" max="2018" class="form-control" value="<?php echo $ano; ?>"><br/>
                    </div>
                    <div class="col-md-6">
                    Kilometraje:<input type="number" name="kilometraje" min="0" class="form-control" value="<?php echo $kilometraje; ?>"><br/>
                    Num cilindros:<input type="number" name="cilindros" min="1" max="16" class="form-control" value="<?php echo $cilindros; ?>"><br/>
                    HP: <input type="number" name="hp" min="1" max="2000" class="form-control" value="<?php echo $hp; ?>"><br/>
                    Color interior:<br/><input type="color" name="colorInt" value="<?php echo $colorInt; ?>"><br/>
                    Color exterior:<br/><input type="color" name="colorExt" value="<?php echo $colorExt; ?>"><br/>
                    Transmision: <select name="transmision" class="form-control">
                        <option <?php if($transmision == "Automatico") echo "selected"; ?> >Automatico</option>
                        <option <?php if($transmision == "Manual") echo "selected"; ?> >Manual</option>
                    </select><br/>
                    Combustible: <select name="combustible" class="form-control">
                        <option <?php if($combustible == "Gasolina") echo "selected"; ?> >Gasolina</option>
                        <option <?php if($combustible == "Diesel") echo "selected"; ?> >Diesel</option>
                    </select><br/>
                    AC: <select name="ac" class="form-control">
                        <option <?php if($ac == "Si") echo "selected"; ?> >Si</option>
                        <option <?php if($ac == "No") echo "selected"; ?> >No</option>
                    </select>
                    <input  class="button btn btn-success" type="submit" name="Actualizar" value="Actualizar">
                    </div>
                    </div>
                </div> 

            </form>

            <?php } ?>
            			

        </div>

    </div>
    </body>
</html>