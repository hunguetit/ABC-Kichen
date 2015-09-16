<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/controller/clientsesauth.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/ABC/model/register/nextDaysRegister.php");
?>


<section id="content">
	<div class="main">
		<div class="wrapper">
			<article class="">			
				<div class="indent-left">			
					<form action="nextDaysRegister.php" method="post">

						<div>						
							<h3 class="p1">
								THỰC ĐƠN 7 NGÀY TỚI
							</h3>

							<input type='button' onClick='ajaxFunction(1)' class='button-1' value='<?php echo $oneDayLater ?>' />
							<input type='button' onClick='ajaxFunction(2)' class='button-1' value='<?php echo $twoDaysLater ?>' />
							<input type='button' onClick='ajaxFunction(3)' class='button-1' value='<?php echo $threeDaysLater ?>' />
							<input type='button' onClick='ajaxFunction(4)' class='button-1' value='<?php echo $fourDaysLater ?>' />
							<input type='button' onClick='ajaxFunction(5)' class='button-1' value='<?php echo $fiveDaysLater ?>' />
							<input type='button' onClick='ajaxFunction(6)' class='button-1' value='<?php echo $sixDaysLater ?>' />
							<input type='button' onClick='ajaxFunction(7)' class='button-1' value='<?php echo $sevenDaysLater ?>' />

							<p id= 'addHere'> </p>

						</div>
					</form>																					
				</div>	
			</article>
		</div>
	</div>
</section>	


<script>
	function ajaxFunction(d) {
		
		// lay ve xmlHttp request
		var xmlHttp=null;
		try {
			// Firefox, Internet Explorer 7. Opera 8.0+, Safari
			xmlHttp = new XMLHttpRequest();
		} catch (e) {
			// Internet Explorer 6.
			try {
				xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					alert("Your browser does not support AJAX!");
					return false;
				}
			}
		}
		
		xmlHttp.open("GET", "../../model/register/nextDaysRegister.php?d="+d, true);
		xmlHttp.onreadystatechange=function() {
			if(xmlHttp.readyState==4) {
				// Get the data from the server's response.
				document.getElementById ('addHere').innerHTML= xmlHttp.responseText;
				xmlHttp=null;
			}
		}
		xmlHttp.send("");		
	}
</script>