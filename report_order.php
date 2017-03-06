<?php
	include('include/comtop.php');
	include('include/db.php');
	error_reporting(0);
		session_start();
if($_SESSION["id"]!=""){
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

</head>
<script>
function chknull(){
	document.getElementById('start_date').value="";
	document.getElementById('end_date').value="";
}	
	
	
</script>

<body>
<form action="report_order.php" method="post" name="">
	<!-- form_sreach -->
	<div class="row-fuild">
		<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >ค้นหาข้อูลการสั่งซื้อยา</div>
                  	<div class="panel-body">
                  		<div>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div><br>
						<table align="center">
							<tr>
								<input type="hidden" name="search" value="Y">
								<td>วันที่รับสินค้า :</td>
								<td><input type="date" name="start_date" id="start_date" value="<?php echo $_POST['start_date'] ?>" class="form-control"></td>
								<td>&nbsp;&nbsp;</td>
								<td>ถึง :</td>
								<td><input type="date" name="end_date" id="end_date" value="<?php echo $_POST['end_date'] ?>" class="form-control"></td>
							</tr>
						</table>  <br>
						<div align="center">
							<input type="submit" name="btnsearch" value="ค้นหา" class="btn btn-success">
							<input type="button" name="" value="ยกเลิก" class="btn btn-danger" onclick="chknull()">
						</div>       
                  	</div>
            </div>
        </div>
	</div>
	<!-- Show_detail -->	
	
	<div class="row-fuild">
		<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >รายงานข้อูลการสั่งซื้อยา</div>
                  	<div class="panel-body">
                  	
                  		<table class="table table-striped table-bordered table-hover">                    
	                    	<thead>
	                          <tr>
	                            <th width="10%">ลำดับที่</th>
	                            <th>รหัสการซื้อ</th>
								<th>วันที่สั่งซื้อ</th>
								<th>วันที่รับสินค้า</th>
								<th width="30">Action</th>
	                          </tr>
	                        </thead>
	                        <tbody>
	                        <?php
	                        	$i=1; 
	                        	if ($_POST['search'] == 'Y') {
	                        		$sql = "SELECT * FROM tb_order WHERE date_rec !='0000-00-00'";
	                        	if ($_POST['start_date'] !="" && $_POST['end_date'] !="") {
	                        		$sql .= " AND date_rec BETWEEN '".$_POST['start_date']."' AND '".$_POST['end_date']."'";
	                        	}
	                        	$query = mysql_query($sql);
	                      		while ($res = mysql_fetch_array($query)) {
	                         ?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $res['id_auto']; ?></td>
									<td>
										<?php echo DateThai($res['time_reg']); ?></td>
									<td><?php 
									if($res['date_rec']=='0000-00-00'){
									echo "-"; 
								}else{
									echo DateThai($res['date_rec']);
								}
									?>
									</td>
									<td>
									<button class="btn btn-info" onclick="popup('../pharmary/order_show_detail.php?od_id=<?php echo $res["id_auto"]?>','mywindow','800','400');">รายละเอียด
										</button>
									</td>
								</tr>
								  <?php }
									}
								  ?>
	                        </tbody>
                		</table>           
                  	</div>
            </div>
        </div>
	</div>
</form>
</body>
</html>
 <?php
}else{
    echo "<script type='text/javascript'>alert('กรุณา Login ก่อน');</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php' />";
}
?>