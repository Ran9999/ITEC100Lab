a<?php
$con=mysqli_connect('localhost','root','','act3','3307');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Password Reset</title>
	<link rel="stylesheet" href="css/forgotpw.css">
	<script type="text/javascript" src="js/forgot.js"></script>
</head>
<body>
	<div class="loginBox" style="height: 300px;">
	<h1>Password Reset</h1>
	<br>
       <form method="POST">
        <input type="password" id="password" name="password" placeholder="Enter New Password" required
            pattern="(?=.*\d)(?=.*\W)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            oninvalid="this.setCustomValidity('Password must be 8 characters above and contain uppercase, lowercase, (one) number,and (one) special character!')"
          oninput="this.setCustomValidity('')"/>
       <input type="submit"  value="Submit" name="submit1">
       </form>


</div>
</body>  
</html>

<?php


       if(isset($_POST['submit1'])){
        global $con;

        activityLog("Password Reset",$_SESSION['useridx']);
        $que="UPDATE `Accounts` SET `Pass`='".$_POST['password']."' WHERE `id`='".$_SESSION['useridx']."'";
        mysqli_query($con,$que);
        echo "<script type='text/javascript'>alert('Account Password Changed Succesfully');window.location.href = 'Log-in.php';</script>";
        


         }


function activityLog($activity,$userid){
    global $con;
    $a=date("Y/m/d h:i:s");
    $tb2= "INSERT INTO `activity_log` (`ACTIVITY`,`USER_ID`,`DATE_TIME`) VALUES ('".$activity."','".$userid."','".$a."')";
    $result=mysqli_query($con,$tb2);

}



       
?>

