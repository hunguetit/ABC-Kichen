<?php	
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/getDate.php");
	
	
	// cac dong thong bao, trang thai ben trang nguoi dung
	$noti= "";
	$state= "Đăng ký ăn";
	$warn= "";
	
	// ket noi den csdl
	$db= new PDOData();	
	
	// nhan ve va thay doi format cua ngay mai
	$d= new getDate ();
	$tomorrow= $d->getTomorrowForDatabase();
	$tomorrow2= $d->getTomorrowForPrint();
	
	$temp= $d->getWeeksOfYear (1);
	$dayForDatabase= $d->getDaysOfWeek (1);
	if ($temp%2===0) {
		$dayForDatabase+= 7;
	}
	
	// gan id cua nguoi dung dang dang nhap
	$clientId= $_SESSION['idClient'];		
	
	// kiem tra de huy dang ky an voi ngay da dang ky 
	$resu= $db->getData ("SELECT * FROM dangkycuthe WHERE idTAIKHOAN= $clientId AND ngay= '$tomorrow';");
	
	if (sizeof($resu)>0) {
		$warn= "Bạn đã đăng ký cho suất ăn cho $tomorrow2.</br></br>Để hủy đăng ký, vui lòng tick vào ô bên dưới và ấn xác nhận...";
		$state= "Hủy đăng ký";
	}
	else {
		$warn= "Bạn chưa đăng ký cho suất ăn cho $tomorrow2.</br></br>Để đăng ký, vui lòng tick vào ô bên dưới và ấn xác nhận...";
		$state= "Đăng ký ăn";
	}
	
	//$warn= $resu;
	
		
	// kiem tra su kien voi form
	if(isset($_POST["regi"])){
		// kiem tra trang thai de co buoc xu ly tuong ung
		if ($state==="Đăng ký ăn") {		
			// cap nhat
			$resu = $db->editData("INSERT INTO dangkycuthe(idTAIKHOAN, ngay) VALUES($clientId, '$tomorrow');");						
			// If result ==1 is successful
			if($resu===1){
				$noti= "Đăng ký ăn thành công cho $tomorrow2\\nĐể hủy đăng ký, vui lòng quay trở lại tab Thực đơn ngày mai và hủy đăng ký trước 24h ngày hôm nay..." ;
				echo "<script type='text/javascript'>alert('$noti'); window.location= 'index.php';</script>";
				//echo 'window.location= "index.php"';
				//header("location: ../../view/client/index.php");
			}
			else {
				$noti= "Có lỗi khi đăng ký, vui lòng thử lại sau...";
				echo "<script type='text/javascript'>alert('$noti'); window.location= 'index.php';</script>";
				//header("location: ../../view/client/index.php");
			}
		}
		else if ($state==="Hủy đăng ký") {
			// xoa bo
			$resu = $db->editData("DELETE FROM dangkycuthe WHERE idTAIKHOAN= $clientId AND ngay= '$tomorrow';");				
		
			// Do co the da dang ky nhieu lan nen gia tri tra ve co the la >=1
			if($resu > 0){
				$noti= "Hủy đăng ký ăn thành công cho $tomorrow2\\nĐể đăng ký lại, vui lòng quay trở lại tab Thực đơn ngày mai và đăng ký trước 24h ngày hôm nay...";
				echo "<script type='text/javascript'>alert('$noti'); window.location= 'index.php';</script>";
				//header("location: ../../view/client/index.php");
			}
			else {
				$noti= "Có lỗi khi hủy đăng ký, vui lòng thử lại sau...";
				echo "<script type='text/javascript'>alert('$noti'); window.location= 'index.php';</script>";
				//header("location: ../../view/client/index.php");
			}
		}
		else {
			$noti= "Có lỗi xảy ra, vui lòng thử lại sau...";
			echo "<script type='text/javascript'>alert('$noti'); window.location= 'index.php';</script>";
			//header("location: ../../view/client/index.php");
		}
	}
?>
