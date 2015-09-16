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
	
	$data= $db->getData ("SELECT tk.idTAIKHOAN, ten, maNhanVien, hoTen FROM taikhoan AS tk, thongtintaikhoan AS tttk WHERE tttk.idTAIKHOAN IN (SELECT DISTINCT idTAIKHOAN FROM dangkycuthe WHERE ngay= '$todayForDatabase') AND tk.idTAIKHOAN IN (SELECT DISTINCT idTAIKHOAN FROM dangkycuthe WHERE ngay= '$todayForDatabase') AND tk.idTAIKHOAN= tttk.idTAIKHOAN");
	
	if (isset ($_POST['submit'])) {
		foreach ($data as $spe) {
			// lay ra nhung thong bao co thay doi
			// ghep lai ten cua check box
			$idtk= $spe['idTAIKHOAN'];
			$aidtk= "a" .$idtk;			
			if (isset($_POST[$idtk])) {
				$db->editData ("UPDATE dangkycuthe SET denAnThucTe= 0 WHERE idTAIKHOAN= $idtk");
			}
		}
		$noti= "Thêm thành công các tài khoản không đến ăn ngày $toda..." ;
		echo "<script type='text/javascript'>alert('$noti'); window.location= 'index.php';</script>";
	}