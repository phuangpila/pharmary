<?php 
include('include/comtop.php');
include('include/db.php');
error_reporting(0);
session_start();
if($_SESSION["id"]!=""){
$sql="SELECT * FROM tb_user WHERE id_auto='".$_SESSION["id"]."' ";
$query=mysql_query($sql);
$rec=mysql_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="row-fuild">
		<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >ข้อมูลส่วนตัว</div>
                  	<div class="panel-body">
                  		<div>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div>
<form action="save_profile.php" method="post" name="form1">
                  		<table border="0" align="center" width="30%" >
								<tr>
									<td><div class="input-group">
  <span class="input-group-addon">Password ใหม่</span>
  <input type="password" class="form-control" placeholder="Password" name="pass_word"/>
</div></td>
								</tr>

								<tr>
									<td><br><div class="input-group">
  <span class="input-group-addon">ยืนยัน Password</span>
  <input type="password" class="form-control" placeholder="Password" name="re_password" />
</div></td>
								</tr>
								<tr>
									<td><br><div class="input-group">
  <span class="input-group-addon">ชื่อ-นามสกุล</span>
  <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล" name="name" value="<?php echo $rec['name']; ?>" />
</div></td>
								</tr>
								<tr>
									<td align="center">
									<br><input type="submit" class="btn btn-warning" value="แก้ไข">
									</td>
								</tr>

                		</table>  
                		</form>         
                  	</div>
            </div>
        </div>
	</div>
</body>
</html>
<?php
}else{
    echo "<script type='text/javascript'>alert('กรุณา Login ก่อน');</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php' />";
}
?>