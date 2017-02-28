<?php
define('FPDF_FONTPATH','include/fpdf/font/');
require("include/connect.php");
require('include/fpdf/fpdf.php');
/*
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
$pdf->Output();*/
$pdf=new FPDF();
$pdf->AddFont('angsana','','angsa.php');
$pdf->AddPage();
$pdf->SetFont('angsana','',14);
 
  $pdf->Cell(50,5,'',0,1,'C');
  $pdf->Cell(50,5,'',0,0,'C');
  $pdf->Cell(75 ,10, iconv( 'UTF-8','cp874' ,'ใบเสร็จรับเงิน/ใบกำกับภาษี'),1,1,'C');
  $pdf->Cell(50,5,'',0,1,'C',0);//เว้นบรรทัด
  $pdf->Cell(13,8,iconv( 'UTF-8','cp874' ,'บริษัท : '),0,0,'R' );
  $pdf->Cell(110,8,iconv( 'UTF-8','cp874' ,'Company'),0,0,'' );

  $pdf->Cell(40,8,iconv( 'UTF-8','cp874' ,'No : '),0,0,'R' );
  $pdf->Cell(20,8,iconv( 'UTF-8','cp874' ,'1'),0,1,'' );

  $pdf->Cell(13 , 8, iconv( 'UTF-8','cp874' ,'ที่อยู่ : '),0,0,'R' );
  $pdf->Cell(110 , 8, iconv( 'UTF-8','cp874' ,'Address'),0,0,'L' );

  $pdf->Cell(40,8,iconv( 'UTF-8','cp874' ,'Date : '),0,0,'R' );
  $pdf->Cell(20,8,iconv( 'UTF-8','cp874' ,'1/33/3333'),0,1,'' );

  $pdf->Cell(13 , 8, iconv( 'UTF-8','cp874' ,'โทร : '),0,0,'R' );
  $pdf->Cell(30 , 8, iconv( 'UTF-8','cp874' ,'087-5469611'),0,0,'L' );
  $pdf->Cell(13 , 8, iconv( 'UTF-8','cp874' ,'Fax : '),0,0,'R' );
  $pdf->Cell(30 , 8, iconv( 'UTF-8','cp874' ,'7868768686'),0,0,'L' );

  $pdf->Cell(13 , 8, iconv( 'UTF-8','cp874' ,'Email : '),0,0,'R' );  
  $pdf->Cell(40 , 8, iconv( 'UTF-8','cp874' ,'dfdfdfdf@cccddd'),0,1,'L' );
   $pdf->Cell(0,1,'',0,1,'C');
 $pdf->Cell(15,15,iconv( 'UTF-8','cp874' ,'รายการ'),1,0,'C',0);
$pdf->Cell(30,15,iconv( 'UTF-8','cp874' ,'รหัสสินค้า'),1,0,'C',0);
$pdf->Cell(90,15,iconv( 'UTF-8','cp874' ,'รายละเอียดสินค้า'),1,0,'C',0);
$pdf->Cell(15,15,iconv( 'UTF-8','cp874' ,'จำนวน'),1,0,'C',0);
$pdf->Cell(40,15,iconv( 'UTF-8','cp874' ,'หมายเลขเครื่อง'),1,1,'C',0);
$pdf->Cell(15,100,'',1,0,'C',0);
$pdf->Cell(30,100,'',1,0,'C',0);
$pdf->Cell(90,100,'',1,0,'C',0);
$pdf->Cell(15,100,'',1,0,'C',0);
$pdf->Cell(40,100,'',1,1,'C',0);
$pdf->Cell(190,25,iconv( 'UTF-8','cp874' ,'หมายเหตุ / Note :                             อาการเสีย:-'),1,1,'L',0);
$pdf->Cell(0,8,'',0,1,'C',0);
$pdf->Cell(20,5,'',0,0,'C',0);
 $pdf->Cell(0 , 8, iconv( 'UTF-8','cp874' ,'ผู้ส่งสินค้า / Delivered By                                                                                      ผู้รับสินค้า(ลงชื่อตัวบรรจง)'),0,1,'L' );
 $pdf->Cell(0,1,'',0,1,'C',0);
$pdf->Cell(20,5,'',0,0,'C',0);
  $pdf->Cell(0 , 1, iconv( 'UTF-8','cp874' ,'                                                                                                                                        Received by'),0,1,'L' );
 $pdf->Cell(0,8,'',0,1,'C',0);
 $pdf->Cell(15,5,'',0,0,'C',0);                
 $pdf->Cell(0,8,'....................................................',0,1,'L',0);
 $pdf->Cell(14,5,'',0,0,'C',0);             
 $pdf->Cell(0,8,'(....................................................)                                                                         ........................................................',0,1,'L',0);
  $pdf->Cell(14,5,'',0,0,'C',0);
 $pdf->Cell(0,8,'      .........../............./..............                                                                                 (........................................................)',0,1,'L',0);
  $pdf->Cell(14,5,'',0,0,'C',0);
  $pdf->Cell(0,8,'                                                                                                                                           ........../............./............',0,1,'L',0);
  
$pdf->Output();
?>