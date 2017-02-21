<?php include('include/comtop.php');?>
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
							<td>ประเภทยา : <span class="f_req"></span></td>
							<td>
								<input type="text" name="" id="" value="" class="form-control">
							</td>
						</tr>
				</table>					
			</div><br>
			<div align="center">
				<div>
					<input type="button" name="btnSave" id="btnSave" class="btn btn-small btn-success" value="บันทึก" />
					<input type="button" class="btn btn-small btn-danger" value="ปิด" onclick="window.close();">
				</div>
			</div>
		</div>
	</form>
</body>
</html>