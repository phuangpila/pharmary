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
                <div class="panel-heading" >ตารางข้อมูลยา</div>
                  	<div class="panel-body">
                  		<div>
							<button class="btn btn-success" onclick="window.open('../pharmary/insert_derug.php?in=1','mywindow','location=1,status=1,scrollbars=1,width=800,height=700');">เพิ่มข้อมูล</button>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div>

                  		<table class="table table-striped">                    
	                    	<thead>
	                          <tr>
	                            <th>ลำดับที่</th>
	                            <th>ชื่อยา</th>
								<th>ประเภทยา</th>
								<th>สรรพคุณยา</th>
								<th>ขนาดยา</th>
								<th>วันผลิต</th>
								<th>วันหมดอายุ</th>
								<th>ราคาต้นทุน</th>
								<th>ราคาที่ขาย</th>
								<th>บริษัทยา</th>
								<th>วิธีการใช้</th>
								<th>จำนวนยา</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        <?php 
	                        	$i=1;
	                        	$query = mysql_query("SELECT * FROM tb_product");
	                      		while ($res = mysql_fetch_array($query)) {

	                      			$query_s =mysql_query("SELECT * FROM tb_typepro WHERE type_id = '".$res['type_id']."'");
	                      			$rs_show = mysql_fetch_array($query_s);

	                      				$query_ss =mysql_query("SELECT * FROM tb_supplier WHERE supp_id = '".$res['supp_id']."'");
	                      			$rs_s = mysql_fetch_array($query_ss);
	                         ?>
	                        <tbody>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $res['pro_name']; ?></td>
									<td><?php echo $rs_show['type_name']; ?></td>
									<td><?php echo $res['pro_description']; ?></td>
									<td><?php echo $res['pro_size']; ?></td>
									<td><?php echo $res['pro_day']; ?></td>
									<td><?php echo $res['date_expiretion']; ?></td>
									<td><?php echo $res['pro_cost']; ?></td>
									<td><?php echo $res['pro_price']; ?></td>
									<td><?php echo $rs_s['supp_name']; ?></td>
									<td><?php echo $res['pro_limit']; ?></td>
									<td><?php echo $res['pro_unit']; ?></td>
									<td colspan="2">
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
