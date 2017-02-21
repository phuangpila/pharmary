<?php 
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

<form action="save_type_derug.php" method="post" name="form1">
		<div class="row">
			<div>			
				<p><h3>เพิ่มข้อมูลยา</h3></p>
					<hr>		
				<table align="center">
						<tr>
							<td>ชื่อยา  <input type="text" name="" id="" value="" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>
							ประเภทยา 
								<select name="" id="" class="form-control">
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
							<td>จำนวนยา  <input type="text" name="" id="" value="" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>ขนาดยา <input type="text" name="" id="" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>วันผลิต <input type="date" name="" id="" value="" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>วันหมดอายุ <input type="date" name="" id="" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>ราคาต้นทุน <input type="" name="" id="" value="" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>ราคาที่ขาย <input type="" name="" id="" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>
							บริษัทยา: 
								<select name="" id="" class="form-control">
									<option value=""></option>
								</select>
							</td>
							<td>&nbsp;&nbsp;</td>
							<td>สรรพคุณยา <input type="" name="" id="" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
						<td colspan="2">วิธีการใช้ยา <input type="text" name="" id="" value="" class="form-control"></td><br>
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
</body>
</html>