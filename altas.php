<?php

	include 'config/cred_info.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	$insertStatement = "INSERT into autos (placas, precio , marca, modelo, version, tipo, ano , kilometraje, cilindros, hp, colorInt, colorExt, transmision, combustible, ac)" ; 
	$insertStatement .= "values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)" ; 
	$stmt = $conn->prepare($insertStatement);
	$stmt->bind_param("sdssssiiiisssss", $placas, $precio, $marca, $modelo, $version, $tipo , $ano, $kilometraje, $cilindros , $hp, $colorInt, $colorExt, $transmision, $combustible, $ac);

	$placas = $_POST["placas"] ; 
	$precio = (float)$_POST["precio"] ; 
	$marca = $_POST["marca"] ;  
	$modelo = $_POST["modelo"] ;  
	$version = $_POST["version"] ;  
	$tipo = $_POST["tipo"] ;  
	$ano = $_POST["ano"] ;  
	$kilometraje = $_POST["kilometraje"] ;  
	$cilindros = $_POST["cilindros"] ;  
	$hp = $_POST["hp"] ;  
	$colorInt = $_POST["colorInt"] ;  
	$colorExt = $_POST["colorExt"] ;  
	$transmision = $_POST["transmision"] ;  
	$combustible = $_POST["combustible"] ;  
	$ac = $_POST["ac"] ;  

	$stmt->execute();

	echo "Nuevo auto insertado exitosamente<br />";

	$stmt->close() ;
	$conn->close() ; 

	echo "<br/><a href='altas.html'>Regresar<a>";



?>