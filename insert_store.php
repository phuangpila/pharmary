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
				<p><h3>เพิ่มข้อมูร้าน</h3></p>
					<hr>		
				<table align="center">
						<tr>
							<td>ชื่อร้านค้า  <input type="text" name="" id="" value="" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>รหัสที่จดทะเบียน <input type="text" name="" id="" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>แฟกซ์ <input type="" name="" id="" value="" class="form-control"></td>
							<td>&nbsp;&nbsp;</td>
							<td>อีเมล์ <input type="" name="" id="" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
							<td>เบอร์โทร <input type="" name="" id="" value="" class="form-control"></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;</td>
						</tr>
						<tr>
						<td colspan="4">ที่อยู่ <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea></td><br>
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