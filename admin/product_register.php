
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

// Object creation

$db_handle = new DBController();

if (isset($_POST['registerProduct'])) {
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $date_timestamp = strtotime($_POST["dates"]);
    $dateplanted = date("Y-m-d", $date_timestamp);

    $category= $_POST['category'];
    $description= $_POST['pdescription'];    
    
     
    // retieve all Categories
    $catg = new Category();
    $allcatg = $catg->getAllCategory();    

    // search category i corresponding to category name we have 
    if (! empty($allcatg)) {
        foreach ($allcatg as $k => $v) {
            $catname= $allcatg[$k]["catname"]; 
            if($catname == $category){
                $categoryid = $allcatg[$k]["categoryid"]; 
            }


        }
    }

    // new object to register new Product
        $productobj = new Product();
        $insertId = $productobj->addProduct($categoryid,$pname,$dateplanted,$price,$quantity,$description);
        if (empty($insertId)) {
            echo "<script>alert('Problem in registration');</script>";
            $response = array(
                "message" => "Problem in Adding New Record",
                "type" => "error"
            );
        } else {
            echo "<script>alert('Registration successfull.');</script>";
            header("Location: product_register.php");         
        }
        echo "<script>window.location.href='product_register.php'</script>";
        }
    // end registration


?>





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>MyGarden-Dashboard.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="main.d810cf0ae7f39f28f336.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                
                <div class="app-header-right">
                    
                    
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-2" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">ABAREMY</div>
                                                                    <div class="widget-subheading opacity-8">MyGarden Admin and Business Dir.</div>
                                                                </div>
                                                                <div class="widget-content-right mr-2">
                                                                    <button class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="scroll-area-xs" style="height: 150px;">
                                                <div class="scrollbar-container ps">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">Activity</li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider mb-0 nav-item"></li>
                                            </ul>
                                            
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider nav-item">
                                                </li>
                                                <li class="nav-item-btn text-center nav-item">
                                                    <button class="btn-wide btn btn-primary btn-sm"> Account Info </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading"> <?php  echo  $_SESSION['fullname'];?> </div>
                                    <div class="widget-subheading"> MyGarden Admin </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-btn-lg">
                        <button type="button" class="hamburger hamburger--elastic open-right-drawer">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>        </div>
            </div>
        </div>        
             
         <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>    
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Menu</li>
                            <li class="mm-active">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-rocket"></i>Dashboards
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="index.php" class="mm-active">
                                            <i class="metismenu-icon"></i>Profile
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-browser"></i>Pages
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="index.php">
                                            <i class="metismenu-icon"></i>Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product_register.php">
                                            <i class="metismenu-icon"></i>Register
                                        </a>
                                    </li>
                                    <li>
                                        <a href="view_oders.php.php">
                                            <i class="metismenu-icon"></i>Oders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="view_users.php">
                                            <i class="metismenu-icon"></i>Users
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                           
                            <li class="app-sidebar__heading">UI Components</li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-diamond"></i> Elements
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon"></i> Buttons
                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="elements-buttons-standard.html">
                                                    <i class="metismenu-icon"></i>Standard
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-buttons-pills.html">
                                                    <i class="metismenu-icon"></i>Pills
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-buttons-square.html">
                                                    <i class="metismenu-icon"></i>Square
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-buttons-shadow.html">
                                                    <i class="metismenu-icon"></i>Shadow
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-buttons-icons.html">
                                                    <i class="metismenu-icon"></i>With Icons
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="elements-dropdowns.html">
                                            <i class="metismenu-icon"></i>Dropdowns
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-icons.html">
                                            <i class="metismenu-icon"></i>Icons
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-badges-labels.html">
                                            <i class="metismenu-icon"></i>Badges
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-cards.html">
                                            <i class="metismenu-icon"></i>Cards
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-loaders.html">
                                            <i class="metismenu-icon"></i>Loading Indicators
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-list-group.html">
                                            <i class="metismenu-icon"></i>List Groups
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-navigation.html">
                                            <i class="metismenu-icon"></i>Navigation Menus
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-timelines.html">
                                            <i class="metismenu-icon"></i>Timeline
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-utilities.html">
                                            <i class="metismenu-icon"></i>Utilities
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-car"></i> Components
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="components-tabs.html">
                                            <i class="metismenu-icon"></i>Tabs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-accordions.html">
                                            <i class="metismenu-icon"></i>Accordions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-notifications.html">
                                            <i class="metismenu-icon"></i>Notifications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-modals.html">
                                            <i class="metismenu-icon"></i>Modals
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-loading-blocks.html">
                                            <i class="metismenu-icon"></i>Loading Blockers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-progress-bar.html">
                                            <i class="metismenu-icon"></i>Progress Bar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-tooltips-popovers.html">
                                            <i class="metismenu-icon"> </i>Tooltips &amp; Popovers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-carousel.html">
                                            <i class="metismenu-icon"></i>Carousel
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-calendar.html">
                                            <i class="metismenu-icon"></i>Calendar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-pagination.html">
                                            <i class="metismenu-icon"></i>Pagination
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-count-up.html">
                                            <i class="metismenu-icon"></i>Count Up
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-scrollable-elements.html">
                                            <i class="metismenu-icon"></i>Scrollable
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-tree-view.html">
                                            <i class="metismenu-icon"></i>Tree View
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-maps.html">
                                            <i class="metismenu-icon"></i>Maps
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-ratings.html">
                                            <i class="metismenu-icon"></i>Ratings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-image-crop.html">
                                            <i class="metismenu-icon"></i>Image Crop
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-guided-tours.html">
                                            <i class="metismenu-icon"></i>Guided Tours
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-display2"></i> Tables
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="tables-data-tables.html">
                                            <i class="metismenu-icon"> </i>Data Tables
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-regular.html">
                                            <i class="metismenu-icon"></i>Regular Tables
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-grid.html">
                                            <i class="metismenu-icon"></i>Grid Tables
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div><div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-note2 icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>MyGarden Dashboard / Register Products
                                    <div class="page-title-subheading">Here You will Add Product Record in your Database.</div>
                                </div>
                            </div>
                            <!-- <div class="page-title-actions">
                            </div>    -->
                         </div>
                    </div>        
                      <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" href="product_register.php">
                                <span>Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" href="product_edit.php">
                                <span>Product Edit/Delete</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tabs-animation">
                        
                        <!-- START PRODUCT REGISTRATION FORM -->
                        <div class="card mb-3">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Product Registration
                                </div>
                             </div>
                            <div class="card-body">
                                <h5 class="card-title">Please Fill All Fields</h5>
                                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="" novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="pname">Product name</label>
                                        <div>
                                            <input type="text" class="form-control" id="pname" name="pname" placeholder="Product Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Product Price</label>
                                        <div>
                                            <input type="text" class="form-control" id="price" name="price" placeholder="Product Price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <div>
                                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Product Quantity">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <?php 
                                            // retieve all Categories
                                            $cat = new Category();
                                            $allcat = $cat->getAllCategory();    
                                        ?>
                                        <label for="category">Product Category</label>
                                        <div>
                                            <select class="mb-2 form-control" id="category" name="category">
                                              <?php 
                                                // fill all categories in selection box
                                                if (! empty($allcat)) {
                                                    foreach ($allcat as $k => $v) {
                                                        
                                              ?>
                                                    <option><?php echo $allcat[$k]["catname"];  ?></option>
                                                    <?php }}?>
                                            </select>
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
                                        <button type="submit" class="btn btn-primary" name="registerProduct" value="Save Record">Save Record</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END PRODUCT REGISTRATION FORM -->
                        <!-- START PRODUCT TABLE HUMBERGER HIDDEN DIV -->
                        <div class="card mb-3">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Products Table
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
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Category</th>
                                            <th>Date imported</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                             // retieve all Products
                                                $produc = new Product();
                                                $allproduc = $produc->getAllProduct();    

                                                // search category i corresponding to category name we have 
                                                if (! empty($allproduc)) {
                                                    foreach ($allproduc as $k => $v) {
                                                        $pcatid= $allproduc[$k]["categoryid"]; 
                                                        $proname = $allproduc[$k]["pname"];
                                                        $proprice = $allproduc[$k]["price"];
                                                        $proquant = $allproduc[$k]["quantity"];
                                                        $prodate = $allproduc[$k]["dateplanted"];
                                                        $prodes = $allproduc[$k]["description"];
                                                        
                                                        // retieve all Categories
                                                        $catg = new Category();
                                                        $allcatg = $catg->getAllCategory();    

                                                        // search category i corresponding to category name we have 
                                                        if (! empty($allcatg)) {
                                                            foreach ($allcatg as $k => $v) {
                                                                $categoryid = $allcatg[$k]["categoryid"];
                                                                if($pcatid == $categoryid){ 
                                                                    $catname= $allcatg[$k]["catname"]; 
                                                                }


                                                            }
                                                                
                                                        ?>
                                                        
                                        <tr>
                                            <td><?php echo $proname; ?></td>
                                            <td><?php echo $proprice; ?></td>
                                            <td><?php echo $proquant; ?></td>
                                            <td><?php echo $catname; ?></td>
                                            <td><?php echo $prodate; ?></td>
                                            <td><?php echo $prodes; ?></td>
                                        </tr>
                                        <?php 
                                                    //     }


                                                    // }
                                                }

                                                    }
                                                }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Category</th>
                                            <th>Date imported</th>
                                            <th>Description</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- End card which contains Table -->
                        </div>
                        <!-- END PRODUCT TABLE HUMBERGER HIDDEN DIV -->
                    </div>
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                <div class="footer-dots">
                                    <div class="dropdown">
                                        <a aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="dot-btn-wrapper">
                                            <i class="dot-btn-icon lnr-bullhorn icon-gradient bg-mean-fruit"></i>
                                            <div class="badge badge-dot badge-abs badge-dot-sm badge-danger">Notifications</div>
                                        </a>
                                    </div>
                                    <div class="dots-separator"></div>
                                   
                                    <div class="dots-separator"></div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div>
        </div>
    </div>
    
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
    </body>
    </html>

    <?php } ?>
