<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Customer extends CI_Controller
{
	public function index()	
	{
		$this->secure_model->get_secure();
		$this->load->model('customer_model');
		$idsal = $this->session->userdata('id');		

		$val['content'] 	 	 = 'tampilan_customer/tampilan_datacustomer';
		$val['menu']			 = 'tampilan_menu_user';
		$val['title'] 			 = "Customer";
		$val['subtitle']	 	 = "";
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapros']		 =  $this->customer_model->get_customer($idsal);
		$val['datapos']	 	 	 =  $this->session->userdata('pos');

		$this->load->view('tampilan_home' ,$val);
	}

	public function save()
	{
			$this->secure_model->get_secure();
			$this->load->model('Customer_model');
			


			$data['sName_company'] 				= $this->input->post('comp');
			$data['sAdress_company'] 			= $this->input->post('address');
			$data['sIndustry']					= $this->input->post('ind');
			$data['sPhone_number'] 				= $this->input->post('phone');
			$data['sNotes']	 					= $this->input->post('notes');
			$data['sJne_cust_id']				= $this->input->post('jci');
			$data['iKnow_jne']					= $this->input->post('know');
			$data['iId_sales']					= $this->session->userdata('id');
			$data['iStatus']					= $this->input->post('type');
			
			
			if(!$data['sJne_cust_id']) 
			{
				$this->Customer_model->akses_jci();
				$jci = $this->Customer_model->get_jci();
				
				$data['sJne_cust_id']			= $jci;
			}

			
			$this->Customer_model->input_customer($data);
			
			redirect('customer');
	}

	public function update()
	{
		$this->secure_model->get_secure();
		$this->load->model('Customer_model');
		$key = $this->uri->segment(3);
		$query = $this->Customer_model->get_customerupdate($key);
		$idsal = $this->session->userdata('id');	

		$val['content'] 	 	 = 'tampilan_customer/tampilan_updatecustomer';
		$val['menu']			 = 'tampilan_menu_user';
		$val['title'] 			 = "Customer";
		$val['subtitle']	 	 = "Update Customer";
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapos']	 	 	 =  $this->session->userdata('pos');
		$val['dataupdate']		 =  $this->Customer_model->get_customerupdate($key);
		$val['datapelengkap']	 =  $this->Customer_model->data_pelengkap_update($key);
		$val['vjci'] 			 =  $this->Customer_model->get_valjci($key);

		if($query->num_rows()>0)
			{
				foreach ($query->result() as $row) 
				{
					$val['comp']  		= $row->sName_company;
					$val['address']  	= $row->sAdress_company;
					$val['ind']  		= $row->sIndustry;
					$val['phone'] 		= $row->sPhone_number;
					$val['notes'] 		= $row->sNotes;
					$val['jci'] 	    = $row->sJne_cust_id;
					$val['know']  		= $row->iKnow_jne;
				}	
			}
			else
			{
					$val['comp']  		 =  ''; 
					$val['ind']  		 =  ''; 
					$val['address'] 	 =  '';
					$val['phone'] 		 =  '';
					$val['notes'] 		 =  '';
					$val['jci']  		 =  '';
					$val['know'] 	 	 =  '';
			}

		$this->load->view('tampilan_home' ,$val);
	}

	public function save_change()
	{
		$this->secure_model->get_secure();
		$this->load->model('Customer_model');

		$key = $this->uri->segment(3);
		$valjci = $this->Customer_model->get_valjci($key);

		$data['sName_company'] 				= $this->input->post('comp');
		$data['sAdress_company'] 			= $this->input->post('address');
		$data['sIndustry']		 			= $this->input->post('ind');
		$data['sPhone_number'] 				= $this->input->post('phone');
		$data['sNotes']	 					= $this->input->post('ccrf');
		$data['sJne_cust_id']				= $this->input->post('jci');
		$data['iKnow_jne']					= $this->input->post('know');
		$data['iStatus']					= $this->input->post('type');

		
		$this->Customer_model->update_customer($key,$data);
		redirect('customer');
	}
}