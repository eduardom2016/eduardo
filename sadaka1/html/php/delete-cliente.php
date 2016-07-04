<?php
	require_once 'init-cliente.php';

	// pega o ID da URL
	$id=isset($_GET['id'])?$_GET['id']:null;

	// valida o ID
	if(empty($id)){
		echo "ID não informado";
		exit;
	}

	// remove do BD
	$PDO=db_connect() ;
	$sql="DELETE FROM clientes WHERE idCliente = :id";
	$stmt= $PDO->prepare($sql);
	$stmt->bindParam( ':id', $id , PDO::PARAM_INT);
	if($stmt->execute()){
		header('Location:cliente.php') ;
	}else{
		echo "Erro ao excluir";
		print_r($stmt->errorInfo());
	}
?>
