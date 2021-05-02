<?php
$con=mysqli_connect('localhost','root','','act3','3307');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Password Recovery</title>
	<link rel="stylesheet" href="css/forgotpw.css">
	<script type="text/javascript" src="js/forgot.js"></script>
</head>
<body>
	<div class="loginBox">
	<h1>Password Recovery</h1>
	<br>
       <form >
       <input type="text" id="username" name ="user" placeholder="Username" required
      			oninput="this.setCustomValidity('')" />
       <input type="text" id="email" name="email" placeholder="E-mail" required
       			pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+(?:\.[a-zA-Z0-9-]+)$" 
     		    oninvalid="this.setCustomValidity('Invalid E-mail!')"
    			oninput="this.setCustomValidity('')"/>

       <br>
       <br>
      
            <div class="secret">
        Secret Question: 
      <select name="select">
        <option value="1">What primary school did you attend?</option>
        <option value="2">In what town or city was your first full time job?</option>
        <option value="3">What is the middle name of your oldest child?</option>
        <option value="4">In what town or city did your parents meet?</option>
        <option value="5">What time of the day were you born?</option>
        <option value="6">What is your partner's mother's maiden name?</option>
      </select>
      </div>  
      <input type="text" name="secret" placeholder="Answer Secret Question Here" required>
       <input type="submit"  value="Submit" name="submit" onclick="validateUser()">
       </form>
       <br>
       <input type="button"  value="Back" name="back"  onclick= "back()">

</div>
</body>  
</html>

<?php

		
		$table="SELECT * FROM `Accounts` ";
		$result=mysqli_query($con,$table);
		$check=mysqli_num_rows($result);

		if($check>0){       
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<script> alluser.push('".$row['User']."'); </script>";
			}
		}

       if(isset($_GET['submit'])){
        	  $user = $_GET['user'];
            $email = $_GET['email'];
            $value = $_GET['select'];
            $answer = $_GET['secret'];

            $tb="SELECT * FROM `Accounts` WHERE `User` = '".$user."'";
            $result=mysqli_query($con,$tb);
            $check=mysqli_num_rows($result);

            if($check>0){       
                while ($row = mysqli_fetch_assoc($result)) {
                  if(($email == $row['email']) && ($value==$row['secret_value']) &&($answer==$row['answer'])){
                    activityLog("Password Recovery",$row['id']);
                    $_SESSION['useridx']=$row['id'];
                    echo "<script type='text/javascript'>window.location.href = 'resetpassword.php';</script>";
                  }
       
                }
            }
            

           // $que="INSERT INTO `Accounts`(`User`, `Pass`,`email`) VALUES ('".$user."','".$password."','".$email."')";

           // $result=mysqli_query($con,$que);
           // echo "<script type='text/javascript'>alert('Account Added Succesfully');window.location.href = 'Log-in.php';</script>";

         }


function activityLog($activity,$userid){
    global $con;
    $a=date("Y/m/d h:i:s");
    $tb2= "INSERT INTO `activity_log` (`ACTIVITY`,`USER_ID`,`DATE_TIME`) VALUES ('".$activity."','".$userid."','".$a."')";
    $result=mysqli_query($con,$tb2);

}



       
?>

