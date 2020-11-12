
<?php 
require_once ("../controller/DBController.php");
require_once ("../controller/User.php");

// Object creation

$db_handle = new DBController();

if (isset($_POST['login'])) {
    // Posted Values
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $type = $_POST['type'];    

    // retieve all users
    $userobj = new User();
    $alluser = $userobj->getAllUser();

    // check each id for login confirmation
    if (! empty($alluser)) {
        foreach ($alluser as $k => $v) {
            $userid = $alluser[$k]["userid"]; 
            // check the type of user to login

            // $userid = $_GET["userid"];
            $user = new User();

            $result = $user->getUserById($userid);

            if (! empty($result)) {
                // while($result)
                foreach ($result as $k => $v) {
                    $retusername = $result[$k]["username"];
                    $retpass = $result[$k]["password"];
                    $type = $result[$k]["type"];
                    if($username == $retusername && $password == $retpass && $type == 'receptionist'){
                        echo "<script>alert('Welcome Login Successful');</script>";
                        echo "<script>window.location.href='home.php'</script>";
                    }elseif($username == $retusername && $password == $retpass && $type == 'admin'){
                        echo "<script>alert('Welcome Login Successful');</script>";
                        echo "<script>window.location.href='../admin/index.php'</script>";
                    }
                    

                }
            }
        }
    }else{
        echo "<script>alert('Invalid username or password');</script>";
        echo "<script>window.location.href='login.php'</script>";
    }
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Please Login </title>
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
    <div id="legend" align="center">
      <legend class="">Please Login!</legend>
    </div>
    <div class="rogin-form-inside">
        <div class="control-group">
        <!-- Fullname -->
        <label class="control-label"  for="username">Username</label>
        <div class="controls">
            <input type="text" id="username" name="username" placeholder="" class="input-xlarge" required="true">
        </div>
        </div>


        <div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
            <input type="password" id="password" name="password" placeholder="" class="input-xlarge" required="true">
        </div>
        </div>
    

    
        <div class="control-group">
        <!-- Button -->
        <div class="controls">
            <button class="btn btn-success" type="submit" name="login">Login</button>
        </div>
        </div>

        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                Not Registered yet? <b><a href="register.php">Register Here</a></b>
            </div>
        </div>
    </div>

  </fieldset>
</form>
</div>

</body>
</html>
