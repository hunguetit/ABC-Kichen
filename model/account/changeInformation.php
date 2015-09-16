<?php	

	if(isset($_POST['employeeName'])) {
		include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");
		
		// dong thong bao loi ben tao tai khoan nguoi dung cua admin
		$err= "";
		$newemployeename=addslashes($_POST['employeeName']);
		$newemployeephonenumber= "";
		$id= $_SESSION['idGeneral'];		
		if(isset($_POST["employeePhoneNumber"])) {
			$newemployeephonenumber=$_POST['employeePhoneNumber'];
		}
		
		if ($newemployeename==="") {
			$err= "Vui lòng cung cấp đầy đủ thông tin được yêu cầu...";
			echo "<script type='text/javascript'>alert('$err');</script>";
		}
		else {		
			// ket noi CSDL
			$db= new PDOData();
						
			$resu1= $db->editData("UPDATE thongtintaikhoan SET hoTen= '$newemployeename', soDienThoai= '$newemployeephonenumber' WHERE idTAIKHOAN= $id;");
			if ($resu1<=0) {
				$err= "Có lỗi trong quá trình thay đổi thông tin, vui lòng thử lại sau...";
				echo "<script type='text/javascript'>alert('$err');</script>";
			}
			else {
				$err= "Thông tin cá nhân được thay đổi thành công...";
				echo "<script type='text/javascript'>alert('$err');</script>";
				$_SESSION['nameUser']= $newemployeename;
			}					
		}
	}	
?>
