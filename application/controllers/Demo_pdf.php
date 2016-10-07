<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo_pdf extends CI_Controller
{
/*
	public $data;
	public function __construct()
	{
		parent::__construct();

		require_once(APPPATH .'third_party/dompdf/dompdf_config.inc.php');

		$this->data = [
			['P01','Pensil',6000],
			['P02','Spidol',8500],
			['P03','Penggaris',9000]
		];
	}

	public function index()
	{
		$this->load->view('demo_pdf' ,['data'=>$this->data]);
	}

	public function create_pdf()
	{
		$str  = "<h2>Daftar Produk</h2>";
		$str .= "<table border=\"1\">";
		$str .= "<tr><td>Kode</td><td>Produk</td><td>Harga</td></tr>";
		foreach ($this->data as $row) {
			$str .="<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
		}

		$str .= "</table>";

		$dompdf = new Dompdf();
		$dompdf->load_html($str);
		$dompdf->set_paper('A4');	
		$dompdf->render();
		$dompdf->stream("produk.pdf");
	}
*/		

	public function tes_pdf()
	{		
		$this->load->library('fpdf.php');	
		$this->fpdf->FPDF('P','cm','A4');
		$this->fpdf->AddPage();
		$this->fpdf->SetFont('Arial','',10);
		$teks = "Ini hasil Laporan PDF menggunakan Library FPDF di CodeIgniter";
		$this->fpdf->Cell(3, 0.5, $teks, 1, '0', 'L', true);
		$this->fpdf->Ln();$this->fpdf->Output();
	}
}