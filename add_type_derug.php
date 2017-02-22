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
							<button class="btn btn-success" onclick="popup('../pharmary/insert_type_derug.php','mywindow','800','400');">เพิ่มข้อมูล</button>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div>

                  		<table class="table table-striped">                    
	                    	<thead>
	                          <tr>
	                            <th>ลำดับที่</th>
	                            <th>ประเภทยา</th>
	                            <th>หมายเหตุ</th>
	                          </tr>
	                        </thead>
	                        <tbody>
	                        <?php 
								$sql="SELECT * FROM tb_typepro";
								$query=mysql_query($sql);
								while ($res=mysql_fetch_array($query)) {
								 ?>
	                        <tr>
								<td><?php echo $res['type_name']; ?></td>
								<td></td>
								<td></td>
							</tr>
							<?php } ?>
							</tbody>
                		</table>           
                  	</div>
            </div>
        </div>
	</div>

</body>
</html>
