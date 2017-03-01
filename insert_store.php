<?php 
$hide='Y';
include('include/comtop.php');
include('include/db.php');
error_reporting(0);
session_start();
if($_SESSION["id"]!=""){
if($_POST['insert']=='0'){

	$data = array(
	"store_name"=>$_POST["store_name"],
	"store_code"=>$_POST["store_code"],
	"store_fax"=>$_POST["store_fax"],
	"store_email"=>$_POST["store_email"],
	"store_tel"=>$_POST["store_tel"],
	"store_add"=>$_POST["store_add"],
);
insert("tb_store",$data);
echo "<script type='text/javascript'>window.opener.location.reload('store.php');window.close();</script>";

}else if($_POST['update']==1){
	$data = array(
	"store_name"=>$_POST["store_name"],
	"store_code"=>$_POST["store_code"],
	"store_fax"=>$_POST["store_fax"],
	"store_email"=>$_POST["store_email"],
	"store_tel"=>$_POST["store_tel"],
	"store_add"=>$_POST["store_add"],
);
update("tb_store",$data,"store_id = '".$_POST["id"]."' ");
echo "<script type='text/javascript'>window.opener.location.reload('store.php');window.close();</script>";

}else if($_GET['del']){
	delete('tb_store','store_id="'.$_GET['del'].'" ');
	echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อยแล้ว');window.location.href ='store.php';</script>";
}
?>
<script language="JavaScript">

		function chkNumber(ele){

			var vchar = String.fromCharCode(event.keyCode);

			if ((vchar<'0' || vchar>'9') && (vchar != '-')) return false;

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
<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >เพิ่มข้อมูลร้าน</div>
                  	<div class="panel-body">
                  		<div>													
							<form action="insert_store.php" method="post" name="form1">
									<div class="row">
										<div>				
											<table align="center">
													<tr>
														<td>ชื่อร้านค้า  <input type="text" name="store_name" id="store_name" value="" class="form-control" required=""></td>
														 <input type="hidden" name="insert" id="" value="0" class="form-control">
														</td>
														<td>&nbsp;&nbsp;</td>
														<td>รหัสที่จดทะเบียน <input type="text" name="store_code" id="store_code" value="" class="form-control" required=""></td>
													</tr>
													<tr>
														<td>แฟกซ์ <input type="text" name="store_fax" id="store_fax" value="" class="form-control" placeholder="xx-xxx-xxxx" OnKeyPress="return chkNumber(this)"></td>
														<td>&nbsp;&nbsp;</td>
														<td>อีเมล์ <input type="text" name="store_email" id="store_email" value="" class="form-control"></td>
													</tr>
													<tr>
														<td>&nbsp;&nbsp;</td>
														<td>&nbsp;&nbsp;</td>
													</tr>
													<tr>
														<td>เบอร์โทร <input type="text" name="store_tel" id="store_tel" value="" class="form-control" placeholder="xx-xxxx-xxxx" OnKeyPress="return chkNumber(this)"></td>
													</tr>
													<tr>
														<td>&nbsp;&nbsp;</td>
														<td>&nbsp;&nbsp;</td>
													</tr>
													<tr>
													<td colspan="4">ที่อยู่ <textarea name="store_add" id="store_add" cols="30" rows="10" class="form-control"></textarea></td><br>
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
                  		</div>
           		 	</div>
        	</div>
		</div>
	<?php }else if($_GET['up']==1){?>
<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >แก้ไขข้อมูลร้าน</div>
                  	<div class="panel-body">
                  		<div>
							<form action="insert_store.php" method="post" name="form1">
								<div class="row">
									<div>				
										<table align="center">
										<?php
										$sql="SELECT * FROM tb_store WHERE store_id='".$_GET['idup']."' ";
										$query=mysql_query($sql);
										$res=mysql_fetch_array($query);
										?>
												<tr>
													<td>ชื่อร้านค้า  <input type="text" name="store_name" id="store_name" value="<?php echo $res['store_name']; ?>" class="form-control"></td>
													 <input type="hidden" name="update" id="" value="1" class="form-control">
													 <input type="hidden" name="id" id="" value="<?php echo $_GET['idup']; ?>" class="form-control">
													</td>
													<td>&nbsp;&nbsp;</td>
													<td>รหัสที่จดทะเบียน <input type="text" name="store_code" id="store_code" value="<?php echo $res['store_code']; ?>" class="form-control"></td>
												</tr>
												<tr>
													<td>แฟกซ์ <input type="text" name="store_fax" id="store_fax" value="<?php echo $res['store_code']; ?>" class="form-control" OnKeyPress="return chkNumber(this)"></td>
													<td>&nbsp;&nbsp;</td>
													<td>อีเมล์ <input type="text" name="store_email" id="store_email" value="<?php echo $res['store_email']; ?>" class="form-control"></td>
												</tr>
												<tr>
													<td>&nbsp;&nbsp;</td>
													<td>&nbsp;&nbsp;</td>
												</tr>
												<tr>
													<td>เบอร์โทร <input type="text" name="store_tel" id="store_tel" value="<?php echo $res['store_tel']; ?>" class="form-control" OnKeyPress="return chkNumber(this)"></td>
												</tr>
												<tr>
													<td>&nbsp;&nbsp;</td>
													<td>&nbsp;&nbsp;</td>
												</tr>
												<tr>
												<td colspan="4">ที่อยู่ <textarea name="store_add" id="store_add" cols="30" rows="10" class="form-control"><?php echo $res['store_add']; ?></textarea></td><br>
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
                  		</div>
           		 	</div>
        	</div>
		</div>

	<?php } ?>
</body>
</html>
<?php
}else{
    echo "<script type='text/javascript'>alert('กรุณา Login ก่อน');</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php' />";
}
?>