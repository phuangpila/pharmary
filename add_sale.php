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
                <div class="panel-heading" >ข้อูลการขาย</div>
                  	<div class="panel-body">
                  		<div>
							<button class="btn btn-success" onclick="popup('../pharmary/insert_sale.php ?>','mywindow','800','400');">เพิ่มข้อมูล</button>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div>

                  		<table class="table table-striped">                    
	                    	<thead>
	                          <tr>
	                            <th width="10%">ลำดับที่</th>
	                            <th>รหัสการขาย</th>
								<th>วันที่</th>
								<th>เวลา</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        <?php 
	                        	$i=1;
	                        	$query = mysql_query("SELECT * FROM tb_sale");
	                      		while ($res = mysql_fetch_array($query)) {
	                         ?>
	                        <tbody>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $res['sale_id']; ?></td>
									<td><?php echo $res['sale_date']; ?></td>
									<td><?php echo $res['sale_date']; ?></td>
									<td>
									<button class="btn btn-info" onclick="popup('../pharmary/sale_show_detail.php ?>','mywindow','800','400');">รายละเอียด
										</button>
										<button class="btn btn-warning" onclick="popup('../pharmary/insert_derug.php?up=1&idup=<?php echo $res['pro_id']; ?>','mywindow','800','400');">แก้ไข</button>
										<button class="btn btn-danger" onclick="confirmDelete('insert_derug.php?del=<?php echo $res['pro_id']; ?>')">ลบ
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
