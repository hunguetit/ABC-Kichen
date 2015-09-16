<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<script type="text/javascript" src="js/jquery.min14.js"></script>
<div class="row-top">
	<div class="main">
		<div class="wrapper">
			<h1><a href="index.php">ABCKitchen<span>.com</span></a></h1>
			<nav>
				<ul class="menu">
					<li><a id="hom" class="" href="#" onclick="home_onclick()">Trang chủ</a></li>
					<li><a id="men" class="" href="#" onclick="menu_onclick()">Thực đơn</a></li>
					<li><a id="con" class="" href="#" onclick="contact_onclick()">Liên hệ</a></li>
					<li><a id="log" class="" href="#" onclick="login_onclick()">Đăng nhập</a></li>					
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
	
	function menu_onclick() {
		document.frm.manhinh.value = 'menu';
		document.frm.submit();
	}
	
	function contact_onclick() {
		document.frm.manhinh.value = 'contact';
		document.frm.submit();
	}
	
	function login_onclick() {
		document.frm.manhinh.value = 'login';
		document.frm.submit();
	}
</script>