<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/accountingsesauth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ABC Kitchen</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
	<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/cufon-replace.js" type="text/javascript"></script>
	<script src="js/Dynalight_400.font.js" type="text/javascript"></script>
	<script src="js/FF-cash.js" type="text/javascript"></script>
	<script src="js/tms-0.3.js" type="text/javascript"></script>
	<script src="js/tms_presets.js" type="text/javascript"></script>
	<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="js/jquery.equalheights.js" type="text/javascript"></script>
	<!--[if lt IE 9]><script type="text/javascript" src="js/html5.js"></script><![endif]-->
	
	<?php 
		// ket noi co so du lieu
		if(!isset($manhinh)){
			$manhinh = "";
		}
	?>	

	
</head>

<body id="page1">
	<form name="frm" method="post">
		<!--==============================header=================================-->
		<header>
			<?php 
				// hien thi banner
				include_once("header.php");													
			?>
		</header>


		<!--==============================content================================-->
		<section id="content">
			<div class="main">
				<?php			
					if ( isset($_POST["manhinh"]) ){
						$manhinh = $_POST["manhinh"];
						switch ($manhinh){
							case "buyFood":
								include_once($_SERVER['DOCUMENT_ROOT']."/ABC/view/accounting/buyFood.php");
								break;
							case "monthStatistic":
								include_once($_SERVER['DOCUMENT_ROOT']."/ABC/view/accounting/monthStatistic.php");
								break;
							case "changeInfo":
								include_once($_SERVER['DOCUMENT_ROOT']."/ABC/view/changeInfo.php");
								break;
							case "changePassword":
								include_once($_SERVER['DOCUMENT_ROOT']."/ABC/view/changePass.php");
								break;
							default:
								include_once($_SERVER['DOCUMENT_ROOT']."/ABC/view/home.php");
								break;
						}
					}else{				
						include_once($_SERVER['DOCUMENT_ROOT']."/ABC/view/home.php");
					}
				?>	
			</div>
			
			<input type="hidden" name="manhinh" value="<?=$manhinh?>"/>
			
		</section>

		<!--==============================footer=================================-->
		<footer>
			<div class="main">
				<div class="aligncenter"> 
					<span>Develop by <a target="_blank" href="https://www.facebook.com/groups/1432600970337322/"> HHH Developer Team</a>
					</span> 
					<a target="_blank" href="http://www2.uet.vnu.edu.vn/coltech/">The best and fully qualified application can be used by VNU-UET as a donation of VNU-UET IT students</a> 
				</div>
			</div>
		</footer>


		<script type="text/javascript">Cufon.now();</script>

		<script type="text/javascript">
		$(window).load(function () {
			$('.slider')._TMS({
				duration: 1000,
				easing: 'easeOutQuint',
				preset: 'slideDown',
				slideshow: 7000,
				banners: false,
				pauseOnHover: true,
				pagination: true,
				pagNums: false
			});
		});
		</script>
	</form>
</body>
</html>
