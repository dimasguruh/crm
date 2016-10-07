<?php 
if ( !defined('BASEPATH')) exit();
class Libpdf
{
	function __construct()
	{
		require_once APPPATH.'/libraries/fpdf/fpdf.php';
	}
}