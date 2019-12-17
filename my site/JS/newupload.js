var linkstocars;
var out;
var k=0;
function upload(){
k=k+8;
document.getElementById('ct').disabled = true;
document.getElementById('cm').disabled = true;
document.getElementById('Searchbutton').disabled = true;
document.getElementById('Showallbutton').disabled = true;
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
} else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById('cars').innerHTML = this.responseText;
    }
};
xmlhttp.open("GET","JS/upload.php?k="+k,true);
xmlhttp.send();
//document.getElementById('Allfilter').style.background="black";
document.getElementById('ct').disabled = false;
document.getElementById('cm').disabled = false;
document.getElementById('Searchbutton').disabled = false;
document.getElementById('Showallbutton').disabled = false;
}
//    alert(request.status+":"+request.statusText);
//    out ='';
//    out=request.status+":"+request.statusText;
//    document.getElementById('cars').innerHTML = out;
//




 function search(){
  out='';
  let look = document.getElementById('Searchline').value.toLowerCase();
  if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
  } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById('cars').innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET","search.php?q="+look,true);
  xmlhttp.send();
  if(out.length==0){
    out="<p text-align='center'>Not found</p>";
  }
  document.getElementById('cars').innerHTML = out;
}


function filter(){
  out='';
  var sel=document.getElementById('cm').options.selectedIndex;
  var sel2=document.getElementById('ct').options.selectedIndex;
  let patern1 = document.getElementById('cm').options[sel].value;
  let patern2 = document.getElementById('ct').options[sel2].value;
  if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
  } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById('cars').innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET","ajax.php?q="+patern2+"&p="+patern1, true);
  xmlhttp.send();
  //document.getElementById('cars').innerHTML = out;
}

function showall(){
  document.getElementById('cm').options.selectedIndex=0;
  document.getElementById('ct').options.selectedIndex=0;
  filter();
}
