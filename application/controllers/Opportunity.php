<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opportunity extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$val['bread']	= "Opportunity";
	}
	public function parsing_contact()
	{
		$key = $this->input->post('comp');
		$this->load->model('Opportunity_model');
		$val['datacon']			 =	$this->Opportunity_model->get_contact($key);

		$this->load->view('tampilan_opportunity/parsing_contact' ,$val);
	}

	public function get_dataopportunity()	
	{
		$this->secure_model->get_secure();
		$this->load->model('Opportunity_model');
		$key = $this->uri->segment(3);
		$s = $this->Opportunity_model->get_companyname($key);
		

		$val['content'] 	 	 = 'tampilan_opportunity/tampilan_dataopportunitybyid';
		$val['menu']			 = 'tampilan_menu_user';
		$val['title'] 			 =  "Opportunity";
		$val['subtitle']	 	 =  null;
		$val['op']				 = 	$s;
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapros']		 =  $this->Opportunity_model->get_opportunity_byidcustomer($key);
		$val['datacus']			 =	$this->Opportunity_model->get_customer($key);
		$val['datacon']			 =	$this->Opportunity_model->get_contact($key);
		$val['datapos']	 	 	 =  $this->session->userdata('pos');

		$this->load->view('tampilan_home' ,$val);
	}

	public function save()
	{
		$k = $this->uri->segment(3); 
		$this->load->model('Opportunity_model');
		$date = date('Y-m-d H:i:s');

		$data['sOpportunity_name'] 				= $this->input->post('oppor');
		$data['dForecast_amount'] 				= $this->input->post('esti');
		$data['iId_customer']					= $this->uri->segment(3);
		$data['dForecast_running']	 			= $this->input->post('run');
		$data['iProduct_type']					= $this->input->post('prod');
		$data['iService_type']					= $this->input->post('serv');
		$data['iContact']						= $this->input->post('cont');
		$data['iStatus']						= $this->input->post('cycle');
		$data['sInformation'] 					= $this->input->post('info');
		$data['sCompetitor'] 					= $this->input->post('compt');
		$data['dUpdated'] 						= $date;
		$this->Opportunity_model->input_opportunity($data);


		$datdet['iId_opp']						= $this->Opportunity_model->get_idopp();
		$datdet['iStatus']						= $this->input->post('cycle');
		$datdet['sInfo']						= $this->input->post('info');
		$datdet['dUpdated']						= $date;
		$this->Opportunity_model->input_detail($datdet);

		redirect("opportunity/get_dataopportunity/$k");
	}

	public function edit()
	{
		$this->secure_model->get_secure();
		$this->load->model('Opportunity_model');
		$key = $this->uri->segment(3);
		$query = $this->Opportunity_model->get_opportunityedit($key);

		$val['content'] 	 	 = 'tampilan_opportunity/tampilan_editopportunity';
		$val['menu']			 = 'tampilan_menu_user';
		$val['title'] 			 = "Opportunity";
		$val['subtitle']	 	 = "Edit Opportunity";
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['dataedit']		 =  $this->Opportunity_model->get_opportunityedit($key);
		$val['datacon']			 =	$this->Opportunity_model->get_contact_edit($key);
		$val['namecon']			 =  $this->Opportunity_model->get_namecontedit($key);
		$val['datapelengkap']	 =  $this->Opportunity_model->data_pelengkap_edit($key);
		$val['datapos']	 	 	 =  $this->session->userdata('pos');
	
		if($query->num_rows()>0)
			{
				foreach ($query->result() as $row) 
				{
					$val['oppor']  		= $row->sOpportunity_name;
					$val['esti']  		= $row->dForecast_amount;
					$val['run'] 		= $row->dForecast_running;
					$val['prod'] 	    = $row->iProduct_type;
					$val['serv'] 		= $row->iService_type;
					$val['cont']  		= $row->iContact;
					$val['cycle'] 		= $row->iStatus;
					$val['info'] 		= $row->sInformation;
					$val['compt'] 		= $row->sCompetitor;
				}	
			}
			else
			{
					$val['oppor']  		= "";
					$val['esti']  		= "";
					$val['run'] 		= "";
					$val['prod'] 	    = "";
					$val['serv'] 		= "";
					$val['cont']  		= "";
					$val['cycle'] 		= "";
					$val['info'] 		= "";
					$val['compt'] 		= "";
			}

		$this->load->view('tampilan_home' ,$val);
	}

	public function save_change()
	{
		$this->secure_model->get_secure();
		$this->load->model('Opportunity_model');

		$key = $this->uri->segment(3);
		
		$id = $this->Opportunity_model->get_idcustomer($key);
		$date = date('Y-m-d H:i:s');
		$cy   = $this->input->post('cycle');
		$vcy  = $this->input->post('vcycle');

		if($cy!=$vcy)
		{
			$datdet['iId_opp']					= $key;
			$datdet['iStatus']					= $this->input->post('cycle');
			$datdet['sInfo']					= $this->input->post('info');
			$datdet['dUpdated']					= $date;
			$this->Opportunity_model->input_detail($datdet);
			
			$data['dUpdated'] 					= $date;
		}

		$data['sOpportunity_name'] 				= $this->input->post('oppor');
		$data['dForecast_amount'] 				= $this->input->post('esti');
		$data['dForecast_running']	 			= $this->input->post('run');
		$data['iProduct_type']					= $this->input->post('prod');
		$data['iService_type']					= $this->input->post('serv');
		$data['iContact']						= $this->input->post('cont');
		$data['iStatus']						= $this->input->post('cycle');
		$data['sInformation'] 					= $this->input->post('info');
		$data['sCompetitor'] 					= $this->input->post('compt');

		$this->Opportunity_model->edit_opportunity($key,$data);

		redirect("opportunity/get_dataopportunity/$id");
	}
}