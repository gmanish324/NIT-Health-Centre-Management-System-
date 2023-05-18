<?php
if(!empty($_POST['submit'])){


$name=$_POST['name'];
$product=$_POST['product'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];


require("fpdf/fpdf.php");
$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont("Arial","B",36);
$pdf->Cell(0,10,"Invoice",1,1,'C');


$pdf->output();


}
?>