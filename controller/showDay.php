<?php
	class Day {
		private $toDay;
		//echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
		
		public function __construct () {	
			$toDay= getdate(date("U"));
			// echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
		}
		
		public function getNextDay () {
			
		}
		
	}
	

?>
