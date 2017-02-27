<?php
$hide='Y';
session_start();
include('include/db.php');
include('include/comtop.php');

$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if (isset($_SESSION['qty'])) {
	$meQty = 0;
	foreach ($_SESSION['qty'] as $meItem) {
		$meQty = $meQty + $meItem;
	}
} else {
	$meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0) {
	$itemIds = "";
	foreach ($_SESSION['cart'] as $itemId) {
		$itemIds = $itemIds . $itemId . ",";
	}
	$inputItems = rtrim($itemIds, ",");
	$meSql = "SELECT * FROM tb_product WHERE pro_id in ({$inputItems})";
	$meQuery = mysql_query($meSql);
	$meCount = mysql_num_rows($meQuery);
} else {
	$meCount = 0;
}
$sum=0;
  /* $meSql = "INSERT INTO tb_sale (status) VALUES ('0') ";
    $meQeury = mysql_query($meSql);
    $sale_id = mysql_insert_id();*/
    while ($meResult = mysql_fetch_array($meQuery)){
        $key = array_search($meResult['pro_id'], $_SESSION['cart']);
        $total_price = $total_price + ($meResult['pro_price'] * $_SESSION['qty'][$key]);

/*echo $meResult['pro_id']."pro_id <br>";
echo $meResult['pro_name']."pro_name <br>";
echo $_SESSION['qty'][$key]."pro_qty <br>";
echo $meResult['pro_price']."pro_price <br>";
*/
$sum=$meResult['pro_unit']-$_SESSION['qty'][$key];
            $data = array(
"sale_id"=>$sale_id,
"pro_id"=>$meResult['pro_id'],
"sale_unit"=>$_SESSION['qty'][$key],
"sale_price"=>$meResult['pro_price'],
);
insert("tb_sale_detail",$data);

$data = array(

"pro_unit"=>$sum,
);
update("tb_product",$data,"pro_id ='".$meResult['pro_id']."' ");
    }
    unset($_SESSION['cart']);
     unset($_SESSION['qty']);
     echo "<script type='text/javascript'>window.opener.location.reload('add_sale.php');window.close();</script>";
?>