<?php
session_start();
if(strlen($_SESSION['uid'])=="")
{
  header('location:logout.php');
} else {

?>



<?php
// include Function  files
require_once ("../controller/DBController.php");
require_once ("../controller/Product.php");
require_once ("../controller/Category.php");
require_once ("../controller/Order.php");

    

?>


<html>
<head>
    <title>MyGarden Home</title>
    <link href="../assets/css/style.css" type="text/css" rel="stylesheet" />
    <link href="../assets/font-awsome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="../assets/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../admin/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
</head>
<body>
    <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer" ><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">
                   
                   Welcome <?php  echo  $_SESSION['fullname'];?>
                   
               </a>
               <!-- <h2>MyGarden</h2> -->
               <div class="app-header__logo">
                    <div class="logo-src"></div>
                </div>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6 right" ><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="logout.php">Logout</a>
                   </li>
                   <li>
                       <a href="account.php">My Account</a>
                   </li>
                   <li>
                       <a href="orders.php">Go To Orders</a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
    
    <div class="container">
        <ul class="menu-list">
            <li><a href="home.php" class="mb-2 mr-2 btn-transition btn btn-outline-dark">Home</a></li>
            <li><a href="orders.php" class="mb-2 mr-2 btn-transition btn btn-outline-dark">Orders</a></li>
            <li><a href="#" class="mb-2 mr-2 btn-transition btn btn-outline-dark active">Update|Delete</a></li>
        </ul>
    </div>

    <!-- body content division -->
    <div class="bodycontent">
        <div class="content-holder2">
            <!-- sart contents on orderchanges -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="container">
                            <div class="search">Search</div>
                            <div class="searchresult">result</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container">
                        </div>
                    </div>
                </div>
                        
            <!-- end contents on orderchanges -->
         </div>
    </div>
    <!-- end body contentdiv -->


    <div id="copyright"><!-- #copyright Begin -->
    <div class="container"><!-- container Begin -->
        <div class="col-md-6"><!-- col-md-6 Begin -->
            
            <p class="pull-left">&copy; 2020 All Rights Reserve</p>
            
        </div><!-- col-md-6 Finish -->
        <div class="col-md-6"><!-- col-md-6 Begin -->
            
            <p class="pull-right">Designed by: <a href="#">ABA</a></p>
            
        </div><!-- col-md-6 Finish -->
    </div><!-- container Finish -->
</div><!-- #copyright Finish -->

<script type="text/javascript" src="../admin/assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
<!-- <script src="../assets/js/jquery-3.2.1.min.js"></script> -->
<script src="../assets/js/bootstrap.min.js"></script>
<script>
 $(document).ready(function(){

  //iterate through each textboxes and add keyup
  //handler to trigger sum event
  $(".txt").each(function() {

   $(this).keyup(function(){
    calculateSum();
   });
  });

 });

 function calculateSum() {

  var sum = 1;
  //iterate through each textboxes and add the values
  $(".txt").each(function() {

   //add only if the value is number
   if(!isNaN(this.value) && this.value.length!=0) {
    sum *= parseFloat(this.value);
   }

  });
  //.toFixed() method will roundoff the final sum to 2 decimal places
  $("#sum").html(sum.toFixed(2));
 }
</script>
    </body>
</html>

<?php } ?>
