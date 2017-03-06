<?php 
$hide='Y';
error_reporting(0);
session_start();
include('include/comtop.php');
include('include/db.php');
if($_SESSION["id"]!=""){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="" method="post" name="form1">
<hr>
<div class="col-md-12">
            <div class="panel panel-primary" >
                <div class="panel-heading" >รายละเอียดการขาย</div>
                  	<div class="panel-body">
			<div>				
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
							<td style="text-align:right" ><?php echo number_format($res['sale_price']);?></td>
							<td style="text-align:right"><?php echo number_format($res['sale_price']*$res['sale_unit']); ?></td>
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
				</div>
				</div>
				</div>				
			</div><br>
			<div align="center">
				<div>
					<a href="print_sale.php?id=<?php echo $_GET['sale_id'] ?>"><input type="button" name="btnSave" id="btnSave" class="btn btn-small btn-warning" value="พิมพ์" /></a>
					<input type="button" class="btn btn-small btn-danger" value="ปิด" onclick="window.close();">
				</div>
			</div>
		</div>
		</div>
		</form>

</body>
</html>
<?php
}else{
	echo "<script type='text/javascript'>alert('กรุณา Login ก่อน');</script>";
			echo "<meta http-equiv='refresh' content='0;url=index.php' />";
}
?>