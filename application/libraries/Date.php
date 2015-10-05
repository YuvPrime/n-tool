<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Date {

	public function get_current_time_and_date()
	{
		return date("Y-m-d H:i:s");
	}

}