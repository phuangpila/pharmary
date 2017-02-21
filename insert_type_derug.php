<?php 
error_reporting(0);
include('include/comtop.php');
include('include/db.php');
if($_POST['insert']=='0'){
	$data = array(
	"type_name"=>$_POST["derung"],
);
insert("tb_typepro",$data);
echo "<script type='text/javascript'>window.opener.location.reload('add_type_derug.php');window.close();</script>";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<form action="insert_type_derug.php" method="post" name="form1">
		<div class="row">
			<div>			
				<h3>&nbsp;&nbsp;&nbsp;เพิ่มประเภทข้อมูลยา</h3>
					<hr>		
				<table align="center">
						<tr>
							<td>ประเภทยา : <span class="f_req"></span></td>
							<td>
								<input type="text" name="derung" id="" value="" class="form-control">
								<input type="hidden" name="insert" id="" value="0" class="form-control">
							</td>
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