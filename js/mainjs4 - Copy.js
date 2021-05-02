function modalran(){
      var tries = 3;

      var d=document,
      c=d.createElement('div'),
      e=d.createElement('div'), 
      f=d.createElement('div'),
      a=d.createElement("button");
      a2=d.createElement("button");
      g=d.createElement("div");
      g.setAttribute('id','message');
      h=d.createElement("div");
      i=d.createElement("span");
      i.setAttribute('class','close');
      a.setAttribute('class','a');
      a2.setAttribute('class','a2');
      c.setAttribute('class','mod');
      e.setAttribute('class','e');
      f.setAttribute('class','f');
      g.setAttribute('class','g');
      c.setAttribute('id','modalran');

      a.innerHTML = "Submit";
      a2.innerHTML = "Re-send Code";
      i.innerHTML = "&times";
      e.innerHTML = "<center><b>Enter Authentication Code Here!</b></center><br>";
      f.innerHTML = "<input type='text' class='modelInput' id='text' name='codetext' placeholder='Authentication Code Here..' required/> ";
      h.innerHTML = "<center>Code Expires in <span id='time'> </span> minutes!</center><form method='POST'><input type='submit' id='tempo' name='tempo' style='display:none;'></form>";

      

      a.onclick = function(){
            var inputs = d.getElementById("text").value;
            if(inputs==code){
                 document.getElementById('tempo').click();
            }else if (tries==0){
                  alert("No More Attempt!");
                  window.location.href = 'Log-in.php';
            }
            else{
                  g.innerHTML = "<center>Invalid Code! you have "+tries+" more attempt(s)</center>";
                  tries = tries-1;
            }
      }

      a2.onclick = function(){
        location.reload();
      }
      c.appendChild(i);
      c.appendChild(e);
      c.appendChild(g);
      c.appendChild(a);
      c.appendChild(a2);
      c.appendChild(f);
      c.appendChild(h);
      d.body.appendChild(c);
}

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

