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
            <li><a href="#" class="mb-2 mr-2 btn-transition btn btn-outline-dark active">Orders</a></li>
            <li><a href="orderchanges.php" class="mb-2 mr-2 btn-transition btn btn-outline-dark">Update|Delete</a></li>
        </ul>
    </div>

    <!-- body content division -->
    <div class="bodycontent">
        <div class="content-holder2">
                        <div class="card mb-3">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                <i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Orders Table
                                </div>
                                <div class="btn-actions-pane-right actions-icon-btn">
                                    <div class="btn-group dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                            <i class="pe-7s-menu btn-icon-wrapper"></i>
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-right rm-pointers dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu">
                                            <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                            <button type="button" tabindex="0" class="dropdown-item">
                                                <i class="dropdown-icon lnr-inbox"> </i><span>Menus</span>
                                            </button>
                                            <button type="button" tabindex="0" class="dropdown-item">
                                                <i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span>
                                            </button>
                                            <button type="button" tabindex="0" class="dropdown-item">
                                                <i class="dropdown-icon lnr-book"> </i><span>Actions</span>
                                            </button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <div class="p-3 text-right">
                                                <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                                <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- start card which contains Table -->
                            <div class="card-body">
                                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            <th>Order Dates</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                             // retieve all Products
                                                $oda = new Order();
                                                $allorders = $oda->getAllOrder();    

                                                // search category i corresponding to category name we have 
                                                if (! empty($allorders)) {
                                                    foreach ($allorders as $k => $v) {
                                                        $orderid= $allorders[$k]["orderid"];
                                                        $pid= $allorders[$k]["productid"]; 
                                                        $customer = $allorders[$k]["customer"];
                                                        $phone = $allorders[$k]["phone"];
                                                        $date = $allorders[$k]["reservationdate"];
                                                        $quant = $allorders[$k]["quantity"];
                                                        $tprice = $allorders[$k]["totalprice"];
                                                        $status = $allorders[$k]["status"];
                                                        
                                                        // retieve all Categories
                                                        $probj = new Product();
                                                        $allprod = $probj->getAllProduct();    

                                                        // search category i corresponding to category name we have 
                                                        if (! empty($allprod)) {
                                                            foreach ($allprod as $k => $v) {
                                                                $productid = $allprod[$k]["productid"];
                                                                if($pid == $productid){ 
                                                                    $pname= $allprod[$k]["pname"]; 
                                                                }


                                                            }
                                                                
                                                        ?>
                                                        
                                        <tr>
                                            <td><?php echo $orderid; ?></td>
                                            <td><?php echo $pname; ?></td>
                                            <td><?php echo $quant; ?></td>
                                            <td><?php echo $tprice; ?></td>
                                            <td><?php echo $customer; ?></td>
                                            <td><?php echo $phone; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td><?php echo $status; ?></td>
                                        </tr>
                                        <?php 
                                                        
                                                }

                                                    }
                                                }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            <th>Order Dates</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- End card which contains Table -->
                        </div>
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
