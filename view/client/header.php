<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/clientsesauth.php");
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<script type="text/javascript" src="js/jquery.min14.js"></script>
<div class="row-top">
	<div class="main">
		<div class="wrapper">
			<h1><a href="index.php">ABCKitchen<span>.com</span></a></h1>
			<nav>
				<ul class="menu">
					<li><a href="#" onclick="home_onclick()">Trang chủ</a></li>
					<li><a>Đăng ký ăn</a>
						<ul class="submenu">
							<li><a id="dayMen" href="#" onclick="dayMen_onclick()">Thực đơn ngày mai</a></li>
							<li><a id="weekMen" href="#" onclick="weekMen_onclick()">Thực đơn 7 ngày tới</a></li>
							<li><a id="specificDay" href="#" onclick="specificDay_onclick()">Đăng ký ngày cụ thể</a></li>
						</ul>
					</li>
					<li><a href="#" onclick="statistic_onclick()">Thống kê</a></li>
					<li>
						<a>Xin chào, <?php echo $_SESSION['nameUser']?>
						</a>
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
	
	function dayMen_onclick() {
		document.frm.manhinh.value = 'dayMen';
		document.frm.submit();
	}
	
	function weekMen_onclick() {
		document.frm.manhinh.value = 'weekMen';
		document.frm.submit();
	}
	
	function specificDay_onclick() {
		document.frm.manhinh.value = 'specificDay';
		document.frm.submit();
	}
	
	function statistic_onclick() {		
		document.frm.manhinh.value = 'statistic';
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