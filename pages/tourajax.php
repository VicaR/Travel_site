<?php
session_start();
connect();
?>

<div class="tourname">Choose a tour!</div>
<div class="center">
<input id="b1" value="Select a tour" onclick="getCountries()" type="button" class="btn btn-primary"/>
<br>


<select name="countryid" id="list1" onchange="getCities(this.value)">
</select>
<br>		
<select name "cityid" id="list2" onchange="getHotels(this.value)">
</select>
</div>

<div id="list3">
</div>

<script>

function getCountries()
{
	if(window.XMLHttpRequest)
		ao=new XMLHttpRequest();
	else
		ao=new ActiveXObject ('Microsoft.XMLHTTP');
	ao.onreadystatechange=function()
	{
		if(ao.readyState==4 && ao.status==200)
		{
			document.getElementById('list1').innerHTML=ao.responseText;
		}
	}
	ao.open("GET","pages/list1.php",true);
	ao.send(null);
}
</script>

<script>
function getCities(countryid)
{
	if(window.XMLHttpRequest)
		ao=new XMLHttpRequest();
	else
		ao=new ActiveXObject ('Microsoft.XMLHTTP');
	ao.onreadystatechange=function()
	{
		if(ao.readyState==4 && ao.status==200)
		{
			document.getElementById('list2').innerHTML=ao.responseText;
		}
	}
	ao.open("GET","pages/list2.php?countryid="+countryid,true);
	ao.send(null);
}
</script>

<script>
function getHotels(cityid)
{
	if(window.XMLHttpRequest)
		ao=new XMLHttpRequest();
	else
		ao=new ActiveXObject ('Microsoft.XMLHTTP');
	ao.onreadystatechange=function()
	{
		if(ao.readyState==4 && ao.status==200)
		{
			document.getElementById('list3').innerHTML=ao.responseText;
		}
	}
	ao.open("GET","pages/list3.php?cityid="+cityid,true);
	ao.send(null);
}
</script>
