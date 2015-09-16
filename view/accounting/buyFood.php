<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/accountingsesauth.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/statistic/buyFoodStatistic.php");	
?>

<section id="content">
	<div class="main">
		<div class="wrapper">
			<article class="">
				<div class="indent-left">			

					<h3 class="p1">
						<?php
							echo "Thống kê thực phẩm cần mua ngày: " .$toda
						?>
					</h3>
					
					<?php 
						// bien luu lai tong so nguoi den an
						$tsda= 0;
						foreach ($tongSoDenAn as $spe) {
							$tsda++;
						}
						echo "Số người đăng ký ăn: " .$tsda ."<br>";
						
						for ($i= 1; $i<=5; $i++) {
							echo "<br>Món $i: " .$tenmonan[$i] ."<br>";
							
							// hien thi ra danh sach nguyen lieu cua 1 mon an
							$j= 1;							
							foreach ($nl[$i] as $spe) {
								echo "&nbsp&nbsp&nbsp&nbsp&nbsp Nguyên liệu $j- " .$spe['ten'] ." :  " .$spe['soLuong'] .$spe['donVi'] ." * $tsda người = " .$spe['soLuong']*$tsda .$spe['donVi'] ."<br>";
								$j++;
							}
						}
					?>
	
				</div>
			</article>
		</div>
	</div>
</section>