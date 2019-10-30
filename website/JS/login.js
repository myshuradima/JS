document.getElementById('check').onclick = function(){

  let login = document.getElementById('username').value;
  let password = document.getElementById('password').value;

  if(login == 'user' && password == 'password'){
    document.getElementById('loginbtn1').style.display ='none';
    document.getElementById('logoutbtn1').style.display ='block';
    document.getElementById('id01').style.display ='none';
    alert("You were logged in");
  }
  else {
    alert("wrong id or password");
  }
}

document.getElementById('logoutbtn1').onclick = function(){
  document.getElementById('loginbtn1').style.display ='block';
  document.getElementById('logoutbtn1').style.display ='none';
}
