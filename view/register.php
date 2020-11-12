<?php
// include Function  files
require_once ("../controller/DBController.php");
require_once ("../controller/User.php");

// Object creation

$db_handle = new DBController();

if (isset($_POST['register'])) {
    $name = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone= $_POST['phone'];
    $type = 'receptionist';    

    // new object to register new user
        $user = new User();
        $insertId = $user->addUser($name,$username,$password,$phone,$type);
        if (empty($insertId)) {
            echo "<script>alert('Problem in registration');</script>";
            $response = array(
                "message" => "Problem in Adding New Record",
                "type" => "error"
            );
        } else {
            echo "<script>alert('Registration successfull.');</script>";
            header("Location: register.php");
        }
        echo "<script>window.location.href='login.php'</script>";
        }
    // end registration


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="../assets/css/regStyle.css" rel="stylesheet">
     <link href="../assets/css/style.css" rel="stylesheet">
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

</head>
<body style="background:url('../assets/image/slider-02.jpg')">

<div class="rogin-form-div" style="">
        <form name="frmAdd" method="post" action="" id="frmAdd">
        <fieldset>
            <div id="legend" align="center" style="">
                <legend class="">Please Register or Back To Login To continue</legend>
            </div>

            <div class="rogin-form-inside">

                <div class="control-group">
                    <!-- Fullname -->
                    <label class="control-label"  for="fullname">Fullname</label>
                    <div class="controls">
                        <input type="text" id="fullname" name="fullname" placeholder="" class="input-xlarge" required="true">
                    </div>
                </div>


                <div class="control-group">
                    <!-- Reg. Number -->
                    <label class="control-label"  for="username">Username</label>
                    <div class="controls">
                        <input type="text" id="username" name="username"  class="input-xlarge" required="true">
                        <span id="usernameavailblty"></span>
                    </div>
                </div>
            
                <div class="control-group">
                    <!-- Password-->
                     <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="" class="input-xlarge" required="true">
                    </div>
                </div> 
            
            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="phone">Phone</label>
                <div class="controls">
                    <input type="text" id="phone" name="phone" placeholder="" class="input-xlarge" required="true">
                </div>
            </div>       
            
                <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                    <button class="btn btn-success" type="submit" id="submit" name="register">Register</button>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                    Already registered <b><u><a href="login.php">Login</a></u></b>
                    </div>
                </div>
            </div>

        </fieldset>
    </form>
</div>
<script type="text/javascript">
</script>
</body>
</html>
