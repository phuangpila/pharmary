<?php
$hide='Y';
session_start();
include('include/db.php');
include('include/comtop.php');

$meSql = "SELECT * FROM tb_product WHERE date_expiretion<CURDATE() AND pro_unit > 0 ";
$meQuery = mysql_query($meSql);

$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if(isset($_SESSION['qty'])){
    $meQty = 0;
    foreach($_SESSION['qty'] as $meItem){
        $meQty = $meQty + $meItem;
    }
}else{
    $meQty=0;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/nava.css" rel="stylesheet">
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
        <div class="container">

            <!-- Static navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"></a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="insert_sale.php">สินค้า</a></li>
                            <li><a href="cart.php">สินค้าที่จะขาย <span class="badge"><?php echo $meQty; ?></span></a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </div>

            <h3>สินค้า</h3>
<?php
if($action == 'exists'){
    echo "<div class=\"alert alert-warning\">มีสินค้าชิ้นนี้แล้ว</div>";
}
if($action == 'add'){
    echo "<div class=\"alert alert-success\">เพิ่มสินค้าเรียบร้อยแล้ว</div>";
}
if($action == 'order'){
    echo "<div class=\"alert alert-success\">ขายสินค้าเรียบร้อยแล้ว</div>";
}
if($action == 'orderfail'){
    echo "<div class=\"alert alert-warning\">ขายสินค้าไม่สำเร็จ มีข้อผิดพลาดเกิดขึ้นกรุณาลองใหม่อีกครั้ง</div>";
}
?>
            <table cellpadding="0" cellspacing="0" border="0" id="example">
                <thead>
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>รายละเอียด</th>
                        <th>ราคา</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($meResult = mysql_fetch_array($meQuery))
                    {
                        ?>
                        <tr>
                            <td><?php echo $meResult['pro_id']; ?></td>
                            <td><?php echo $meResult['pro_name']; ?></td>
                            <td><?php echo $meResult['pro_description']; ?></td>
                            <td><?php echo number_format($meResult['pro_price'],2); ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="update_cart.php?itemId=<?php echo $meResult['pro_id']; ?>" role="button">เลือก</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

        </div> <!-- /container -->

    </body>
</html>
<?php
mysql_close();
?>