<?php	
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/clientsesauth.php");
	$arr;
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/statistic/clientStatistic.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/getDate.php");
?>

<section id="content">
	<div class="main">
		<div class="wrapper">
			<article class="">
				<div class="indent-left">			

					<h3 class="p1">
						<?php
							$d= new getDate();
							$toda= $d->getToday();
							echo "Thống kê các bữa trong tháng " .date("m", $toda) ." năm " .date("Y", $toda) ."<br>";
						?>
					</h3>
					
					<?php 
						if (count($arr)<= 0) {
							echo "<h4>  Không có thông tin đã đăng ký ăn với tài khoản của bạn.</br>Để bắt đầu đăng ký ăn, hãy chọn tab Đăng ký ăn...</h4>";
						}
						else {
							echo "<table style='width:80%'>";
								echo "<tr>";
									echo "<th style= 'width:10%; text-align: left;'>STT</th>";
									echo "<th style= 'width:25%; text-align: left;'>Ngày đăng ký</th>";
									echo "<th style= 'width:25%; text-align: left;'>Giá tiền</th>";
									echo "<th style= 'text-align: left;'>Đến ăn thực tế</th>";
								echo "</tr>";
								
								$bdk= 0;
								$bda= 0;
								$ddk= 0;
								foreach ($arr as $spe) {
									$day= $spe['day'];
									$month= $spe['month'];
									$year= $spe['year'];
									
									// lay ve ngay hien tai de so sanh xem ngay nao den an thuc te
									// ngay nao moi chi dang ky thoi, chua co du lieu cu the
									$d= new getDate ();
									$today= $d->getToday();
									$todayD= date ('d', $today);
									$todayM= date ('m', $today);									
									
									// hien thi ra xem do la ngay nao 
									// chuyen sang int
									$dayInt= (int)$day;
									$monthInt= (int)$month;
									$todayDInt= (int)$todayD;
									$todayMInt= (int)$todayM;
									
									// gan mac dinh
									$datt= (is_null($spe['denAnThucTe'])) ?"Có" :"Không";
									// kiem tra de co the co thay doi
									if ($monthInt=== $todayMInt && $dayInt> $todayDInt) {
										$datt= "Chưa có dữ liệu";
										$ddk++;
									}
										
									if ($datt==="Có")
										$bda++;
									
									echo "<tr>";
										echo "<td> $bdk </td>";
										$bdk= $bdk+ 1;
										echo "<td> $day/$month/$year </td>";
										echo "<td> 30,000đ</td>";
										echo "<td> $datt </td>";
									echo "</tr>";
								}
							echo "</table><br>";
							$tst= $bdk*30000;
							echo "<p><h3 style= 'color: red'> Tổng hợp: </h3></p>";
							echo "<h4 style= 'color: orange'>&nbsp&nbsp&nbsp&nbsp Số buổi đăng ký: $bdk<br></h4>";
							echo "<h4 style= 'color: orange'>&nbsp&nbsp&nbsp&nbsp Số buổi đến ăn: $bda<br></h4>";
							echo "<h4 style= 'color: orange'>&nbsp&nbsp&nbsp&nbsp Số buổi đã đăng ký còn lại trong tháng: $ddk<br></h4>";
							echo "<h3><p style= 'color: red'>&nbsp&nbsp&nbsp&nbsp Tổng số tiền: $tst đ<br></p></h3>";
						}
					?>
	
				</div>
			</article>
		</div>
	</div>
</section>