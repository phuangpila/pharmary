<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>นพเกล้าเภสัช</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="include/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="include/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="include/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='include/assets/css/sens.css' rel='stylesheet' type='text/css' />
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->


   <link rel="stylesheet" type="text/css" href="include/dataTable/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="include/dataTable/dataTables.jqueryui.css">
    <script type="text/javascript" language="javascript" src="include/dataTable/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" language="javascript" src="include/dataTable/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="include/dataTable/dataTables.jqueryui.js"></script>
</head>

<style type="text/css">
html, body { 
   height: 100%; /* ให้ html และ body สูงเต็มจอภาพไว้ก่อน */
   margin: 0;
   padding: 0;
}
.navbar {
background: #0264d6; /* Old browsers */
background: -moz-radial-gradient(center, ellipse cover,  #0264d6 1%, #1c2b5a 100%); /* FF3.6+ */
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(1%,#0264d6), color-stop(100%,#1c2b5a)); /* Chrome,Safari4+ */
background: -webkit-radial-gradient(center, ellipse cover,  #0264d6 1%,#1c2b5a 100%); /* Chrome10+,Safari5.1+ */
background: -o-radial-gradient(center, ellipse cover,  #0264d6 1%,#1c2b5a 100%); /* Opera 12+ */
background: -ms-radial-gradient(center, ellipse cover,  #0264d6 1%,#1c2b5a 100%); /* IE10+ */
background: radial-gradient(ellipse at center,  #0264d6 1%,#1c2b5a 100%);
}
.logout-spn{
  margin-top: 15px;
}

</style>

<body>
<?php
if($hide=='Y'){

}else{
?>
      <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="include/assets/img/logo.png" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="index.php" style="color:#fff;">ออกจากระบบ</a>  

                </span>
            </div>
        </div>
        
 <br>

    
   <?php
 }
   ?>    
   <!-- <script src="include/assets/js/jquery-1.10.2.js"></script>
    <script src="include/assets/js/bootstrap.min.js"></script>
    <script src="include/assets/js/custom.js"></script> -->
</body>
</html>
