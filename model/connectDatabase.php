<?php

    
	class PDOData {

		private $db = null; //Doi tuong PDO
		
		/**
		* Ham tao
		*/
		public function __construct() {
			$servername = "localhost";
			$username = "root";
			$password = "";
			$databaseName= "ABCKitchen";	
			try {
			    /* Ket noi CSDL */
				$this->db = new PDO("mysql:host=$servername;dbname=$databaseName;charset=utf8", $username, $password);
			} catch(PDOException $ex) { echo $ex->getMessage();	}
		}
		
		
		/**
		* Ham huy
		*/
		public function __destruct() {
		    /** Dong ket noi */
			try {
				$this->db = null;
			} catch(PDOException $ex) { echo $ex->getMessage();	}
		}

        /**
		* Thuc hien truy van
		* $query: Cau lenh select
		* return: mang cac ban ghi, so trang
		*/
		public function getData($query) {
			$ret = array(); 
			
			try {
				$stmt = $this->db->query($query);  
				if ($stmt) {
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$ret[] = $row; 
					}
				} 
			} catch(PDOException $ex) {	echo $query; }
			
			return $ret;
		}	

		/**
		* Thuc hien cap nhat
		* $sql: Cau lenh insert, update, delete
		* return: So ban ghi duoc cap nhat
		*/
		public function editData($sql) {
		    $count = 0;
			try {
				$count = $this->db->exec($sql);
			} catch(PDOException $ex) {
				$count = -1;
			}
			return $count;
		}
	}
?> 