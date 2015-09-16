<?php	
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");
	
	// dong thong bao loi khi dang nhap
	$err= "";
	
	if(isset($_POST["username"]) && isset($_POST["password"])){
		session_unset();
		session_destroy();
		$db= new PDOData();
		// username and password sent from Form 
		$myusername=addslashes($_POST['username']); 
		$mypassword=addslashes($_POST['password']); 

		$user = $db->getData("SELECT idTAIKHOAN FROM taikhoan WHERE ten='$myusername' AND matKhau='$mypassword';");				
		
		// If result matched $myusername and $mypassword, table row must be 1 row
		if(count($user) ==1){
			// khoi dong session
			session_start();
			//session_register("idTAIKHOAN");
			//$resu = $user->fetchColumn();			
			
			// lay ve id cua taikhoan
			foreach ($user as $id) {
				$userId= $id["idTAIKHOAN"];
			}
			
			$_SESSION['idGeneral']=$userId;
			
			// phan chia loai tai khoan de load trang tuong ung
			if ($myusername== "admin") {
				$_SESSION['idAdmin']=$userId;
				header("location: ../../ABC/view/admin/index.php");				
			}
			else if ($myusername== "accounting") {
				$_SESSION['idAccounting']=$userId;
				header("location: ../../ABC/view/accounting/index.php");
			}
			else {
				$_SESSION['idClient']=$userId;
				$user= $db->getData("SELECT hoTen FROM thongtintaikhoan WHERE idTAIKHOAN= $userId;");
				foreach ($user as $spe) {
					$nameUser= $spe["hoTen"];
				}
				$_SESSION['nameUser']= $nameUser;
				// truong hop voi cac tai khoan con lai se load trang danh cho client
				header("location: ../../ABC/view/client/index.php");
			}
		}
		else {
			$err= "Tài khoản hoặc mật khẩu không chính xác...";
			echo "<script type='text/javascript'>alert('$err');</script>";
		}
	}else{
		//echo "Lỗi kết nối...";
	}
	
?>
