<?php
$hide='Y';
session_start();
include('include/db.php');
include('include/comtop.php');

$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if (isset($_SESSION['qty']))
{
    $meQty = 0;
    foreach ($_SESSION['qty'] as $meItem)
    {
        $meQty = $meQty + $meItem;
    }
} else
{
    $meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0)
{
    $itemIds = "";
    foreach ($_SESSION['cart'] as $itemId)
    {
        $itemIds = $itemIds . $itemId . ",";
    }
    $inputItems = rtrim($itemIds, ",");
    $meSql = "SELECT * FROM tb_product WHERE pro_id in ({$inputItems})";
    $meQuery = mysql_query($meSql);
    $meCount = mysql_num_rows($meQuery);
} else
{
    $meCount = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <script>
function submit()
{
    form.submit();
} </script>
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
                            <li ><a href="insert_sale.php">หน้าแรกสินค้า</a></li>
                            <li class="active"><a href="cart.php">ตะกร้าสินค้าของฉัน <span class="badge"><?php echo $meQty; ?></span></a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </div>
			<h3>ตะกร้าสินค้าของฉัน</h3>
            <?php
            if ($action == 'removed')
            {
                echo "<div class=\"alert alert-warning\">ลบสินค้าเรียบร้อยแล้ว</div>";
            }
            if ($meCount == 0)
            {
                echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
            } else
            {
                ?>
                <form action="update_cart.php" method="post" name="fromupdate">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ชื่อสินค้า</th>
                                <th>รายละเอียด</th>
                                <th>จำนวน</th>
                                <th>ราคาต่อหน่วย</th>
                                <th>จำนวนเงิน</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_price = 0;
                            $num = 0;
                            while ($meResult = mysql_fetch_array($meQuery))
                            {
                                $key = array_search($meResult['pro_id'], $_SESSION['cart']);
                                $total_price = $total_price + ($meResult['pro_price'] * $_SESSION['qty'][$key]);
                                ?>
                                <tr>
                                    <td><?php echo $meResult['pro_name']; ?></td>
                                    <td><?php echo $meResult['pro_description']; ?></td>
                                    <td>
                                        <input type="text" onkeyup="submit();" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control" style="width: 60px;text-align: center;">
                                        <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
                                    </td>
                                    <td><?php echo number_format($meResult['pro_price'],2); ?></td>
                                    <td><?php echo number_format(($meResult['pro_price'] * $_SESSION['qty'][$key]),2); ?></td>
                                    <td>
                                        <a class="btn btn-danger btn-lg" href="remove_cart.php?itemId=<?php echo $meResult['pro_id']; ?>" role="button">
                                            <span class="glyphicon glyphicon-trash"></span>
                                            ลบทิ้ง</a>
                                    </td>
                                </tr>
                                <?php
                                $num++;
                            }
                            ?>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                                    <h4>จำนวนเงินรวมทั้งหมด <?php echo number_format($total_price,2); ?> บาท</h4>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                
                                    <a href="sale.php" type="button" class="btn btn-primary btn-lg">สังซื้อสินค้า</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php
            }
            ?>

        </div> <!-- /container -->
    </body>
</html>
