<?php 
include('fpdf.php'); 
include('fpdi.php'); 

// initiate FPDI 
$pdf =& new FPDI(); 
// add a page 
$pdf->AddPage(); 
// set the sourcefile 
$pdf->setSourceFile('coupon.pdf'); 
// import page 1 
$tplIdx = $pdf->importPage(1); 
// use the imported page as the template 
$pdf->useTemplate($tplIdx, 0, 0); 

// now write some text above the imported page 
$pdf->AddFont('Hanalei','','Hanalei-Regular.php');
$pdf->SetFont('Hanalei','','Hanalei-Regular.php'); 
$pdf->SetTextColor(255,0,0); 
$pdf->SetXY(40, 46.5); 
$pdf->Write(0, "This is just a simple text"); 

$pdf->Output('newpdf.pdf', 'D'); 
?>