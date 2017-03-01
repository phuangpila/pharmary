<?php 
$hide='Y';
error_reporting(0);
include('include/comtop.php');
include('include/db.php');
session_start();
if($_SESSION["id"]!=""){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<hr>
<form action="" method="post" name="form1">
<div class="col-md-12">
            <div class="panel panel-primary" >
                <div class="panel-heading" >รายละเอียดการซื้อ</div>
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
						$sql="SELECT * FROM tb_order_detail WHERE op_id='".$_GET['od_id']."' ";
						$query=mysql_query($sql);
						while ($res=mysql_fetch_array($query)) {

						?>
						<tr>
							<td><?php echo $res['od_name'] ?></td>
							<td style="text-align:center"><?php echo $res['od_unit'] ?></td>
							<td style="text-align:right" ><?php echo $res['od_price'] ?></td>
							<td style="text-align:right"><?php echo $res['od_price']*$res['od_unit']; ?></td>
						</tr>
						<?php
						$sum+=$res['od_price']*$res['od_unit'];
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
					<a href="print_order.php?od_id=<?php echo $_GET["od_id"]?>" class="btn btn-warning" role="button">พิมพ์</a>
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