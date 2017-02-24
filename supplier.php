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
                <div class="panel-heading" >ตารางข้อมูลบริษัท</div>
                  	<div class="panel-body">
                  		<div>
							<button class="btn btn-success" onclick="popup('../pharmary/insert_supplier.php?in=1','mywindow','800','500');">เพิ่มข้อมูล</button>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div>

                  		<table class="table table-striped">                    
	                    	<thead>
	                          <tr>
	                            <th width="1">ลำดับที่</th>
	                            <th>ชื่อบริษัทยา</th>
								<th>อีเมล์</th>
								<th>เบอร์โทร</th>
								<th>แฟกซ์</th>
								<th>ที่อยู่</th>
								<th>Ations</th>
	                          </tr>
	                        </thead>
	                        <?php 
	                        	$i=1;
	                        	$query_s = mysql_query("SELECT * FROM tb_supplier");
	                        	while ($res = mysql_fetch_array($query_s)) {
	                         ?>
	                        <tbody>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $res['supp_name']; ?></td>
									<td><?php echo $res['supp_email']; ?></td>
									<td><?php echo $res['supp_tel']; ?></td>
									<td><?php echo $res['supp_fax']; ?></td>
									<td><?php echo $res['supp_add']; ?></td>
									<td colspan="2" width="20"><button class="btn btn-warning" onclick="popup('../pharmary/insert_supplier.php?up=1&idup=<?php echo $res['supp_id']; ?>','mywindow','800','400');">แก้ไข</button>
									<a href="insert_supplier.php?del=<?php echo $res['supp_id']; ?>"
									 role="button" class="btn btn-danger" onclick="return confirm('ยืนยันการลบ');">ลบ</a>
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
