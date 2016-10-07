<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prospect_model extends CI_Model
{
	public function show_prospectsales($idsal)
	{
		$this->db->where('iId_sales' ,$idsal);
		$this->db->order_by("dDate_meeting", "asc"); 
		$que = $this->db->get('dbprospekting');
		return $que;
	}

	public function get_prospect()
	{
		$query= $this->db->get('dbprospekting');
		return $query;
	}

	public function get_idprospect($key)
	{
		$this->db->where('pId_prospect' ,$key);
		$query = $this->db->get('dbprospekting');	
		return $query;
	}


	public function input_prospect($data)
	{
		$this->db->insert('dbprospekting' ,$data);
	}

	public function edit_prospect($key, $data)
	{
		$this->db->where('pId_prospect' ,$key);
		$this->db->update('dbprospekting' ,$data);
	}


	public function input_tocontact()
	{
		$quer = $this->db->get('dbprospekting');

		if($quer->num_rows()>0)
		{
			foreach ($quer->result() as $row) 
			{	

				$ses = array('id'   => $row->pId_prospect,
							 'comp' => $row->sName_company);
				
				$idpros 	= $ses['id'];
				$compros	= $ses['comp'];
			}	

				$data['iId_prospect']  = $idpros;
				$data['sName_company'] = $compros;
				$this->db->insert('dbtocontact' ,$data);
		}	

	}

	public function get_titlecontact($key)
	{
		$this->db->where('pId_prospect' ,$key);
		$query= $this->db->get('dbprospekting');

		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$ses = array('name' => $row->sName_company);
				
				$title = $ses['name'];
			}
			return $title;
		}

	}

	public function get_datacontact($key)
	{	
		/*
		$this->db->where('iId_customer' ,$key);
		$query= $this->db->get('dbcontact');
		return $query;
		*/
	
		//$this->db->where('dbcontact.iId_customer' ,$key);
		$quei = "SELECT  dbcontact.sName_contact,
						 dbtoposition.sName_position,
						 dbcontact.sPhone_number,
						 dbcontact.sPhone_number2,
						 dbcontact.sPhone_number3,
						 dbcontact.sEmail
				FROM
    			dbcontact
    			INNER JOIN dbtoposition
        		ON dbcontact.iPosition = dbtoposition.pPosition
        		WHERE dbcontact.iId_customer = $key" ;
        		
        return $this->db->query($quei);
	
		
		/*
		$this->db->select('dbcontact.sName_contact,
						 dbcontact.iPosition,
						 dbcontact.sPhone_number,
						 dbcontact.sPhone_number2,
						 dbcontact.sPhone_number3,
						 dbcontact.sEmail');
		$this->db->from('dbcontact' , 'dbtoposition');
		$this->db->where('dbcontact.iPosition' , 'dbtoposition.pPosition'); 
		$this->db->where('dbcontact.iId_customer' ,$key);
		*/		
	}

	public function get_datatocontact($key)
	{	
		$this->db->where('pId_contact' ,$key);
		$query= $this->db->get('dbtocontact');
		return $query;
	}

	public function get_idcontact($key)
	{
		$this->db->where('iId_customer' ,$key);
		$query= $this->db->get('dbcontact');
		return $query;
	}


	public function input_contact($data)
	{
		$this->db->insert('dbcontact' ,$data);
	}
 
}