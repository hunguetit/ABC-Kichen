<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/adminsesauth.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/eatManager/eat.php");	
?>

	
<section id="content">
	<div class="main">
		<div class="wrapper">
			<article class="">
				<div class="indent-left">
					<h3 class="p1">Quản lý danh sách người lao động đến ăn</h3>

					<form action="eat.php" method="post">
						<?php
							echo "<h4> Danh sách ngừoi lao động đã đăng ký ăn ngày $toda <br>";
							echo "Để thêm những người không đến ăn, vui lòng tick vào ô bên cạnh và ấn xác nhận </h4><br>";
							
							echo "<table style='width: 80%'>";
							echo "<tr>";
							echo "<th style= 'width:10%; text-align: left;'>STT</th>";
							echo "<th style= 'width:20%; text-align: left;'>Tên tài khoản</th>";
							echo "<th style= 'width:20%; text-align: left;'>Mã nhân viên</th>";
							echo "<th style= 'width:25%; text-align: left;'>Tên người dùng</th>";
							echo "<th style= 'width:15%; text-align: left;'>Không đến ăn</th>";
							echo "</tr>";
							$count= 1;
							foreach ($data as $spe) {
								echo "<tr>";
									echo "<td> $count </td>";
									$count++;
									echo "<td> $spe[ten] </td>";
									echo "<td> $spe[maNhanVien] </td>";
									echo "<td> $spe[hoTen] </td>";
									$idtk= $spe['idTAIKHOAN'];
									echo "<td> <input type='checkbox' id='$idtk' name='$idtk'> </td>";
								echo "</tr>";
							}
							echo "</table>";
							
							echo "<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo "<input type='submit' name='submit' class='button-2' value='Xác nhận' />";
						?>
					</form>
					

				</div>
			</article>
		</div>
	</div>
</section>