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
    $this->Cell(50,10,'LISTA DE TODOS LOS LECTORES AL MES',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->SetFont('Arial','',10);
   
    $this->Ln(15);
    $this->SetFont('Arial','B',12);
    $this->Cell(10,10, 'ID', 1, 0, 'C', 0);
    $this->Cell(35,10, 'LIBRO', 1, 0, 'C', 0);
    $this->Cell(25,10, 'FECHA', 1, 0, 'C', 0);
    $this->Cell(25,10, 'CI', 1, 0, 'C', 0);
    $this->Cell(30,10, 'NOMBRE', 1, 0, 'C', 0);
    $this->Cell(30,10, 'APELLIDO', 1, 0, 'C', 0);
    $this->Cell(28,10, 'DEVUELTO?', 1, 1, 'C', 0);
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
$buscar=$_POST['buscar'];
$consulta = "SELECT * FROM lectura WHERE fecha LIKE '%".$buscar."%'";
$resultado = mysqli_query($conex,$consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','I',9);
/*aqui se hara para traer los datos*/
while($row=$resultado->fetch_assoc()){
    $pdf->Cell(10,10, $row['id'], 1, 0, 'C', 0);
                if(isset($row['id_libro']))
                {
                    $dato_final="";
                    $inc = require_once("../conexion.php");
                    $consulta = "SELECT titulo FROM libro where libro.id=".$row['id_libro'];
                    $result = mysqli_query($conex,$consulta);
                    while($filas = $result->fetch_array()) {
                        $dato_final=$filas[0];
                    } 
                    $lib=$dato_final;
                }
    $pdf->Cell(35,10, $lib, 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['fecha'], 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['ci'], 1, 0, 'C', 0);
    $pdf->Cell(30,10, $row['nombre'], 1, 0, 'C', 0);
    $pdf->Cell(30,10, $row['apellido'], 1, 0, 'C', 0);
    $pdf->Cell(28,10, $row['devuelto'], 1, 1, 'C', 0);
}


$pdf->Output();
?>