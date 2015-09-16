<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/adminsesauth.php");
?>

	
<section id="content">
	<div class="main">
		<div class="wrapper">
			<article class="">
				<div class="indent-left">
					<h3 class="p1">Danh sách tài khoản thuộc hệ thống</h3>
					
					<table style="width: 85%">
						
						<tr>
							<th style= "width:8%; text-align: left;">STT</th>
							<th style= "width:17%; text-align: left;">Tên tài khoản</th>		
							<th style= "width:15%; text-align: left;">Mật khẩu</th>
							<th style= "width:60%; text-align: left;">Ghi chú</th>
						</tr>
						
						<?php	
							include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/connectDatabase.php");
		
							// ket noi CSDL
							$db= new PDOData();
							
							$count= 1;
		
							// lay du lieu cua tat ca cac tai khoan
							$user = $db->getData("SELECT ten, matKhau FROM taikhoan;");
							
							// hien thi du lieu ra thanh bang
							foreach ($user as $specificUser) {							
								echo "<tr>";
									echo "<td> $count </td>";
									$count++;
									echo "<td> $specificUser[ten] </td>";
									echo "<td> $specificUser[matKhau] </td>";
								echo "</tr>";
							}
						?>
					</table>
				</div>
			</article>
		</div>
	</div>
</section>
	