<?php 
include('include/comtop.php');
include('include/db.php');
error_reporting(0);

if($_POST['insert']=='0'){
		echo $_POST["pro_name"];
		echo $_POST["pro_unit"];
		echo $_POST["pro_price"];
		exit();
	$data = array(

	"pro_name"=>$_POST["pro_name"],
	"type_id"=>$_POST["type_id"],
	"pro_description"=>$_POST["pro_description"],
	"pro_size"=>$_POST["pro_size"],
	"date_expiretion"=>$_POST["date_expiretion"],
	"pro_cost"=>$_POST["pro_cost"],
	"pro_price"=>$_POST["pro_price"],
	"supp_id"=>$_POST["supp_id"],
	"pro_limit"=>$_POST["pro_limit"],
	"pro_unit"=>$_POST["pro_unit"],
);
insert("tb_product",$data);
echo "<script type='text/javascript'>window.opener.location.reload('derug.php');window.close();</script>";
}else if($_POST['update']==1){
	$data = array(
	"pro_name"=>$_POST["pro_name"],
	"type_id"=>$_POST["type_id"],
	"pro_description"=>$_POST["pro_description"],
	"pro_size"=>$_POST["pro_size"],
	"date_expiretion"=>$_POST["date_expiretion"],
	"pro_cost"=>$_POST["pro_cost"],
	"pro_price"=>$_POST["pro_price"],
	"supp_id"=>$_POST["supp_id"],
	"pro_limit"=>$_POST["pro_limit"],
	"pro_unit"=>$_POST["pro_unit"],
);
update("tb_product",$data,"pro_id = '".$_POST["id"]."' ");
echo "<script type='text/javascript'>window.opener.location.reload('derug.php');window.close();</script>";

}else if($_GET['del']){
	delete('tb_product','pro_id="'.$_GET['del'].'" ');
	echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อยแล้ว');window.location.href ='derug.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php 
if($_GET['in']==1){
?>
<form action="insert_derug.php" method="post" name="form1">
		<div class="row">
			<div>			
				<h3>&nbsp;&nbsp;&nbsp;เพิ่มข้อมูลยา</h3>
					<hr>		
				<table align="center">
						<tr>
							<td>ชื่อยา  
							<input type="text" name="pro_name" id="pro_name" value="" class="form-control"><input type="hidden" name="insert" id="" value="0" class="form-control">
							</td>
							
							<td>&nbsp;&nbsp;</td>
							<td>
							ประเภทยา 
								<select name="type_id" id="type_id" class="form-control">
								<?php 
									$query_ty = mysql_query("SELECT * FROM tb_typepro");
									while ($res = mysql_fetch_array($query_ty)) {
								 ?>
									<option value="<?php echo $res['type_id']; ?>"><?php echo $res['type_name']; ?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>จำนวนยา  <input type="text" name="pro_unit" id="pro_unit" value="" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>ขนาดยา <input type="text" name="pro_size" id="pro_size" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>วันผลิต <input type="date" name="pro_day" id="pro_day" value="" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>วันหมดอายุ <input type="date" name="date_expiretion" id="date_expiretion" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>ราคาต้นทุน <input type="text" name="pro_cost" id="pro_cost" value="" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>ราคาที่ขาย <input type="text" name="pro_price" id="pro_price" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>
							บริษัทยา: 
								<select name="supp_id" id="supp_id" class="form-control">
								<?php 
									$query_ty = mysql_query("SELECT * FROM tb_supplier");
									while ($res = mysql_fetch_array($query_ty)) {
								 ?>
									<option value="<?php echo $res['supp_id']; ?>"><?php echo $res['supp_name']; ?></option>
								<?php } ?>
								</select>
							</td>
							<td>&nbsp;&nbsp;</td>
							<td>สรรพคุณยา <input type="text" name="pro_description" id="pro_description" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
						<td colspan="4">วิธีการใช้ยา <input type="text" name="pro_limit" id="pro_limit" value="" class="form-control"></td><br>
						</tr>

				</table>	
			</div><br>
			<div align="center">
				<div>
					<input type="submit" name="btnSave" id="btnSave" class="btn btn-small btn-success" value="บันทึก" />
					<input type="button" class="btn btn-small btn-danger" value="ปิด" onclick="window.close();">
				</div>
			</div>
		</div>
	</form>
<?php }else if($_GET['up']==1){?>
		
<form action="insert_derug.php" method="post" name="form1">
		<div class="row">
			<div>			
				<h3>&nbsp;&nbsp;&nbsp;แก้ไขข้อมูลยา</h3>
					<hr>		
				<table align="center">
					<?php 
						$query=mysql_query("SELECT * FROM tb_product");
						$res = mysql_fetch_array($query);
					 ?>
						<tr>
							<td>ชื่อยา  
							<input type="text" name="pro_name" id="pro_name" value="" class="form-control">
							<input type="hidden" name="update" id="" value="1" class="form-control">
							 <input type="hidden" name="id" id="" value="<?php echo $_GET['idup']; ?>" class="form-control">
							</td>
							
							<td>&nbsp;&nbsp;</td>
							<td>
							ประเภทยา 
								<select name="type_id" id="type_id" class="form-control">
								<?php 
									$query_ty = mysql_query("SELECT * FROM tb_typepro");
									while ($res = mysql_fetch_array($query_ty)) {
								 ?>
									<option value="<?php echo $res['type_id']; ?>"><?php echo $res['type_name']; ?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>จำนวนยา  <input type="text" name="pro_unit" id="pro_unit" value="" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>ขนาดยา <input type="text" name="pro_size" id="pro_size" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>วันผลิต <input type="date" name="pro_day" id="pro_day" value="" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>วันหมดอายุ <input type="date" name="date_expiretion" id="date_expiretion" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>ราคาต้นทุน <input type="text" name="pro_cost" id="pro_cost" value="" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>ราคาที่ขาย <input type="text" name="pro_price" id="pro_price" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>
							บริษัทยา: 
								<select name="supp_id" id="supp_id" class="form-control">
								<?php 
									$query_ty = mysql_query("SELECT * FROM tb_supplier");
									while ($res = mysql_fetch_array($query_ty)) {
								 ?>
									<option value="<?php echo $res['supp_id']; ?>"><?php echo $res['supp_name']; ?></option>
								<?php } ?>
								</select>
							</td>
							<td>&nbsp;&nbsp;</td>
							<td>สรรพคุณยา <input type="text" name="pro_description" id="pro_description" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
						<td colspan="4">วิธีการใช้ยา <input type="text" name="pro_limit" id="pro_limit" value="" class="form-control"></td><br>
						</tr>

				</table>	
			</div><br>
			<div align="center">
				<div>
					<input type="submit" name="btnSave" id="btnSave" class="btn btn-small btn-success" value="บันทึก" />
					<input type="button" class="btn btn-small btn-danger" value="ปิด" onclick="window.close();">
				</div>
			</div>
		</div>
	</form>

	



		<?php } ?>
</body>
</html>