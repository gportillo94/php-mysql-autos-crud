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
                <li><a href="reportes.html">Reportes</a></li>
            </ul>
        </div>

        <div id="reporte">
            <h2>Reporte de autos</h2>
            <?php 
                include 'config/cred_info.php';
                include 'config/campos_bd.php';

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM autos"; 

                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                {
                    $tabla = "<table class='tabla'><thead> <th>Placas</th> <th>Precio</th> <th>Marca</th> <th>Modelo</th> <th>Version</th>" ; 
                    $tabla .= "<th>Tipo</th> <th>Año</th> <th>Kilometraje</th>  <th>Num. Cilindros</th>" ; 
                    $tabla .= "<th>HP</th> <th>Color Int.</th> <th>Color Ext.</th> <th>Transmision</th>  <th>Combustible</th>  <th>AC</th>  </thead>" ; 
                    while($row = $result->fetch_assoc()) 
                    {
                        $tabla .= "<tr>" ; 
                        foreach ($campos as $campo) {
                            $tabla .= "<td>".$row[$campo]."</td>"; 
                        }
                        $tabla .= "</tr>" ; 
                    }
                    $tabla .= "</table>" ;
                    echo $tabla; 
                } 
                else 
                {
                    echo "0 results";
                }
                $conn->close();
            ?>
        </div>
        
    </div>
    </body>
</html>