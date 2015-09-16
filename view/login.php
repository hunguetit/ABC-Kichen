<?php
	include("/model/account/checkAccount.php");
?>

<section id="content">
	<div class="main">
		<div class="wrapper">
			<article class="column-1">
				<div class="indent-left">
					<div class="maxheight indent-bot">
					
						<h3 class="p1">ĐĂNG NHẬP</h3>
						
						<form action="checkAccount.php" method="post" > 
							<p>
								<label class="text-form">Tài khoản: </label>
								<input id="username" name="username" required="required" type="text" value="" placeholder="eg. ABCKitchenAccount" />
							</p>
							<p> 
								<label class="text-form">Mật khẩu: </label>
								<input id="password" name="password" required="required" type="password" value="" placeholder="eg. HHHDeveloperTeam" /> 
							</p>
							<p> 
								<div class="buttons"> 
										<input type="submit" class="button-2" value="Xác nhận" /> 
								</div>		
							</p>
							
							
						</form>
					</div>
				</div>
			</article>
		</div>
	</div>
<section>
	
	
	
	
