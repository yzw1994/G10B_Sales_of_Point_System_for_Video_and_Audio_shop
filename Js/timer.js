window.onload = setInterval(function()
{
var d=new Date();
var ampm;
var weekday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
var curr_hr = d.getHours();
var curr_min = d.getMinutes();
var curr_sec = d.getSeconds();
curr_sec = ( curr_sec < 10 ? "0" : "" ) + curr_sec; 
curr_min = ( curr_min < 10 ? "0" : "" ) + curr_min;
ampm = curr_hr;
curr_hr = (curr_hr == 0 ? "12" : curr_hr);
curr_hr = (curr_hr <= 12 ? curr_hr:curr_hr - 12);
curr_time = curr_hr + ":" + curr_min + ":" + curr_sec + (ampm < 12? " AM":" PM")

document.getElementById('timer').innerHTML = (weekday[d.getDay()] + ", " + d.getDate() + " " + monthname[d.getMonth()] + ", " + d.getFullYear() + " [ " + curr_time + " ]");
},1000);