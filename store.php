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
	<div class="row-fuild">
		<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >ตารางข้อมูลร้านขายยา</div>
                  	<div class="panel-body">
                  		<div>
							<button class="btn btn-success" onclick="popup('../pharmary/insert_store.php?in=1','mywindow','800','400');">เพิ่มข้อมูล</button>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div>

                  		<table class="table table-striped">                    
	                    	<thead>
	                          <tr>
	                            <th>ลำดับที่</th>
	                            <th>ชื่อร้านค้า</th>
								<th>รหัสที่จดทะเบียน</th>
								<th>อีเมล์</th>
								<th>แฟกซ์</th>
								<th>เบอร์โทร</th>
								<th>ที่อยู่ร้านค้า</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        	<?php 
	                        	$i=1;
	                        	$sql = "SELECT * FROM tb_store";
	                        	$query = mysql_query($sql);	                        	
	                        	while ($res = mysql_fetch_array($query)) {
	
	                        	 ?>
	                        <tbody>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $res['store_name']; ?></td>
									<td><?php echo $res['store_code']; ?></td>
									<td><?php echo $res['store_email']; ?></td>
									<td><?php echo $res['store_fax']; ?></td>
									<td><?php echo $res['store_tel']; ?></td>
									<td><?php echo $res['store_add']; ?></td>
									<td colspan="2">
										<button class="btn btn-warning" onclick="popup('../pharmary/insert_store.php?up=1&idup=<?php echo $res['store_id']; ?>','mywindow','800','400');">แก้ไข</button>
										<button class="btn btn-danger" onclick="confirmDelete('insert_store.php?del=<?php echo $res['store_id']; ?>')">ลบ
										</button>
									</td>
								</tr>
	                        </tbody>
	                        <?php } ?>
                		</table>           
                  	</div>
            </div>
        </div>
	</div>
</body>
</html>
