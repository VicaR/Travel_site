<?php
session_start();
connect();
echo '<div class="tourname">Choose a tour!</div>';
echo '<form action="index.php?menu=1" method="post">';
echo '<select name="countryid" class="col-sm-6 col-md-3 col-lg-3">';
$res=mysql_query('select * from Countries order by country');
while ($row=mysql_fetch_array($res,MYSQL_NUM))
{
	echo '<option value="'.$row[0].'">'.$row[1].'</option>';
}
mysql_free_result ($res);
echo '</select>';
echo '<input type="submit" name="selcountry" value="Select country" class="btn btn-xs btn-primary">';
if (isset ($_POST['selcountry']))
{   
	  echo '</br>';
		$countryid=$_POST['countryid'];
		$res=mysql_query('select * from cities where countryid='.$countryid.' order by city');
		echo '<select name="cityid" class="col-sm-6 col-md-3 col-lg-3">';
    while ($row=mysql_fetch_array($res,MYSQL_NUM))
		{
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';
		}
		mysql_free_result ($res);
		echo '</select>';
		echo '<input type="submit" name="selcity" value="Select city" class="btn btn-xs btn-primary">';
}
echo '</form>';
if (isset($_POST['selcity']))
{
	  $cityid=$_POST['cityid'];
	  $sel='select co.country,ci.city,ho.hotel,ho.stars,ho.cost,ho.id
	        from Countries co, Cities ci, Hotels ho
	        where ho.cityid='.$cityid.' and ho.countryid=co.id and ho.cityid=ci.id and ci.countryid=co.id
	        order by 2';
$res=mysql_query($sel);
echo '<table width="100%" class="table table-striped tbtours text-center">';
echo '<tr><th style="text-align:center;">Country</th><th style="text-align:center;">City</th><th style="text-align:center;">Hotel</th><th style="text-align:center;">Stars</th><th style="text-align:center;">Cost</th><th style="text-align:center;">Info</th></tr>';
while ($row=mysql_fetch_array($res,MYSQL_NUM))
      {
        echo '<tr>';
        echo '<td>'.$row[0].'</td>';
        echo '<td>'.$row[1].'</td>';
        echo '<td>'.$row[2].'</td>';
        echo '<td>'.$row[3].'</td>';
        echo '<td>'.$row[4].'</td>';
        echo '<td><a href="pages/hotelinfo.php?hid='.$row[5].'" target="_blank">Info...</a>';
        echo '</td>';
        echo '</tr>';
      } 
      echo '</table>';	
}	
?>

