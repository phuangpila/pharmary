<?php 
$hide='Y';
error_reporting(0);
include('include/comtop.php');
include('include/db.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="" method="post" name="form1">
<div class="container">
		<div class="row">
			<div>			
				<h3>รายละเอียดการขาย</h3>
					<hr>
					 <div class="row col-md-8">		
				<table class="table table-striped hover">
						<tr>
							<th width="40%" style="text-align:center">ชื่อยา</th>
							<th width="20%" style="text-align:center">จำนวนที่ขาย</th>
							<th width="20%" style="text-align:center" >ราคา(บาท)</th>
							<th width="20%" style="text-align:center" >ราคารวม(บาท)</th>
						</tr>
						<?php
						$sum=0;
						$sql="SELECT * FROM tb_sale_detail WHERE sale_id='".$_GET['sale_id']."' ";
						$query=mysql_query($sql);
						while ($res=mysql_fetch_array($query)) {

						?>
						<tr>
							<td>
							<?php 
							$sql_pro="SELECT * FROM tb_product WHERE pro_id='". $res['pro_id']."' ";
							$query_pro=mysql_query($sql_pro);
							$res_pro=mysql_fetch_array($query_pro);
							echo $res_pro['pro_name'];
							 ?>
								
							</td>
							<td style="text-align:center"><?php echo $res['sale_unit'] ?></td>
							<td style="text-align:right" ><?php echo $res['sale_price'] ?></td>
							<td style="text-align:right"><?php echo $res['sale_price']*$res['sale_unit']; ?></td>
						</tr>
						<?php
						$sum+=$res['sale_price']*$res['sale_unit'];
					}
						?>
						<tr>
							<td></td>
							<td style="text-align:center"></td>
							<td style="text-align:right" ></td>
							<td style="text-align:right" ><?php echo $sum; ?></td>
						</tr>
				</table>
				</div>					
			</div><br>
			<div align="center">
				<div>
					<input type="submit" name="btnSave" id="btnSave" class="btn btn-small btn-success" value="บันทึก" />
					<input type="button" class="btn btn-small btn-danger" value="ปิด" onclick="window.close();">
				</div>
			</div>
		</div>
		</div>
		</form>

</body>
</html>