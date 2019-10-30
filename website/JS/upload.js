//var requestURL = "https://mdn.github.io/learning-area/javascript/oojs/json/superheroes.json";
var linkstocars;
function upload(){
var requestURL = "https://raw.githubusercontent.com/myshuradima/myshuradima.github.io/master/cars2.json";
var request = new XMLHttpRequest();
request.open('GET', requestURL);
request.responseType = 'json';
request.send();
request.onload = function(){
  linkstocars = request.response;
  console.log(linkstocars);
  var out = '';
  for (var key in linkstocars) {
    out+='<div class=car><img src="' +linkstocars[key].img + '" width="290px" height="150px" ><a href="'+linkstocars[key].link+'"><p align="center">'+linkstocars[key].name+'</p></a></div>'+'<br>';
  }

//document.getElementById('Allfilter').style.background="black";
document.getElementById('cars').innerHTML = out;
}
//console.log(request.responseType);
}




 function search(){
  out='';
  let look = document.getElementById('Searchline').value.toLowerCase();
  for (var key in linkstocars) {
    let asdf=linkstocars[key].name.toLowerCase();
    if(asdf.includes(look)){
        out+='<div class=car><img src="' +linkstocars[key].img + '" width="290px" height="150px" ><a href="'+linkstocars[key].link+'"><p align="center">'+linkstocars[key].name+'</p></a></div>'+'<br>';
    }
  }
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
  for (var key in linkstocars) {
    if(linkstocars[key].brand.includes(patern1) && linkstocars[key].type.includes(patern2)){
        out+='<div class=car><img src="' +linkstocars[key].img + '" width="290px" height="150px" ><a href="'+linkstocars[key].link+'"><p align="center">'+linkstocars[key].name+'</p></a></div>'+'<br>';
      }
    }
  if(out.length==0){
    out="<p text-align='center'>Not found</p>";
  }
  document.getElementById('cars').innerHTML = out;
}

function showall(){
  document.getElementById('cm').options.selectedIndex=0;
  document.getElementById('ct').options.selectedIndex=0;
  filter();
}
