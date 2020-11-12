<?php
// include Function  files
require_once ("../controller/DBController.php");
require_once ("../controller/Product.php");
require_once ("../controller/Category.php");

?>


<html>
<head>
<title>MyGarden Home</title>
<link href="../assets/css/style.css" type="text/css" rel="stylesheet" />
<link href="../assets/font-awsome/css/font-awesome.min.css" rel="stylesheet"/>
<link href="../assets/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../admin/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
</head>
<body>
    <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer" ><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">
                   
                   Welcome
                   
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
            <li><a href="index.php" class="mb-2 mr-2 btn-transition btn btn-outline-dark active">Home</a></li>
            <li><a href="new_order.php" class="mb-2 mr-2 btn-transition btn btn-outline-dark">Order</a></li>
            <li><a href="update_order.php" class="mb-2 mr-2 btn-transition btn btn-outline-dark">Update</a></li>
        </ul>
    </div>

    <!-- body content division -->
    <div class="bodycontent">
        <div class="content-holder">
            <div class="card-body">
                <h5 class="card-title">Please Fill All Fields</h5>
                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="" novalidate="novalidate">
                    
                    <div class="form-group">
                        <?php 
                            // retieve all Products
                            $cat = new Product();
                            $allproduct = $cat->getAllProduct();    
                        ?>
                        <label for="pnameoption">Select Product </label>
                        <div>
                            <select class="mb-2 form-control" id="pnameoption" name="pnameoption">
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
                        <label for="tquantity">Total Quantity Ordered</label>
                        <div>
                            <input type="text" class="form-control" id="tquantity" name="tquantity" placeholder="Ordered Quantity">
                        </div>
                     </div>
                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <div>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Product Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="customer">Customer Name</label>
                        <div>
                            <input type="text" class="form-control" id="customer" name="customer" placeholder="Customer Name">
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
                        <label for="pdescription">Product Description</label>
                        <div>
                            <textarea class="form-control" id="pdescription" name="pdescription" placeholder="Product Descriprion"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark" name="registerProduct" value="Save Record">Save Record</button>
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
            
            <p class="pull-right">Theme by: <a href="#">ABA</a></p>
            
        </div><!-- col-md-6 Finish -->
    </div><!-- container Finish -->
</div><!-- #copyright Finish -->

<script type="text/javascript" src="../admin/assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>