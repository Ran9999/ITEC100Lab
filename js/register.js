  function back(){
    	window.location.href = 'Log-in.php';
    }
	
	
	var alluser = [];
	


 	function validatePassword(){
 		var password = document.getElementById("password");
		var confirm_password = document.getElementById("cpassword");
		if(password.value != confirm_password.value){
		    confirm_password.setCustomValidity("Passwords Don't Match");
		}else{
			confirm_password.setCustomValidity('');
		  }
		}

	function validateUser(){
		var user = document.getElementById("username");
		if(user.value.length<4){
			user.setCustomValidity('Username must be 4 characters above!');
		}else{
			for (var i =0; i < alluser.length+1; i++) {


			if(alluser[i]==user.value){
		   		 user.setCustomValidity("User already exist! Please choose other username");
		   		 break;
			}else{
				user.setCustomValidity('');
				}
			}
		}
		}
		
	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;