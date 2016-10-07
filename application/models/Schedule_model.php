     <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_model extends CI_Model
{
	public function get_data($idsal)
	{
		$quei = "SELECT dbschedule.pId_schedule,
						dbopportunity.pId_opportunity,
						dbopportunity.iId_customer,
						dbopportunity.sOpportunity_name,
						dbschedule.iStatus,						
       					dbcustomer.sName_company,
       					dbschedule.sSubject,
       					dbschedule.sLocation,
       					dbschedule.sNoted,
       					dbschedule.dMeeting,
       					dbtostat_schedule.sStatus
		FROM
	    dbopportunity
	    INNER JOIN dbcustomer
	    ON dbopportunity.iId_customer = dbcustomer.pId_customer
	    INNER JOIN dbschedule 
	    ON dbschedule.iId_opportunity = dbopportunity.pId_opportunity
	    INNER JOIN dbtostat_schedule
        ON dbtostat_schedule.pId_status = dbschedule.iStatus
        WHERE dbcustomer.iId_sales = $idsal AND dbschedule.iStatus != 2 
        ORDER BY dbschedule.dMeeting ASC";

	    $res=$this->db->query($quei);
	    return $res;
	}

	public function get_schedule_bydataopp($key)
	{
		$quei = "SELECT  dbschedule.pId_schedule,
						 dbopportunity.pId_opportunity,
						 dbopportunity.sOpportunity_name,
						 dbopportunity.iId_customer,		.
						 dbschedule.sSubject,
						 dbschedule.sLocation,
						 dbschedule.sNoted,
						 dbschedule.dMeeting,
						 dbtostat_schedule.sStatus				 			 
    	FROM dbschedule 
        INNER JOIN dbopportunity
        ON dbschedule.iId_opportunity = dbopportunity.pId_opportunity
        INNER JOIN dbtostat_schedule
        ON dbschedule.iStatus = dbtostat_schedule.pId_status
        WHERE dbschedule.iId_opportunity = $key";

		$res = $this->db->query($quei);
		return $res;
	}

	public function get_oppname($key)
	{
		$this->db->where('pId_opportunity' ,$key);
		$query = $this->db->get('dbopportunity');
			if ($query->num_rows()>0)
			{
				foreach ($query->result() as $row) 
				{
					$title = $row->sOpportunity_name;
				}
				return $title;
			}
	}

	public function get_opp_easy($idsal)
	{
		$que = "SELECT dbopportunity.pId_opportunity,
					   dbopportunity.sOpportunity_name,
       				   dbcustomer.sName_company
		FROM dbopportunity
	    INNER JOIN dbcustomer 
        ON dbopportunity.iId_customer = dbcustomer.pId_customer
        WHERE dbcustomer.iId_sales = $idsal";

        $queri = $this->db->query($que);

        return $queri;
	}


	public function get_oppid($key)
	{
		$this->db->where('pId_opportunity' ,$key);
		$quei = $this->db->get('dbopportunity');

		return $quei;
	}

	public function input_schedule($data)
	{
		$this->db->insert('dbschedule' ,$data);
	}
	

	public function get_contact($key)
	{
		$quei = "SELECT 	dbcontact.pId_contact, 
							dbcontact.sName_contact	
		FROM dbcontact
	    INNER JOIN dbcustomer
	        ON dbcontact.iId_customer = dbcustomer.pId_customer
	    INNER JOIN dbopportunity 
        	ON dbcustomer.pId_customer = dbopportunity.iId_customer
        WHERE dbopportunity.pId_opportunity = $key";

        $res = $this->db->query($quei);

        return $res;
	}	

	/* For dataschedule by id */
	public function get_contact_check()
	{
		$s = $this->db->get('dbcontact');
		return $s;
	}
	/* For dataschedule by id */

	public function get_contact_edit($key)
	{
		$que = "SELECT dbcontact.sName_contact
                FROM dbcontact
                INNER JOIN dbopportunity
                    ON dbcontact.iId_customer = dbopportunity.iId_customer
                INNER JOIN dbschedule 
                    ON dbopportunity.pId_opportunity = dbschedule.iId_opportunity
                WHERE dbschedule.pId_schedule = $key";
        $queri = $this->db->query($que);

        return $queri;
	}


	public function get_schedule_edit($key)
	{
		$this->db->where('pId_schedule' ,$key);
		$queri = $this->db->get('dbschedule');

		return $queri;
	}

	public function get_pidopp($key)
	{
		$this->db->where('pId_schedule' ,$key);
		$ipp = $this->db->get('dbschedule');

		foreach ($ipp->result() as $row) {
			$idopp= $row->iId_opportunity;
		}
		return $idopp;
	}

	public function edit_schedule($key,$data)
	{
		$this->db->where('pId_schedule' ,$key);
		$this->db->update('dbschedule' ,$data);
	}

	public function update_reschedule($key,$data)
	{
		$this->db->where('pId_schedule' ,$key);
		$this->db->update('dbschedule' ,$data);
	}

	public function input_reschedule($datae)
	{
		$this->db->insert('dbschedule_re' ,$datae);
	}
}	
