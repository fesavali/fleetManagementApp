
<?php
include('../App/fpdf182/fpdf.php');
$plate = '{{ $vehicle->vehicle_registration_number }}';
$pdf = new FPDF('P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$img1 = '../resources/fleet.jpg';
$pdf->Image($img1,0,0,211,300);

$pdf->Ln(-1);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x + 120, $y +3);
$pdf->SetFont('Times','BU',14);
$pdf->Cell(55, 5,"Serial No: $vehicle->serial", 0, 0);


$pdf->Ln(0);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x + 43, $y +106);
$pdf->SetFont('Times','',14);
// $pdf->Cell(55, 5, date("d/m/Y", strtotime($vehicle->created_at)).date("h:i a", strtotime($vehicle->created_at)), 0, 0);
$pdf->Ln(1);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x + 85, $y +20);
$pdf->SetFont('Times','',10);
$pdf->Cell(55, 5, $vehicle->vehicle_registration_number, 0, 0);
$pdf->Ln(2);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x + 85, $y +8);
$pdf->SetFont('Times','',12);
$pdf->Cell(55, 5, $vehicle->client_details, 0, 0);
$pdf->Ln(3);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x + 85, $y +7);
$pdf->SetFont('Times','',12);
$pdf->Cell(55, 5, $vehicle->vehicle_make, 0, 0);
$pdf->Ln(4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x + 85, $y +6);
$pdf->SetFont('Times','',12);
$pdf->Cell(55, 5, $vehicle->vehicle_model, 0, 0);
$pdf->Ln(5);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x + 85, $y +5);
$pdf->SetFont('Times','',12);
$pdf->Cell(55, 5, $vehicle->chassis_number, 0, 0);
$pdf->Ln(6);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x + 85, $y +4);
$pdf->SetFont('Times','',12);
$pdf->Cell(55, 5, $vehicle->engine_number, 0, 0);
$pdf->Ln(7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x + 85, $y +3);
$pdf->SetFont('Times','',12);
$pdf->Cell(55, 5, $vehicle->color, 0, 0);
$pdf->Ln(8);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x + 85, $y +2);
$pdf->SetFont('Times','',12);
$pdf->Cell(55, 5, $vehicle->other_interest, 0, 0);

$pdf->SetFont("Times","B",9);
if (preg_match("/MSIE/i", $_SERVER["HTTP_USER_AGENT"])){
    header("Content-type: application/PDF");
} else {
    header("Content-type: application/PDF");
    header("Content-Type: application/pdf");
}
$pdf->Output('I', 'AATrackingCertificate'.$vehicle->vehicle_registration_number.'.pdf', true);
exit;
  ?>