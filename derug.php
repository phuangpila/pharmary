<?php
	include('include/comtop.php');
	include('include/db.php');
	session_start();
error_reporting(0);
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
                <div class="panel-heading" >ตารางข้อมูลยา</div>
                  	<div class="panel-body">
                  		<div>
							<button class="btn btn-success" onclick="popup('../pharmary/insert_derug.php?in=1','mywindow','800','400');">เพิ่มข้อมูล</button>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div>
<br>
                  		<table cellpadding="0" cellspacing="0" border="0" id="example">                    
	                    	<thead>
	                          <tr>
	                            <th>ลำดับที่</th>
	                            <th>ชื่อยา</th>
								<th>ประเภทยา</th>
								<th>ขนาดยา</th>
								<th>วันผลิต</th>
								<th>วันหมดอายุ</th>
								<th>ราคาที่ขาย</th>
								<th>บริษัทยา</th>
								<th>จำนวนยา</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        <tbody>
	                        <?php 
	                        	$i=1;
	                        	$query = mysql_query("SELECT * FROM tb_product");
	                      		while ($res = mysql_fetch_array($query)) {

	                      			$query_s =mysql_query("SELECT * FROM tb_typepro WHERE type_id = '".$res['type_id']."'");
	                      			$rs_show = mysql_fetch_array($query_s);

	                      				$query_ss =mysql_query("SELECT * FROM tb_supplier WHERE supp_id = '".$res['supp_id']."'");
	                      			$rs_s = mysql_fetch_array($query_ss);
	                         ?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $res['pro_name']; ?></td>
									<td><?php echo $rs_show['type_name']; ?></td>
									<td><?php echo $res['pro_size']; ?></td>
									<td><?php echo $res['pro_day']; ?></td>
									<td><?php echo $res['date_expiretion']; ?></td>
									<td><?php echo $res['pro_price']; ?></td>
									<td><?php echo $rs_s['supp_name']; ?></td>
									<td><?php echo $res['pro_unit']; ?></td>
									<td colspan="2">
										<button class="btn btn-warning" onclick="popup('../pharmary/insert_derug.php?up=1&idup=<?php echo $res['pro_id']; ?>','mywindow','800','400');">แก้ไข</button>
										<button class="btn btn-danger" onclick="confirmDelete('insert_derug.php?del=<?php echo $res['pro_id']; ?>')">ลบ
										</button>
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