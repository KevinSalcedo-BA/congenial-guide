<?php
	include('class.consultas.php');
	$id       = $_GET["id"];//Si recibimos un dato entonces hacemos filtro si recibimos 0 no hacemos filtro
	$tabla    = $_GET["control"];
	$filtro   = "";
	if($id<>""){ $filtro = " WHERE nombre like '%".$id."%' or apellidos like '%".$id."%'";}
	if($tabla>0){
		$filtro = " WHERE id=".$id;
	}
	$Json     = new Json;
	$clientes = $Json->BuscaClientes($filtro);
	echo  json_encode($clientes);
?>