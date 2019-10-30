var url1 ='';
function upload(){
  var sel=document.getElementById('ct').options.selectedIndex;
  city=document.getElementById('ct').options[sel].value;
  var url = "http://api.openweathermap.org/data/2.5/weather?q="+city+"&appid=b1b35bba8b434a28a0be2a3e1071ae5b&units=metric"
  var request = new XMLHttpRequest();
  request.open('GET', url);
  request.responseType = 'json';
  request.send();
  request.onload = function(){
    var weather = request.response;
    console.log(weather);
    url1="http://openweathermap.org/img/wn/"+weather.weather[0].icon+"@2x.png";
    var out = '';
    out='<table border="1"><caption><img src="'+url1+'"></caption>'+
    '<tr><th>'+weather.weather[0].description+'</th></tr>'+
    '<tr><td>Temperature:'+weather.main.temp+'</td></tr>'+
    '<tr><td>Pressure:'+weather.main.pressure+'</td></tr>'+
    '<tr><td>Min Temp:'+weather.main.temp_min+'</td></tr>'+
    '<tr><td>Max Temp:'+weather.main.temp_max+'</td></tr>'+
    '<tr><td>Wind Speed:'+weather.wind.speed+'</td></tr>'+
    '</table>';
    document.getElementById('wthr').innerHTML = out;
  }
}
