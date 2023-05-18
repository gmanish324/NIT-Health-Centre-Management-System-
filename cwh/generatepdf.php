<?php
require_once('TCPDF-main/tcpdf.php');
require 'config.php';

if(isset($_GET['pdf_report_generate'])){
    $Roll=$_GET['Roll'];

    $select="SELECT name, roll, age, phone, diagnosis, allergy, medicine, date1, date2 FROM medical_record WHERE roll='$Roll'";

    $query=mysqli_query($conn,$select);

    while($row=mysqli_fetch_array($query)){
        $name=$row['name'];
        $roll=$row['roll'];
        $age=$row['age'];
        $phone=$row['phone'];
        $diagnosis=$row['diagnosis'];
        $allergy=$row['allergy'];
        $medicine=$row['medicine'];
        $date1=$row['date1'];
        $date2=$row['date2'];
        
        


    }


}

class PDF extends TCPDF
{
    public function Header()
    {
        $this->Ln(5);
        $this->SetFont('helvetica','B','20 ');
        $this->Cell(189,5,'NATIONAL INSTITUTE OF TECHNOLOGY',0,1,'C');

        $this->SetFont('helvetica','','10 ');
        $this->Cell(189,3,'ANDHRA PRADESH-TADEPALLIGUDEM -534101',0,1,'C');


        $this->Ln(5);

        $this->SetFont('helvetica','B','15 ');
        $this->Cell(189,3,'MOTHER TERESA HEALTH CENTRE',1,1,'C');

       


        


        // $html='<p style="text-align:justify">The medical
        // certificate is digitally signed by the Doctor</p>';
        // $this->WriteHTML($html,true,false,true,false,'');
    

  

        
        

        
    }

    public function Footer()
    {
        
    }


}


// create new PDF document
$pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);



// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Manish Kumar');
$pdf->SetTitle('National Institute of Technology,Andhra Pradesh');
$pdf->SetSubject('Medical Certificate');
$pdf->SetKeywords('');


$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}


// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);





// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();


$pdf->ln(18);
$pdf->setFont('times','',15);
$pdf->Cell(130,5,'Name: '.$name.'',0,0);

// $pdf->Line(5, 10, 80, 30, $style);


$pdf->Cell(89,5,'Roll No: '.$Roll.'',0,0);

$pdf->Ln(10);

$pdf->Cell(130,5,'Age: '.$age.'',0,0);
$pdf->Cell(89,5,'Phone : '.$phone.'',0,0);

$style2 = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));

$pdf->Line(500, 70, 0, 70, $style2);
$pdf->Ln(25);
$pdf->setFont('times','B',20);
$pdf->Cell(130,5,'Diagnosis: ',0,0);



$pdf->setFont('times','',20);
$pdf->Cell(89,5,' '.$diagnosis.'',0,0);

$pdf->Ln(20);
$pdf->setFont('times','B',20);
$pdf->Cell(130,5,'Rx: ',0,0);



$pdf->setFont('times','',20);
$pdf->Cell(89,5,' '.$medicine.'',0,0);

$pdf->Ln(20);
$pdf->setFont('times','B',20);
$pdf->Cell(130,5,'Known allergies: ',0,0);



$pdf->setFont('times','',20);
$pdf->Cell(89,5,' '.$allergy.'',0,0);

// $pdf->Line(500, 70, 0, 70, $style2);




$pdf->ln(20);


$pdf->setFont('times','B',20);
$pdf->Write(0, 'Acknowledgement', '', 0, 'C', true, 0, false, false, 0);
$pdf->Line(145, 150, 60, 150, $style2);
$pdf->ln(10);
// create some HTML content
$pdf->setFont('times','',15);
$pdf->Cell(2000,0, 'I am hereby confirming that '.$name.' was absent from '.$date1.' to '.$date2.'',0,0);
$pdf->ln(5);
$pdf->Cell(200,0,'Because of '.$diagnosis.','.$name.' could not attend the classes.',0,0);


$pdf->ln(5);
$pdf->Cell(200,0,'So,I request you to give '.$name.' the required attendance',0,0);


$pdf->ln(25);

$pdf->setFont('times','',15);
$pdf->Cell(130,5,'Date: '.$date2.'',0,0);



$pdf->setFont('times','B',20);
$pdf->Cell(89,5,'Dr. Dhrama Teja'.'',0,0);
$pdf->ln(5);
$pdf->setFont('times','',10);
$pdf->ln(4);
// $pdf->Cell(60,5,'Digitally Signed',0,0);
$pdf->Write(0, 'Digitally Signed', '', 0, 'R', true, 0, false, false, 0);













// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
