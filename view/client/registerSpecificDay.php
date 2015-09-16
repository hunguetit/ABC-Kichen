<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/clientsesauth.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/getDate.php");
?>


<head>
	<script	src="js/test.js" type="text/javascript"></script>
	<script src="jquery-1.11.2.min.js"></script>
	<link rel="Stylesheet" href="css/css.css" type="text/css">
</head>
<body>

	<?php
		
	?>

	<script>
		window.onload =function(){
			khoiTao(4,6,6);
		}
	</script>
	
	
	
	<table  border="1">
	<legend id="ngay"></legend>
		<tr id="thu"></tr>
		<tr id="hang0"></tr>
		<tr id="hang1"></tr>
		<tr id="hang2"></tr>
		<tr id="hang3"></tr>
		<tr id="hang4"></tr>
		<tr id="hang5"></tr>
	</table>
	<p id="DSNgayDaChon"></p>
</body>