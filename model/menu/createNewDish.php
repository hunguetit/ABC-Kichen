<?php
	
	if(isset($_POST["tenMonAn"])) {
		$noti= "";
		// luu anh vao thu muc + luu ten file vao csdl 
		// cac buoc nay se duoc thuc hien cuoi cung
		$target_dir = "../../images/dbImages/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$createOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");
		$db= new PDOData();
		
		$newDishName= $_POST['tenMonAn'];
		$dishType= $_POST['dishType'];
		
		//$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		$resu= $db->getData ("SELECT * FROM monan WHERE ten= '$newDishName'");
		// kiem tra xem da co mon an nao co ten nhu vay hay chua
		if (count($resu)>0) {
			$createOk= 0;
			$noti= "Tên món ăn đã tồn tại. Vui lòng kiểm tra lại trong danh sách món ăn.\\n";
		/*
		} else if($check === false) {
			// kiem tra xem co phai la file anh hay khong
			$noti= "File không phải là ảnh.\\n";
			$createOk = 0;			
		*/
		} else if (file_exists($target_file)) {
			// Check if file already exists
			$noti= "Ảnh minh họa đã tồn tại.\\n";
			$createOk = 0;
		} else if ($_FILES["fileToUpload"]["size"] > 2500000) {
			// Check file size
			$noti= "Ảnh quá lớn. Vui lòng sử dụng ảnh có cỡ < 2.5 MB\\n";
			$createOk = 0;
		} else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			// Allow certain file formats
			$noti= "Chỉ ảnh có định dạng JPG, JPEG, PNG & GIF được chấp nhận.\\n";
			$createOk = 0;
		}
		// Check if $createOk is set to 0 by an error
		if ($createOk == 0) {
			$noti = $noti ."Không thể tại mới món ăn...";
			echo "<script type='text/javascript'>alert('$noti');</script>";
		
		} else {
			// if everything is ok, try to upload file
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$resu= $db->editData ("INSERT INTO monan(ten, idLOAIMONAN) VALUES ('$newDishName', $dishType)");
				if ($resu=== 1) {
					// them nguyen lieu va tham chieu cac truong tai day
					
					if (true) {
						$noti= "Món ăn: $newDishName - được tạo thành công.\\n";
						$noti= $noti. "Nguyên liêu:\\n";
						// dien ten ca nguyen lieu tai day
						echo "<script type='text/javascript'>alert('$noti'); window.location= 'index.php';</script>";
					} else {
						$noti= "Có lỗi trong quá trình ghi vào CSDL, Vui lòng thử lại sau ...";
						echo "<script type='text/javascript'>alert('$noti');</script>";
					}
				}
			} else {
				$noti= "Có lỗi trong quá trình upload ảnh, Vui lòng thử lại sau ...";
				echo "<script type='text/javascript'>alert('$noti');</script>";
			}
		}
	}
?> 