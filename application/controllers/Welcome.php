<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->load->library('DeviceDetector');
		$detector = new DeviceDetector();

		$device_type = $detector->get_device_type();

		if ($detector->is_mobile()) {
			echo 'ini terdeteksi perangkat Mobile';
		} elseif ($detector->is_tablet()) {
			echo 'ini terdeteksi perangkat Tablet';
		} else {
			echo 'ini terdeteksi perangkat Dekstop';
		}
	}
}
