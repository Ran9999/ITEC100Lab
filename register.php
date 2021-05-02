<?php
$con=mysqli_connect('localhost','root','','act3','3307');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="css/regis1.css">
	<script type="text/javascript" src="js/register.js"></script>
</head>
<body>
	<div class="loginBox">
	<h1>Sign-Up</h1>
	<br>
       <form>
       <input type="text" id="username" name ="user" placeholder="Username" required
      			oninput="this.setCustomValidity('')" />
       <input type="password" id="password" name="password" placeholder="Password" required
       			pattern="(?=.*\d)(?=.*\W)(?=.*[a-z])(?=.*[A-Z]).{8,}"
       			oninvalid="this.setCustomValidity('Password must be 8 characters above and contain uppercase, lowercase, (one) number,and (one) special character!')"
    			oninput="this.setCustomValidity('')"/>
       <input type="password" id="cpassword" name="confirm" placeholder="Confirm Password" required oninput="this.setCustomValidity('')"/>
       <input type="text" id="email" name="email" placeholder="E-mail" required
       			pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+(?:\.[a-zA-Z0-9-]+)$" 
     		    oninvalid="this.setCustomValidity('Invalid E-mail!')"
    			oninput="this.setCustomValidity('')"/>
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

       <br>
       <br>
       <input type="submit"  value="Submit" name="submit" onclick="validateUser()">
       </form>
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
            $password = $_GET['password'];
            $confirm_password = $_GET['confirm'];
            $email = $_GET['email'];
            $value = $_GET['select'];
            $answer = $_GET['secret'];
            

            $que="INSERT INTO `Accounts`(`User`, `Pass`,`email`,`secret_value`,`answer`) VALUES ('".$user."','".$password."','".$email."','".$value."','".$answer."')";
            $result=mysqli_query($con,$que);
            echo "<script type='text/javascript'>alert('Account Added Succesfully');window.location.href = 'Log-in.php';</script>";

         }

       
?>

