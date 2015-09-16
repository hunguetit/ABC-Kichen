<?php	
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/getDate.php");
	
	// nhan ve va thay doi format cua ngay mai
	$d= new getDate ();
	
	$db= new PDOData ();
	
	$days= array();
	$oneDayLater= $d->getTomorrowForPrint();
	$twoDaysLater= $d->getNextDaysForPrint(2);
	$threeDaysLater= $d->getNextDaysForPrint(3);
	$fourDaysLater= $d->getNextDaysForPrint(4);
	$fiveDaysLater= $d->getNextDaysForPrint(5);
	$sixDaysLater= $d->getNextDaysForPrint(6);
	$sevenDaysLater= $d->getNextDaysForPrint(7);	
	
	$selected= 0;
	$data= "";
	
	// su kien nut random
	if(isset($_POST["change"]) && isset($_POST["randomButton"])){
		
		$countt= 0;
		$dbArr1= array();		
		$tempArr= $db->getData ("SELECT idMONAN FROM monan WHERE idLOAIMONAN= 1");
		$lengthOfArr1= count($tempArr);
		foreach ($tempArr as $s1) {
			$dbArr1[$countt]= $s1['idMONAN'];
			$countt++;
		}
		$countt= 0;
		
		$dbArr2= array();
		$tempArr= $db->getData ("SELECT * FROM monan WHERE idLOAIMONAN= 2");
		$lengthOfArr2= count($tempArr);
		foreach ($tempArr as $s2) {
			$dbArr2[$countt]= $s2['idMONAN'];
			$countt++;
		}
		$countt= 0;
		
		$dbArr3= array();
		$tempArr= $db->getData ("SELECT * FROM monan WHERE idLOAIMONAN= 3");
		$lengthOfArr3= count($tempArr);
		foreach ($tempArr as $s3) {
			$dbArr3[$countt]= $s3['idMONAN'];
			$countt++;
		}
		$countt= 0;
		
		// luu gia tri chinh can de ghi lai vao csdl
		$originArr11= array();
		$originArr12= array();
		$originArr21= array();
		$originArr22= array();
		$originArr3= array();
		
		// so luong ngay la so luong cac truong trong bang thuc don
		// chi su dung 14 ngay de co the quan ly thuc odn de dang va nhanh nhat
		$soLuongNgay= 14;
		$temp11 =0;
		$temp12 =0;
		$temp21 =0;
		$temp22 =0;
		$temp3 =0;
		
		// bat dau random du lieu vao bang 		
		for ($i= 0; $i<14; $i++) {
			
			if ($i>0 && $i<13) {
				// nhan gia tri ve bien sau khi da kiem tra
				// chi kiem tra 1 dieu kien voi cac gia tri <13
				$temp11= randomOneCondition($originArr11[$i-1], 0, $lengthOfArr1/2 - 1);
				$temp12= randomOneCondition($originArr12[$i-1], $lengthOfArr1/2, $lengthOfArr1 - 1);
				$temp21= randomOneCondition($originArr21[$i-1], 0, $lengthOfArr2/2 - 1);
				$temp22= randomOneCondition($originArr22[$i-1], $lengthOfArr2/2, $lengthOfArr2 - 1);
				$temp3= randomOneCondition($originArr3[$i-1], 0, $lengthOfArr3 - 1);
			}
			else if ($i===13) {
				// voi gia tri la 13 phai kiem tra 2 dieu kien la ngay hom truoc do va cua tuan sau
				// co bi trung hay khong nen phai dung 1 ham moi
				$temp11= randomTwoConditions($originArr11[12], $originArr11[0], 0, $lengthOfArr1/2 - 1);
				$temp12= randomTwoConditions($originArr12[12], $originArr12[0], $lengthOfArr1/2, $lengthOfArr1 - 1);
				$temp21= randomTwoConditions($originArr21[12], $originArr21[0], 0, $lengthOfArr2/2 - 1);
				$temp22= randomTwoConditions($originArr22[12], $originArr22[0], $lengthOfArr2/2, $lengthOfArr2 - 1);
				$temp3= randomTwoConditions($originArr3[12], $originArr3[0], 0, $lengthOfArr3 - 1);								
			}
			else {
				$temp11= mt_rand(0, $lengthOfArr1/2 - 1);
				$temp12= mt_rand($lengthOfArr1/2, $lengthOfArr1 - 1);
				$temp21= mt_rand(0, $lengthOfArr2/2 - 1);
				$temp22= mt_rand($lengthOfArr2/2, $lengthOfArr2 - 1);
				$temp3= mt_rand(0, $lengthOfArr3 - 1);
			}
			// luu lai vao bang chinh
			$originArr11[$i]= $temp11;
			$originArr12[$i]= $temp12;
			
			$originArr21[$i]= $temp21;
			$originArr22[$i]= $temp22;
			
			$originArr3[$i]= $temp3;
		}

		// xoa toan bo du lieu cu trong bang monan;
		$db->editData ("DELETE FROM thucdon");
		
		
		// them 14 thuc don vao CSDL				
		for ($i= 0; $i<14; $i++) {
			$tem1= $originArr11[$i];
			$inp1= $dbArr1[$tem1];
			
			$tem2= $originArr12[$i];
			$inp2= $dbArr1[$tem2];
			
			$tem3= $originArr21[$i];
			$inp3= $dbArr2[$tem3];
			
			$tem4= $originArr22[$i];
			$inp4= $dbArr2[$tem4];
			
			$tem5= $originArr3[$i];
			$inp5= $dbArr3[$tem5];
			
			$ngay= $i+ 1;
			$db->editData ("INSERT INTO thucdon(ngay, idMONAN1, idMONAN2, idMONAN3, idMONAN4, idMONAN5) VALUES ($ngay, $inp1, $inp2, $inp3, $inp4, $inp5)");			
		}
		$noti= "Thực đơn được thay đổi ngẫu nhiên thành công";
		echo "<script type='text/javascript'>alert('$noti');</script>";
	}
	
		
	// kiem tra xem nut duoc bam vao la nut nao
	if (isset($_GET['d'])) {
		
		// khoi dong lai session cho ajax
		session_start();
		// gan id cua nguoi dung dang dang nhap
		//$clientId= $_SESSION['idClient'];		
		$selected= $_GET['d'];
		// kiem tra xem day la thu may
		$spaceOfDays= $d->getDaysOfWeek ($selected);
		// nut bam la nut nao
		switch ($selected) {
			case 1:
				// form ngay de hien thi ra man hinh 
				$_SESSION['menuDay']= $oneDayLater;
				break;
			case 2:
				$_SESSION['menuDay']= $twoDaysLater;
				break;
			case 3:
				$_SESSION['menuDay']= $threeDaysLater;
				break;
			case 4:
				$_SESSION['menuDay']= $fourDaysLater;
				break;
			case 5:
				$_SESSION['menuDay']= $fiveDaysLater;
				break;
			case 6:
				$_SESSION['menuDay']= $sixDaysLater;
				break;
			case 7:
				$_SESSION['menuDay']= $sevenDaysLater;
				break;
			default:
				break;
		}
		
		$numOfWeek= $d->getWeeksOfYear ($selected);		
		if ($numOfWeek%2 === 0) {
			$spaceOfDays+= 7;		
		}
		
		// gan cho session de su dung cho nhung lan sau
		$_SESSION['spaceOfDays']= $spaceOfDays;
		
		// lay du lieu
		$data= $db->getData("SELECT * FROM thucdon WHERE ngay= $spaceOfDays");	
	
		$menuDay= $_SESSION['menuDay'];
		echo "<br><br><h4>" ."Thực đơn: " .$menuDay ."</h4>";
		echo "<h4 style= 'color: red'>Để chỉnh sửa thực đơn này, vui lòng chọn 1 món ăn khác bên cột thay đổi.<br>";
		echo "Sau đó bấm vào nút lưu lại chỉnh sửa bên dưới thực đơn</h4>";
		
		echo "<table style='width:90%'>";
			echo "<tr>";
				echo "<th style= 'width:10%; text-align: left;'>STT</th>";
				echo "<th style= 'width:40%; text-align: left;'>Tên món ăn</th>";
				echo "<th style= 'width:10%;'>Ảnh minh họa</th>";
				echo "<th style= 'width:5%;'></th>";
				echo "<th style= 'width:35%; text-align: left;'>Thay đổi</th>";
			echo "</tr>";
			
			$monanid= array();
			foreach ($data as $spe) {
				$monanid[1]= $spe['idMONAN1'];
				$monanid[2]= $spe['idMONAN2'];
				$monanid[3]= $spe['idMONAN3'];
				$monanid[4]= $spe['idMONAN4'];
				$monanid[5]= $spe['idMONAN5'];
			}
			
			$i= 1;
			for ($i= 1; $i<=5; $i++) {
				echo "<tr>";
					echo "<td>Món $i</td>";
					
					$monan= $db->getData ("SELECT ten, hinhAnh FROM monan WHERE idMONAN= $monanid[$i]");
					foreach ($monan as $spemonan) {
						$ten= $spemonan['ten'];
						$anh= $spemonan['hinhAnh'];
					}
					echo "<td>$ten</td>";
					echo "<td><img class='dbImg' style='width:200px;' src='../../images/dbImages/$anh' alt=''/></td>";
					echo "<td></td>";
					$selectName= "mon" .$i;
					echo "<td><select name= '$selectName'>";
						$changeArray= loadChange($i);
						echo "<option value='0'>Chọn 1 món ăn khác</option>";
						foreach ($changeArray as $chaId => $chaValue) {
							echo "<option value='$chaId'>$chaValue</option>";
						}
					echo "</select></td>";
				echo "</tr>";
				
				// them khoang trong giua cac dong
				echo "<tr><td> <br> </td></tr>";
			}
		echo "</table>";	
		echo "<input type='submit' name='saveChangeButton' class='button-2' value='Lưu lại chỉnh sửa'/>";
	}
	
	
	
	// su kien cua cac thay doi trong CSDL thuc don
	if(isset($_POST["saveChangeButton"])) {
		$day= $_SESSION['spaceOfDays'];
		$idTemp= -1;
		$coo1= 0;	$coo2= 0;	$coo3= 0;	$coo4= 0;	$coo5= 0;
		
		// thay doi
		if ($_POST['mon1'] != '0') {
			$idTemp= $_POST['mon1'];
			$coo1= $db->editData ("UPDATE thucdon SET idMONAN1= $idTemp WHERE ngay= $day");
		}
		if ($_POST['mon2'] != '0') {
			$idTemp= $_POST['mon2'];
			$coo2= $db->editData ("UPDATE thucdon SET idMONAN2= $idTemp WHERE ngay= $day");
		}
		if ($_POST['mon3'] != '0') {
			$idTemp= $_POST['mon3'];
			$coo3= $db->editData ("UPDATE thucdon SET idMONAN3= $idTemp WHERE ngay= $day");
		}
		if ($_POST['mon4'] != '0') {
			$idTemp= $_POST['mon4'];
			$coo4= $db->editData ("UPDATE thucdon SET idMONAN4= $idTemp WHERE ngay= $day");
		}
		if ($_POST['mon5'] != '0') {
			$idTemp= $_POST['mon5'];
			$coo5= $db->editData ("UPDATE thucdon SET idMONAN5= $idTemp WHERE ngay= $day");
		}
		
		// xuat ra thong bao
		if ($coo1>=0 || $coo2>=0 || $coo3>=0 ||$coo4>=0 ||$coo5>=0)
			$noti= "Thay đổi thành công...";
		else 
			$noti= "Có lỗi xảy ra trong quá trình lưu lại thay đổi...\\nVui lòng thử lại sau...";
		echo "<script type='text/javascript'>alert('$noti');</script>";
	}
	
	
	
	
	// FUNCTIONS
	function loadChange ($nowDish) {
		
		// tao bien goi CSDL moi
		// khong biet tai sao lai phai lam nhu the @@
		$db= new PDOData ();
		
		$arr= array();
		$resu= array();
		$spaceOfDays= $_SESSION['spaceOfDays'];
		$exceptDay1= -1;
		$exceptDay2= -1;
		$exceptDish1= -1;
		$exceptDish2= -1;
		$exceptDish3= -1;
		$typeOfDish= -1;
		$beginDish= -1;
		$finishDish= -1;
		
		// lay ve ngay bi loai tru khoi danh sach
		if ($spaceOfDays=== 14) {
			$exceptDay1= 13;	$exceptDay2= 1;
		}
		else if ($spaceOfDays=== 1) {
			$exceptDay1= 14;	$exceptDay2= 2;
		}
		else {
			$exceptDay1= $spaceOfDays+1;
			$exceptDay2= $spaceOfDays-1;
		}
		
		// lay ra loai mon an dang duoc su dung
		if ($nowDish=== 1 || $nowDish=== 2) {
			$typeOfDish= 1;
		}
		else if ($nowDish=== 3 || $nowDish=== 4) {
			$typeOfDish= 2;
		}
		else {
			$typeOfDish= 3;
		}
		
		// ghep ten de thanh idMONAN can tim :)))
		$viTriMonAn= "idMONAN" .$nowDish;	
		
		// lay ve idMONAN bi loai tru tu 2 ngay bi loai tru o tren
		// lay mon an thu nhat ($viTriMonAn la idMONAN-n can lay ra)
		$resu= $db->getData ("SELECT $viTriMonAn FROM thucdon WHERE ngay= $exceptDay1");
		foreach ($resu as $speResu) {
			$exceptDish1= $speResu[$viTriMonAn];			
		}
		// lay mon an thu hai ($viTriMonAn la idMONAN-n can lay ra)
		$resu= $db->getData ("SELECT $viTriMonAn FROM thucdon WHERE ngay= $exceptDay2");
		foreach ($resu as $speResu) {
			$exceptDish2= $speResu[$viTriMonAn];
		}
		// loai bo mon an hien tai
		$resu= $db->getData ("SELECT $viTriMonAn FROM thucdon WHERE ngay= $spaceOfDays");
		foreach ($resu as $speResu) {
			$exceptDish3= $speResu[$viTriMonAn];			
		}	
		
		// lay ra danh sach cac mon an co the thay the, ghi vao mang de tra ve cho noi goi
		$resu= $db->getData ("SELECT * FROM monan WHERE idLOAIMONAN= $typeOfDish");		
		
		// kiem tra xem se lay nua ben nao cho muc chon
		if ($nowDish=== 1 || $nowDish=== 3) {
			$beginDish= 0;
			$finishDish= (count($resu)/2-1);
		}
		else if ($nowDish=== 2 || $nowDish=== 4) {
			$beginDish= (count($resu)/2);
			$finishDish= (count($resu)-1);
		}
		else {
			$beginDish= 0;
			$finishDish= (count($resu)-1);
		}
		
		// ghi vao mang
		$counn= 0;
		foreach ($resu as $speResu) {
			if ($counn >= $beginDish && $counn <= $finishDish) {
				if ($speResu['idMONAN']!= $exceptDish1 && $speResu['idMONAN']!= $exceptDish2 && $speResu['idMONAN']!= $exceptDish3) {
					$id= $speResu['idMONAN'];
					$arr[$id]= $speResu['ten'];
				}
			}
			$counn++;
		}
		return $arr;
	}
	
	function randomOneCondition ($con, $mi, $ma) {
		$tem= mt_rand($mi, $ma);
		while ($tem===$con) {
			$tem= mt_rand($mi, $ma);
		}
		return $tem;
	}
	
	function randomTwoConditions ($con1, $con2, $mi, $ma) {
		$tem= mt_rand($mi, $ma);
		while ($tem===$con1 || $tem===$con2) {
			$tem= mt_rand($mi, $ma);
		}
		return $tem;
	}
?>