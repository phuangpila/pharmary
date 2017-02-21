<?php 
include('include/db.php');

	$data = array(
	"type_name"=>$_POST["derung"],
);
insert("tb_typepro",$data);

/*$newdata = array(
"type_name"=>$_POST["type"],
);
update("tb_typepro",$newdata,"type_id = 1");*/

//delete("tb_typepro","type_id = 1");

?>