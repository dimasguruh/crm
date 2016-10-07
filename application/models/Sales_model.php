<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model
{
	public function insert_sales($data)
	{
		$this->db->insert('dbuser',$data);
	}


	public function get_sales()
	{
		$quei = "SELECT    pId_sales,
					       sNIK,	
					       sName_user,
					       sPhone_number,
					       sGender,
					       sPassword,
					       sUsername,
					       sFoto,
					       dRegister
				FROM dbuser
    			INNER JOIN dbtogender
        ON dbuser.iGender = dbtogender.pGender
        WHERE dbuser.iRole !=2 ";

        $queri = $this->db->query($quei);

        return $queri;
	}

	public function get_name($key)
	{
		$this->db->where('pId_sales' ,$key);
		$dts = $this->db->get('dbuser');
		foreach ($dts->result() as $row) {
			$ns = $row->sName_user;
		}

		return $ns;
	}

	public function get_comp($key)
	{
		$this->db->where('pId_customer' ,$key);
		$dtc = $this->db->get('dbcustomer');
		foreach ($dtc->result() as $row) {
			$nc = $row->sName_company;
		}

		return $nc;
	}

	public function get_datasales($key)
	{
		$this->db->where('iId_sales' ,$key);
		$this->db->select('*');
		$this->db->from('dbcustomer');
		$this->db->join('dbtostat_customer', 'dbcustomer.iStatus = dbtostat_customer.pStatus');
		$data = $this->db->get();

		return $data;
	}

	public function get_datacustomer($key)
	{
		$que = "SELECT dbcustomer.sName_company,
				dbcustomer.sIndustry,
				dbcustomer.sAdress_company,
				dbcustomer.sPhone_number,
				dbcustomer.sJne_cust_id,
				dbtostat_customer.sStatus
				FROM dbopportunity
				INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
				INNER JOIN dbtostat_customer
				ON dbcustomer.iStatus = dbtostat_customer.pStatus
				WHERE pId_opportunity = $key";

		$quei = $this->db->query($que);
		return $quei;
	}

	public function get_datasales_repp($key)
	{
		$que = "SELECT dbuser.sName_user,
				dbuser.sNIK,
				dbuser.sPhone_number,
				dbuser.iGender,
				dbtogender.sGender
				FROM dbopportunity
				INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
				INNER JOIN dbuser
				ON dbcustomer.iId_sales = dbuser.pId_sales
				INNER JOIN dbtogender
				ON dbuser.iGender = dbtogender.pGender
				WHERE pId_opportunity = $key ";

		$quei = $this->db->query($que);

		return $quei;
	}

	public function get_datacontact_repp($key)
	{
		$que = "SELECT dbcontact.sName_contact,
				dbcontact.sPhone_number,
				dbcontact.sPhone_number2,
				dbcontact.sPhone_number3,
				dbcontact.sEmail,
				dbtoposition.sName_position,
				dbtogender.sGender
				FROM dbopportunity
				INNER JOIN dbcontact
				ON dbopportunity.iContact = dbcontact.pId_contact
				INNER JOIN dbtoposition
				ON dbcontact.iPosition = dbtoposition.pPosition
				INNER JOIN dbtogender
				ON dbcontact.iGender = dbtogender.pGender
				WHERE dbopportunity.pId_opportunity = $key";
		
		$quei = $this->db->query($que);

		return $quei;
	}

	public function get_opp_repp($key)
	{
		$que = "SELECT dbopportunity.sOpportunity_name,
				dbopportunity.dForecast_amount,
				dbopportunity.dForecast_running,
				dbopportunity.sInformation,
				dbopportunity.sCompetitor,
				dbopportunity.dUpdated,
				dbtostat_opportunity.sStatus_opp,
				dbtoproduct_opp.sProduct,
				dbtoservice_opp.sService
				FROM dbopportunity
				INNER JOIN dbtostat_opportunity
				ON dbopportunity.iStatus = dbtostat_opportunity.pStatus_opp
				INNER JOIN dbtoproduct_opp
				ON dbopportunity.iProduct_type = dbtoproduct_opp.pProduct
				INNER JOIN dbtoservice_opp
				ON dbopportunity.iService_type = dbtoservice_opp.pService
		WHERE pId_opportunity = $key";

		$quei = $this->db->query($que);

		return $quei;
	}

	public function get_detailopp($key)
	{
		$que = "SELECT sStatus_opp,
					   sInfo,
					   dUpdated
				FROM dbopp_detail
				INNER JOIN dbtostat_opportunity
				ON dbopp_detail.iStatus = dbtostat_opportunity.pStatus_opp
				WHERE dbopp_detail.iId_opp = $key";
		$quei = $this->db->query($que);
		return $quei;
	}

	public function get_meeting_repp($key)
	{
		$que = "SELECT  dbmeeting.sSubject,
				dbmeeting.dMeeting
				FROM dbopportunity
				INNER JOIN dbmeeting
				ON dbopportunity.pId_opportunity = dbmeeting.iId_opportunity
				WHERE dbopportunity.pId_opportunity = $key";
		$quei = $this->db->query($que);

		return $quei;
	}

	public function get_detail($key)
	{
		$this->db->where('iId_customer' ,$key);
		$quei = $this->db->get('dbopportunity');

		return $quei;
	}

	public function summary($key)
	{
		$que = "SELECT dbcustomer.sName_company,
				dbopportunity.sOpportunity_name,
				dbopportunity.iStatus,
				dbtostat_opportunity.sStatus_opp,
				dbopportunity.dForecast_amount,
				dbopportunity.dForecast_running
				FROM dbopportunity
				INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
				INNER JOIN dbtostat_opportunity
				ON dbopportunity.iStatus = dbtostat_opportunity.pStatus_opp
				WHERE dbcustomer.iId_sales = $key
				ORDER BY dbopportunity.dForecast_running ASC";

		$quei = $this->db->query($que);
		return $quei;
	}	
	public function jan($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dForecast_running BETWEEN '2016-01-01' AND '2016-01-31' AND dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}
	public function feb($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dForecast_running BETWEEN '2016-02-01' AND '2016-02-29' AND dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}
	public function mar($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dForecast_running BETWEEN '2016-03-01' AND '2016-03-31' AND dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}
	public function apr($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dForecast_running BETWEEN '2016-04-01' AND '2016-04-30' AND dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}
	public function may($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dForecast_running BETWEEN '2016-05-01' AND '2016-05-31' AND dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}
	public function jun($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dForecast_running BETWEEN '2016-06-01' AND '2016-06-30' AND dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}
	public function jul($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dForecast_running BETWEEN '2016-07-01' AND '2016-07-31' AND dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}
	public function aug($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dForecast_running BETWEEN '2016-08-01' AND '2016-08-31' AND dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}
	public function sept($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dForecast_running BETWEEN '2016-09-01' AND '2016-09-30' AND dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}
	public function oct($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dForecast_running BETWEEN '2016-10-01' AND '2016-10-31' AND dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}
	public function nov($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dForecast_running BETWEEN '2016-11-01' AND '2016-11-30' AND dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}
	public function dec($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dForecast_running BETWEEN '2016-12-01' AND '2016-12-31' AND dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}

	public function get_pipe($key)
	{
		$quei = "SELECT SUM(probability) AS sProb FROM 
			(	
			SELECT dforecast_amount, dbopportunity.iStatus,
			CASE dbopportunity.iStatus 
			WHEN 1 THEN dforecast_amount * 0.10
			WHEN 2 THEN dForecast_amount * 0.30
			WHEN 3 THEN dForecast_amount * 0.50
			WHEN 4 THEN dForecast_amount * 0.95
			WHEN 5 THEN dForecast_amount * 0.70
			END AS probability

			FROM dbopportunity
			INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
			WHERE dbcustomer.iId_sales = $key
			) B";

		$que = $this->db->query($quei);

		foreach ($que->result() as $row) {
			$prob = $row->sProb;
		}
		return $prob;
	}

	public function get_cust()
	{
		$this->db->select('*');
		$this->db->from('dbcustomer');
		$this->db->join('dbuser', 'dbcustomer.iId_sales = dbuser.pId_sales');
		$this->db->join('dbtostat_customer', 'dbcustomer.iStatus = dbtostat_customer.pStatus');
		$this->db->join('dbtoknow', 'dbcustomer.iKnow_jne = dbtoknow.pKnow_jne');
		$data = $this->db->get();

		return $data;
	}

	public function get_idc($key)
	{
		$this->db->where('pId_customer' ,$key);
		$cust = $this->db->get('dbcustomer');

		return $cust;
	}

	public function det_cust($key)
	{
		$que = "SELECT * 
				FROM dbopportunity
				INNER JOIN dbtostat_opportunity 
				ON dbopportunity.iStatus = dbtostat_opportunity.pStatus_opp
				INNER JOIN dbtoproduct_opp
				ON dbopportunity.iProduct_type = dbtoproduct_opp.pProduct
				INNER JOIN dbtoservice_opp
				ON dbopportunity.iService_type = dbtoservice_opp.pService
				WHERE dbopportunity.iId_customer = $key";
		$quei = $this->db->query($que);

		return $quei;
	}

	public function get_act_sal($ids)
	{
		$quei = "SELECT dbschedule.sSubject,
				dbschedule.iStatus,
				dbcustomer.sName_company,
				dbschedule.sNoted,
				dbschedule.sLocation,
				dbschedule.dMeeting
				FROM dbschedule
				INNER JOIN dbopportunity
				ON dbschedule.iId_opportunity = dbopportunity.pId_opportunity
				INNER JOIN dbcustomer
				ON dbopportunity.iId_customer = dbcustomer.pId_customer
				WHERE dbcustomer.iId_sales = $ids AND dbschedule.iStatus !=2
				ORDER BY dbschedule.dMeeting ASC";

		    $res = $this->db->query($quei);
		    return $res;
	}

	public function get_meeting($key)
	{
		$que = "SELECT * FROM dbopportunity
				INNER JOIN dbmeeting
				ON dbopportunity.pId_opportunity = dbmeeting.iId_opportunity
				WHERE dbmeeting.iId_opportunity = $key";

		$quei = $this->db->query($que);

		return $quei;
	}

	public function get_detmeeting($key)
	{
		$this->db->where('pId_meeting' ,$key);
		$meet = $this->db->get('dbmeeting');

		return $meet;
	}

	public function get_filemeeting($key)
	{
		$que  = "SELECT * FROM dbmeeting
				 INNER JOIN dbfile_meeting
				 ON dbmeeting.pId_meeting = dbfile_meeting.iId_meeting
				 WHERE dbfile_meeting.iId_meeting = $key";

		$quei = $this->db->query($que);

		$x="";
		foreach ($quei->result() as $row) {
			$e = $row->sFile_name;

            $x.= ("<li>$e</li>");
		}

		return $x;
	}

	public function get_contmeeting($key)
	{
		$que = "SELECT * FROM dbmeeting
				INNER JOIN dbmeeting_detail_person
				ON dbmeeting.pId_meeting = dbmeeting_detail_person.iId_meeting
				INNER JOIN dbcontact
				ON dbmeeting_detail_person.iId_contact = dbcontact.pId_contact
				WHERE dbmeeting_detail_person.iId_meeting = $key";
		$quer = $this->db->query($que);

		$x="";
		foreach ($quer->result() as $row) {
			$e = $row->sName_contact;

            $x.= ("<li>$e</li>");
		}
		return $x;
	}
}