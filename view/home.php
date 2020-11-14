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

if (isset($_POST['confirmOrder'])) {
    $prodname = $_POST['pnameoption'];
    $customer = $_POST['customer'];
    $phone = $_POST['phone'];
    $quantity = $_POST['tquantity'];
    $totalprice = $_POST['price'];
    $status ='pending';

    $date_timestamp = strtotime($_POST["dates"]);
    $resdate = date("Y-m-d", $date_timestamp);
     
    // retieve all products
    $prdct = new Product();
    $allprod = $prdct->getAllProduct();    

    // search productid corresponding to product name we have 
    if (! empty($allprod)) {
        foreach ($allprod as $k => $v) {
            $pname= $allprod[$k]["pname"]; 
            if($prodname == $pname){
                $productid = $allprod[$k]["productid"]; 
            }

        }
    }

    // new object to register new Order
        $orderobj = new Order();
        $insertId = $orderobj->addOrder($productid,$customer,$phone,$resdate,$quantity,$totalprice,$status);
        if (empty($insertId)) {
            echo "<script>alert('Problem in Recording');</script>";
            $response = array(
                "message" => "Problem in Adding New Record",
                "type" => "error"
            );
        } else {
            echo "<script>alert('Record successfull.');</script>";
            header("Location: home.php");         
        }
        echo "<script>window.location.href='home.php'</script>";
        }
    // end registration

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
                       <a href="student_courses.php">Go To Orders</a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
    
    <div class="container">
        <ul class="menu-list">
            <li><a href="#" class="mb-2 mr-2 btn-transition btn btn-outline-dark active">Home</a></li>
            <li><a href="orders.php" class="mb-2 mr-2 btn-transition btn btn-outline-dark">Orders</a></li>
            <li><a href="orderchanges.php" class="mb-2 mr-2 btn-transition btn btn-outline-dark">Update|Delete</a></li>
        </ul>
    </div>

    <!-- body content division -->
    <div class="bodycontent">
        <div class="content-holder">
            <div class="card-body">
                <h5 class="card-title">Please Fill All Fields For Order Recording</h5>
                <form id="orderForm" class="col-md-10 mx-auto" method="post" action="" novalidate="novalidate">
                    
                    <div class="form-group">
                        <?php 
                            // retieve all Products
                            $cat = new Product();
                            $allproduct = $cat->getAllProduct();    
                        ?>
                        <label for="pnameoption">Select Product </label>
                        <div>
                            <select class="mb-2 form-control" id="pnameoption" name="pnameoption" onblur="checkproducttype(this.value)">
                                <?php 
                                // fill all products in selection box
                                if (! empty($allproduct)) {
                                    foreach ($allproduct as $k => $v) {
                                        
                                ?>
                                    <option><?php echo $allproduct[$k]["pname"];  ?></option>
                                    <?php }}?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="punit">Price / Unit</label>
                        <div>
                            <input type="text" class="form-control txt" id="punit" name="punit" placeholder="Price/unit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tquantity">Total Quantity Ordered</label>
                        <div>
                            <input type="text" class="form-control txt" id="tquantity" name="tquantity" placeholder="Ordered Quantity">
                        </div>
                     </div>
                    <div class="form-group">
                        <label for="sum">Product Price Rwf</label>
                        <div>
                            <textarea id="sum" class="form-control" name="price">0</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="customer">Customer Name</label>
                        <div>
                            <input type="text" class="form-control" id="customer" name="customer" placeholder="Customer Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Customer Phone Number</label>
                        <div>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Customer phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <div class="input-group">
                                    <div class="input-group-prepend datepicker-trigger">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="date" name="dates" data-toggle="datepicker-icon">
                            </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark" name="confirmOrder" value="Save Record">Save Record</button>
                    </div>
                </form>
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
