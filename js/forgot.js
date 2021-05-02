 function back(){
    	window.location.href = 'Log-in.php';
    }
	

var alluser = [];

function validateUser(){
		var user = document.getElementById("username");
		
		var flag = false;
		for (var i =0; i < alluser.length+1; i++) {
			if(alluser[i]==user.value){
				flag = true;
				break;		
			}
		}
		if (flag){
			user.setCustomValidity('');
		}else{
			user.setCustomValidity("User does not exist!");
		}
	}



