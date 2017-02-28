<?php
	include('include/comtop.php');
	include('include/db.php');
	error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

</head>

<body>
<form action="report_sale.php" method="post" name="">
	<!-- form_sreach -->
	<div class="row-fuild">
		<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >ค้นหาข้อูลการขายยา</div>
                  	<div class="panel-body">
                  		<div>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div><br>
						<table align="center">
							<tr>
								<input type="hidden" name="search" value="Y">
								<td>วันที่ขายสินค้า :</td>
								<td><input type="date" name="start_date" id="start_date" value="<?php echo $_POST['start_date'] ?>" class="form-control"></td>
								<td>&nbsp;&nbsp;</td>
								<td>ถึง :</td>
								<td><input type="date" name="end_date" id="end_date" value="<?php echo $_POST['end_date'] ?>" class="form-control"></td>
							</tr>
						</table>  <br>
						<div align="center">
							<input type="submit" name="btnsearch" value="ค้นหา" class="btn btn-success">
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
                <div class="panel-heading" >รายงานข้อูลการขายยา</div>
                  	<div class="panel-body">
                  	
                  		<table class="table table-striped table-bordered table-hover">                    
	                    	<thead>
	                          <tr>
	                            <th width="10%">ลำดับที่</th>
	                            <th>รหัสการขาย</th>
								<th>วันที่</th>
								<th>เวลา</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        <tbody>
	                        <?php
	                        	$i=1; 
	                        	if ($_POST['search'] == 'Y') {
	                        		$sql = "SELECT * FROM tb_sale WHERE id_auto IS NOT NULL";
	                        	if ($_POST['start_date'] !="" && $_POST['end_date'] !="") {
	                        		$sql .= " AND time_reg BETWEEN '".$_POST['start_date']."' AND '".$_POST['end_date']."'";
	                        	}
	                        	$query = mysql_query($sql);
	                      		while ($res = mysql_fetch_array($query)) {
	                         ?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $res['id_auto']; ?></td>
									<td><?php echo substr($res['time_reg'],0,10); ?></td>
									<td><?php echo substr($res['time_reg'],10,9); ?></td>
									<td>
									<button class="btn btn-info" onclick="popup('../pharmary/sale_show_detail.php?sale_id=<?php echo $res["id_auto"]?>','mywindow','800','400');">รายละเอียด
										</button>
										<button class="btn btn-danger" onclick="confirmDelete('add_sale.php?del=<?php echo $res['id_auto']; ?>')">ลบ
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
