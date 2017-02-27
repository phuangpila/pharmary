<?php 

include('include/db.php');

session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>นพเกล้าเภสัช</title>
</head>
<body>
        <?php include("include/comtop.php");  ?>
         <h2>&nbsp;นพเกล้าเภสัช</h2>  <hr>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>ยินดีต้อนรับ </strong> <?php echo $_SESSION["name"]; ?>
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="add_type_derug.php" >
 <i class="fa fa-pencil fa-5x"></i>
                      <h4>ข้อมูลประเภทยา</h4>
                      </a>
                      </div>
                  </div> 
                 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="derug.php" >
 <i class="fa fa-flask fa-5x"></i>
                      <h4>ข้อมูลยา</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="add_order.php" >
 <i class="fa fa-arrow-circle-down fa-5x"></i>
                      <h4>ข้อมูลการซื้อ</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="add_sale.php" >
 <i class="fa fa-arrow-circle-up fa-5x"></i>
                      <h4>ข้อมูลการขาย</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="edit_profile.php" >

 <i class="fa fa-user fa fa-5x"></i>

                      <h4>แก้ไขข้อมูลสส่วนตัว </h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="supplier.php" >
 <i class="fa fa-users fa-5x"></i>
                      <h4>ข้อมูลบริษัท</h4>
                      </a>
                      </div>
                    
                     
                  </div>
              </div>
                 <!-- /. ROW  --> 
                <div class="row text-center pad-top">
                 
                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="store.php" >
 <i class="fa fa-bank fa-5x"></i>
                      <h4>ข้อมูลร้าน</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="report_order.php" >
 <i class="fa fa-clipboard fa-5x"></i>
                      <h4>รายงานการสั่งยา</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-clipboard fa-5x"></i>
                      <h4>รายงานการขายยา</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="report_end_date.php" >
 <i class="fa fa-clipboard fa-5x"></i>
                      <h4>รายงานยาหมดอายุ </h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-clipboard fa-5x"></i>
                      <h4>Launch</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-user fa-5x"></i>
                      <h4>Register User</h4>
                      </a>
                      </div>
                  </div> 
              </div>   
        </div>
          
<?php include("include/combuttom.php"); ?>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="include/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="include/assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="include/assets/js/custom.js"></script>
    
   
</body>
</html>