<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prospecting extends CI_Controller
{
	public function index()
	{
		$this->secure_model->get_secure();
		$this->load->model('prospect_model');
		$idsal = $this->session->userdata('id');		

		$val['content'] 	 	 = 'tampilan_prospect/tampilan_dataprospecting';
		$val['title'] 			 = "Prospect";
		$val['subtitle']	 	 = "List Of Your Opportunity";
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapros']		 =  $this->prospect_model->show_prospectsales($idsal);
		

		$this->load->view('tampilan_home' ,$val);
	}

	public function save()
	{
			$this->secure_model->get_secure();

			$datestring = "%y-%m-%d";
		
			$data['sName_prospect'] 			= $this->input->post('pros');
			$data['sName_company'] 				= $this->input->post('comp');
			$data['sPhone_number'] 				= $this->input->post('phone');
			$data['sInformasi']	 				= $this->input->post('info');
			$data['dDate_meeting'] 				= $this->input->post('meet');
			$data['iId_sales']					= $this->session->userdata('id');
			$data['dDate_input']				= mdate($datestring);


			$this->load->model('Prospect_model');
			$this->Prospect_model->input_prospect($data);

			$this->Prospect_model->input_tocontact();

			$this->session->set_flashdata('info', 'Data Sukses Disimpan');
			
			redirect('prospecting');
	}

	public function edit()
	{
		$this->secure_model->get_secure();
		$this->load->model('prospect_model');
		$key = $this->uri->segment(3);

		$query = $this->prospect_model->get_idprospect($key);
		
		$val['content'] 	 	 = 'tampilan_prospect/tampilan_editprospecting';
		$val['title'] 			 = "Prospect";
		$val['subtitle']	 	 = "Edit Prospecting";
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['data_p']			 =  $this->prospect_model->get_idprospect($key);
		
		if($query->num_rows()>0)
			{
				foreach ($query->result() as $row) 
				{
					$val['pros']  = $row->sName_prospect;
					$val['comp']  = $row->sName_company;
					$val['phone'] = $row->sPhone_number;
					$val['info']  = $row->sInformasi;
					$val['meet']  = $row->dDate_meeting;
				}	
			}
			else
			{
					$val['pros']  =  ''; 
					$val['comp']  =  '';
					$val['phone'] =  '';
					$val['info']  =  '';
					$val['meet']  =  '';
			}

		$this->load->view('tampilan_home' ,$val);
	}

	public function save_changeprospect()
	{
		$this->secure_model->get_secure();
		$this->load->model('Prospect_model');
		$key = $this->uri->segment(3);

		$data['sName_prospect'] 			= $this->input->post('pros');
		$data['sName_company'] 				= $this->input->post('comp');
		$data['sPhone_number'] 				= $this->input->post('phone');
		$data['sInformasi']	 				= $this->input->post('info');
		$data['dDate_meeting'] 				= $this->input->post('meet');

		$this->Prospect_model->edit_prospect($key,$data);

		redirect('Prospecting');
	}



	public function contact()
	{
		$this->secure_model->get_secure();
		$this->load->model('prospect_model');
		$key = $this->uri->segment(3); 
		$s  = $this->prospect_model->get_titlecontact($key);

		$val['content'] 	 	 = 'tampilan_contact/tampilan_datacontact';
		$val['title'] 			 = "Contact";
		$val['subtitle']	 	 = "Contact List Of ".$s;
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datacontact']		 =  $this->prospect_model->get_datacontact($key); 
		$val['datatocontact']	 =  $this->prospect_model->get_datatocontact($key);



		$this->load->view('tampilan_home' ,$val);
	}



	public function save_contact()
	{
		$k = $this->uri->segment(3); 
		$this->load->model('prospect_model');

		$val ['datatocontact']		 		= $this->prospect_model->get_datatocontact($k); 
		$data['sName_contact'] 				= $this->input->post('contact');
		$data['iId_customer']				= $this->uri->segment(3);
		$data['iposition'] 					= $this->input->post('pos');
		$data['sPhone_number'] 				= $this->input->post('phone');
		$data['sPhone_number2']	 			= $this->input->post('phone2');
		$data['sPhone_number3'] 			= $this->input->post('phone3');
		$data['sEmail']						= $this->input->post('email');

		$this->prospect_model->input_contact($data);

		redirect("Prospecting/contact/$k");

		//$this->session->set_flashdata('info', 'Data Sukses Disimpan');
	}

	/*
	public function tesaja()
	{
		$this->load->model('Prospect_model');
		$key= $this->uri->segment(3);
		$query = $this->Prospect_model->get_idprospect($key);
		foreach ($query->result() as $row) 
		{
				$tes= array('idpros'=> $row->pId_prospect);

				$ydcr = $tes['idpros'];
		}
		echo $ydcr;
	}
	*/
}