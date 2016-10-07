<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Meeting_model extends CI_Model
{

	public function input_meeting($data)
	{
		$this->db->insert('dbmeeting' ,$data);
	}

	public function get_idmeeting()
	{
		$que = "SELECT pId_meeting FROM dbmeeting ORDER BY pId_meeting DESC LIMIT 1";
		$quei = $this->db->query($que);

			foreach ($quei->result() as $row) {
					$idm = $row->pId_meeting;
				}
		return $idm;
	}
	
	public function input_dperson($data_det)
	{
		$this->db->insert('dbmeeting_detail_person' ,$data_det);
	}

	public function get_opp_id($key)
	{
		$que = "SELECT dbopportunity.pId_opportunity
				FROM dbopportunity
				INNER JOIN dbschedule
				ON dbopportunity.pId_opportunity = dbschedule.iId_opportunity      
				WHERE pId_schedule = $key";

		$quer = $this->db->query($que);

		foreach ($quer->result() as $row) {
			$idopp = $row->pId_opportunity;
		}

		return $idopp;
	}

	public function get_contact($key)
	{
		$que = "SELECT 	dbcontact.pId_contact,
						dbcontact.sName_contact
                FROM dbcontact
                INNER JOIN dbopportunity
                    ON dbcontact.iId_customer = dbopportunity.iId_customer
                INNER JOIN dbschedule 
                    ON dbopportunity.pId_opportunity = dbschedule.iId_opportunity
                WHERE dbschedule.pId_schedule = $key";
        $queri = $this->db->query($que);

        return $queri;
	}

	public function get_date($key)
	{
		$this->db->where('pId_schedule' ,$key);
		$dt = $this->db->get('dbschedule');

		foreach ($dt->result() as $row) {
			$date = $row->dMeeting;
		}

		return $date;
	}

	public function get_datameeting($idsal)
	{
		$que = "SELECT  dbcustomer.sName_company,
		dbmeeting.pId_meeting,
		dbopportunity.sOpportunity_name,
		dbmeeting.sSubject,
		dbmeeting.dMeeting,
		dbmeeting.sNotes
		FROM dbmeeting
		INNER JOIN dbopportunity
		ON dbmeeting.iId_opportunity = dbopportunity.pId_opportunity
		INNER JOIN dbcustomer
		ON dbopportunity.iId_customer = dbcustomer.pId_customer
		WHERE dbcustomer.iId_sales = $idsal";
		$quei = $this->db->query($que);
		return $quei;
	}

	public function get_datacontact($idm)
	{
		$que = "SELECT dbcontact.sName_contact
				FROM dbmeeting_detail_person
				INNER JOIN dbcontact
				ON dbmeeting_detail_person.iId_contact = dbcontact.pId_contact
				WHERE dbmeeting_detail_person.iId_meeting = $idm";
		$quei = $this->db->query($que);

		$x="";
		
			foreach ($quei->result() as $row) {
				$e = $row->sName_contact;
				if($x)
	                {
	                    $x.= (",$e");
	                }
	                else
	                {
	                    $x.="".$e."";
	                }		
			}
			return $x;

		/* Error when use this if
		if($quei->num_rows>0)
		{
		}
		else
		{
			$b = "Data empty";
			return $b;
		}
		*/	
	}

	public function get_edit($key)
	{
		$this->db->where('pId_meeting' ,$key);
		$dmeet = $this->db->get('dbmeeting');

		return $dmeet;
	}

	public function get_contactedit($key)
	{
		$que = "SELECT dbcontact.pId_contact, 
					   dbcontact.sName_contact
				FROM dbmeeting_detail_person
				INNER JOIN dbcontact
				ON dbmeeting_detail_person.iId_contact = dbcontact.pId_contact
				WHERE dbmeeting_detail_person.iId_meeting = $key";
		$quei = $this->db->query($que);

		return $quei;
	}

	public function get_idcust($key)
	{
		$que = "SELECT pId_customer
				FROM dbschedule
				INNER JOIN dbopportunity
				ON dbschedule.iId_opportunity = dbopportunity.pId_opportunity
				INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
				WHERE dbschedule.pId_schedule = $key";

		$quei = $this->db->query($que);

		foreach ($quei->result() as $row) {
			$idcus = $row->pId_customer;
		}
		return $idcus;
	}

	public function input_morecontact($data)
	{
		$this->db->insert('dbcontact' ,$data);
	}

	public function update_when_done($key,$data_stat)
	{
		$this->db->where('pId_schedule' ,$key);
		$this->db->update('dbschedule' ,$data_stat);
	}
}
