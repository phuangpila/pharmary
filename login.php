<?php 
	include('include/db.php');
	error_reporting(0);
	session_start();
$user_name=stripslashes(htmlspecialchars(trim($_POST['user_name']), ENT_QUOTES));
$pass_word=stripslashes(htmlspecialchars(trim($_POST['pass_word']), ENT_QUOTES));
	if($user_name != "" && $pass_word != ""){

	$login_check = hash('sha1', $pass_word.$user_name);
	
$strSql = "SELECT * FROM tb_user WHERE user_name='".$user_name."' AND pass_word='".$login_check."' ";
	$sqlQuery = mysql_query($strSql);
	$rec = mysql_num_rows($sqlQuery);
		if ($rec > 0) {
			$row = mysql_fetch_array($sqlQuery);
				$_SESSION["name"] =$row["name"]; 
				$_SESSION["id"] =$row["id_auto"];
				$_SESSION["username"] =$row["user_name"];
				echo "<meta http-equiv='refresh' content='0;url=show_detail.php' />";
		}else{
			
			echo "<script type='text/javascript'>alert('Username หรือ Password อาจจะผิดกรุณา Login ใหม่อีกครั้ง');</script>";
			echo "<meta http-equiv='refresh' content='0;url=index.php' />";	
		}
}
 ?>