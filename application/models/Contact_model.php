<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model
{	
	public function get_titlecontact($key)
	{
		$this->db->where('pId_customer' ,$key);
		$query= $this->db->get('dbcustomer');

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
		$quei = "SELECT  dbcontact.pId_contact,
						 dbcontact.iId_customer,
						 dbcontact.sName_contact,
						 dbcontact.iPosition,
						 dbtogender.sGender,
						 dbtoposition.sName_position,
						 dbcontact.sPhone_number,
						 dbcontact.sPhone_number2,
						 dbcontact.sPhone_number3,
						 dbcontact.sEmail
				FROM
    			dbcontact
    			INNER JOIN dbtoposition
        		ON dbcontact.iPosition = dbtoposition.pPosition
        		INNER JOIN dbcustomer
        		ON dbcontact.iId_customer = dbcustomer.pId_customer
        		INNER JOIN dbtogender
        		ON dbcontact.iGender = dbtogender.pGender
        		WHERE dbcontact.iId_customer = $key
        		ORDER BY  iPosition ASC" ;
        		
        return $this->db->query($quei);		
	}

	public function get_editcontact($key)
	{
		$quei = "SELECT dbcontact.pId_contact,
						dbcontact.iId_customer,
						dbcontact.sName_contact,
				        dbcontact.sPhone_number,
				        dbcontact.sPhone_number2,
				        dbcontact.sPhone_number3,
				        dbcontact.iPosition,
				        dbcontact.sEmail,
				        dbtoposition.sName_position,
				        dbcontact.iGender,
				        dbtogender.sGender
				FROM dbcontact
				INNER JOIN dbtoposition
				ON dbcontact.iPosition = dbtoposition.pPosition
				INNER JOIN dbtogender
        		ON dbcontact.iGender = dbtogender.pGender
				WHERE dbcontact.pId_contact = $key";

		$queri = $this->db->query($quei);

		return $queri;
	}

	public function update_contact($key,$data)
	{
		$this->db->where('pId_contact' ,$key);
		$this->db->update('dbcontact' ,$data);
	}

	public function get_idcustomer($key)
	{	
		$this->db->where('pId_customer' ,$key);
		$s = $this->db->get('dbcustomer');

		return $s;
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