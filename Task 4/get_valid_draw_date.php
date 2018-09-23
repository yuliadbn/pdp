
<?php

	class Df {
	  
			
		// Tues, Sun
		//function nextDate returns next valid draw date
	    function nextDate($checkStrDate = null) {

			//check if $checkStrDate is null take the current date in string format(Year-month-day hours:minutes:seconds)
			if (!isset($checkStrDate)){
				$checkStrDate = date("Y-m-d H:i:s");
			}
            //convert string to time format for compare dates 
			$checkDate = strtotime($checkStrDate);
			
             //check if checkdate > than the nearest Tue to the current date than return the nearest Sun
			if ($checkDate > strtotime("Tuesday 21:30:00",$checkDate)) {
				return date("Y-m-d H:i:s",strtotime("Sunday 21:30:00",$checkDate));
			} else {
			//else 	return the nearest Tue
				return date("Y-m-d H:i:s",strtotime("Tuesday 21:30:00",$checkDate));
			}
	    }
	
	}
	$obj = new Df;
	//get the next valid draw date for the current date
	echo 'The next valid draw date based on the current date: '.date("Y-m-d H:i:s").' is '.$obj->nextDate();	
	echo "</br>";
	//get the next valid draw date for the optional date
	echo 'The next valid draw date based on the date 2018-09-28 9:31:00 is  '.$obj->nextDate("2018-09-28 9:31:00");

?>


