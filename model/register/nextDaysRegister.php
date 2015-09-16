<?php	
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/getDate.php");		
	
	// nhan ve va thay doi format cua ngay mai
	$d= new getDate ();
	// ket noi den csdl
	$db= new PDOData();	
	
	// cac bien danh cho su kien DANG KY
	// cac dong thong bao, trang thai ben trang nguoi dung
	$noti= "";
	$state= "Đăng ký ăn";
	$warn= "";	
	
	// bien su dung cho alert phan dang ky
	$menuDay= $d->getTomorrowForPrint();
	// dayForRegisterDatabase de gan gia tri cua $_SESSION['dayForRegisterDatabase']
	$dayForRegisterDatabase= $d->getTomorrowForDatabase();
	
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
	
	// kiem tra xem nut duoc bam vao la nut nao
	if (isset($_GET['d'])) {
		
		// khoi dong lai session cho ajax
		session_start();
		// gan id cua nguoi dung dang dang nhap
		$clientId= $_SESSION['idClient'];		
		$selected= $_GET['d'];
		$spaceOfDays= $d->getDaysOfWeek ($selected);
		switch ($selected) {
			case 1:
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
	
	
		// thay doi selected de phu hop voi 2 thuc don
		// so tuan ma la le, lay tu 1
		// so tuan ma tu chan, lay tu 8
		$numOfWeek= $d->getWeeksOfYear ($selected);
		
		//$GLOBALS['dayForRegisterDatabase']= $d->getNextDaysForDatabase($selected);
		$_SESSION['dayForRegisterDatabase']= $d->getNextDaysForDatabase($selected);
		$dayForRegisterDatabase= $_SESSION['dayForRegisterDatabase'];
		
		if ($numOfWeek%2 === 0) {
			$spaceOfDays+= 7;
		}
		// lay du lieu
		$data= $db->getData("SELECT * FROM thucdon WHERE ngay= $spaceOfDays");
		
		
		// Code cho thong bao cua nut dang ky an
		// kiem tra de huy dang ky an voi ngay da dang ky
		// hoac nguoc lai
		$resu= $db->getData ("SELECT * FROM dangkycuthe WHERE idTAIKHOAN= $clientId AND ngay= '$dayForRegisterDatabase';");
		// gan bien thay cho session
		$menuDay= $_SESSION['menuDay'];
		if (sizeof($resu)>0) {
			$warn= "Bạn đã đăng ký cho suất ăn cho $menuDay.</br>Để hủy đăng ký, vui lòng tick vào ô bên dưới và ấn xác nhận...";
			$state= "Hủy đăng ký";
		}
		else {
			$warn= "Bạn chưa đăng ký cho suất ăn cho $menuDay.</br>Để đăng ký, vui lòng tick vào ô bên dưới và ấn xác nhận...";
			$state= "Đăng ký ăn";
		}
		$_SESSION['state']= $state;
		
		
		// hien thi bang ra man hinh
		echo "<br><br><h5 style= 'color: red'>" .$warn ."</h5>";						
		echo "<input type='checkbox' id='regi' name='regi' value='regis'>";
		echo $state. "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
		echo "<input type='submit' name= 'regisButton' class='button-2' value='Xác nhận' />";
		echo "<br> <br>";								
	
		echo "<br><h4 class='p1'>";						
		echo "Thực đơn: ";
		echo $menuDay;
		echo "</h4>";
		
		echo "<table style='width:80%'>";
			echo "<tr>";
				echo "<th style= 'width:10%; text-align: left;'>STT</th>";
				echo "<th style= 'width:40%; text-align: left;'>Tên món ăn</th>";
				echo "<th style= 'text-align: left;'>Ảnh minh họa</th>";
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
					
					$monan= $db->getData ("SELECT * FROM monan WHERE idMONAN= $monanid[$i]");
					foreach ($monan as $spemonan) {
						$ten= $spemonan['ten'];
						$anh= $spemonan['hinhAnh'];
					}
					echo "<td>$ten</td>";
					echo "<td><img class='dbImg' style='width: 200px;' src='../../images/dbImages/$anh' alt=''/></td>";
				echo "</tr>";
				
				echo "<tr><td> <br> </td></tr>";
			}
		echo "</table>";	

		echo "<h3 style='color: red;'>Thực đơn này có thể bị thay đổi</h3>";
	} // ket thuc ham ajax

	
	// DANG KY AN
	// kiem tra su kien voi form
	if(isset($_POST["regi"]) && isset($_POST["regisButton"])){
		$clientId= $_SESSION['idClient'];
		// gan bien de su dung cho CSDL
		$dayForRegisterDatabase= $_SESSION['dayForRegisterDatabase'];
		$menuDay= $_SESSION['menuDay'];
		
		// kiem tra trang thai de co buoc xu ly tuong ung
		$state= $_SESSION['state'];
		if ($state==="Đăng ký ăn") {		
			// cap nhat			
			$resu = $db->editData("INSERT INTO dangkycuthe(idTAIKHOAN, ngay) VALUES($clientId, '$dayForRegisterDatabase');");						
			// If result ==1 is successful
			if($resu===1){
				$noti= "Đăng ký ăn thành công cho $menuDay\\nĐể hủy đăng ký, vui lòng quay trở lại tab Thực đơn ngày mai và hủy đăng ký trước 24h ngày hôm trước..." ;
				echo "<script type='text/javascript'>alert('$noti');</script>";
			}
			else {
				$noti= "Có lỗi khi đăng ký, vui lòng thử lại sau...";
				echo "<script type='text/javascript'>alert('$noti'); window.location= 'index.php';</script>";
			}
		}
		else if ($state==="Hủy đăng ký") {
			// xoa bo
			$resu = $db->editData("DELETE FROM dangkycuthe WHERE idTAIKHOAN= $clientId AND ngay= '$dayForRegisterDatabase';");				
		
			// Do co the da dang ky nhieu lan nen gia tri tra ve co the la >=1
			if($resu > 0){
				$noti= "Hủy đăng ký ăn thành công cho $menuDay\\nĐể đăng ký lại, vui lòng quay trở lại tab Thực đơn ngày mai và chọn ngày muốn đăng ký...";
				echo "<script type='text/javascript'>alert('$noti');</script>";
			}
			else {
				$noti= "Có lỗi khi hủy đăng ký, vui lòng thử lại sau...";
				echo "<script type='text/javascript'>alert('$noti'); window.location= 'index.php';</script>";
			}
		}
		else {
			$noti= "Có lỗi xảy ra, vui lòng thử lại sau...";
			echo "<script type='text/javascript'>alert('$noti'); window.location= 'index.php';</script>";			
		}
	}
	


?>