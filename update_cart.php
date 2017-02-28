<?php
include('include/db.php');
session_start();
$itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";
if ($_POST)
{
    for ($i = 0; $i < count($_POST['qty']); $i++)
    {
        $key = $_POST['arr_key_' . $i];
        $_SESSION['qty'][$key] = $_POST['qty'][$i];
        header('location:cart.php');
    }
} else
{
    if (!isset($_SESSION['cart']))
    {
        $_SESSION['cart'] = array();
        $_SESSION['qty'][] = array();
    }

    if (in_array($itemId, $_SESSION['cart']))
    {

    $itemIds = "";
    $sum=0;

    $meSql = "SELECT * FROM tb_product WHERE pro_id='".$itemId."' ";
    $meQuery = mysql_query($meSql);
    
        $key = array_search($itemId, $_SESSION['cart']);
        $sum=$meQuery['pro_unit']-$_SESSION['qty'][$key];
if($sum<=0){
        $_SESSION['qty'][$key];
 }else{
     $_SESSION['qty'][$key] = $_SESSION['qty'][$key]+1;
 }
        header('location:insert_sale.php?a=exists');    
    } else
    {
        array_push($_SESSION['cart'], $itemId);
        $key = array_search($itemId, $_SESSION['cart']);
        $_SESSION['qty'][$key] = 1;
        header('location:insert_sale.php?a=add');
    }
}
?>