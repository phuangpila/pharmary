<?php
define('FPDF_FONTPATH','include/fpdf/font/');
require("include/connect.php");
require('include/fpdf/fpdf.php');
error_reporting(0);
session_start();
if($_SESSION["id"]!=""){
$sql="SELECT * FROM tb_sale_detail WHERE sale_id='".$_GET['id']."'";
$q=mysql_query($sql);

$sql2="SELECT * FROM tb_sale WHERE id_auto='".$_GET['id']."'";
$q2=mysql_query($sql2);
$res2=mysql_fetch_array($q2);

$sql3="SELECT * FROM tb_store ";
$q3=mysql_query($sql3);
$res3=mysql_fetch_array($q3);

$pdf=new FPDF();
$pdf->AddFont('angsana','','angsa.php');
$pdf->AddPage();


 
  $pdf->Cell(50,5,'',0,1,'C');
  $pdf->Cell(50,5,'',0,0,'C');
  $pdf->SetFont('angsana','',20);
  $pdf->Cell(75 ,10, iconv( 'UTF-8','cp874' ,'ใบเสร็จรับเงิน/ใบกำกับภาษี'),1,1,'C');
  $pdf->Cell(50,5,'',0,1,'C',0);//เว้นบรรทัด
  $pdf->SetFont('angsana','',14);
  $pdf->Cell(13,8,iconv( 'UTF-8','cp874' ,'บริษัท : '),0,0,'R' );
  $pdf->Cell(110,8,iconv( 'UTF-8','cp874' ,$res3['store_name']),0,0,'' );

  $pdf->Cell(40,8,iconv( 'UTF-8','cp874' ,'No : '),0,0,'R' );
  $pdf->Cell(20,8,iconv( 'UTF-8','cp874' ,$res2['id_auto']),0,1,'' );

  $pdf->Cell(13 , 8, iconv( 'UTF-8','cp874' ,'ที่อยู่ : '),0,0,'R' );
  $pdf->Cell(110 , 8, iconv( 'UTF-8','cp874' ,$res3['store_add']),0,0,'L' );

  $pdf->Cell(40,8,iconv( 'UTF-8','cp874' ,'Date : '),0,0,'R' );
  $pdf->Cell(20,8,iconv( 'UTF-8','cp874' ,substr($res2['time_reg'],0,10)),0,1,'' );

  $pdf->Cell(13 , 8, iconv( 'UTF-8','cp874' ,'โทร : '),0,0,'R' );
  $pdf->Cell(30 , 8, iconv( 'UTF-8','cp874' ,$res3['store_tel']),0,0,'L' );
  $pdf->Cell(13 , 8, iconv( 'UTF-8','cp874' ,'Fax : '),0,0,'R' );
  $pdf->Cell(30 , 8, iconv( 'UTF-8','cp874' ,$res3['store_fax']),0,0,'L' );

  $pdf->Cell(13 , 8, iconv( 'UTF-8','cp874' ,'Email : '),0,0,'R' );  
  $pdf->Cell(40 , 8, iconv( 'UTF-8','cp874' ,$res3['store_email']),0,1,'L' );
   $pdf->Cell(0,1,'',0,1,'C');
$pdf->SetFillColor(204, 204, 204);
 $pdf->Cell(15,10,iconv( 'UTF-8','cp874' ,'ลำดับ'),1,0,'C',true);
$pdf->Cell(90,10,iconv( 'UTF-8','cp874' ,'รายการสินค้า'),1,0,'C',true);
$pdf->Cell(20,10,iconv( 'UTF-8','cp874' ,'จำนวน'),1,0,'C',true);
$pdf->Cell(35,10,iconv( 'UTF-8','cp874' ,'หน่วยละ'),1,0,'C',true);
$pdf->Cell(35,10,iconv( 'UTF-8','cp874' ,'จำนวนเงิน'),1,1,'C',true);

$i=1;
$sum=0;
while ($res=mysql_fetch_array($q)){
  //$sql = "SELECT * FROM tb_product WHERE pro_id = '".$res['pro_id']."'";
 $query_pro = mysql_query("SELECT * FROM tb_product WHERE pro_id = '".$res['pro_id']."'");
  $res_pro = mysql_fetch_array($query_pro);
$pdf->Cell(15,10,$i,1,0,'C',0);
$pdf->Cell(90 ,10, iconv( 'UTF-8','cp874' ,$res_pro['pro_name']),1,0,'C' );
$pdf->Cell(20,10,$res['sale_unit'],1,0,'C',0);
$pdf->Cell(35,10,$res['sale_price'],1,0,'R',0);
$pdf->Cell(35,10,$res['sale_price']*$res['sale_unit'],1,1,'R',0);
$sum+=$res['sale_price']*$res['sale_unit'];
$i++;
}
$pdf->Cell(160,10,iconv( 'UTF-8','cp874' ,'รวมเป็นเงิน'),1,0,'C',0);
$pdf->Cell(35,10,iconv( 'UTF-8','cp874' ,$sum),1,1,'R',0);

$pdf->Cell(0,8,'',0,1,'C',0);
 $pdf->Cell(95,8, iconv( 'UTF-8','cp874' ,'ลงชื่อลูกค้า'),0,0,'C' );
 $pdf->Cell(95,8, iconv( 'UTF-8','cp874' ,'ลงชื่อผู้รับเงิน'),0,1,'C' );

  $pdf->Cell(95,8, iconv( 'UTF-8','cp874' ,'....................................................'),0,0,'C' );
 $pdf->Cell(95,8, iconv( 'UTF-8','cp874' ,'....................................................'),0,1,'C' );

 $pdf->Cell(95,8, iconv( 'UTF-8','cp874' ,'(....................................................)'),0,0,'C' );
 $pdf->Cell(95,8, iconv( 'UTF-8','cp874' ,'(....................................................)'),0,1,'C' );

 $pdf->Cell(95,8, iconv( 'UTF-8','cp874' ,'.........../............./..............'),0,0,'C' );
 $pdf->Cell(95,8, iconv( 'UTF-8','cp874' ,'.........../............./..............'),0,1,'C' );
 $pdf->Cell(0,8,'',0,1,'C',0);
 $pdf->Cell(15,5,'',0,0,'C',0);                
 
  
$pdf->Output();
}else{
    echo "<script type='text/javascript'>alert('กรุณา Login ก่อน');</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php' />";
}
?>