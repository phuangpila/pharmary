<?php 
$hide='Y';
error_reporting(0);
	include('include/comtop.php');
	include('include/db.php');
  session_start();
if($_SESSION["id"]!=""){
  
if($_POST['order']=='1'){
  $c=intval($_POST['count']);

  $sql="INSERT INTO tb_order(status) VALUES('0')";
    mysql_query($sql) or die(mysql_error());
    $order_id=  mysql_insert_id();

  for ($i=1;$i<=$c;$i++) { 
   
    if($_POST['name'.$i]!="" && $_POST['unit'.$i]!="" && $_POST['price'.$i]!=""){
        $name=$_POST['name'.$i];
        $unit=$_POST['unit'.$i];
         $price=$_POST['price'.$i];
         $sup=$_POST['sup'];
$data = array( 
         "od_name"=>$name,
         "od_unit"=>$unit,
         "od_price"=>$price,
        "op_id"=>$order_id,
        "supp_id"=>$sup,
);
insert("tb_order_detail",$data);
    }
  }
  echo "<script type='text/javascript'>window.opener.location.reload('add_order.php');window.close();</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script language="javascript">
function CheckNum(){
    if (event.keyCode < 48 || event.keyCode > 57){
          event.returnValue = false;
        }
  }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var i=0;
        $(".add-row").click(function(){
            i++;
             var name="";
            var unit="";
            var price="";
            var markup = "<tr><td><input type='checkbox' name='record'></td><td><input typte='text' class='form-control' name='name"+i+"' required='' value="+name+" ></td><td><input typte='text' class='form-control' onKeyPress='CheckNum()' name='unit"+i+"' value="+unit+" ></td><td><input typte='text' class='form-control' onKeyPress='CheckNum()' name='price"+i+"' value="+price+" ></td></tr>";
            $("table tbody").append(markup);

        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
</script>
<script type="text/javascript">
var count = 0;
function add(){
     count++;
     document.getElementById('count').value = count;
}
</script>
</head>
<body>
<div class="row-fuild">
		<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >การสั่งซื้อยา</div>
                  	<div class="panel-body">
                     <form>
        <input type="button" class="add-row btn btn-success" value="เพิ่มแถว" onclick="add()">
        
    </form>
   <form action="insert_order.php" method="post" name="form1"> 
   
   <div class="col-xs-6 col-md-4"> 
   <div class="form-group">
   เลือกบริษัท :<select name="sup" class="form-control">
   <?php
      $sup="SELECT * FROM tb_supplier";
      $q_sup=mysql_query($sup);
      while ($res=mysql_fetch_array($q_sup)) {
   ?>
     <option value="<?php echo $res['supp_id'] ?>"><?php echo $res['supp_name'] ?></option>
     <?php
        }
     ?>
   </select>
   </div>
   </div>
   <br>  
	<table class="table table-bordered">
  <thead>
            <tr>
                <th>เลือก</th>
                <th>ชื่อยา</th>
                <th>จำนวน</th>
                <th>ราคา</th>
            </tr>
        </thead>
        <tbody>
<input type="hidden" name="order" value="1">
<input type="hidden" name="count" id="count" value="">

        </tbody>
    </table>
    <button type="button" class="delete-row btn btn-danger">ลบแถว</button>
<br>
<div align="center">
				<div>
					<input type="submit" name="btnSave" id="btnSave" class="btn btn-small btn-success" value="บันทึก" />
					<input type="button" class="btn btn-small btn-danger" value="ปิด" onclick="window.close();">
				</div>
			</div>
</form>
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