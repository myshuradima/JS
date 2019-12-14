function filter(){
  out='';
  var sel=document.getElementById('bt').options.selectedIndex;
  let patern1 = document.getElementById('bt').options[sel].value;
  if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
  } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById('usersban').innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET","banunban.php?q="+patern1, true);
  xmlhttp.send();
  //document.getElementById('cars').innerHTML = out;
}

function search(){
  out='';
  let patern1 = document.getElementById('Searchline').value;
  if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
  } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById('usersban').innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET","findbuned.php?q="+patern1, true);
  xmlhttp.send();
  //document.getElementById('cars').innerHTML = out;
}
