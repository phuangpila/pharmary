<?php 
include('include/comtop.php');
include('include/db.php');
error_reporting(0);

if($_POST['insert']=='0'){

	$data = array(

	"pro_name"=>$_POST["pro_name"],
	"type_id"=>$_POST["type_id"],
	"pro_description"=>$_POST["pro_description"],
	"pro_size"=>$_POST["pro_size"],
	"pro_day"=>$_POST["pro_day"],
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
	"pro_day"=>$_POST["pro_day"],
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
<script language="JavaScript">

		function chkNumber(ele){

			var vchar = String.fromCharCode(event.keyCode);

			if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;

			ele.onKeyPress=vchar;
		}

</script>
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
							<input type="text" name="pro_name" id="pro_name" value="" class="form-control" required=""><input type="hidden" name="insert" id="" value="0" class="form-control">
							</td>
							
							<td>&nbsp;&nbsp;</td>
							<td>
							ประเภทยา 
								<select name="type_id" id="type_id" class="form-control">
								<?php 
									$query_ty = mysql_query("SELECT * FROM tb_typepro");
									while ($res_re = mysql_fetch_array($query_ty)) {
								 ?>
									<option value="<?php echo $res_re['type_id']; ?>"><?php echo $res_re['type_name']; ?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>จำนวนยา  <input type="text" name="pro_unit" id="pro_unit" value="" class="form-control" OnKeyPress="return chkNumber(this)"></td>
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
							<td>ราคาต้นทุน (บาท)<input type="text" name="pro_cost" id="pro_cost" value="" class="form-control" OnKeyPress="return chkNumber(this)"></td>
							<td>&nbsp;&nbsp;</td>
							<td>ราคาที่ขาย (บาท)<input type="text" name="pro_price" id="pro_price" value="" class="form-control" OnKeyPress="return chkNumber(this)"></td>
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
						<td colspan="4">วิธีการใช้ยา <textarea name="pro_limit" id="pro_limit" cols="30" rows="10" class="form-control"></textarea></td><br>
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
						$query=mysql_query("SELECT * FROM tb_product WHERE pro_id='".$_GET['idup']."'");
						$res_show = mysql_fetch_array($query);
					 ?>
						<tr>
							<td>ชื่อยา  
							<input type="text" name="pro_name" id="pro_name" value="<?php echo $res_show['pro_name']; ?>" class="form-control">
							<input type="hidden" name="update" id="" value="1" class="form-control">
							 <input type="hidden" name="id" id="" value="<?php echo $_GET['idup']; ?>" class="form-control">
							</td>
							
							<td>&nbsp;&nbsp;</td>
							<td>
							ประเภทยา 
								<select name="type_id" id="type_id" class="form-control">
								<?php 

									$query_ty = mysql_query("SELECT type_id,type_name FROM tb_typepro");
									while ($res = mysql_fetch_array($query_ty)) {
								 ?>
									<option value="<?php echo $res['type_id'];?>"
									<?php if ($res['type_id']== $res_show['type_id'] ) {echo "selected"; } ?>><?php echo $res['type_name'];?>
									</option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>จำนวนยา  <input type="text" name="pro_unit" id="pro_unit" value="<?php echo $res_show['pro_unit']; ?>" class="form-control"  OnKeyPress="return chkNumber(this)"></td>
							<td>&nbsp;&nbsp;</td>
							<td>ขนาดยา <input type="text" name="pro_size" id="pro_size" value="<?php echo $res_show['pro_size']; ?>" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>วันผลิต <input type="date" name="pro_day" id="pro_day" value="<?php echo $res_show['pro_day']; ?>" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>วันหมดอายุ <input type="date" name="date_expiretion" id="date_expiretion" value="<?php echo $res_show['date_expiretion']; ?>" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>ราคาต้นทุน <input type="text" name="pro_cost" id="pro_cost" value="<?php echo $res_show['pro_cost']; ?>" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>ราคาที่ขาย <input type="text" name="pro_price" id="pro_price" value="<?php echo $res_show['pro_price']; ?>" class="form-control"></td>
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
									while ($res_s = mysql_fetch_array($query_ty)) {
								 ?>
									<option value="<?php echo $res_s['supp_id']; ?>"<?php 
									if ($res_s['supp_id'] == $res_show['supp_id']) { echo "selected";}?>><?php echo $res_s['supp_name']; ?></option>
								<?php } ?>
								</select>
							</td>
							<td>&nbsp;&nbsp;</td>
							<td>สรรพคุณยา <input type="text" name="pro_description" id="pro_description" value="<?php echo $res_show['pro_description']; ?>" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
						<td colspan="4">วิธีการใช้ยา <textarea name="pro_limit" id="pro_limit" cols="30" rows="10" class="form-control"><?php echo $res_show['pro_limit']; ?></textarea></td><br>
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