<?php
	ini_set("date.timezone", "Asia/Kuala_Lumpur");
	
	require_once('db.php');
	
	$name = $_POST["name"];
	$type = $_POST["type"];
	$card = $_POST["card"];
	$expired = $_POST["expired"];
	$cvv =  $_POST["cvv"];
	$country = $_POST["country"];
	
	
	//insert into table vet
	try 
	{
		$insertPayStmt->execute(array(
			"name" => "$name", 
			"type" => "$type", 
        	"card" => "$card", 
			"expired" => "$expired",
			"cvv" => "$cvv",
			"country" => "$country"
		));
	}
	catch(PDOException $e) 
	{
		$errorMessage = $e->getMessage();
		$data = Array(
			"insertStatus" => false,
			"errorMessage" => $errorMessage
		);	
		echo json_encode($data);
		exit;
	}
	
	$data = Array(
		"insertStatus" => true,
		"name" => "$name",
		"type" => "$type",
		"card" => "$card", 
		"expired" => "$expired",
		"cvv" => "$cvv",
		"country" => "$country"
	);
	
	echo json_encode($data);