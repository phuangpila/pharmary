<?php 
$hide='Y';
include('include/comtop.php');
include('include/db.php');
error_reporting(0);
session_start();
if($_SESSION["id"]!=""){
if($_POST['insert']=='0'){
	$data = array(
	"supp_name"=>$_POST["supp_name"],
	"supp_email"=>$_POST["supp_email"],
	"supp_tel"=>$_POST["supp_tel"],
	"supp_fax"=>$_POST["supp_fax"],
	"supp_add"=>$_POST["supp_add"],
);
insert("tb_supplier",$data);
echo "<script type='text/javascript'>window.opener.location.reload('supplier.php');window.close();</script>";

}else if($_POST['update']==1){
	$data = array(
	"supp_name"=>$_POST["supp_name"],
	"supp_email"=>$_POST["supp_email"],
	"supp_tel"=>$_POST["supp_tel"],
	"supp_fax"=>$_POST["supp_fax"],
	"supp_add"=>$_POST["supp_add"],
);
update("tb_supplier",$data,"supp_id = '".$_POST["id"]."' ");
echo "<script type='text/javascript'>window.opener.location.reload('supplier.php');window.close();</script>";

}else if($_GET['del']){
	delete('tb_supplier','supp_id="'.$_GET['del'].'" ');
	echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อยแล้ว');window.location.href ='supplier.php';</script>";
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
                <div class="panel-heading" >เพิ่มข้อมูลบริษัท</div>
                  	<div class="panel-body">
                  		<div>
							<form action="insert_supplier.php" method="post" name="form1">
								<div class="row">
									<div>					
										<table align="center">
												<tr>
													<td>ชื่อบริษัทยา  <input type="text" name="supp_name" id="supp_name" value="" class="form-control" required="">
													 <input type="hidden" name="insert" id="" value="0" class="form-control">
													</td>
													<td>&nbsp;&nbsp;</td>
													<td>อีเมล์ <input type="text" name="supp_email" id="supp_email" value="" class="form-control"></td>
												</tr>
												<tr>
													<td>&nbsp;&nbsp;</td>
													<td>&nbsp;&nbsp;</td>
												</tr>
												<tr>
													<td>เบอร์โทร <input type="text" name="supp_tel" id="supp_tel" value="" class="form-control" placeholder="xx-xxxx-xxxx" OnKeyPress="return chkNumber(this)"></td>
													<td>&nbsp;&nbsp;</td>
													<td>แฟกซ์ <input type="text" name="supp_fax" id="supp_fax" value="" class="form-control" placeholder="xx-xxx-xxxx" OnKeyPress="return chkNumber(this)"></td>
												</tr>
												<tr>
												<td colspan="4">ที่อยู่ <textarea name="supp_add" id="supp_add" cols="30" rows="10" class="form-control"></textarea></td><br>
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



	<?php }else if($_GET['up']==1){
?>
<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >แก้ไขข้อมูลบริษัท</div>
                  	<div class="panel-body">
                  		<div>							
							<form action="insert_supplier.php" method="post" name="form1">
									<div class="row">
										<div>				
											<table align="center">
											<?php
											$sql="SELECT * FROM tb_supplier WHERE supp_id='".$_GET['idup']."' ";
											$query=mysql_query($sql);
											$res=mysql_fetch_array($query);
											?>
													<tr>
														<td>ชื่อบริษัทยา  <input type="text" name="supp_name" id="supp_name" value="<?php echo $res['supp_name']; ?>" class="form-control">
														 <input type="hidden" name="update" id="" value="1" class="form-control">
														 <input type="hidden" name="id" id="" value="<?php echo $_GET['idup']; ?>" class="form-control">
														</td>
														<td>&nbsp;&nbsp;</td>
														<td>อีเมล์ <input type="text" name="supp_email" id="supp_email" value="<?php echo $res['supp_email']; ?>" class="form-control"></td>
													</tr>
													<tr>
														<td>&nbsp;&nbsp;</td>
														<td>&nbsp;&nbsp;</td>
													</tr>
													<tr>
														<td>เบอร์โทร <input type="text" name="supp_tel" id="supp_tel" value="<?php echo $res['supp_tel']; ?>" class="form-control" OnKeyPress="return chkNumber(this)"></td>
														<td>&nbsp;&nbsp;</td>
														<td>แฟกซ์ <input type="text" name="supp_fax" id="supp_fax" value="<?php echo $res['supp_fax']; ?>" class="form-control" OnKeyPress="return chkNumber(this)"></td>
													</tr>
													<tr>
													<td colspan="4">ที่อยู่ <textarea name="supp_add" id="supp_add" cols="30" rows="10" class="form-control"><?php echo $res['supp_add']; ?></textarea></td>
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