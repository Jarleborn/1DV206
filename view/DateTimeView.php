<?php

class DateTimeView {


	public function show() {
		

		date_default_timezone_set('Europe/Stockholm');
		$day= date("l");
		$dayNr = date("j");
		$dayNr .= date("S");
		$month = date("F");
		$year = date("Y");
		$time = date("H:i:s");
		$timeString = "$day, the $dayNr of $month $year, The time is $time";
		return '<p>' . $timeString . '</p>';


		$timeString = date('l').', the '.date('j','S').'th of '.date('F Y').', The time is ' .date('h:i:s', time());
		return '<p>' . $timeString . '</p>';
	}
}