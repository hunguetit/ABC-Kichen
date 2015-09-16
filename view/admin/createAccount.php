<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/adminsesauth.php");
	include($_SERVER['DOCUMENT_ROOT']."/ABC/model/account/createClientAccount.php");
?>


<section id="content">
	<div class="main">
		<div class="wrapper">

			<article class="column-2">
				<div class="indent-left">
					<div class="maxheight indent-bot">

						<h3 class="p1">Tạo tài khoản cho người sử dụng</h3>
					
						<form id="createForm" action="create.php" method="post" > 													
							<p> 
								<span style="width: 175px;display:block;">Tên tài khoản(*)</span>
								<input id="username" name="username" required="required" type="text" value="" />
							</p>
							
							<p> 
								<span style="display:block;width: 175px;">Mật khẩu(*)</span>
								<input id="password" name="password" required="required" type="password" value="" />
							</p>
							
							<p> 
								<span style="width: 175px;display:block;">Nhập lại mật khẩu(*)</span>
								<input id="repassword" name="repassword" required="required" type="password" value="" />
							</p>
							
							<p> 
								<span style="width: 175px;display:block;">Mã nhân viên(*)</span>			
								<input id="employeeId" name="employeeId" required="required" type="text" value="" />
							</p>
							
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
									<input type="submit" class="button-2" value="Tạo tài khoản" /> 
								</div>
							</p>													
							
						</form>						
					</div>
				</div>
			</article>
		</div>
	</div>
</section>