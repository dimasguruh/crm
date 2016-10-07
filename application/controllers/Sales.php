<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->secure_model->get_secure();
		$this->load->model('Sales_model');	
	}

	public function index()
	{		
		$val['content'] 	 = 'tampilan_sales/tampilan_datasales';
		$val['menu']		 = 'tampilan_menu_admin';
		$val['title'] 		 = 'Sales';
		$val['subtitle']	 = 'List of Sales';
		$val['datanama']	 =  $this->session->userdata('nama');
		$val['datapos']	 	 =  $this->session->userdata('pos');
		$val['datafoto']	 =  $this->session->userdata('foto');
		
		$val['data']		 =  $this->Sales_model->get_sales();

		$this->load->view('tampilan_home',$val);
	}

	public function tambah()
	{
		$this->secure_model->get_secure();
		$val['menu']		 = 'tampilan_menu_admin';
		$val['content'] 	 = 'tampilan_sales/tambah_datasales';
		$val['title'] 		 = 'Sales';
		$val['subtitle']	 = 'Add Sales';
		$val['datanama']	 =  $this->session->userdata('nama');
		$val['datafoto']	 =  $this->session->userdata('foto');

		$this->load->view('tampilan_home',$val);
	}

	public function simpan()
	{
		$this->secure_model->get_secure();

		$date = 'y-m-d';
		$dt = date($date);
		$pw = $this->input->post('pwd');
		$pwd = md5($pw);
		$config['upload_path']          = 'uploaded/sales_pict';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width'] 			= 150;
		$config['max_height'] 			= 150;
		$config['min_width'] 			= 100;
		$config['min_height'] 			= 100;
		
        $this->load->library('upload', $config);
            
        $this->upload->do_upload();
        $hasil= $this->upload->data();

        $sizeg = $hasil['file_size'];

        if($sizeg>10)
        {
        	echo "File Is Too Big";
        	return false;
        }

		$data 						= array('sFoto'=>$hasil['file_name']);
		$data['sNIK']				= $this->input->post('nik');
		$data['sName_user']			= $this->input->post('name');
		$data['iGender']			= $this->input->post('gender');
		$data['sPhone_number']		= $this->input->post('phone');
		$data['sUsername']			= $this->input->post('un');
		$data['sPassword']			= $pwd;
		$data['iRole']				= 3;
		$data['dRegister']			= $dt;

		$this->load->model('sales_model');

		$this->sales_model->insert_sales($data);

		$this->session->set_flashdata('info', 'Data Has Saved');
			
		redirect('sales/tambah');
	}

	public function datasales()
	{
		$this->secure_model->get_secure();
		$this->load->model('Sales_model');
		$key = $this->uri->segment(3);
		$ns = $this->Sales_model->get_name($key);
		$val['content'] 	 = 'tampilan_sales/tampilan_data_custsales';
		$val['menu']		 = 'tampilan_menu_admin';
		$val['title'] 		 = "Data Customer Of $ns";
		$val['subtitle']	 = '';
		$val['datanama']	 =  $this->session->userdata('nama');
		$val['datapos']	 	 =  $this->session->userdata('pos');
		$val['datafoto']	 =  $this->session->userdata('foto');

		$val['dtcust']		= $this->Sales_model->get_datasales($key);

		$this->load->view('tampilan_home' ,$val);
	} 

	public function detail()
	{
		$this->secure_model->get_secure();
		$this->load->model('Sales_model');
		$key  = $this->uri->segment(3);
		$det  = $this->Sales_model->get_detail($key);
		$nc = $this->Sales_model->get_comp($key);

		$val['content'] 	 = 'tampilan_sales/tampilan_detail';
		$val['menu']		 = 'tampilan_menu_admin';
		$val['title'] 		 = "Detail Opportunity Of $nc ";
		$val['subtitle']	 = '';
		$val['datanama']	 =  $this->session->userdata('nama');
		$val['datapos']	 	 =  $this->session->userdata('pos');
		$val['datafoto']	 =  $this->session->userdata('foto');
		$val['detail']		 =  $det;

		$this->load->view('tampilan_home' ,$val);
	}

	public function report()
	{
		$this->secure_model->get_secure();
		$this->load->model('Sales_model');
		$key  = $this->uri->segment(3);
		

		$val['content'] 	 = 'tampilan_sales/tampilan_report';
		$val['menu']		 = 'tampilan_menu_admin';
		$val['title'] 		 = "Report";
		$val['subtitle']	 = "";
		$val['datanama']	 =  $this->session->userdata('nama');
		$val['datapos']	 	 =  $this->session->userdata('pos');
		$val['datafoto']	 =  $this->session->userdata('foto');
		$val['datacust']	 =  $this->Sales_model->get_datacustomer($key);
		$val['datasal']		 = 	$this->Sales_model->get_datasales_repp($key);
		$val['datacon']		 =  $this->Sales_model->get_datacontact_repp($key);
		$val['dataopp']		 =  $this->Sales_model->get_opp_repp($key);
		$val['datame']		 =  $this->Sales_model->get_meeting_repp($key);
		$val['dataopdet'] 	 =  $this->Sales_model->get_detailopp($key);
		$val['idopp']		 =  $key;

		$this->load->view('tampilan_home',$val);
	}

	public function report_pdf()
	{
		$this->load->library('libpdf');
		$this->load->model('Sales_model');
		$key  = $this->uri->segment(3);		
		$val['datacust']	 = $this->Sales_model->get_datacustomer($key);
		$val['datasal']		 = $this->Sales_model->get_datasales_repp($key);
		$val['datacon']		 = $this->Sales_model->get_datacontact_repp($key);
		$val['dataopp']		 = $this->Sales_model->get_opp_repp($key);
		$val['dataopdet'] 	 = $this->Sales_model->get_detailopp($key);
		$val['datame']		 = $this->Sales_model->get_meeting_repp($key);
		$this->load->view('tampilan_sales/tampilan_report_pdf' ,$val);
	}

	public function activity()
	{
		$this->secure_model->get_secure();
		$this->load->model('Sales_model');
		$val['content'] 	 = 'tampilan_sales/tampilan_activity';
		$val['menu']		 = 'tampilan_menu_admin';
		$val['title'] 		 = 'Sales Activity';
		$val['subtitle']	 = '';
		$val['datanama']	 =  $this->session->userdata('nama');
		$val['datapos']	 	 =  $this->session->userdata('pos');
		$val['datafoto']	 =  $this->session->userdata('foto');
		$val['sales']		 =  $this->Sales_model->get_sales();

		$this->load->view('tampilan_home' ,$val);
	}

	public function pars_act()
	{
		$this->secure_model->get_secure();
		$this->load->model('Sales_model');
		$ids = $this->input->post('idsj');

		$val['dsal']	= $this->Sales_model->get_act_sal($ids);

		$this->load->view('tampilan_sales/tampilan_activity_pars' ,$val);
	}

	public function summary()
	{
		$this->secure_model->get_secure();
		$this->load->model('Sales_model');
		$key  = $this->uri->segment(3);
		
		$val['content'] 	 = 'tampilan_sales/tampilan_summary';
		$val['menu']		 = 'tampilan_menu_admin';
		$val['title'] 		 = 'Summary Pipeline';
		$val['subtitle']	 = '';
		$val['datanama']	 =  $this->session->userdata('nama');
		$val['datapos']	 	 =  $this->session->userdata('pos');
		$val['datafoto']	 =  $this->session->userdata('foto');
		$val['summary']		 =  $this->Sales_model->summary($key);
		$val['jan']			 =  $this->Sales_model->jan($key);
		$val['feb']			 =  $this->Sales_model->feb($key);
		$val['mar']			 =  $this->Sales_model->mar($key);
		$val['apr']			 =  $this->Sales_model->apr($key);
		$val['may']			 =  $this->Sales_model->may($key);
		$val['jun']			 =  $this->Sales_model->jun($key);
		$val['jul']			 =  $this->Sales_model->jul($key);
		$val['aug']			 =  $this->Sales_model->aug($key);
		$val['sept']		 =  $this->Sales_model->sept($key);
		$val['oct']			 =  $this->Sales_model->oct($key);
		$val['nov']			 =  $this->Sales_model->nov($key);
		$val['dec']			 =  $this->Sales_model->dec($key);
		$val['pipe']		 =  $this->Sales_model->get_pipe($key);

		$this->load->view('tampilan_home' ,$val);
	}

	public function customer()
	{
		$key  = $this->uri->segment(3);		
		$this->secure_model->get_secure();
		$this->load->model('Sales_model');


		$val['content'] 	 = 'tampilan_sales/tampilan_custperform';
		$val['menu']		 = 'tampilan_menu_admin';
		$val['title'] 		 = 'Customer Performance';
		$val['subtitle']	 = '';
		$val['datanama']	 =  $this->session->userdata('nama');
		$val['datapos']	 	 =  $this->session->userdata('pos');
		$val['datafoto']	 =  $this->session->userdata('foto');
		$val['datacus']		 =  $this->Sales_model->get_cust();

		$this->load->view('tampilan_home' ,$val);
	}

	public function export()
	{

		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=export_dt.xls");
		include_once($this->customer_export());
	}

	public function det_cust()
	{
		$key  = $this->uri->segment(3);
		$this->secure_model->get_secure();
		$this->load->model('Sales_model');

		$cust = $this->Sales_model->get_idc($key);

		foreach ($cust->result() as $row) {
			$nc  = $row->sName_company;
			$jci = $row->sJne_cust_id;
		}

		$val['content'] 	 = 'tampilan_sales/tampilan_detail_cust';
		$val['menu']		 = 'tampilan_menu_admin';
		$val['title'] 		 =  $nc;
		$val['subtitle']	 =  $jci;
		$val['datanama']	 =  $this->session->userdata('nama');
		$val['datapos']	 	 =  $this->session->userdata('pos');
		$val['datafoto']	 =  $this->session->userdata('foto');
		$val['datacus']		 =  $this->Sales_model->det_cust($key);

		$this->load->view('tampilan_home' ,$val);
	}

	public function meeting()
	{
		$key = $this->uri->segment(3);
		$val['content'] 	 = 'tampilan_sales/tampilan_meeting';
		$val['menu']		 = 'tampilan_menu_admin';
		$val['title'] 		 =  "Meeting List";
		$val['subtitle']	 =  "";
		$val['datanama']	 =  $this->session->userdata('nama');
		$val['datapos']	 	 =  $this->session->userdata('pos');
		$val['datafoto']	 =  $this->session->userdata('foto');
		$val['datameet']	 =  $this->Sales_model->get_meeting($key);

		$this->load->view('tampilan_home' ,$val);
	}

	public function meeting_file()
	{
		$key = $this->uri->segment(3);
		$val['content'] 	 = 'tampilan_sales/tampilan_meetingfile';
		$val['menu']		 = 'tampilan_menu_admin';
		$val['title'] 		 =  "Meeting Detail";
		$val['subtitle']	 =  "";
		$val['datanama']	 =  $this->session->userdata('nama');
		$val['datapos']	 	 =  $this->session->userdata('pos');
		$val['datafoto']	 =  $this->session->userdata('foto');
		$val['dmeet']		 =  $this->Sales_model->get_detmeeting($key);
		$val['dfile']		 =  $this->Sales_model->get_filemeeting($key);
		$val['dcont']		 =  $this->Sales_model->get_contmeeting($key);

		$this->load->view('tampilan_home' ,$val);
	}

	public function vd()
	{
		$this->load->view('footer');
	}

	public function download()
	{
		$this->load->helper('download');
		force_download('uploaded/meeting_file/cewe.jpg' ,NULL);
	}
}