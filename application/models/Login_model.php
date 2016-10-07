<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{	
	/*
	public function get_login_admin($u,$p)
	{
		$pwd = md5($p);
		$this->db->where('sUsername' ,$u);
		$this->db->where('sPassword' ,$p);
		$query= $this->db->get('dbadmin');


		if($query->num_rows()>0)
		{	
			foreach($query->result() as $row)
			{
				
				$sess = array('id'		 => $row->pId_sales,
							  'username' => $row->sUsername,
							  'password' => $row->sPassword,
							  'nama'	 => $row->sName,
							  'pos'		 => $row->sPosition,
							  'foto'	 => $row->sFoto);

				//echo $sess['username'];
				
				$this->session->set_userdata($sess);
			}

			redirect('sales');
		}
		else
		{
			$this->session->set_flashdata('info' ,"Pardon, Cek Again Your Username");
			redirect('login');
		}	
	}
	*/

	public function get_login_sales($u,$p)
	{
		$pwd = md5($p);
		$this->db->where('sUsername' ,$u);
		$this->db->where('sPassword' ,$pwd);
		$query= $this->db->get('dbuser');

		if($query->num_rows()>0)
		{	
			foreach($query->result() as $row)
			{
				
				$sess = array('id'		 => $row->pId_sales,
							  'username' => $row->sUsername,
							  'password' => $row->sPassword,
							  'nama'	 => $row->sName_user,
							  'pos'		 => $row->sPosition,
							  'foto'	 => $row->sFoto);
				$role = $row->iRole;
				//echo $sess['username'];
				$this->session->set_userdata($sess);
			}
			if ($role==2) 
			{
				redirect('sales');
			}
			else if($role==3)
			{
				redirect('schedule/get_schedulehome');
			}
			
		}
		else
		{
			$this->session->set_flashdata('info' ,"Pardon, Cek Again Your Username");
			redirect('login');
		}	
	}
}