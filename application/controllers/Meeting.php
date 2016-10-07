<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Meeting extends CI_CONTROLLER
{
	public function get_meeting_byid()
	{
		$this->secure_model->get_secure();
		$this->load->model('Meeting_model');
		$this->load->model('Schedule_model');
		$key = $this->uri->segment(3);
		$query = $this->Schedule_model->get_schedule_edit($key);

		if($query->num_rows()>0)
			{
				foreach ($query->result() as $row) 
				{
					$val['subject']  		= $row->sSubject;
					$val['date']  			= $row->dMeeting;
					$val['location'] 		= $row->sLocation;
				}	
			}
			else
			{
					$val['subject']  		 =  ''; 
					$val['date'] 			 =  '';
					$val['location'] 		 =  '';
			}
		$date = $val['date'];
		$date_in = date("d F Y",strtotime($date));

		$val['content'] 	 	 =  'tampilan_meeting/tampilan_insertmeeting';
		$val['menu']			 = 'tampilan_menu_user';
		$val['subtitle']	 	 =  "$date_in";
		$val['title'] 			 =  "Meeting";
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapos']	 	 	 =  $this->session->userdata('pos');
		$val['datacon']			 =  $this->Meeting_model->get_contact($key);
		$val['datasche']		 =  $key;

		

		$this->load->view('tampilan_home' ,$val);
	}

	public function get_reschedule()
	{
		$this->secure_model->get_secure();
		$key = $this->input->post('scheid');
		$val['datasche']	= $key;
		$this->load->view('tampilan_meeting/parsing_reschedule' ,$val);
	}

	public function done()
	{	
		$this->secure_model->get_secure();
		$this->load->model('Meeting_model');
		$key = $this->uri->segment(3);
		$idoppr = $this->Meeting_model->get_opp_id($key);

		$date = $this->Meeting_model->get_date($key);

		$data['sSubject'] 				= $this->input->post('subject');
		$data['iId_schedule']			= $key;
		$data['iId_opportunity']		= $idoppr;
		$data['tStart']					= $this->input->post('start');
		$data['tEnd']					= $this->input->post('end');
		$data['dMeeting']				= $date;
		$data['sLocation']				= $this->input->post('location');
		$data['sNotes']					= $this->input->post('notes');
		
		$this->Meeting_model->input_meeting($data);

		$idm = $this->Meeting_model->get_idmeeting();
		$b = $this->input->post('person');
		for($d=0; $d<=count($b)-1; $d++)
		{
			$data_det['iId_contact']		= $b[$d];
			$data_det['iId_meeting']		= $idm;
			$this->Meeting_model->input_dperson($data_det);
		}

		$data_stat['iStatus']			= 2;
		$this->Meeting_model->update_when_done($key,$data_stat);

		redirect ('schedule/get_schedulehome');
	}

	public function more_contact()
	{
		$this->secure_model->get_secure();
		$this->load->model('Meeting_model');
		$key = $this->uri->segment(3);
		$id= $this->Meeting_model->get_idcust($key);

		$data['iId_customer'] 			= $id;
		$data['sName_contact']			= $this->input->post('contact');
		$data['iGender']				= $this->input->post('gen');
		$data['iPosition']				= $this->input->post('pos');
		$data['sPhone_number']			= $this->input->post('phone');
		$data['sPhone_number2']			= $this->input->post('phone2');
		$data['sPhone_number3']			= $this->input->post('phone3');
		$data['sEmail']					= $this->input->post('email');

		$this->Meeting_model->input_morecontact($data);

		redirect("Meeting/get_meeting_byid/$key");
	}

	public function add_file()
	{
		$config['upload_path']   = FCPATH.'/uploaded/meeting_file/';
        $config['allowed_types'] = 'gif|jpg|png|ico|mp4';
        $config['max_size']      = '200000';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$nama=$this->upload->data('file_name');
        	$dsc = $this->input->post('datasc');
        	$this->db->insert('dbfile_meeting',array('iId_meeting'=>$dsc,'sFile_name'=>$nama,'sToken'=>$token));
        }
	}

	function remove_file(){

		//Ambil token foto
		$token=$this->input->post('token');
		
		$foto=$this->db->get_where('dbfile_meeting',array('sToken'=>$token));

		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->sFile_name;
			if(file_exists($file=FCPATH.'/uploaded/meeting_file/'.$nama_foto)){
				unlink($file);
			}
			$this->db->delete('dbfile_meeting',array('sToken'=>$token));
		}
		echo "{}";
	}


	public function get_datameeting()
	{
		$this->secure_model->get_secure();
		$this->load->model('Meeting_model');
		$key = $this->uri->segment(3);
		$idsal = $this->session->userdata('id');
		$b = $this->Meeting_model->get_datameeting($idsal);
		
		foreach ($b->result() as $row) {
			$idm = $row->pId_meeting;
		}

		$val['content'] 	 	 = 'tampilan_meeting/tampilan_datameeting';
		$val['menu']			 = 'tampilan_menu_user';
		$val['title'] 			 = "Meeting";
		$val['subtitle']	 	 = "List Of Meeting, I had";
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapos']	 	 	 =  $this->session->userdata('pos');
		$val['dmeet']			 =  $this->Meeting_model->get_datameeting($idsal);
		$val['dcon']			 =  $this->Meeting_model->get_datacontact($idm);		

		$this->load->view('tampilan_home' ,$val);
	}

	public function send_contact()
	{
		$this->load->model('Meeting_model');
		//$idm = $this->input->post('idmj');
		//$dcont = $this->Meeting_model->get_datacontact($idm);
		//$val['dcon']	= $dcont;
		$val['dcon'] = "lalalalala";
		$this->load->view('tampilan_meeting/tampilan_detail' ,$val);
	}

	public function get_edit()
	{
		$this->secure_model->get_secure();
		$this->load->model('Meeting_model');
		$key = $this->uri->segment(3);
		$d = $this->Meeting_model->get_edit($key);
		$c = $this->Meeting_model->get_contactedit($key);

		$val['content'] 	 	 = 'tampilan_meeting/tampilan_editmeeting';
		$val['menu']			 = 'tampilan_menu_user';
		$val['title'] 			 = "Meeting";
		$val['subtitle']	 	 = "Edit Meeting";
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapos']	 	 	 =  $this->session->userdata('pos');
		$val['datacon']			 =  $this->Meeting_model->get_contactedit($key);
		$val['dataedit']		 =  $this->Meeting_model->get_edit($key);

		if($d->num_rows()>0)
		{
			foreach ($d->result() as $row) {

				$val['subject']	 = $row->sSubject;
				$val['start']	 = $row->tStart;
				$val['end']		 = $row->tEnd;
				$val['location'] = $row->sLocation;
				$val['notes']	 = $row->sNotes;
			}
		}
		else
		{
				$val['subject']	 = "";
				$val['start']	 = "";
				$val['end']		 = "";
				$val['location'] = "";
				$val['notes']	 = "";
		}

		if($c->num_rows()>0)
		{
			foreach ($c->result() as $row) {
				$val['idc']		= $row->pId_contact;
				$val['nc']		= $row->sName_contact;
			}
		}
		else
		{

		}

		$this->load->view('tampilan_home' ,$val);
	}

/*
	public function tes()
	{


		$idm = 15;
		$this->load->model('Meeting_model');
		$b = $this->Meeting_model->get_datacontact($idm);
		echo $b;

		$this->load->model('Meeting_model');
		$idm = $this->Meeting_model->get_idmeeting();
		echo $idm;
	
		$b = $this->input->post('person');

		for($d=0; $d<=count($b)-1; $d++)
		{
			echo $b[$d].'<br>';
		}
		
		$this->load->model('Meeting_model');
		$idsal = 2;
		$dmeet =  $this->Meeting_model->get_datameeting($idsal);

		$no=1;
		foreach ($dmeet->result() as $row) {		
	
			echo '<td>'. $no++ .'</td><br>';
			echo '<td>'. $row->sName_company .'</td><br>';
			echo '<td>'. $row->sSubject .'</td><br>';
			$con = $row->sName_contact;
			$nc .= $con.','; 
			echo '<td>'.$nc.'</td><br>';

		}
	}
	*/
	
}