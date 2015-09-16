<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/adminsesauth.php");
?>



<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<script type="text/javascript" src="js/jquery.min14.js"></script>
<div class="row-top">
	<div class="main">
		<div class="wrapper">
			<h1><a href="index.php">ABCKitchen<span>.com</span></a></h1>
			<nav>
				<ul class="menu">
					<li><a id="hom" href="#" onclick="home_onclick()">Trang chủ</a></li>
					<li><a>Thực đơn</a>
						<ul class="submenu">
							<li><a id="changeDish" onclick="dishList_onclick()" href="#">Danh sách món ăn</a></li>
							<li><a id="changeMenu" onclick="menuList_onclick()" href="#">Danh sách thực đơn 7 ngày tới</a></li>
						</ul>
					</li>
					<li><a id="nllda" href="#" onclick="nllda_onclick()">Quản lý người lao động đến ăn</a></li>
					<li><a>Quản lý tài khoản</a>
						<ul class="submenu">
							<li><a id="createAccount" onclick="createAccount_onclick()" href="#">Tạo tài khoản người dùng</a></li>
							<li><a id="listAccount" onclick="listAccount_onclick()" href="#">Danh sách tài khoản</a></li>
						</ul>
					</li>
					<li><a>Xin chào, Admin</a>
						<ul class="submenu">
							<li><a id="changeInfo" onclick="changeInfo_onclick()" href="#">Thay đổi thông tin cá nhân</a></li>
							<li><a id="changePass" href="#" onclick="changePassword_onclick()">Thay đổi mật khẩu</a></li>
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
	
	function nllda_onclick() {
		document.frm.manhinh.value = 'nllda';
		document.frm.submit();
	}
	
	function dishList_onclick() {
		document.frm.manhinh.value = 'dishList';
		document.frm.submit();
	}
	
	function menuList_onclick() {
		document.frm.manhinh.value = 'menuList';
		document.frm.submit();
	}
	
	function createAccount_onclick() {
		document.frm.manhinh.value = 'createAccount';
		document.frm.submit();
	}	
	
	function listAccount_onclick() {
		document.frm.manhinh.value = 'listAccount';
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