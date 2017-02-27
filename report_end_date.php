<?php 
include('include/comtop.php');
include('include/db.php');
		error_reporting(0);
			$chkdel = $_POST["chkdel"];
			//print_r($chkdel);
			for ($i=0; $i <count($chkdel); $i++) { 
			$data = array(
			"pro_status"=>'2',
				);
				update("tb_product",$data,"pro_id = '".$chkdel[$i]."' ");
			}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 		<div class="row-fuild">
		<h3>&nbsp;&nbsp;&nbsp; รายงานรายการยาที่หมดอายุ</h3><hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >ตารางข้อมูลรายการยาที่หมดอายุ</div>
                  	<div class="panel-body">
                  		<div>
							<a href="show_detail.php" role="button" class="btn btn-danger">กลับหน้าหลัก</a>
						</div>

					<form action="report_end_date.php" method="post">
                  		<table class="table table-striped">                    
	                    	<thead>
	                          <tr>
	                          	<th></th>
	                            <th>ลำดับที่</th>
	                            <th>ชื่อยา</th>
								<th>ประเภทยา</th>
								<th>วันผลิต</th>
								<th>วันหมดอายุ</th>
								<th>บริษัทยา</th>
	                          </tr>
	                        </thead>
	                        	<?php 
	                        	$i=1;
	                        	$sql = "SELECT * FROM tb_product WHERE date_expiretion < CURDATE() AND pro_status = '1' ";
	                        	$query = mysql_query($sql);	                        	
	                        	while ($res = mysql_fetch_array($query)) {

	                      			$query_s =mysql_query("SELECT * FROM tb_typepro WHERE type_id = '".$res['type_id']."'");
	                      			$rs_show = mysql_fetch_array($query_s);

	                      				$query_ss =mysql_query("SELECT * FROM tb_supplier WHERE supp_id = '".$res['supp_id']."'");
	                      			$rs_s = mysql_fetch_array($query_ss);
	
	                        	 ?>
	                        <tbody>
								<tr>
									<td><input type="checkbox" name="chkdel[]" 
									value="<?php echo $res["pro_id"];?>" /></td>
									<td><?php echo $i++; ?></td>
									<td style="color:red;"><?php echo $res['pro_name']; ?></td>
									<td><?php echo $rs_show['type_name']; ?></td>
									<td><?php echo $res['pro_day']; ?></td>
									<td style="color:red;"><?php echo $res['date_expiretion']; ?></td>
									<td><?php echo $rs_s['supp_name']; ?></td>
								</tr>
	                        </tbody>
	                        <?php } ?>
	                      
	                        
						
                		</table>           
                  	</div>
                  	<div>
                  		<div align="left">  
                  				
	                        	<p >&nbsp;&nbsp;&nbsp;<b><input type="checkbox" onclick="for(c in document.getElementsByName('chkdel[]')) document.getElementsByName('chkdel[]').item(c).checked = this.checked" > 
								<i class="glyphicon glyphicon-arrow-up">เลือกทั้งหมด</i> </b> 
								<input type="submit" name="btnsave" value="ลบ" class="btn btn-danger">
								</p>
	                        
	                        </div>
                  	</div>
                </form>
            </div>
        </div>
	</div>


 </body>
 </html>