<?php 
include('include/db.php');
session_start();
error_reporting(0);

$pass_word=stripslashes(htmlspecialchars(trim($_POST['pass_word']), ENT_QUOTES));
$re_password=$_POST['re_password'];
$name=$_POST['name'];

if($pass_word == $re_password ){
$login_check = hash('sha1', $pass_word.$_SESSION["username"]);
$newdata = array(
"name"=>$name,
"pass_word"=>$login_check,
);

update("tb_user",$newdata,"id_auto = '".$_SESSION["id"]."' ");
echo "<script type='text/javascript'>alert('แก้ไข Password เรียบร้อยแล้ว');</script>";
			echo "<meta http-equiv='refresh' content='0;url=show_detail.php' />";	
}else{
	echo "<script type='text/javascript'>alert('Password ไม่ต้องกัน ลองใหม่อีกครั้ง');</script>";
			echo "<meta http-equiv='refresh' content='0;url=edit_profile.php' />";	
}
?>