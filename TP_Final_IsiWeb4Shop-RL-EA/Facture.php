<?php
session_start();
require('fpdf/fpdf.php');
require_once "php/appelBD.php"; 
$total_panier = $_SESSION['montanttot']; 
header('Content-Type: text/html; charset=UTF-8');
$conn = Connexion::getConnexion(); 


class PDF extends FPDF{
    function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
        }

    function Header()
        {
            global $title;
            $this->SetFont('Arial','B',15);
            $w = $this->GetStringWidth($title)+6;
            $this->SetX((210-$w)/2);
            $this->SetDrawColor(0,80,180);
            $this->SetFillColor(230,230,0);
            $this->SetTextColor(220,50,50);
            $this->SetLineWidth(1);
            $this->Ln(10);
        }

}

$pdf = new PDF( 'P', 'mm', 'A4' );

$pdf->AddPage();
$pdf->SetFont('Times','',30);
$title = 'Facture de la commande'; 
$pdf->Cell(190,30,$title,1,1,'C');

$pdf->SetFont('Times','B',16);
$pdf->Ln(6); 
$pdf->Cell(68,10,'',0,0);
$pdf->Ln(6); 

$pdf->SetFont('times', 'B', 14);
$pdf->Cell(90, 5, utf8_decode('Vos coordonnées'), 0, 1); 
$pdf->SetFont('times', '', 12);

       $pdf->Cell(10, 5, '', 0, 0);
       $pdf->Cell(90, 5, utf8_decode($_SESSION['forname'].' '.$_SESSION['surname']) , 0, 1);
        
        $pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, utf8_decode($_SESSION["add1"]), 0, 1);

		$pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, utf8_decode($_SESSION["add2"]), 0, 1);
		
		$pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, utf8_decode($_SESSION["add3"]), 0, 1);

        $pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, utf8_decode($_SESSION["postcode"]) , 0, 1);
    
        $pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, utf8_decode($_SESSION["email"]), 0, 1);

        $pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, utf8_decode($_SESSION["phone"]), 0, 1);

        $pdf->Cell(189, 10, '', 0, 1); 

        $pdf->SetFont('Arial', 'B', 14);

        $pdf->Cell(90,5,'Moyen de paiement : Cheque',0,1,'C');

$pdf->SetFont('Times','',20);
$pdf->Ln(6); 
$title2 = 'Produits commandés :'; 
$pdf->Cell(190,10,utf8_decode($title2),1,1,'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(130, 5, 'Produit', 1, 0);
$pdf->Cell(35, 5,'Prix' , 1, 0);
$pdf->Cell(25, 5,  utf8_decode('Quantité'), 1, 1); 

	for ($i=0 ;$i < $nbArticlestot ; $i++) { //Variable $nbArticlestot non déclarée ici
	$pdf->Cell(130, 5, utf8_decode($_SESSION['panier']['libelleProduit'][$i]), 1, 0);
    $pdf->Cell(35, 5, ''.utf8_decode($_SESSION['panier']['prixProduit'][$i]).utf8_decode('€'), 1, 0);
    $pdf->Cell(25, 5, number_format($_SESSION['panier']['qteProduit'][$i]), 1, 1);
}

$pdf->SetAutoPagebreak(False);
$pdf->SetMargins(0,0,0);

$pdf->Output();
 
?>