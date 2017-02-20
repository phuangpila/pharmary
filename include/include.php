<?php

	function Connect(){
		$host="127.0.0.1";
		$sqlusername="root"; 
		$sqlpassword=""; 
		$db_name="pharmacy"; 

		mysql_connect("$host", "$sqlusername", "$sqlpassword")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");
		mysql_query("SET NAMES UTF8");
	}
	
	function db_num_rows($rcs){
		return $this->MYSQL_NUM_ROWS($rcs);
	}

	/*
	 * Insert ข้อมูล
	 * @tbName		ชื่อตารางที่จะ Insert
	 * @data		ข้อมูลที่จะ Insert เป็น Array โดย Key คือชื่อ Field, Value คือ ข้อมูลที่จะเพิ่ม
	 * @outID		ต้องการเลข PK ล่าสุดที่เพิ่ม  ถ้าต้องการใส่ Y
	 */
	public function db_insert($tbName, $data, $outID = "")
	{
		$fieldArray = array();
		$valueArray = array();

		foreach($data as $_key => $_val)
		{
			array_push($fieldArray, $_key);
			array_push($valueArray, "'".$_val."'");
		}

		$setSQL = "INSERT INTO ".$tbName." (".implode(', ', $fieldArray).") VALUES (".implode(', ', $valueArray).")";
		$this->QUERY($setSQL);
		if($outID != "")
		{
			return mysqli_insert_id();
		}
		return null;
	}

	/*
	 * Update ข้อมูล
	 * @tbName		ชื่อตารางที่จะ Update
	 * @data		ข้อมูลที่จะ Update เป็น Array โดย Key คือชื่อ Field, Value คือ ข้อมูลที่จะเพิ่ม
	 * @cond		เงื่อนไข เป็น Array โดย Key คือชื่อ Field ที่จะ Where, Value คือ ข้อมูลที่จะ Where
	 */
	public function db_update($tbName, $data, $cond)
	{
		$updateData = $this->setArray2String($data);
		$condition = $this->setArray2String($cond, " AND ");

		$setSQL = "UPDATE ".$tbName." SET ".$updateData." WHERE 1=1 AND ".$condition;
		$this->QUERY($setSQL);
	}

	/*
	 * Delete ข้อมูล
	 * @tbName		ชื่อตารางที่จะ Delete
	 * @cond		เงื่อนไข เป็น Array โดย Key คือชื่อ Field ที่จะ Where, Value คือ ข้อมูลที่จะ Where
	 */
	public function db_delete($tbName, $cond)
	{
		$condition = $this->setArray2String($cond, " AND ");

		$setSQL = "DELETE FROM ".$tbName." WHERE 1=1 AND ".$condition;
		$this->QUERY($setSQL);
	}

	
	function condate($date){
		$mont_th = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
		$monthname = array('','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.');
		if($date != ""){
			$date1 = str_replace("  ", " ", $date);
			$d = explode(" ", $date1);
			//$month = sprintf("%02d", array_search($d[1], $mont_th_short));
			$month1 = $mont_th[$month * 1];
			$day = number_format($d[0]) . "  " . $d[1] . "  " . ($d[2] + 543);
			return $day;
		}

	}
	
	function conDateText($date, $type){
		$mont_th = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
		$monthname = array('','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.');

		if($date == "" OR $date == "0000-00-00" ){
			return "";
		}else{
			$d = explode("-",$date);
			if($type == "F"){
				$nd = number_format($d[2],0)." ".$mont_th[number_format($d[1],0)]." ".($d[0] + 543);
			}else{
				$nd = number_format($d[2],0)." ".$monthname[number_format($d[1],0)]." ".($d[0] + 543);
			}
			
			return $nd;
		}
	}
	
	function condate_my($date){
		if($date == ""){
			return "0000-00-00";
		}else{
			$d = explode("/",$date);
			$nd = ($d[2] - 543)."-".sprintf("%02d",$d[1])."-".sprintf("%02d",$d[0]);
			return $nd;
		}
	}
	
	function condate_ora($date){
		if ($date) {
			$mont_th_short = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
			$sp_date = explode("/", $date);
			// หา เป็นเดือนที่มี 5 char หรือ 4   ถ้า 5  จะเว้นช่องว่างแค่ 1  ช่อง
			if (strlen($mont_th_short[($sp_date[1] * 1)]) == 5) {
				$space = " ";
			} else {
				$space = "  ";
			} //
			return $sp_date[0] . " " . $mont_th_short[($sp_date[1] * 1)] . $space . ($sp_date[2] - 543);
		} else {
			return ;
		}  // if	
	}
	function convert_date_to_db($date) {		
		if(strtoupper($this->system_DBTYPE) == 'MYSQL' || strtoupper($this->system_DBTYPE) == 'MSSQL'){
			return $this->condate_my($date);
		}
		
		if(strtoupper($this->system_DBTYPE) == 'ORACLE'){
			return $this->condate_ora($date);
		}
	}
	
	//-------------------------------------//
	function show_date_my($date){
		if($date){
			$mont_th_short = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
			list($y,$m,$d) = explode("-",$date);
			return $d." ".$mont_th_short[$m]." ".($y+543);
		}else{
			return ;
		}
	}
	
	
	function random_num($len){
		srand((double)microtime()*10000000);
		$chars = "ABCDEFGHJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz123456789";
		$ret_str = "";
		$num = strlen($chars);
		for($i=0;$i<$len;$i++){
			$ret_str .= $chars[rand()%$num];
		}
		return $ret_str;
	}
	
	//show in calendar
	function convert_to_calendar($date) {
		$mont_th_short = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
		if ($date != "") {
			$date1 = str_replace("  ", " ", $date);
			$d = explode(" ", $date1);
			$day = $d[0] . "/" . sprintf("%02d", array_search($d[1], $mont_th_short)) . "/" . ($d[2] + 543);
			return $day;
		}
	}
	
	//format ค.ศ./เดือน/วันที่
	function convert_to_slash($date) {
		$mont_th_short = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
		if ($date != "") {
			$date1 = str_replace("  ", " ", $date);
			$d = explode(" ", $date1);
			$day = ($d[2]) . "/" . sprintf("%02d", array_search($d[1], $mont_th_short)) . "/" . $d[0];
			return $day;
		}
	}
	
	function db_fetch_array(){
		return MYSQL_FETCH_ARRAY();
	}
	
	function db_close(){
		return mysql_close();
	}

?>