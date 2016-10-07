<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secure_model extends CI_Model
{
	public function get_secure()
	{
		$username = $this->session->userdata('username');
		if(empty($username))
		{
			$this->session->sess_destroy();
			redirect('login');
		}
	}
}