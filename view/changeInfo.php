<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/account/changeInformation.php");
?>

<section id="content">
	<div class="main">
		<div class="wrapper">

			<article class="column-2">
				<div class="indent-left">
					<div class="maxheight indent-bot">


						<form id="createForm" action="changeInformation.php" method="post" > 
							<h3 class="p1">THAY ĐỔI THÔNG TIN CÁ NHÂN</h3>							

							<p> 
								<span style="width: 175px;display:block;">Họ tên(*)</span>	
								<input id="employeeName" name="employeeName" required="required" type="text" value="" />
							</p>
							
							<p> 
								<span style="width: 175px;display:block;">Số điện thoại</span>	
								<input id="employeePhoneNumber" name="employeePhoneNumber" value="" />
							</p>
							
							<p> 
								<div class="buttons"> 
									<input type="submit" class="button-2" value="Cập nhật" /> 
								</div>
							</p>													
							
						</form>						
					</div>
				</div>
			</article>
		</div>
	</div>
</section>