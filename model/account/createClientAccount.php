<?php	
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");
	
	// dong thong bao loi ben tao tai khoan nguoi dung cua admin
	$err= "";
	
	if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["repassword"]) && isset($_POST["employeeId"]) && isset($_POST["employeeName"])) {		
		// username and password sent from Form 
		$newusername=addslashes($_POST['username']); 
		$newpassword=addslashes($_POST['password']); 
		$newrepassword=addslashes($_POST['repassword']); 
		$newemployeename=addslashes($_POST['employeeName']);
		$newemployeeid=addslashes($_POST['employeeId']);
		$newemployeephonenumber=$_POST['employeePhoneNumber'];
		
		if ($newpassword==="" || $newrepassword==="" || $newusername==="" || $newemployeeid==="" || $newemployeename==="") {
			$err= "Vui lòng cung cấp đầy đủ thông tin được yêu cầu...";
			echo "<script type='text/javascript'>alert('$err');</script>";
		}
		else if ($newpassword!= $newrepassword) {
			$err= "Mật khẩu không khớp, vui lòng nhập lại...";
			echo "<script type='text/javascript'>alert('$err');</script>";
		}
		else {		
			// ket noi CSDL
			$db= new PDOData();
			
			// kiem tra xem ten tai khoan co bi trung hay khong
			$user = $db->getData("SELECT * FROM taikhoan WHERE ten='$newusername';");	
						
			// tra ra thong bao khi co loi trung ten
			if(count($user) ===1){
				$err= "Tên tài khoản đã được sử dụng. Vui lòng chọn tên tài khoản khác...";
				echo "<script type='text/javascript'>alert('$err');</script>";
			}
			// Neu nhu chua co tai khoan, gia tri tra ve se la 0, duoc chap nhan va su dung tiep
			else {
				// kiem tra thong tin tai khoan (ma nhan vien)
				$user = $db->getData("SELECT * FROM thongtintaikhoan WHERE maNhanVien='$newemployeeid';");
				if(count($user) ===1){
					$err= "Nhân viên có mã như hiện tại đã được tạo tài khoản.\\nVui lòng kiểm tra lại thông tin trên hệ thông...";
					echo "<script type='text/javascript'>alert('$err');</script>";
				}
				else {
					$resu1= $db->editData("INSERT INTO taikhoan (ten, matKhau) VALUES ('$newusername', '$newpassword');");
					if ($resu1<=0) {
						$err= "Có lỗi trong quá trình tạo tài khoản, vui lòng thử lại sau...";
						echo "<script type='text/javascript'>alert('$err');</script>";
					}
					else {
						$user = $db->getData("SELECT idTAIKHOAN FROM taikhoan WHERE ten='$newusername' AND matKhau='$newpassword';");			
						// If result matched $myusername and $mypassword, table row must be 1 row
						if(count($user) ===1){				
							// lay ve id cua taikhoan
							foreach ($user as $id) {
								$userId= $id["idTAIKHOAN"];
							}
							$resu2= $db->editData("INSERT INTO thongtintaikhoan (maNhanVien, hoTen, soDienThoai, idTAIKHOAN) VALUES ('$newemployeeid', '$newemployeename', '$newemployeephonenumber', '$userId');");
							if ($resu2<=0) {
								$err= "Có lỗi trong quá trình tạo tài khoản, vui lòng thử lại sau...";
								echo "<script type='text/javascript'>alert('$err');</script>";
							}
							else {
								$err= "Tài khoản được tạo thành công...\\n  Tên tài khoản: $newusername\\n  Mật khẩu: $newpassword\\n  Tên người dùng: $newemployeename\\n  Mã nhân viên: $newemployeeid\\nVui lòng đăng nhập để chỉnh sửa thông tin cá nhân...";
								echo "<script type='text/javascript'>alert('$err'); window.location= 'index.php';</script>";
							}
						}
					}					
				}
			}					
		}
	}else{
		//echo "L?i k?t n?i...'";
	}
	
?>
