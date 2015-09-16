<?php	
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");
	
	// lay id tai khoan
	$clientId= $_SESSION['idClient'];
	
	// ket noi csdl
	$db= new PDOData();
	
	// lay ve ngay
	$d=strtotime("tomorrow");
	$mon= date("m", $d);
	$yea= date("Y", $d);
	
	// lay du lieu
	$arr= $db->getData("SELECT day(ngay) AS day, month(ngay) AS month, year(ngay) AS year, denAnThucTe FROM dangkycuthe WHERE idTAIKHOAN= $clientId AND month(ngay)= $mon AND year(ngay)= $yea GROUP BY ngay;");