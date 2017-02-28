<?php
define('FPDF_FONTPATH','include/fpdf/font/');
require("include/connect.php");
require('include/fpdf/fpdf.php');

$sql="SELECT * FROM tb_sale_detail ";
$q=mysql_query($sql);
$pdf=new FPDF();

// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');

// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');

// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');

// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');
 
//สร้างหน้าเอกสาร
$pdf->AddPage();


$pdf->SetFont('angsana','B',20);
$pdf->setXY( 10, 20  );
$pdf->Cell(0,0,iconv('UTF-8','cp874','ใบเสร็จรับเงิน/ใบกำกับภาษี'),0,'0','C');
$pdf->Ln(45);
$pdf->SetFillColor(204, 204, 204);
			$pdf->SetFont('angsana', 'B', 14);
			$pdf->Cell('10', '9',iconv('UTF-8','cp874','ลำดับ'), 1, 0, 'C', true); 
			$pdf->Cell('83', '9',iconv('UTF-8','cp874','รายการ'), 1, 0, 'C', true);
			$pdf->Cell('30', '9',iconv('UTF-8','cp874','จำนวน'), 1, 0, 'C', true);
			$pdf->Cell('25', '9',iconv('UTF-8','cp874','หน่วยละ'), 1, 0, 'C', true);
			$pdf->Cell('30', '9',iconv('UTF-8','cp874','ราคา'), 1, 0, 'C', true);

			$pdf->Ln();
			$pdf->SetFillColor(0, 0, 0);
			while ($res=mysql_fetch_array($q)){
					$pdf->Cell('10', '9',$res['pro_id'], 1, 0, 'C', false); 
					$pdf->Cell('83', '9',$res['pro_id'], 1, 0, 'L', false);
					$pdf->Cell('30', '9',$res['sale_unit'], 1, 0, 'R', false);
					$pdf->Cell('25', '9',$res['sale_price'], 1, 0, 'R', false);
					$pdf->Cell('30', '9',$res['sale_price']*$res['sale_unit'], 1, 0, 'R', false);
				$pdf->Ln();
				}
$pdf->Output();
?>