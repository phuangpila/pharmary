<?php
error_reporting(0);
	include('include/comtop.php');
	include('include/db.php');
	if($_GET['st']){
		$newdata = array(

"status"=>'1',
"date_rec"=>date('Y-m-d'),
);
update("tb_order",$newdata,"id_auto = '".$_GET['st']."' ");
	}
	if($_GET['del']){
		delete("tb_order","id_auto = '".$_GET['del']."'");
		delete("tb_order_detail","op_id = '".$_GET['del']."'");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
                <div class="panel-heading" >ข้อูลการซื้อ</div>
                  	<div class="panel-body">
                  		<div>
							<button class="btn btn-success" onclick="popup('../pharmary/insert_order.php','mywindow','800','400');">เพิ่มข้อมูล</button>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div>

                  		<table cellpadding="0" cellspacing="0" border="0" id="example">                    
	                    	<thead>
	                          <tr>
	                            <th width="10%">ลำดับที่</th>
	                            <th>รหัสการซื้อ</th>
								<th>วันที่สั่งซื้อ</th>
								<th>วันที่รับสินค้า</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        <tbody>
	                        <?php 
	                        	$i=1;
	                        	$query = mysql_query("SELECT * FROM tb_order");
	                      		while ($res = mysql_fetch_array($query)) {
	                         ?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $res['id_auto']; ?></td>
									<td>
										<?php echo substr($res['time_reg'],0,10); ?></td>
									<td><?php 
									if($res['date_rec']=='0000-00-00'){
									echo "-"; 
								}else{
									echo $res['date_rec'];
								}
									?>
									</td>
									<td>
									<?php
									if($res['status']=='0'){
									?>
									<button class="btn btn-danger" onclick="confirmStatus('add_order.php?st=<?php echo $res['id_auto']; ?>')">ยังไม่ได้รับสินค้า
										</button>
										<?php
									}else{
										?>
										<button class="btn btn-success" disabled>ได้รับสินค้าแล้ว
										</button>
									<?php
										}
									?>
									<button class="btn btn-info" onclick="popup('../pharmary/order_show_detail.php?od_id=<?php echo $res["id_auto"]?>','mywindow','800','400');">รายละเอียด
										</button>
										<button class="btn btn-danger" onclick="confirmDelete('add_order.php?del=<?php echo $res['id_auto']; ?>')">ลบ
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
