document.getElementById('registrationcheck').onclick =function(){
  let a =1;
  let b =0;
  let username = document.getElementById('registrationusername').value;
  let email = document.getElementById('registrationemail').value;
  let password = document.getElementById('registrationpassword').value;
  let repeatpassword = document.getElementById('registrationrepeatpassword').value;
  if(username.length>=10 || username.length<=3){
    alert("Your username should have length from 4 to 10 symbols");
    a=0;
  }
  if(password!=repeatpassword){
    alert("You hadn't repeat password");
    a=0;
  }
  if (! /^[a-zA-Z0-9]+$/.test(username)) {
    a=0;
    alert("username contains wrong symbols");
  }
  if (! /^[a-zA-Z0-9]+$/.test(password)) {
    a=0;
    alert("username contains wrong symbols");
  }
  if (! /^[a-z0-9._%+-]+@+[a-z0-9.-]+\.[a-z]{2,}$/.test(email)){
    a=0;
    alert("you hadn't input email");
  }
  if(a==1){
    //document.getElementById('registrationform').onsubmit ;
    document.getElementById('registrationform').action="check.php";
  }
}

var username_validation = function (username){
  if(username.length>=10 || username.length<=3){
    alert("Helloworld");
    document.getElementById('registrationcheck').disabled = true;
  }
}

var password_validation = function(password){
  if(password.length<=4){
    alert("This password is to weak)");
  }
}

registrationusername.onblur = function() {
  let username = document.getElementById('registrationusername').value;
  if(username.length!=0){
    username_validation(username);
  }
}

registrationpassword.onblur = function() {
  let password = document.getElementById('registrationpassword').value;
  if(password.length!=0){
    password_validation(password);
  }
}
