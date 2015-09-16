<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/adminsesauth.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/menu/createNewDish.php");
?>

<script src="js/js.js" type="text/javascript"></script>

<section id="content">
	<div class="main">
		<div class="wrapper">
			<article >
				<div class="indent-left">		
					<div>

						<h3 class="p1"> THÊM MÓN ĂN MỚI </h3>
						<br>
						<h4>
							Để thêm nguyên liệu mới, vui lòng <a id="newish" href="#" onclick="clickHere_onclick()" style="color: orange">bấm vào đây</a>
						</h4>
						<br>
						<form id="newDishForm" action="createNewDish.php" method="post" enctype="multipart/form-data"">					
							<p> 
								<label class="text-form">Tên món ăn (*)</label>
								<input id="tenMonAn" name="tenMonAn" required="required" type="text" value="" />
							</p>
							
							<p> 
								<label class="text-form">Loại món ăn (*)</label>
								<select id="dishType" name="dishType" onchange="khoiTao()">
									<option value="0">Chọn loại món ăn</option>
									<option value="1">Thịt</option>
									<option value="2">Rau</option>
									<option value="3">Canh</option>									
								</select>								
							</p>
							
							<p> 
								<label class="text-form">Ảnh minh họa (*)</label>
								<input type="file" name="fileToUpload" id="fileToUpload"/>
							</p>
							
							<br>
							<p id="listCBB"></p>
							<br><br>
							<input type="submit" class="button-2" value="Xác nhận tạo món ăn" />
						</form>
					
					</div>
				</div>
			</article>
		</div>
	</div>
</section>	