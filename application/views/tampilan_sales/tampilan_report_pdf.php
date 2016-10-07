<?php
function uang($amount)
{
	$curr = "Rp " . number_format($amount,2,',','.');
	return $curr;
}
?>
<?php

$pdf = new FPDF('L');
$pdf -> AddPage();

$pdf-> SetFont('Arial','',12);

$teks = "Sales Report";
$tgl  = date('d F Y') ;
$header = array(
				array('label'=>$teks),
				array('label'=>$tgl)
				);

foreach ($header as $kolom) {
	$pdf->Cell(230,5,$kolom['label'],0,0,'L');
}

//Data Customer
foreach ($datacust->result() as $row) {
	$nc   = $row->sName_company;
	$ind  = $row->sIndustry;
	$ac   = $row->sAdress_company;
	$ph   = $row->sPhone_number;
	$jci  = $row->sJne_cust_id;
	$stat = $row->sStatus;
}
$customer = array(
				   array('dtc'=>$nc.' - '.$ind),
				   array('dtc'=>$ac),
				   array('dtc'=>$ph),
				   array('dtc'=>$jci),
				   array('dtc'=>$stat)
				   );

//Data Sales
foreach ($datasal->result() as $row) {
  $name = $row->sName_user;
  $gen  = $row->sGender;
  $nik 	= $row->sNIK;
  $phs 	= $row->sPhone_number;
}
$sales = array(
				   array('dts'=>$name.' - '.$nik),
				   array('dts'=>$gen),
				   array('dts'=>$phs)
				   );

//Data Contact
foreach ($datacon->result() as $row) {
  $namecon = $row->sName_contact;
  $phone   = $row->sPhone_number;
  $phone2  = $row->sPhone_number2;
  $email   = $row->sEmail;
  $pos 	   = $row->sName_position;
  $gend    = $row->sGender;
}
$contact = array(
				   array('dtco'=>$namecon.' - '.$pos),
				   array('dtco'=>$gend),
				   array('dtco'=>$phone),
				   array('dtco'=>$email)
				   );

//Head Table
$headt = array(
					array('hdt'=>"Opportunity Name"),
					array('hdt'=>"Product Type"),
					array('hdt'=>"Service Type"),
					array('hdt'=>"Forecast Amount"),
					array('hdt'=>"Forecast Running"),
					array('hdt'=>"Competitor")
				);

//Data Opportunity
foreach ($dataopp->result() as $row) {
    $oppn   = $row->sOpportunity_name;
    $frn    = $row->dForecast_running;
    $inf    = $row->sInformation;
    $amount = $row->dForecast_amount;
    $compt  = $row->sCompetitor;
    $upd 	= $row->dUpdated;
    $stat   = $row->sStatus_opp;
    $prod   = $row->sProduct;
    $serv   = $row->sService;
}
	$dr   = $row->dForecast_running;
	$drun = date('d M Y', strtotime($dr));
	$du   = $row->dUpdated;
	$dupd = date('d M Y', strtotime($du));

$oppr = array(
				array('dtopp'=>$oppn),
				array('dtopp'=>$prod),
				array('dtopp'=>$serv),
				array('dtopp'=>uang($amount)),
				array('dtopp'=>$drun),
				array('dtopp'=>$compt)
			 );

//Data Detail Opportunity



$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(120,10,"Client",0,0,"L");
$pdf->Cell(100,10,"Sales",0,0,"L");
$pdf->Cell(70,10,"PIC Project",0,1,"L");

//Row1->Client
$pdf->setY(42);
foreach($customer as $kolom){
	$pdf->Cell(70,5,$kolom['dtc'],0,1,'L');
}

//Row2->Sales
$pdf->setXY(130,42);
foreach ($sales as $kolom) {
	$pdf->Cell(10,5,$kolom['dts'],0,1,'L');
	$pdf->setX(130);
}


//Row3->PIC Project
$pdf->setXY(230,42);
foreach ($contact as $kolom) {
$pdf->Cell(10,5,$kolom['dtco'],0,1,'L');
$pdf->setX(230);
}

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

//Row4-> Header Table
$pdf->setX(3);
foreach ($headt as $kolom) {
	$pdf->Cell(50,10,$kolom['hdt'],0,0,"L");
}
$pdf->Ln();
$pdf->setX(3);
//Row5-> Isi Tabel
foreach ($oppr as $kolom) {
	$pdf->Cell(50,10,$kolom['dtopp'],0,0,"L");
}

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->setX(3);


//Row6-> Detail Opp
$pdf->setX(10);
$pdf->Cell(70,10,"INFORMATION",0,1,"L");

foreach ($dataopdet->result() as $row) {
	$sstatd[] = $row->sStatus_opp;
	$sinfod[] = $row->sInfo;
	$sdupd[] = $row->dUpdated;
}

for ($i=0; $i<=count($sstatd)-1; $i++) { 

	$statd = $sstatd[$i];
	$infod = $sinfod[$i];
	$dupd  = $sdupd[$i];	
	$ddt   = date('d F Y',strtotime($dupd));
	$oppdet[$i] = array(
					array('dtdopp'=>"Sales Cycle: $statd"),
					array('dtdopp'=>"Comment: $infod"),
					array('dtdopp'=>"Last Update: $ddt")
					);

	$pdf->setX(10);
	foreach ($oppdet[$i] as $kolom) {
		$pdf->Cell(50,5,$kolom['dtdopp'],0,1,"L");
		$pdf->setX(10);
	}	
	$pdf->Ln();
}

//Row7->Meeting
$pdf->setXY(180,125);
$pdf->Cell(70,10,"MEETING",0,1,"L");

$headm = array(
					array('hdm'=>"Meeting Subject"),
					array('hdm'=>"Meeting Date")
			  );

$pdf->setXY(180,133);
foreach ($headm as $kolom) {
	$pdf->Cell(60,10,$kolom['hdm'],0,0,"L");
}

foreach ($datame->result() as $row) {	
	$sub[] = $row->sSubject;
	$meet[] = $row->dMeeting;
}

$pdf->setXY(180,143);
for($i=0; $i<=count($sub)-1; $i++) { 

	$dsub  = $sub[$i];
	$dmeet = $meet[$i];

	$bodym[$i]= array(
						array('bdm'=>"$dsub"),
						array('bdm'=>"$dmeet")
			 );

	foreach ($bodym[$i] as $kolom) {
	$pdf->Cell(60,8,$kolom['bdm'],0,0,"L");
	}
	$pdf->Ln();
	$pdf->setX(180);

}
/*		
foreach ($datame->result() as $row) {
	$dme[] 	 = $row->sSubject;
	$dupd[]  = $row->dMeeting;
}	

for ($i=0; $i<=count($dme)-1; $i++) { 
	
	$dsub =  $dme[$i];
	$du   =  $dupd[$i];
	$dup = date('d F Y',strtotime($du));
	
	$meet[$i] = array(
					array('dtr'=>"$dsub"),
					array('dtr'=>"$dup"),
					);

	$pdf->setXY(180,135);
	foreach ($meet[$i] as $kolom) {
		$pdf->Cell(50,5,$kolom['dtr'],0,1,"L");
		$pdf->setX(180);
	}	
}
*/
$pdf->output();