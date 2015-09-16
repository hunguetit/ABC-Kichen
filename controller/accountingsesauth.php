<?php
    session_start();
    if (!isset($_SESSION["idAccounting"]))
        header("location: ../../index.php");
		
