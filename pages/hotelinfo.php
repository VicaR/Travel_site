<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
	  <link type='text/css' rel='stylesheet' href='../css/style.css'
</head>
<body style="background-color: #73b6fd;">
	<?php
  $hotelid=$_GET['hid'];
  include_once ('functions.php');
  connect();
  $sel='select hotel from Hotels where id='.$hotelid;
  $res=mysql_query($sel);
  $row=mysql_fetch_array($res,MYSQL_NUM);
  echo '<div class="hotelname">'.$row[0].'</div>';
  ?>
  <div class="centerslide" class="row" id="item_info" >
  <div>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="1500">
  <div class="carousel-inner" role="listbox">
  <?php
  $i=1;
  $sel='select imagepath from Images where hotelid='.$hotelid;
  $res=mysql_query($sel);
  while ($row=mysql_fetch_array($res,MYSQL_NUM))
  	     {
  	     	 if ($i==1)
  	     	 	   {
  	     	 	   	echo '<div class="item active">';
  	     	 	   }
  	     	 else
  	     	     {
  	     	     	echo '<div class="item">';
  	     	     }	   
  	     		echo '<img src="../'.$row[0].'" alt="" class="imgslide">';
            echo '</div>';
            $i++;
  	     }
  ?>
</div>
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true">Prev</span>	
<span class="sr-only"></span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" aria-hidden="true">Next</span>	
<span class="sr-only"></span>
</a>
</div>
</div>
</div>
<?php
  $sel='select info from Hotels where id='.$hotelid;
  $res=mysql_query($sel);
  $row=mysql_fetch_array($res,MYSQL_NUM);
  echo '<div class="centerdescribe">'.$row[0].'</div>';
  ?>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
