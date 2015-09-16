<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/accountingsesauth.php");
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<script type="text/javascript" src="js/jquery.min14.js"></script>
<div class="row-top">
	<div class="main">
		<div class="wrapper">
			<h1><a href="index.php">ABCKitchen<span>.com</span></a></h1>
			<nav>
				<ul class="menu">
					<li><a id="hom" class="" href="#" onclick="home_onclick()">Trang chủ</a></li>
					<li><a id="men" class="" href="#" onclick="buyFood_onclick()">Thực phẩm cần mua trong ngày</a></li>
					<li><a id="con" class="" href="#" onclick="monthStatistic_onclick()">Thống kê tháng</a></li>
					<li><a id="log" >Xin chào, Accounting</a>
						<ul class="submenu">
							<li><a id="changeInfo" href="#" onclick="changeInfo_onclick()">Thay đổi thông tin cá nhân</a></li>
							<li><a id="changeInfo" href="#" onclick="changePassword_onclick()">Thay đổi mật khẩu</a></li>
							<li><a id="logOut" href="../../controller/logout.php">Đăng xuất</a></li>
						</ul>
					</li>					
				</ul>
			</nav>
		</div>
	</div>
</div>
<div class="row-bot">
	<div class="row-bot-bg">
		<div class="main">
			<h2>ABC Kitchen <span>Give you a good lunch everyday</span></h2>        
		</div>
	</div>
</div>


<script>
	function home_onclick() {
		document.frm.manhinh.value = 'home';
		document.frm.submit();
	}
	
	function buyFood_onclick() {
		document.frm.manhinh.value = 'buyFood';
		document.frm.submit();
	}
	
	function monthStatistic_onclick() {
		document.frm.manhinh.value = 'monthStatistic';
		document.frm.submit();
	}
	
	function changeInfo_onclick() {
		document.frm.manhinh.value = 'changeInfo';
		document.frm.submit();
	}		
	
	function changePassword_onclick() {
		document.frm.manhinh.value = 'changePassword';
		document.frm.submit();
	}
	
</script>