<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/account/changePassword.php");
?>

<section id="content">
	<div class="main">
		<div class="wrapper">

			<article class="column-2">
				<div class="indent-left">
					<div class="maxheight indent-bot">


						<form id="createForm" action="changePassword.php" method="post" > 
							<h3 class="p1">Thay đổi mật khẩu</h3>
							
							<p> 
								<span style="width: 175px;display:block;">Mật khẩu cũ(*)</span>
								<input id="oldpassword" name="oldpassword" required="required" type="password" value="" />
							</p>
							
							<p> 
								<span style="display:block;width: 175px;">Mật khẩu mới(*)</span>
								<input id="newpassword" name="newpassword" required="required" type="password" value="" />
							</p>
							
							<p> 
								<span style="width: 175px;display:block;">Nhập lại mật khẩu mới(*)</span>
								<input id="renewpassword" name="renewpassword" required="required" type="password" value="" />
							</p>
							
							<p> 
								<div class="buttons"> 
									<input type="submit" class="button-2" value="Thay đổi" /> 
								</div>
							</p>													
							
						</form>						
					</div>
				</div>
			</article>
		</div>
	</div>
</section>