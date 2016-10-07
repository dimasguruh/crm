<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		
		$this->secure_model->get_secure();

		$val['content'] 	 	 = 'datepicker';
		$val['title'] 			 = 'Home';
		$val['subtitle']	 	 = 'List Opportunity';
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$this->load->view('tampilan_home' ,$val);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}