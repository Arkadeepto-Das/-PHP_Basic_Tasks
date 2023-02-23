<?php
session_start();
?>

<?php
require('fpdf185/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);
$pdf->Image('uploads/background.png',10,10,30,30);
$pdf->Cell(80,10,$_SESSION["fname"],0,0,'R');
$pdf->Cell(40,10,$_SESSION["lname"],0,1,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(77.5,10,'Phone number :',0,0,'R');
$pdf->Cell(6,10,$_SESSION["code"],0,0,'L');
$pdf->Cell(28,10,$_SESSION["number"],0,1,'C');
$pdf->Cell(65,10,'Email-ID :',0,0,'R');
$pdf->Cell(60,10,$_SESSION["email"],0,1,'L');
$pdf->Ln(15);
$pdf->Cell(95,10,'Subject',1,0,'C');
$pdf->Cell(95,10,'Marks',1,1,'C');
foreach($_SESSION["result"] as $key=>$val) {
  $pdf->Cell(95,10,$key,1,0,'C');
  $pdf->Cell(95,10,$val,1,1,'C');
}
$pdf->Output('D','Result.pdf');
?>
