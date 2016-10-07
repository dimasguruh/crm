<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opportunity_model extends CI_Model
{
	public function get_opportunity($idsal)
	{
		$query = "SELECT dbopportunity.pId_opportunity,
						 dbopportunity.sOpportunity_name,
						 dbcustomer.sName_company,
						 dbopportunity.sInformation,
						 dbopportunity.dForecast_amount,
						 dbopportunity.dForecast_running,
						 dbopportunity.iContact,
						 dbopportunity.iId_customer,
						 dbtostat_opportunity.sStatus_opp
		FROM dbopportunity INNER JOIN dbcustomer
        ON dbopportunity.iId_customer = dbcustomer.pId_customer
    	INNER JOIN dbtostat_opportunity
        ON dbopportunity.iStatus = dbtostat_opportunity.pStatus_opp
        WHERE dbcustomer.iId_sales = $idsal";

		return $this->db->query($query);
	}

	public function get_opportunity_byidcustomer($key)
	{
		$quei = "SELECT  dbopportunity.pId_opportunity,
						 dbopportunity.sOpportunity_name,
						 dbopportunity.sInformation,
						 dbopportunity.dForecast_amount,
						 dbopportunity.dForecast_running,
						 dbopportunity.iContact,
						 dbopportunity.iId_customer,
						 dbtostat_opportunity.sStatus_opp,
						 dbcontact.sName_contact,
						 dbtoproduct_opp.sProduct,
						 dbtoservice_opp.sService,
						 dbopportunity.sCompetitor					 			 
    	FROM dbopportunity INNER JOIN dbtostat_opportunity
        ON dbopportunity.iStatus = dbtostat_opportunity.pStatus_opp
        INNER JOIN  dbcontact
        ON dbopportunity.iContact = dbcontact.pId_contact
    	INNER JOIN dbtoproduct_opp
        ON dbopportunity.iProduct_type = dbtoproduct_opp.pProduct
    	INNER JOIN dbtoservice_opp
        ON dbopportunity.iService_type = dbtoservice_opp.pService
        WHERE dbopportunity.iId_customer = $key";

		return $this->db->query($quei);
	}

	public function get_company($idsal)
	{
		$this->db->where('iId_sales' ,$idsal);
		$s = $this->db->get('dbcustomer');

		return $s;
	}

	public function get_companyname($key)
	{
		$this->db->where('pId_customer' ,$key);
		$query = $this->db->get('dbcustomer');
			if ($query->num_rows()>0)
			{
				foreach ($query->result() as $row) 
				{
					$title = $row->sName_company;
				}
				return $title;
			}
	}

	public function get_contact($key)
	{
		$this->db->where('iId_customer' ,$key);
		$query = $this->db->get('dbcontact');
		/*
			if($query->num_rows()>0)
			{
				foreach ($query->result() as $row) 
				{
					$arr  = array('con' => $row->sName_contact);
					$contact = $arr['con'];
				}
				return $contact;
			}
		*/
		return $query;
	}

	public function get_contact_edit($key)
	{
		$que = "SELECT  dbcontact.pId_contact,
						dbcontact.sName_contact
				FROM dbcontact
			    INNER JOIN dbopportunity
			        ON dbcontact.iId_customer = dbopportunity.iId_customer
				WHERE pId_opportunity = $key";
				
		$queri = $this->db->query($que);

		return $queri;
	}

	public function get_customer($key)
	{
		$this->db->where('pId_customer' ,$key);
		$query = $this->db->get('dbcustomer');

		return $query;
	}

	public function input_opportunity($data)
	{
		$this->db->insert('dbopportunity' ,$data);
	}

	public function get_opportunityedit($key)
	{
		$this->db->where('pId_opportunity' ,$key);
		$quer = $this->db->get('dbopportunity');

		return $quer;
	}

	public function edit_opportunity($key,$data)
	{
		$this->db->where('pId_opportunity' ,$key);
		$this->db->update('dbopportunity' ,$data);	
	}

	public function get_namecontedit($key)
	{
		$quei = "SELECT sName_contact 
		FROM dbopportunity
		INNER JOIN dbcontact
		ON dbopportunity.iContact = dbcontact.pId_contact 
		WHERE dbopportunity.pId_opportunity = $key";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$name = $row->sName_contact;
		}
		return $name;
	}

	public function data_pelengkap_edit($key)
	{
			$que = "SELECT dbopportunity.pId_opportunity,
						   dbopportunity.iStatus,
						   dbtostat_opportunity.sStatus_opp,
						   dbopportunity.iProduct_type,
						   dbtoproduct_opp.sProduct,
						   dbopportunity.iService_type,
						   dbtoservice_opp.sService
					FROM dbopportunity
				    INNER JOIN dbtoproduct_opp
				        ON dbopportunity.iProduct_type=dbtoproduct_opp.pProduct
				    INNER JOIN dbtoservice_opp
				        ON dbopportunity.iService_type = dbtoservice_opp.pService
				    INNER JOIN crm.dbtostat_opportunity
				        ON dbopportunity.iStatus=dbtostat_opportunity.pStatus_opp
					WHERE pId_opportunity = $key";

		$quei = $this->db->query($que);

		return $quei;
	}

	public function get_idcustomer($key)
	{
		$this->db->where('pId_opportunity' ,$key);
		$s = $this->db->get('dbopportunity');

		foreach ($s->result() as $row) {
			$id = $row->iId_customer;
		}

		return $id;
	}

	public function get_idopp(){
		$que = "SELECT pId_opportunity 
				FROM dbopportunity ORDER BY pId_opportunity DESC limit 1";
		$quei = $this->db->query($que);

		foreach ($quei->result() as $row) {
			$idp = $row->pId_opportunity;
		}
		return $idp;
	}

	public function input_detail($datdet)
	{
		$this->db->insert('dbopp_detail' ,$datdet);
	}
}