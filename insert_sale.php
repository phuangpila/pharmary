<?php 
$hide='Y';
error_reporting(0);
	include('include/comtop.php');
	include('include/db.php');

if($_POST['add']=='1'){
	$chk = $_POST["chk"];
	$u=$_POST["unit"];
	$p=$_POST["price"];
	for ($i=0; $i <count($chk); $i++) { 
			$pro=$chk[$i];
			$u1=$u[$i];
			$p1=$p[$i];

$run_id='S';
$ran=rand(10,10000);
			$data = array(
"pro_id"=>$pro,
"sale_id"=>$run_id.$pro.$ran,
"sale_unit"=>$u1,
"sale_price"=>$p1,
);
insert("tb_sale",$data);
	}
	echo "<script type='text/javascript'>window.opener.location.reload('add_sale.php');window.close();</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	 <script type="text/javascript" charset="utf-8">
     $(document).ready(function() {
$('#example').dataTable( {
                    "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                    "sZeroRecords": "ไม่พบข้อมูลที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                    "sSearch": "ค้นหา :"
            }
} );
} );
</script>

</head>
<body>
<div class="row-fuild">
		<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >การขาย</div>
                  	<div class="panel-body">
   <form action="insert_sale.php" method="post" name="form1">         
	<table cellpadding="0" cellspacing="0" border="0"   id="example">
  <thead>
  
  <tr  align="center" bgcolor="#FFFF33">
    <td ><b>ลำดับ</b></td>
    <td><b>ชื่อยา</b></td>
    <td><b>ราคา</b></td>
    <td ><b>จำนวนที่เหลือ</b></td>
   <td ><b>จำนวนที่สั่ง</b></td>
  </tr>
  </thead>
  <tbody>
  <?php
$sql="SELECT * FROM tb_product WHERE date_expiretion<CURDATE()";
$q=mysql_query($sql);
while ($rec=mysql_fetch_array($q)) {

  ?>
  <tr >
    <td align="center">
    	<input type="checkbox" name="chk[]" value="<?php echo $rec['pro_id']; ?>"  />
		<input type="hidden" name="add" value="1">
    </td>
    <td align="center">
    	<?php echo $rec['pro_name']; ?>
    </td>
    <td align="center">
    	<?php echo $rec['pro_price']; ?>
    	<input type="hidden" name="price[]" value="<?php echo $rec['pro_price']; ?>">
    </td>
    <td align="center">
    	<?php echo $rec['pro_unit']; ?>
    </td>
    <td align="center" >
    	<input type="number" name="unit[]" min="0" value="0" max="<?php echo $rec['pro_unit']; ?>" size="2">
    </td>
  </tr>
<?php
  }
  ?>
  </tbody>
<tfoot>
	<tr >
    <td align="center"></td>
    <td align="center"></td>
    <td align="center"><div id="show_p"></div></td>
    <td align="center"></td>
    <td align="center"></td>
  </tr>
</tfoot>
</table>
<br>
<div align="center">
				<div>
					<input type="submit" name="btnSave" id="btnSave" class="btn btn-small btn-success" value="บันทึก" />
					<input type="button" class="btn btn-small btn-danger" value="ปิด" onclick="window.close();">
				</div>
			</div>
</form>
</div>
            </div>
        </div>
	</div>

</body>
</html>