<?php
	include('include/comtop.php');
	include('include/db.php');
	error_reporting(0);
	if($_GET['del']){
$sum=0;
		$sql_sale=mysql_query("SELECT * FROM tb_sale_detail WHERE sale_id='".$_GET['del']."' ");
		while ($res=mysql_fetch_array($sql_sale)) {
		$sql_pro=mysql_query("SELECT * FROM tb_product WHERE pro_id='".$res['pro_id']."' ");
			while ($res2=mysql_fetch_array($sql_pro)) {
				$sum=intval($res2['pro_unit'])+intval($res['sale_unit'])."<br>";
$data = array(
"pro_unit"=>$sum,
);
update("tb_product",$data,"pro_id = '".$res['pro_id']."' ");

			}
		}
delete("tb_sale","id_auto = '".$_GET['del']."'");
		delete("tb_sale_detail","sale_id = '".$_GET['del']."'");

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
                <div class="panel-heading" >ข้อูลการขาย</div>
                  	<div class="panel-body">
                  		<div>
							<button class="btn btn-success" onclick="popup('../pharmary/insert_sale.php','mywindow','800','400');">เพิ่มข้อมูล</button>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div>
<br> 
                  		<table cellpadding="0" cellspacing="0" border="0" id="example">                    
	                    	<thead>
	                          <tr>
	                            <th width="10%">ลำดับที่</th>
	                            <th>รหัสการขาย</th>
								<th>วันที่</th>
								<th>เวลา</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        <tbody>
	                        <?php 
	                        	$i=1;
	                        	$query = mysql_query("SELECT * FROM tb_sale");
	                      		while ($res = mysql_fetch_array($query)) {
	                         ?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $res['id_auto']; ?></td>
									<td><?php echo substr($res['time_reg'],0,10); ?></td>
									<td><?php echo substr($res['time_reg'],10,9); ?></td>
									<td>
									<button class="btn btn-info" onclick="popup('../pharmary/sale_show_detail.php?sale_id=<?php echo $res["id_auto"]?>','mywindow','800','400');">รายละเอียด
										</button>
										<button class="btn btn-danger" onclick="confirmDelete('add_sale.php?del=<?php echo $res['id_auto']; ?>')">ลบ
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
