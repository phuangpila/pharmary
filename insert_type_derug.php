<?php 
$hide='Y';
error_reporting(0);
include('include/comtop.php');
include('include/db.php');

session_start();
if($_SESSION["id"]!=""){
if($_POST['insert']==1){
	$data = array(
	"type_name"=>$_POST["derung"],
);
insert("tb_typepro",$data);
echo "<script type='text/javascript'>window.opener.location.reload('add_type_derug.php');window.close();</script>";

}else if($_POST['update']==1){
	$data = array(
	"type_name"=>$_POST["derung"],
);
update("tb_typepro",$data,"type_id = '".$_POST["id"]."' ");
echo "<script type='text/javascript'>window.opener.location.reload('add_type_derug.php');window.close();</script>";

}else if($_GET['del']){
	delete('tb_typepro','type_id="'.$_GET['del'].'" ');
	echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อยแล้ว');window.location.href ='add_type_derug.php';</script>";
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
<div class="row-fuild">
		<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >เพิ่มประเภทข้อมูลยา</div>
                  	<div class="panel-body">
                  		<div>
							<form action="insert_type_derug.php" method="post" name="form1">
								<div class="row">
									<div>				
										<table align="center">
												<tr>
													<td>ประเภทยา : <span class="f_req"></span></td>
													<td>
														<input type="text" name="derung" id="" value="" class="form-control" required="">
														<input type="hidden" name="insert" id="" value="1" class="form-control">
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
                  		</div>
           		 	</div>
        	</div>
		</div>

		<?php }else if($_GET['up']==1){
?>
		<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >แก้ไขประเภทข้อมูลยา</div>
                  	<div class="panel-body">
                  		<div>
							<form action="insert_type_derug.php" method="post" name="form1">
								<div class="row">
									<div>				
										<table align="center">
										<?php
										$sql="SELECT * FROM tb_typepro WHERE type_id='".$_GET['idup']."' ";
										$query=mysql_query($sql);
										$res=mysql_fetch_array($query);
										?>
												<tr>
													<td>ประเภทยา : <span class="f_req"></span></td>
													<td>
														<input type="text" name="derung" id="" value="<?php echo $res['type_name']; ?>" class="form-control">
														<input type="hidden" name="update" id="" value="1" class="form-control">
														<input type="hidden" name="id" id="" value="<?php echo $_GET['idup']; ?>" class="form-control">
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