<?php
	print_r($_POST); 
	include 'config/cred_info.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("SELECT * FROM autos WHERE ".$_POST["campoBusqueda"]." = ?");
	$stmt->bind_param("s", $_POST["textoBusqueda"]);
	$stmt->execute();
	$stmt->bind_result($placas, $precio, $marca, $modelo, $version, $tipo, $ano, $kilometraje, $cilindros, $hp, $colorInt, $colorExt, $transmision, $combustible, $ac);
	$res = $stmt->fetch();

	echo $placas;
	echo $marca;
	echo $modelo;
	echo $version;
	echo $tipo;




	$stmt->close() ; 
	$conn->close() ;

?>