<?php
$con=mysqli_connect('localhost','root','','act3','3307');
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Log-in</title>
    	<link rel="stylesheet" type="text/css" href="css/login3.css"/>
      <script type="text/javascript" src="js/mainjs4.js"></script>
   
</head>

<body id='body'>
	<div class="loginBox" id="loginBox">
		<center><img src="images/Icon.png" class="user"></center>
		<form method="POST"> 
    	<input type="text" name ="user" placeholder="Username" required  
   				oninvalid="this.setCustomValidity('No Username, Please Enter Here!')"
    			oninput="this.setCustomValidity('')"/>
    	<input type="password" name="password" placeholder="Password" required
    			oninvalid="this.setCustomValidity('No Password, Please Enter Here!')"
    			oninput="this.setCustomValidity('')"/>
    	<input type="submit"  value="Login" name="submit" />
    	</form>
    	<br>
    	<pre><a href="#">Need help?</a><a href="Forgot Password.php">	       Forgot your password?</a></pre>
    	<br>
    	<center><p class="ok">Don't have an account?<a href="register.php">  <u>Sign Up</u></a></p>
</div>


<div class="mod" id="modalran" style='display:none;'>
	<span class="close" onclick="closeModal()">&times</span>
	<div class="e">
		<center><b>Enter Authentication Code Here!</b>
		</center><br>	
	</div>
	<div id="message" class="g"></div>
	<form method='POST'>
	<div class="f">
		<input type='text' class='modelInput' id='text' name='codetext' placeholder='Authentication Code Here..' required
		oninvalid="this.setCustomValidity('Invalid Code!')"
    	oninput="this.setCustomValidity('')" 
		/>
	</div>
	<div>
		<center>Code Expires in <span id='time'> </span> minutes!</center>
			<input type="submit" name="codeSub" value="Submit" class="a" />
	</div>
	</form>
			<button  id="reCode" class="a2" onclick="reloadPg()">Re-Send Code</button>
</div>




</body>  
</html>



<?php
	$codeID="";
	$code="";


	updater();
	if(isset($_POST['submit'])){
		$user = $_POST['user'];
		$password = $_POST['password'];
		$table="SELECT * FROM `Accounts` ";
		$result=mysqli_query($con,$table);
		$check=mysqli_num_rows($result);
		$z="";

		if($check>0){        
			while ($row = mysqli_fetch_assoc($result)) {
				$x=$row['User'];
				$y=$row['Pass'];
				$z=$row['id'];
				$_SESSION['uid']=$row['id'];;
					if($user==$x){
						break;
					}
			}
		}
		activityLog('Login-ATTEMPT',$z);

		if($user!=$x){
			echo "<script type='text/javascript'>window.onload= alert('Login Failed: User does not Exist!');</script>";
			activityLog('Login-FAILED',$z);


		}elseif ($password!=$y) {
			echo "<script type='text/javascript'>alert('Login Failed: Invalid Password');</script>";
			activityLog('Login-FAILED',$z);


		}else{
			echo "<script type='text/javascript'>var fiveMinutes = 0;</script>";
			$code="";
			$d1="";
			$d2="";
			$flag=TRUE;
			$TimeLeft=0;
			$iU=0;
			$codeID="";

			$tb2= "SELECT * FROM `Authentication_Code` WHERE `UserID`= $z ";
			$res2=mysqli_query($con,$tb2);
			while ($row = mysqli_fetch_assoc($res2)) {
				$a=date("Y/m/d h:i:s");
				$b=$row['ExpirationTime'];
				$code=$row['Code'];
				$codeID = $row['ID'];
				$iU=$row['isUsed'];

					if(($a<$b)&&($iU==0)){
						$start_date = new DateTime($a);
						$since_start = $start_date->diff(new DateTime($b));
						$TimeLeft = (($since_start->i*60)+$since_start->s);
						$flag=FALSE;
						break;
					}
			}
			$iU=0;
			if($flag&&($iU==0)){//create new
				$d1 = date("Y/m/d h:i:s");
				$d2 = date("Y/m/d h:i:s", strtotime("+5 minutes"));
				$code = rand(100000,999999);

				$que="INSERT INTO `Authentication_Code`(`UserID`, `Code`,`CreatedTime`,`ExpirationTime`,`isUsed`) VALUES ('".$z."','".$code."','".$d1."','".$d2."',$iU)";
          		$result=mysqli_query($con,$que);
      
          		$start_date = new DateTime($d1);
				$since_start = $start_date->diff(new DateTime($d2));
				$TimeLeft = (($since_start->i*60)+$since_start->s);
			
				echo "<script type='text/javascript'>
						document.getElementById('text').setAttribute('pattern','".$code."');
						var code= ".$code.",fiveMinutes=".$TimeLeft.";
						alert('Authentication code: ".$code."');
						document.getElementById('modalran').style.display='block';
						document.getElementById('loginBox').style.display='none';
					</script>";

			}

			if(!$flag){// not lol

				echo "<script type='text/javascript'>
					document.getElementById('text').setAttribute('pattern','".$code."');
					alert('Authentication code: ".$code." ');
					var code= ".$code.",  fiveMinutes=".$TimeLeft.";
					document.getElementById('modalran').style.display='block';
					document.getElementById('loginBox').style.display='none';
					</script>";
			}
		}
	}


	if(isset($_POST['codeSub'])){
		$codeID="";
		$code = $_POST['codetext'];
		$tb= "SELECT * FROM `Authentication_Code` WHERE `Code`= $code ";
		$res2=mysqli_query($con,$tb);
			while ($row = mysqli_fetch_assoc($res2)) {
					$x=$row['isUsed'];
					$y=$row['Code'];
						if(($y==$code)&&($x==0)){
							$codeID=$row['ID'];
							break;
						}
				}
		activityLog('Login-SUCCESS',$_SESSION['uid']);

		$tb4= "UPDATE `Authentication_Code` SET `isUsed`= '1' WHERE `ID`=$codeID";
		$res4=mysqli_query($con,$tb4);
		echo "<script type='text/javascript'>alert('Login Success: WELCOMEEE!!');location.href='Welcome.php';</script>";
	}

	
	function updater(){
				global $con;
				$iU="";
				$id="";
				$tb2= "SELECT * FROM `Authentication_Code`";
				$res2=mysqli_query($con,$tb2);
				while ($row = mysqli_fetch_assoc($res2)) {
					$a=date("Y/m/d h:i:s");
					$b=$row['ExpirationTime'];
					$iU=$row['isUsed'];
					$id=$row['ID'];
						if(($a>$b)&&($iU==0)){
							$tb3= "UPDATE `Authentication_Code` SET `isUsed`= '-1' WHERE `ID`=$id";
							$res3=mysqli_query($con,$tb3);
						}
				}
		}

	function checker(){
				global $z;
				global $codeID;
				global $con;
				$iU="";
				$tb2= "SELECT * FROM `Authentication_Code` WHERE `UserID`= $z ";
				$res2=mysqli_query($con,$tb2);
				while ($row = mysqli_fetch_assoc($res2)) {
					$a=date("Y/m/d h:i:s");
					$b=$row['ExpirationTime'];
					$iU=$row['isUsed'];
						if(($a<$b)&&($iU==0)){
							$codeID=$row['ID'];
							break;
						}
				}
		}

	function activityLog($activity,$userid){
		global $con;
		$a=date("Y/m/d h:i:s");
		$tb2= "INSERT INTO `activity_log` (`ACTIVITY`,`USER_ID`,`DATE_TIME`) VALUES ('".$activity."','".$userid."','".$a."')";
		$result=mysqli_query($con,$tb2);

	}

	
?>

