<?php
function status_date_notify($endDate){
    $chk_day_now=time();
    $chk_day_expire=strtotime($endDate);
    $chk_day30=strtotime($endDate." -30 day");
    $chk_day15=strtotime($endDate." -15 day");
    $chk_day7=strtotime($endDate." -7 day");
    //  สามารถเพิ่มตัวแปร และเงื่อนไข เพิ่มเติมสำหรับตรวจสอบได้ตามต้องการ
    if($chk_day_now>=$chk_day_expire){
        return 5; // เงื่อนไขรายการเมื่อหมดอายุ
    }else{
        if($chk_day_now>=$chk_day30 && $chk_day_now<$chk_day15){
            return 4; // เงื่อนไขรายการจะหมดอายุในอีก 30 วัน
        }elseif($chk_day_now>=$chk_day15 && $chk_day_now<$chk_day7){
            return 3; // เงื่อนไขรายการจะหมดอายุในอีก 15 วัน
        }elseif($chk_day_now>=$chk_day7 && $chk_day_now<$chk_day_expire){
            return 2; // เงื่อนไขรายการจะหมดอายุในอีก 7 วัน
        }else{
            return 1; // เงื่อนไขรายการยังไม่หมดอายุ
        }
    }
}
////////////////////////////////////////////////
//////        ตัวอย่างการประยุกต์ใช้งานอย่างง่าย
//////////////////////////////////////////////////
 
$case_notify=status_date_notify("2016-01-01");
switch($case_notify){
    case 5:
        echo "เงื่อนไขรายการเมื่อหมดอายุ";
        break;  
    case 4:
        echo "เงื่อนไขรายการจะหมดอายุในอีก 30 วัน";
        break;  
    case 3:
        echo "เงื่อนไขรายการจะหมดอายุในอีก 15 วัน";
        break;  
    case 2:
        echo "เงื่อนไขรายการจะหมดอายุในอีก 7 วัน";
        break;  
    default:  // กรณีค่าเท่ากับ 1  
        echo "เงื่อนไขรายการยังไม่หมดอายุ";
        break;                                  
}
?>