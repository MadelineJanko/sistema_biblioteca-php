<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    
    $this->Image('../img/logobaul.jpg',10,8,30);
    $this->Image('../img/logobaul.jpg',170,8,30);
    
    $this->Image('../img/logo2.jpg',89,280,27);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    
    // Título
    $this->Ln(10);

    
    $this->Cell(70);
    $this->Cell(50,10,'LISTA DE TODOS LOS LIBROS REGISTRADOS',0,0,'C');
    // Salto de línea
    $this->Ln(25);

    $this->SetFont('Arial','B',10);
    $this->Cell(8,10, 'ID', 1, 0, 'C', 0);
    $this->Cell(50,10, 'TITULO', 1, 0, 'C', 0);
    $this->Cell(22,10, 'IDIOMA', 1, 0, 'C', 0);
    $this->Cell(38,10, 'AUTOR', 1, 0, 'C', 0);
    $this->Cell(29,10, 'GENERO', 1, 0, 'C', 0);
    $this->Cell(20,10, 'CANTIDAD', 1, 0, 'C', 0);
    $this->Cell(22,10, 'DISPONIBLE', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

require '../conexion.php';
$consulta = "SELECT * FROM libro";
$resultado = mysqli_query($conex,$consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','I',9);
/*aqui se hara para traer los datos*/
while($row=$resultado->fetch_assoc()){
    $pdf->Cell(8,10, $row['id'], 1, 0, 'C', 0);
    $pdf->Cell(50,10, $row['titulo'], 1, 0, 'C', 0);
    $pdf->Cell(22,10, $row['idioma'], 1, 0, 'C', 0);
    $pdf->Cell(38,10, $row['autor'], 1, 0, 'C', 0);
    $pdf->Cell(29,10, $row['genero'], 1, 0, 'C', 0);
    $pdf->Cell(20,10, $row['n_orden'], 1, 0, 'C', 0);
    $pdf->Cell(22,10, $row['n_actual'], 1, 1, 'C', 0);
}


$pdf->Output();
?>