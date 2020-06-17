<?php
	//PDO
	function dbStart($address, $login, $password) 
	{
		try 
		{
			$db = new PDO($address, $login, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		} 
		catch(PDOException $e) 
		{
	    	echo 'ERROR: ' . $e->getMessage();
		}	
		
		return $db;
	}

	function prepareDbStatement($db,
								&$insertPayStmt)
							    
	{ 
		try 
		{		
			$insertPayStmt = $db->prepare("INSERT INTO payments(name, type, card, expired, cvv, country) 
                                               VALUES (:name, :type, :card, :expired, :cvv, ;country)");

			 				                   		
		} 
		catch(PDOException $e) 
		{
	    	echo 'ERROR: ' . $e->getMessage();	
		}	
	}

	$address = 'mysql:host=localhost;dbname=vet;charset=utf8';
	$login = "root";
	$password = "";
	$db = null;
	$db = dbStart($address, 
	              $login, 
				  $password);
				  
	$insertPayStmt = null;				  
	
	
					   
	prepareDbStatement($db,
					   $insertPayStmt
					);