<?php
include('../App/fpdf182/fpdf.php');
$pdf = new FPDF('P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$fpdf->Image('../resources/fleet.jpg', 0, 0, $fpdf->w, $fpdf->h);
if (preg_match("/MSIE/i", $_SERVER["HTTP_USER_AGENT"])){
    header("Content-type: application/PDF");
} else {
    header("Content-type: application/PDF");
    header("Content-Type: application/pdf");
}
$pdf->Output();
exit;
  ?>