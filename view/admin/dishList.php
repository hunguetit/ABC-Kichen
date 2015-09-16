<?php	
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/adminsesauth.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/menu/loadDishList.php");
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<section id="content">
	<div class="main">
		<div class="wrapper">
			<article class="">
			
				<h4>
					Để thêm món ăn mới, vui lòng <a id="newish" href="#" onclick="clickHere_onclick()" style="color: orange">bấm vào đây</a>
				</h4>
				<br>
				
				<div id="dishList" name="dishList" class="indent-left">			

					<h3 class="p1">						
						DANH SÁCH CÁC MÓN ĂN TRONG HỆ THỐNG												
					</h3>
					<br>					
					
					<table style="width: 95%" border="1">
						
						<tr>
							<th style= "width:8%; text-align: left;">STT</th>
							<th style= "width:22%; text-align: left;">Tên món ăn</th>		
							<th style= "width:15%; text-align: left;">Loại món ăn</th>
							<th style= "width:20%; text-align: left;">Nguyên liệu</th>
							<th style= "width:35%; text-align: left;">Ảnh minh họa</th>
						</tr>
						
						<?php	
							include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");		
							// ket noi CSDL
							$db= new PDOData();

							// lay du lieu cua tat ca cac mon an
							$dish = $db->getData("SELECT idMONAN, ten, hinhAnh, idLOAIMONAN FROM monan;");							
							$typeOfDish = $db->getData("SELECT idLOAIMONAN, ten FROM loaimonan;");
							
							$dishType= array();
							$num= 0;
							foreach ($typeOfDish as $specificType) {
								$num= $specificType['idLOAIMONAN'];
								$dishType[$num]= $specificType['ten'];
							}
							
							$id= 0;
							$count= 1;
							// hien thi du lieu ra thanh bang
							foreach ($dish as $specificDish) {							
								echo "<tr>";
									echo "<td> $count </td>";
									$count++;
									
									$dishName= $specificDish['ten'];
									echo "<td> $dishName </td>";
									
									$num= $specificDish['idLOAIMONAN'];
									echo "<td> $dishType[$num] </td>";
									
									$idMonAn= $specificDish['idMONAN'];
									$resul= $db->getData("SELECT nl.ten AS ten, ma_nl.soLuong AS soLuong FROM monan AS ma INNER JOIN monan_nguyenlieu AS ma_nl ON ma.idMONAN= ma_nl.idMONAN INNER JOIN nguyenlieu AS nl ON nl.idNGUYENLIEU= ma_nl.idNGUYENLIEU WHERE ma.idMONAN= $idMonAn");
									$deta= "";
									echo "<td>";
									foreach ($resul as $specif) {
										echo $specif['ten'] .": " .$specif['soLuong'] ."</br>";
									}
									echo "</td>";
									/*
									if ($count%2===0) {
										echo "<a class='button-2' onclick='showDetail($deta)'> Xem chi tiết...</a> ";
									}
									else {
										echo "<a class='button-1' onclick='showDetail($deta)'> Xem chi tiết...</a> ";
									}
									*/
									
									
									$dishImg= $specificDish['hinhAnh'];
									echo "<td><img class='dbImg' style='width:200px;' src='../../images/dbImages/$dishImg' alt=''/></td>";
								echo "</tr>";
								
								echo "<tr> <td> <br> </td> </tr>";
							}
						?>
					</table>
					
					
				</div>
			
				
			</article>
		</div>
	</div>
</section>					

<script>
	function clickHere_onclick() {
		document.frm.manhinh.value = 'newDish';
		document.frm.submit();
	}
	
	function showDetail(detail) {
		alert (detail);		
	}
</script>