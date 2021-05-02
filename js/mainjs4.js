/*
function codeSub(){
      var tries = 3;

            var inputs = document.getElementById("text").value;
            if(inputs==code){
                 alert('Login Success: WELCOME!!!!!!');
                 window.location.href = 'Welcome.php';
            }else if (tries==0){
                  alert("No More Attempt!");
                  window.location.href = 'Log-in.php';
            }
            else{
                  document.getElementById("message").innerHTML = "<center>Invalid Code! you have "+tries+" more attempt(s)</center>";
                  tries = tries-1;
            }
      }

*/

function closeModal() {
      window.location.href = 'Log-in.php';
}

function reloadPg(){
        location.reload();
      }

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var limit =duration;
    setInterval(function () {

        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;


        if (--timer < 0) {
            timer = duration;
        }
        if(limit<0){
            limit=2;
            alert("CODE EXPIRED!");
            window.location.href = 'Log-in.php';
        }

        if(limit>-1){
          limit = limit-1;
        }
        

    }, 1000);
}

window.onload = function () {
      
    display = document.querySelector('#time');

      startTimer(fiveMinutes, display);

    
};

