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
	<title></title>
	 <script type="text/javascript" charset="utf-8">
     $(document).ready(function() {
$('#example').dataTable( {
                    "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                    "sZeroRecords": "ไม่พบข้อมูลที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                    "sSearch": "ค้นหา :"
            }
} );
} );
</script>
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
<br>
                  		<table class="table table-striped table-bordered table-hover" id="example">                    
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
	                        
	                        <tbody>
	                        <?php 
	                        	$i=1;
	                        	$query_s = mysql_query("SELECT * FROM tb_supplier");
	                        	while ($res = mysql_fetch_array($query_s)) {
	                         ?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $res['supp_name']; ?></td>
									<td><?php echo $res['supp_email']; ?></td>
									<td><?php echo $res['supp_tel']; ?></td>
									<td><?php echo $res['supp_fax']; ?></td>
									<td><?php echo $res['supp_add']; ?></td>
									<td><button class="btn btn-warning" onclick="popup('../pharmary/insert_supplier.php?up=1&idup=<?php echo $res['supp_id']; ?>','mywindow','800','400');">แก้ไข</button>
									<a href="insert_supplier.php?del=<?php echo $res['supp_id']; ?>"
									 role="button" class="btn btn-danger" onclick="return confirm('ยืนยันการลบ');">ลบ</a>
									</td>
									
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
<?php
}else{
	echo "<script type='text/javascript'>alert('กรุณา Login ก่อน');</script>";
			echo "<meta http-equiv='refresh' content='0;url=index.php' />";
}
?>