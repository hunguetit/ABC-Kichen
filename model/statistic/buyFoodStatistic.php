<?php 
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/getDate.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");	
	
	// ket noi csdl
	$db= new PDOData();
	
	$d= new getDate();
	// lay ve ngay
	$toda= $d->getNextDaysForPrint(0);
	$todayForDatabase= $d->getNextDaysForDatabase(0);
	
	// lay ve thu tu ngay trong tuan
	$spaceOfDays= $d->getDaysOfWeek(0);
	// lay ve thu tu tuan trong nam
	$woy= $d->getWeeksOfYear(0);
	if($woy%2===0) {
		$spaceOfDays+= 7;
	}
	
	// lay du lieu ve so nguoi den an trong nay
	$tongSoDenAn= $db->getData("SELECT DISTINCT idTAIKHOAN FROM dangkycuthe WHERE ngay= '$todayForDatabase'");
	
	// lay du lieu ve thuc don ngay hnay
	$data= $db->getData("SELECT * FROM thucdon WHERE ngay= '$spaceOfDays'");
	
	// dua du lieu vao mang
	$monanid= array();
	foreach ($data as $spe) {
		$monanid[1]= $spe['idMONAN1'];
		$monanid[2]= $spe['idMONAN2'];
		$monanid[3]= $spe['idMONAN3'];
		$monanid[4]= $spe['idMONAN4'];
		$monanid[5]= $spe['idMONAN5'];
	}

	$i= 1;
	$tenmonan= array();
	$nl= array();
	for ($i= 1; $i<=5; $i++) {			
		$tempA= $db->getData ("SELECT ten FROM monan WHERE idMONAN= $monanid[$i]");
		foreach ($tempA as $spe) {
			$tenmonan[$i]= $spe['ten'];
		}
		
		// them du lieu cho mang chua cac nguyen lieu cua 1 mon an
		$nl[$i]= $db->getData ("SELECT soLuong, ten, donVi FROM monan_nguyenlieu AS ma_nl, nguyenlieu AS nl WHERE nl.idNGUYENLIEU= ma_nl.idNGUYENLIEU AND ma_nl.idMONAN= $monanid[$i]");
	}
	
	

