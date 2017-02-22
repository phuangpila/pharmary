<?php 
include('include/db.php');

	$data = array(
	"type_name"=>$_POST["derung"],
);
insert("tb_typepro",$data);

?>