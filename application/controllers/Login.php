	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$this->load->view('tampilan_login');
	}

	public function get_login()
	{   

		$this->load->model('Login_model');
		
		$u 		= $this->input->post('un');
		$p 		= $this->input->post('pwd');
		$this->Login_model->get_login_sales($u,$p);

		/*
		if($role==1)
		{
			$this->Login_model->get_login_admin($u,$p);
		}
		else
		{
			$this->Login_model->get_login_sales($u,$p);
		}
		*/
	}
}