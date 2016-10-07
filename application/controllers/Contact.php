<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{
	public function show()
	{
		$this->secure_model->get_secure();
		$this->load->model('Contact_model');
		$key = $this->uri->segment(3); 
		$s   = $this->Contact_model->get_titlecontact($key);

		
		$val['content'] 	 	 = 'tampilan_contact/tampilan_datacontact';
		$val['menu']			 = 'tampilan_menu_user';
		$val['title'] 			 = "Contact";
		$val['subtitle']	 	 = "Contact List Of ".$s;
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapos']	 		 =  $this->session->userdata('pos');
		$val['datacontact']		 =  $this->Contact_model->get_datacontact($key); 
		$val['idcus']			 =  $this->Contact_model->get_idcustomer($key);
		$this->load->view('tampilan_home' ,$val);
	}
	
	public function save()
	{
		$k = $this->uri->segment(3); 
		$this->load->model('Contact_model');

		$data['sName_contact'] 				= $this->input->post('contact');
		$data['iId_customer']				= $this->uri->segment(3);
		$data['iGender'] 					= $this->input->post('gen');
		$data['iPosition'] 					= $this->input->post('pos');
		$data['sPhone_number'] 				= $this->input->post('phone');
		$data['sPhone_number2']	 			= $this->input->post('phone2');
		$data['sPhone_number3'] 			= $this->input->post('phone3');
		$data['sEmail']						= $this->input->post('email');

		$this->Contact_model->input_contact($data);

		redirect("Contact/show/$k");

		//$this->session->set_flashdata('info', 'Data Sukses Disimpan');
	}

	public function edit()
	{
		$this->secure_model->get_secure();
		$this->load->model('Contact_model');
		$key = $this->uri->segment(3); 
		$s   = $this->Contact_model->get_titlecontact($key);

		$val['content'] 	 	 = 'tampilan_contact/tampilan_editcontact';
		$val['menu']			 = 'tampilan_menu_user';
		$val['title'] 			 = "Edit Contact";
		$val['subtitle']	 	 = "";
		$val['datanama']		 =  $this->session->userdata('nama');
		$val['datafoto']		 =  $this->session->userdata('foto');
		$val['datapos']	 	 	 =  $this->session->userdata('pos');

		$dcon = $this->Contact_model->get_editcontact($key);

		if($dcon->num_rows()>0)
		{
			foreach ($dcon->result() as $row) {

				$val['idcon']	= $row->pId_contact;
				$val['contact']	= $row->sName_contact;
				$val['ipos']	= $row->iPosition;
				$val['spos']	= $row->sName_position;
				$val['igen']	= $row->iGender;
				$val['sgen']	= $row->sGender;
				$val['phone']	= $row->sPhone_number;
				$val['phone2']	= $row->sPhone_number2;
				$val['phone3']	= $row->sPhone_number3;
				$val['email']	= $row->sEmail;
			}
		}
		else
		{
				$val['contact']	= "";
				$val['pos']		= "";
				$val['gen']		= "";
				$val['phone']	= "";
				$val['phone2']	= "";
				$val['phone3']	= "";
				$val['email']	= "";
		}

		$this->load->view('tampilan_home' ,$val);
	}

	public function save_change()
	{
		$key = $this->uri->segment(3); 
		$this->load->model('Contact_model');

		$dcon = $this->Contact_model->get_editcontact($key);
		if($dcon->num_rows()>0)
		{
			foreach ($dcon->result() as $row) {
				$k = $row->iId_customer;
			}
		}
		else
		{
				echo "";
		}

		$data['sName_contact'] 				= $this->input->post('contact');
		$data['iposition'] 					= $this->input->post('pos');
		$data['sPhone_number'] 				= $this->input->post('phone');
		$data['sPhone_number2']	 			= $this->input->post('phone2');
		$data['sPhone_number3'] 			= $this->input->post('phone3');
		$data['sEmail']						= $this->input->post('email');

		$this->Contact_model->update_contact($key,$data);

		redirect("Contact/show/$k");

		//$this->session->set_flashdata('info', 'Data Sukses Disimpan');
	}
}