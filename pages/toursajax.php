<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body onload="getCountries()">
<?php
function connect($host='localhost',
	$user='root',
	$pass='123456',
	$dbname='site_Travel')
{
	$cs='mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
	$options=array(
      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
      PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'   
	);
	try
	{
    $pdo=new PDO($cs,$user,$pass,$options);
    return $pdo;
	}
	catch(PDOException $e)
	{
     echo $e->getMessage();
     return false;
	}
}

?>


<select id="list1" onchange="getCities(this.value)">
</select>
<select id="list2">
</select>

<script>
function getCountries()
{
  if(window.XMLHttpRequest)
    ao=new XMLHttpRequest();
    else
    ao=new ActiveXObject ('Microsoft.XMLHTTP');	
    ao=onreadystatechange=function()
    {
      if(ao.readyState==4 && ao.status==200)
      {
        document.getElementById('list1').innerHTML=ao.responseText;
      }
    }
    ao.open("GET","list1.php",true);
    ao.send(null);
}



</script>

<?php


?>




</body>
</html>
