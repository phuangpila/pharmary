<?php

session_start();
error_reporting(0);
if($_SESSION["id"]!=""){

$itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";

if (!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
    $_SESSION['qty'][] = array();
}

$key = array_search($itemId, $_SESSION['cart']);
$_SESSION['qty'][$key] = "";

$_SESSION['cart'] = array_diff($_SESSION['cart'], array($itemId));
header('location:cart.php?a=remove');

}else{
    echo "<script type='text/javascript'>alert('กรุณา Login ก่อน');</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php' />";
}
?>