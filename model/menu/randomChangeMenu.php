<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");

	if(isset($_POST["change"])){
		$db= new PDOData ();
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

