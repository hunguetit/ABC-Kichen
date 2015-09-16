<?php

	// cai dat timezome
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	
	
	class getDate {				
		public $d;
		
		public function __construct () {}
		
		public function __destruct() {}		
		
		public function getToday () {
			$d=strtotime("now");						
			return $d;
		}
		
		// ham tra ve ngay cho lich
		public function oneDayForCalendar ($day) {
			$l= date("l", $day);
			$dmY= date("d/m", $day);
			return $dmY;
		}
		
		public function fortyTwoDayForCalendar () {
			$arr= array();
			$i= 0;
			for ($i= 0; $i<42; $i++) {
				$arr[$i]= self::oneDayForCalendar($i+1);
			}
			return $arr;
		}
		
		public function reFormatDate($day) {
			$l= date("l", $day);
			$dmY= date("d/m", $day);
			$result= "";
			
			switch ($l) {
				case ("Monday"): 
					$result= $result. "Thứ 2 - ";
					break;
				case ("Tuesday"): 
					$result= $result. "Thứ 3 - ";
					break;
				case ("Wednesday"): 
					$result= $result. "Thứ 4 - ";
					break;
				case ("Thursday"): 
					$result= $result. "Thứ 5 - ";
					break;
				case ("Friday"): 
					$result= $result. "Thứ 6 - ";
					break;
				case ("Saturday"): 
					$result= $result. "Thứ 7 - ";
					break;
				case ("Sunday"): 
					$result= $result. "Chủ nhật - ";
					break;
			}
			$result= $result. $dmY;
			return $result;
		}
		
		public function getTomorrowForPrint () {
			$d=strtotime("+1 day");			
			$tomorrow= self::reFormatDate($d);
			return $tomorrow;
		}
		
		public function getTomorrowForDatabase () {
			$d=strtotime("+1 day");			
			$tomorrow= date ("Y-m-d", $d);
			return $tomorrow;
		}
		
		public function getNextDaysForPrint ($n) {
			$d=strtotime("+$n days");
			$nextDays= self::reFormatDate($d);
			return $nextDays;
		}
		
		public function getNextDaysForDatabase ($n) {
			$d=strtotime("+$n days");
			$nextDays= date ("Y-m-d", $d);
			return $nextDays;
		}
		
		public function getWeeksOfYear ($n) {
			$ym=strtotime("+$n days");
			$resuu= date ("W", $ym);
			return (int)$resuu;
		}
		
		public function getDaysOfWeek ($n) {
			$ym=strtotime("+$n days");
			$ress= date ("l", $ym);
			
			// chuyen kieu
			switch ($ress) {
				case ("Monday"): 
					$res= 1;
					break;
				case ("Tuesday"): 
					$res= 2;
					break;
				case ("Wednesday"): 
					$res= 3;
					break;
				case ("Thursday"): 
					$res= 4;
					break;
				case ("Friday"): 
					$res= 5;
					break;
				case ("Saturday"): 
					$res= 6;
					break;
				case ("Sunday"): 
					$res= 7;
					break;
			}
			return $res;
		}
		
	}

?>
