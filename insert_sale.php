<?php 
$hide='Y';
error_reporting(0);
	include('include/comtop.php');
	include('include/db.php');

	//$chkdel = $_POST["chkdel"];

	/*for ($i=0; $i <count($chkdel); $i++) { 
		
		$sql="DELETE FROM tb_student WHERE Id_student = ".$chkdel[$i]." ";
		mysql_query($sql);
	}*/
	//<input type="checkbox" name="chkdel[]" value="$rs["Id_student"];"  />
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
               
	<table cellpadding="0" cellspacing="0" border="0"   id="example">
  <thead>
  
  <tr  align="center" bgcolor="#FFFF33">
    <td ><b>ลำดับ</b></td>
    <td><b>ชื่อยา</b></td>
    <td><b>ราคา</b></td>
    <td ><b>จำนวน</b></td>
   
  </tr>
  </thead>
  <tbody>
  <tr >
    <td align="center"><input type="checkbox" name="m"></td>
    <td align="center">mmm</td>
    <td align="center">ออออ</td>
    <td align="center">รรรรร</td>
  </tr>
  
<tfoot>
	<tr >
    <td align="center"></td>
    <td align="center"></td>
    <td align="center"></td>
    <td align="center">20</td>
  </tr>
</tfoot>
</table>
</div>
            </div>
        </div>
	</div>
</body>
</body>
</html>