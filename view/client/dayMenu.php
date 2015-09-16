<?php	
	//include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/menu/loadTomorrowMenu.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/clientsesauth.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/register/tomorrowRegister.php");
?>

<section id="content">
	<div class="main">
		<div class="wrapper">
			<article class="">
				<div class="indent-left">			

					<h3 class="p1">
						<?php
							echo "Thực đơn: ";
							echo $tomorrow2 ."<br>";
						?>
					</h3>
				
					<table style="width:80%">
						
						<tr>
							<th style= "width:10%; text-align: left;">STT</th>
							<th style= "width:40%; text-align: left;">Tên món ăn</th>		
							<th style= "text-align: left;">Ảnh minh họa</th>
						</tr>
						
						<?php
							$data= $db->getData ("SELECT * FROM thucdon WHERE ngay= $dayForDatabase;");
							$monanid= array();
							foreach ($data as $spe) {
								$monanid[1]= $spe['idMONAN1'];
								$monanid[2]= $spe['idMONAN2'];
								$monanid[3]= $spe['idMONAN3'];
								$monanid[4]= $spe['idMONAN4'];
								$monanid[5]= $spe['idMONAN5'];
							}
							
							$i= 1;
							for ($i= 1; $i<=5; $i++) {
								echo "<tr>";
									echo "<td>Món $i</td>";
									
									$monan= $db->getData ("SELECT * FROM monan WHERE idMONAN= $monanid[$i]");
									foreach ($monan as $spemonan) {
										$ten= $spemonan['ten'];
										$anh= $spemonan['hinhAnh'];
									}
									echo "<td>$ten</td>";
									echo "<td><img class='dbImg' style='width:200px;' src='../../images/dbImages/$anh' alt=''/></td>";
								echo "</tr>";
								
								echo "<tr><td> <br> </td></tr>";
							}
						?>
						
					</table>
					<h3 class="p1">Giá tiền: 30.000đ</h3>

					<form action="tomorrowRegister.php" method="post">
						<h5>
							<?php		
								echo $warn;
							?>	
						</h5>
						
						<input type="checkbox" id="regi" name="regi" value="regis">
							<?php		
								echo $state;
							?>	
						<br> <br>					
						
						<input type="submit" class="button-2" value="Xác nhận" /> 
						</br> </br>
					</form>
				</div>
			</article>
		</div>
	</div>
</section>