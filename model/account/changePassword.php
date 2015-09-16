<?php	
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");
	
	// dong thong bao loi ben tao tai khoan nguoi dung cua admin
	$err= "";
	
	if(isset($_POST["newpassword"]) && isset($_POST["renewpassword"]) && isset($_POST["oldpassword"])) {		
		
		$oldpassword=addslashes($_POST['oldpassword']); 
		$newpassword=addslashes($_POST['newpassword']); 
		$newrepassword=addslashes($_POST['renewpassword']); 
		$accId= $_SESSION['idGeneral'];
		
		if ($newpassword==="" || $newrepassword==="" || $oldpassword==="") {
			$err= "Vui lòng cung nhập đầy đủ các trường được yêu cầu...";
			echo "<script type='text/javascript'>alert('$err');</script>";
		}
		else if ($newpassword!= $newrepassword) {
			$err= "Mật khẩu mới không khớp, vui lòng nhập lại...";
			echo "<script type='text/javascript'>alert('$err');</script>";
		}
		else {
			// ket noi CSDL
			$db= new PDOData();
			
			$resu= $db->getData("SELECT matKhau FROM taikhoan WHERE idTAIKHOAN= $accId");
			foreach ($resu as $re) {
				$mk= $re['matKhau'];
			}
			if ($mk!= $oldpassword) {
				$err= "Mật khẩu không chính xác...";
				echo "<script type='text/javascript'>alert('$err');</script>";
			}		
			else {
				$resu= $db->editData("UPDATE taikhoan SET matKhau= '$newpassword' WHERE idTAIKHOAN= $accId;");
				// If result matched $myusername and $mypassword, table row must be 1 row
				if(count($resu) ===1){
					$err= "Mật khẩu được thay đổi thành công...";
					echo "<script type='text/javascript'>alert('$err');</script>";
				}
				else {
					$err= "Mật khẩu không chính xác...";
					echo "<script type='text/javascript'>alert('$err');</script>";
				}												
			}
		}
	}else{
		//echo "L?i k?t n?i...'";
	}
	
?>
