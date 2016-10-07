<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model
{
	public function get_customer($idsal)
	{
		//$this->db->order_by("dDate_meeting", "asc"); 
		
		$query = "SELECT dbcustomer.pId_customer,
						 dbcustomer.sName_company,
						 dbcustomer.sAdress_company,
						 dbcustomer.sIndustry,
						 dbcustomer.sPhone_number,
						 dbcustomer.sNotes,
						 dbcustomer.sJne_cust_id,
						 dbtoknow.sKnow,
						 dbtostat_customer.sStatus					 
		FROM dbcustomer INNER JOIN dbtostat_customer
        ON dbcustomer.iStatus = dbtostat_customer.pStatus
    	INNER JOIN dbtoknow
        ON dbcustomer.iKnow_jne = dbtoknow.pKnow_jne
        WHERE dbcustomer.iId_sales = $idsal";
		$que = $this->db->query($query);
		return $que;
	}


	public function input_customer($data)
	{
		$quei = $this->db->insert('dbcustomer' ,$data);
	}


	public function get_jci()
	{
		$quei = $this->db->get('dbsysseting');
		foreach ($quei->result() as $row) 
		{
			$query = $row->sJne_cust_id;
		}
		return $query;
	}

	public function akses_jci()
	{
		$quei = "SELECT func_ncustid() AS asfungsi";
		$qu = $this->db->query($quei);

		foreach ($qu->result() as $row) 
		{
			$query = $row->asfungsi;
		}

		$this->db->set('sJne_cust_id',$query);
		$res = $this->db->update('dbsysseting');
	}


	public function get_customerupdate($key)
	{
		$this->db->where('pId_customer' ,$key);
		$quer = $this->db->get('dbcustomer');

		return $quer;
	}

	public function update_customer($key,$data)
	{
		$this->db->where('pId_customer' ,$key);
		$this->db->update('dbcustomer' ,$data);
	}

	public function data_pelengkap_update($key)
	{
		$que = "SELECT dbcustomer.pId_customer,
					   dbcustomer.iStatus,
					   dbtostat_customer.sStatus,
					   dbcustomer.iKnow_jne,
					   dbtoknow.sKnow
				FROM dbcustomer INNER JOIN dbtoknow
				ON dbcustomer.iKnow_jne = dbtoknow.pKnow_jne
				INNER JOIN dbtostat_customer 
				ON dbcustomer.iStatus = dbtostat_customer.pStatus
				WHERE dbcustomer.pId_customer = $key";

		$quei = $this->db->query($que);

		return $quei;
	}

	public function get_valjci($key)
	{
		$this->db->where('pId_customer' ,$key);
		$qu = $this->db->get('dbcustomer');

		foreach($qu->result() as $row) 
		{
			$que = $row->sJne_cust_id;
		}
		return $que;
	}


	public function ccc()
	{
		$quei = "SELECT func_ncustid() AS asfungsi";
		$qu = $this->db->query($quei);

		foreach ($qu->result() as $row) 
		{
			$query = $row->asfungsi;
		}
		return $query;
	}
}