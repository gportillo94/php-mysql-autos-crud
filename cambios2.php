<?php
	print_r($_POST) ; 

	include 'config/cred_info.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}

	$update_string= "UPDATE autos SET
	precio = ?, 
	marca = ?,
	modelo = ?,
	version = ?,
	tipo = ?,
	ano = ?,
	kilometraje = ?,
	cilindros = ?,
	hp = ?,
	colorInt = ?,
	colorExt = ?,
	transmision = ?,
	combustible = ?,
	ac = ?
	WHERE placas = ?"; 

	$stmt = $conn->prepare($update_string) ; 
	$stmt->bind_param("dssssiiiissssss",$precio, $marca, $modelo, $version, $tipo , $ano, $kilometraje, $cilindros , $hp, $colorInt, $colorExt, $transmision, $combustible, $ac,  $placas);

	$placas = $_POST["placas"]; 
	$precio = $_POST["precio"]; 
	$marca = $_POST["marca"]; 
	$modelo = $_POST["modelo"]; 
	$version = $_POST["version"]; 
	$tipo = $_POST["tipo"]; 
	$ano = $_POST["ano"]; 
	$kilometraje = $_POST["kilometraje"]; 
	$cilindros = $_POST["cilindros"]; 
	$hp = $_POST["hp"]; 
	$colorInt = $_POST["colorInt"]; 
	$colorExt = $_POST["colorExt"]; 
	$transmision = $_POST["transmision"]; 
	$combustible = $_POST["combustible"]; 
	$ac = $_POST["ac"]; 

	$stmt->execute() ; 

	echo "Actualizacion exitosa<br />";
	echo "<a href='altas.html'>Regresar</a>";
?>