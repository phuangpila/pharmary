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
                <div class="panel-heading" >ตารางข้อมูลประเภทยา</div>
                  	<div class="panel-body">
                  		<div>
							<button class="btn btn-success" onclick="popup('../pharmary/insert_type_derug.php?in=1','mywindow','800','400');">เพิ่มข้อมูล</button>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div>
<br>
                  		<table class="table table-striped table-bordered table-hover" >                    
	                    	<thead>
	                          <tr>
	                            <th width="10%">ลำดับที่</th>
	                            <th>ประเภทยา</th>
	                            <th width="10%">Action</th>
	                          </tr>
	                        </thead>
	                        <tbody>
	                        <?php 
	                        $i=1;
								$sql="SELECT * FROM tb_typepro";
								$query=mysql_query($sql);
								while ($res=mysql_fetch_array($query)) {
								 ?>
	                        <tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $res['type_name']; ?></td>
								<td><button class="btn btn-warning" onclick="popup('../pharmary/insert_type_derug.php?up=1&idup=<?php echo $res['type_id']; ?>','mywindow','800','400');">แก้ไข</button>
									<button class="btn btn-danger" onclick="window.location.href='insert_type_derug.php?del=<?php echo $res['type_id']; ?>'">ลบ</button>
								</td>
							</tr>
							<?php $i++; } ?>
							</tbody>
                		</table>           
                  	</div>
            </div>
        </div>
	</div>

</body>
</html>
