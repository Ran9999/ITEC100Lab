<?php session_start(); 
$con=mysqli_connect('localhost','root','','act3','3307');
$username ="";
$tb2="SELECT * FROM `accounts` WHERE  `id`= ".$_SESSION['uid'].""; 
$res2=mysqli_query($con,$tb2);
while ($row = mysqli_fetch_assoc($res2)) {
global $username;
$username = $row['User'];
break;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Welcome
	</title>
	<link rel="stylesheet" type="text/css" href="css/welcome3.css">



</head>
<body style="background: url(images/Background3.jpg);background-size: cover;">
	<form method="POST">
	<input type="submit"  value="Log-out" name="logout" style="float: right;">
	</form>

	<button  name="activity" style="float: left;" onclick="activity()">Activity Log</button>
	<button   name="changepw" style="float: left;" onclick="changepw()">Change Password
	</button>




	<div class="activitylog" id="activitylog" style="display: none;">
		<center><h1>Activity log</h1></center>
	<input type="text" id="search" onkeyup="search()" placeholder="Search for Activity">
	<select id="sel">
		<option >ID</option>
        <option selected>Activity</option>
        <option>User ID</option>
        <option>Username</option>
        <option>Date Time</option>
	</select>


	<div class="divScroll">

	<table border="1" id="tb1" cellpadding="10" value="123">
			<tr>
        <th>ID</th>
        <th>Activity</th>
        <th>User ID</th>
        <th>Username</th>
        <th>Date Time</th>
      </tr>
      		<?php
      			$tb="";
      			if($_SESSION['uid']==1){
					$tb="SELECT * FROM `activity_log` "; 
      			}else{
      				$tb="SELECT * FROM `activity_log` WHERE `USER_ID`= ".$_SESSION['uid']. ""; 
      			}


				$res=mysqli_query($con,$tb);
				while ($row = mysqli_fetch_assoc($res)) {
					$tb2="SELECT * FROM `accounts` WHERE  `id`= ".$row['USER_ID'].""; 
					$res2=mysqli_query($con,$tb2);
					$row2 = mysqli_fetch_assoc($res2);

						echo "<tr>
	                  <td>".$row['E_ID']."</td>
	                  <td>".$row['ACTIVITY']."</td>
	                  <td>".$row['USER_ID']."</td>
	                  <td>".$row2['User']."</td>
	                  <td>".$row['DATE_TIME']."</td>
	                	</tr>";
				}

			?>
		</table>
		</div>
	</div>


	<div class="loginBox" id="changepass" style="display: none;">
	<div class="changepw" >
	<center><h1>Change Password</h1></center>
	<br>
	<form method="POST" >
       <input type="text" id="username" name ="user" readonly value="<?php global $username;echo $username;   ?>" />

       <input type="password" id="cpassword" name="pw" placeholder="Current Password" required oninput="this.setCustomValidity('')"/>
       
       <input type="password" id="cpassword" name="newp" placeholder="New Password" required
       			pattern="(?=.*\d)(?=.*\W)(?=.*[a-z])(?=.*[A-Z]).{8,}"
       			oninvalid="this.setCustomValidity('Password must be 8 characters above and contain uppercase, lowercase, (one) number,and (one) special character!')"
    			oninput="this.setCustomValidity('')"/>
       
      <br>
       <br>
       <input type="submit"  value="Submit" name="changesubmit"/>
       </form>
       <input type="button"  value="Cancel" name="cancel"  onclick= "cancel()"/>

       </div>
   </div>






</body>
</html>

<script type="text/javascript">
    	function back(){
    	window.location.href = 'Log-in.php';
    }

    function search() {
  var input, filter, table, tr, td, i, txtValue, sel,x;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("tb1");
  sel = document.getElementById("sel").value;
  tr = table.getElementsByTagName("tr");

  if(sel=='ID'){
  	x=0;
  }else if(sel=='Activity'){
  	x=1;
  }else if(sel=='User ID'){
  	x=2;
  }else if(sel=='Username'){
  	x=3;
  }else{
  	x=4;
  }

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[x];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function activity(){
	document.getElementById('activitylog').style.display='block';
	document.getElementById('changepass').style.display='none';
}
function changepw(){
	document.getElementById('activitylog').style.display='none';
	document.getElementById('changepass').style.display='block';
}
function cancel(){
	document.getElementById('activitylog').style.display='none';
	document.getElementById('changepass').style.display='none';

}


</script>



<?php 


if (isset($_POST['logout'])){
	activityLog('Logout',$_SESSION['uid']);
	echo "<script type='text/javascript'> back(); </script>";
}

if (isset($_POST['changesubmit'])){
	global $con;

	$tb2="SELECT * FROM `accounts` WHERE  `id`= ".$_SESSION['uid'].""; 
	$res2=mysqli_query($con,$tb2);
	while ($row = mysqli_fetch_assoc($res2)) {
		if($row['Pass']==$_POST['pw']){
			activityLog('Change Password',$_SESSION['uid']);

			$que="UPDATE `accounts` SET `Pass`='".$_POST['newp']."' WHERE `id`='".$_SESSION['uid']."'";
	        mysqli_query($con,$que);
	        echo "<script type='text/javascript'>alert('Account Password Changed Succesfully');location.reload();</script>";
		}
	}

}

function activityLog($activity,$userid){
		global $con;
		$a=date("Y/m/d h:i:s");
		$tb2= "INSERT INTO `activity_log` (`ACTIVITY`,`USER_ID`,`DATE_TIME`) VALUES ('".$activity."','".$userid."','".$a."')";
		mysqli_query($con,$tb2);

}



?>