<?php

class DateTimeView {


	public function show() {
		
		$timeString = date('l').', the '.date('d').'nd of '.date('F Y').', The time is ' .date('h:i:s', time());
		return '<p>' . $timeString . '</p>';
	}
}