<?php
define('FPDF_FONTPATH','include/fpdf/font/');
require("include/connect.php");
require('include/fpdf/fpdf.php');
error_reporting(0);
session_start();
if($_SESSION["id"]!=""){

$quer_store = mysql_query("SELECT * FROM tb_store");
$res_store =  mysql_fetch_array($quer_store);

$query_order = mysql_query("SELECT * FROM tb_order WHERE id_auto = '".$_GET['od_id']."'");
$res_order = mysql_fetch_array($query_order);

$query_order_de = mysql_query("SELECT * FROM tb_order_detail WHERE op_id = '".$_GET['od_id']."'");
$res_order_de = mysql_fetch_array($query_order_de);

$query_sup = mysql_query("SELECT * FROM tb_supplier WHERE supp_id = '".$res_order_de['supp_id']."'");
$res_sup = mysql_fetch_array($query_sup);
$pdf=new FPDF();
$pdf->AddFont('angsana','','angsa.php');
$pdf->AddPage();
$pdf->SetFont('angsana','',14);
 
  $pdf->Cell(50,5,'',0,1,'C');
  $pdf->Cell(50,5,'',0,0,'C');
  $pdf->Cell(75 ,10, iconv( 'UTF-8','cp874' ,'ใบสั่งสินค้า'),1,1,'C');
  $pdf->Cell(50,5,'',0,1,'C',0);//เว้นบรรทัด

  $pdf->Cell(20 , 8, iconv( 'UTF-8','cp874' ,'ชื่อร้าน : '),0,0,'L' ); 
  $pdf->Cell(40 , 8, iconv( 'UTF-8','cp874' ,$res_store['store_name']),0,0,'' );
    $pdf->Cell(60,8,iconv( 'UTF-8','cp874' ,'บริษัทที่สั่งซื้อ : '),0,0,'R' );
  $pdf->Cell(90,8,iconv( 'UTF-8','cp874' ,$res_sup['supp_name']),0,1,'' );

    $pdf->Cell(20 , 8, iconv( 'UTF-8','cp874' ,'ที่อยู่ : '),0,0,'L' );
  $pdf->Cell(90 , 8, iconv( 'UTF-8','cp874' ,$res_store['store_add']),0,0,'' );
    $pdf->Cell(10, 8, iconv( 'UTF-8','cp874' ,'รหัสการสั่งซื้อสินค้า : '),0,0,'R' );  
  $pdf->Cell(90 , 8, iconv( 'UTF-8','cp874' ,$_GET['od_id']),0,1,'' );

  $pdf->Cell(20 , 8, iconv( 'UTF-8','cp874' ,'เบอร์โทร : '),0,0,'L' );  
  $pdf->Cell(40 , 8, iconv( 'UTF-8','cp874' ,$res_store['store_tel']),0,0,'' ); 
  $pdf->Cell(60 , 8, iconv( 'UTF-8','cp874' ,'ที่อยู่ : '),0,0,'R' );
  $pdf->Cell(90 , 8, iconv( 'UTF-8','cp874' ,$res_sup['supp_add']),0,1,'' );

    $pdf->Cell(20 , 8, iconv( 'UTF-8','cp874' ,'วันที่สั่งสินค้า :'),0,0,'L' );  
  $pdf->Cell(40 , 8, iconv( 'UTF-8','cp874' ,$res_order['date_rec']),0,0,'' ); 
  $pdf->Cell(60 , 8, iconv( 'UTF-8','cp874' ,'Email : '),0,0,'R' );
  $pdf->Cell(90 , 8, iconv( 'UTF-8','cp874' ,$res_sup['supp_email']),0,1,'' );

      $pdf->Cell(20 , 8, iconv( 'UTF-8','cp874' ,''),0,0,'L' );  
  $pdf->Cell(40 , 8, iconv( 'UTF-8','cp874' ,''),0,0,'' ); 
  $pdf->Cell(60 , 8, iconv( 'UTF-8','cp874' ,'เบอร์โทร : '),0,0,'R' );
  $pdf->Cell(90 , 8, iconv( 'UTF-8','cp874' ,$res_sup['supp_tel']),0,1,'' );

      $pdf->Cell(20 , 8, iconv( 'UTF-8','cp874' ,''),0,0,'L' );  
  $pdf->Cell(40 , 8, iconv( 'UTF-8','cp874' ,''),0,0,'' ); 
  $pdf->Cell(60 , 8, iconv( 'UTF-8','cp874' ,'Fax : '),0,0,'R' );
  $pdf->Cell(90 , 8, iconv( 'UTF-8','cp874' ,$res_sup['supp_fax']),0,1,'' );


   $pdf->Cell(0,1,'',0,1,'C');
 $pdf->Cell(15,15,iconv( 'UTF-8','cp874' ,'รายการ'),1,0,'C',0);
$pdf->Cell(90,15,iconv( 'UTF-8','cp874' ,'รายละเอียดสินค้า'),1,0,'C',0);
$pdf->Cell(15,15,iconv( 'UTF-8','cp874' ,'จำนวน'),1,0,'C',0);
$pdf->Cell(35,15,iconv( 'UTF-8','cp874' ,'ราคาต่อหน่วย (บาท)'),1,0,'C',0);
$pdf->Cell(35,15,iconv( 'UTF-8','cp874' ,'ราคารวม (บาท)'),1,1,'C',0);
            $sum=0;
            $i=1;
            $sql="SELECT * FROM tb_order_detail WHERE op_id='".$_GET['od_id']."' ";
            $query=mysql_query($sql);
            while ($res=mysql_fetch_array($query)) {

                $pdf->Cell(15,10,$i++,1,0,'C',0);
                $pdf->Cell(90 ,10, iconv( 'UTF-8','cp874' ,$res['od_name']),1,0,'C' );
                $pdf->Cell(15,10,$res['od_unit'],1,0,'C',0);
                $pdf->Cell(35,10,$res['od_price'],1,0,'C',0);
                $pdf->Cell(35,10,$res['od_price']*$res['od_unit'],1,1,'C',0);
            
            $sum+=$res['od_price']*$res['od_unit'];
          }
            $pdf->Cell(155,15,iconv( 'UTF-8','cp874' ,'ราคาสุทธิ(บาท)'),1,0,'C',0);
            $pdf->Cell(35,15,iconv( 'UTF-8','cp874' ,$sum),1,1,'C',0);
            $pdf->Cell(0,8,'',0,1,'C',0);
            $pdf->Cell(20,5,'',0,0,'C',0);

  $pdf->Cell(20 , 8, iconv( 'UTF-8','cp874' ,'ชื่อผู้ส่งสินค้า '),0,0,'L' );  
  $pdf->Cell(130 , 8, iconv( 'UTF-8','cp874' ,'ชื่อผู้รับเงิน '),0,1,'R' );  
  $pdf->Cell(0, 8, iconv( 'UTF-8','cp874' ,'...................................................................'),0,0,'L' );
  $pdf->Cell(0, 8, iconv( 'UTF-8','cp874' ,'.................................................................'),0,1,'R' );
  $pdf->Cell(0, 8, iconv( 'UTF-8','cp874' ,'(..................................................................)'),0,0,'L' );
  $pdf->Cell(0, 8, iconv( 'UTF-8','cp874' ,'(..................................................................)'),0,1,'R' );
  $pdf->Cell(0, 8, iconv( 'UTF-8','cp874' ,'..................../......................./.......................'),0,0,'L' );
  $pdf->Cell(0, 8, iconv( 'UTF-8','cp874' ,'..................../......................./.......................'),0,1,'R' );

  
$pdf->Output();

}else{
    echo "<script type='text/javascript'>alert('กรุณา Login ก่อน');</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php' />";
}
?>