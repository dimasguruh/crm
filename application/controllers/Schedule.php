<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller
{
	public function index()	
	{	
		$this->secure_model->get_secure();
		$this->load->model('Schedule_model');
		$key = $this->uri->segment(3);
		$idsal = $this->session->userdata('id');
		
		$val['content'] 	 	 = 'tampilan_schedule/tampilan_dataschedule';
		$val['menu']			 = 'tampilan_menu_user';
		$val['title'] 			 = "Schedule";
		$val['subtitle']	 	 =  null;
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapos']	 	 	 =  $this->session->userdata('pos');
		$val['datapros']		 =  $this->Schedule_model->get_data($idsal);
		$val['datacon']			 =  $this->Schedule_model->get_contact_check();
		$val['dataopp']			 =  $this->Schedule_model->get_opp_easy($idsal);

		$this->load->view('tampilan_home' ,$val);
		$this->load->model('Schedule_model');
	}

	public function save_easy()
	{	
		$this->load->model('Schedule_model');
	
		$data['iId_opportunity'] 				= $this->input->post('opp');
		$data['dMeeting'] 						= $this->input->post('meet');
		$data['sLocation'] 						= $this->input->post('location');
		$data['sSubject']	 					= $this->input->post('subject');
		$data['sNoted']							= $this->input->post('noted');
		$data['iStatus']						= 1;
		
		$this->Schedule_model->input_schedule($data);
		redirect("schedule");
	}	


	public function parsing_contact()
	{
		$this->secure_model->get_secure();
		$key = $this->input->post('opp');
		$this->load->model('Schedule_model');
		$val['datacon']			 =	$this->Schedule_model->get_contact($key);

		$this->load->view('tampilan_schedule/parsing_contact' ,$val);
	}

	public function get_dataschedule()
	{

		$this->secure_model->get_secure();
		$this->load->model('Schedule_model');
		$key = $this->uri->segment(3);
		$s = $this->Schedule_model->get_oppname($key);
		

		$val['content'] 	 	 = 'tampilan_schedule/tampilan_dataschedulebyid';
		$val['menu']			 = 'tampilan_menu_user';
		$val['title'] 			 = "Schedule";
		$val['subtitle']	 	 = "List Schedule Of ".$s;
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapos']	 	 	 =  $this->session->userdata('pos');
		$val['datapros']		 =  $this->Schedule_model->get_schedule_bydataopp($key);
		$val['dataidopp']		 =  $this->Schedule_model->get_oppid($key);
		$val['datacon']			 =  $this->Schedule_model->get_contact($key);

		$this->load->view('tampilan_home' ,$val);
	}

	public function save()
	{
		$k = $this->uri->segment(3); 
		$this->load->model('Schedule_model');

		$data['iId_opportunity'] 				= $this->uri->segment(3);
		$data['dMeeting'] 						= $this->input->post('meet');
		$data['sLocation'] 						= $this->input->post('location');
		$data['sSubject']	 					= $this->input->post('subject');
		$data['sNoted']							= $this->input->post('noted');
		$data['iStatus']						= 1;


		$this->Schedule_model->input_schedule($data);

		redirect("schedule/get_dataschedule/$k");
		
	}

	public function get_schedulehome()
	{
		$this->secure_model->get_secure();
		$this->load->model('Schedule_model');
		$idsal = $this->session->userdata('id');
		
		$val['content'] 	 	 = 'tampilan_schedule/tampilan_schedulehome';
		$val['menu']			 = 'tampilan_menu_user';
		$val['title'] 			 = "Dashboard";
		$val['subtitle']	 	 = "List Of My Schedule";
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapos']	 	 	 =  $this->session->userdata('pos');
		$val['datapros']		 =  $this->Schedule_model->get_data($idsal);

		$this->load->view('tampilan_home' ,$val);
	}

	public function edit()
	{
		$this->secure_model->get_secure();
		$this->load->model('Schedule_model');
		$key = $this->uri->segment(3);
		$query = $this->Schedule_model->get_schedule_edit($key);

		$val['content'] 	 	 = 'tampilan_schedule/tampilan_editschedule';
		$val['menu']			 = 'tampilan_menu_user';
		$val['title'] 			 = "Schedule";
		$val['subtitle']	 	 = "Edit Schedule";
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapos']	 	 	 =  $this->session->userdata('pos');
		$val['dataedit']		 =  $this->Schedule_model->get_schedule_edit($key);
		$val['datacon']			 =  $this->Schedule_model->get_contact_edit($key);

		if($query->num_rows()>0)
			{
				foreach ($query->result() as $row) 
				{
					$val['subject']  		= $row->sSubject;
					$val['location'] 		= $row->sLocation;
					$val['meet'] 			= $row->dMeeting;
					$val['stat'] 	    	= $row->iStatus;
					$val['noted'] 	    	= $row->sNoted;
				}	
			}
			else
			{
					$val['subject']  		 =  ''; 
					$val['person'] 			 =  '';
					$val['location'] 		 =  '';
					$val['meet'] 			 =  '';
					$val['stat']  			 =  '';
					$val['noted'] 	    	 =  '';
			}

		$this->load->view('tampilan_home' ,$val);
	}


	public function save_change()
	{
		$this->secure_model->get_secure();
		$this->load->model('Schedule_model');
		$key = $this->uri->segment(3);
		$dnow = date('Y-m-d');
		$dmeet = $this->input->post('meet');

		$data['sSubject'] 			= $this->input->post('subject');
		$data['sLocation'] 			= $this->input->post('location');
		$data['dMeeting']	 		= $this->input->post('meet');
		$data['sNoted']				= $this->input->post('noted');


		$this->Schedule_model->edit_schedule($key,$data);

		redirect("Schedule");
	}

	public function resche()
	{
		$key = $this->uri->segment(3);
		$val['content'] 	 	 = 'tampilan_schedule/tampilan_reschedule';
		$val['menu']			 = 'tampilan_menu_user';
		$val['subtitle']	 	 =  "";
		$val['title'] 			 =  "Reschedule";
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapos']	 	 	 =  $this->session->userdata('pos');
		$val['key']				 =  $key;

		$this->load->view('tampilan_home' ,$val);
	}

	public function reschedule()
	{
		$this->secure_model->get_secure();
		$this->load->model('Schedule_model');
		$key = $this->uri->segment(3);
		$idopp = $this->Schedule_model->get_pidopp($key);
		$dnow   = date('Y-m-d');

		$data['dMeeting']				= $this->input->post('dresche');
		$data['iStatus']				= 3;
		$this->Schedule_model->update_reschedule($key,$data);

		$datae['iId_schedule']			= $key;
		$datae['iId_opportunity']		= $idopp;
		$datae['dReschedule_meet']		= $this->input->post('dresche');
		$datae['dCanceled_meet']		= $dnow;
		$datae['sReason']				= $this->input->post('rrsche');
		$this->Schedule_model->input_reschedule($datae);
		redirect('schedule/get_schedulehome');
	}
}