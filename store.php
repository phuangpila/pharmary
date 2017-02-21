<?php
	include('include/comtop.php');
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
							<button class="btn btn-success" onclick="window.open('../pharmary/insert_store.php','mywindow','location=1,status=1,scrollbars=1,width=800,height=700');">เพิ่มข้อมูล</button>
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
	                          </tr>
	                        </thead>
	                        <tbody>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
	                        </tbody>
                		</table>           
                  	</div>
            </div>
        </div>
	</div>
</body>
</html>
