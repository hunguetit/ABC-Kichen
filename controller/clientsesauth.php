<?php
    session_start();
    if (!isset($_SESSION["idClient"]))
        header("location: ../../index.php");
		
