<?php
session_start(); 
if (!isset($_SESSION['reg']))
{
 echo '<h3 class="text-content"><span style="color:red;">You should authorize as admin!</span></h3>'; 
}
else
{
  connect ();
  echo '<div class="col-sm-6 col-md-6 col-lg-6 left">';    
	echo '<form action="index.php?menu=4" method="post" class="input-group" id="formhotel">';
	$sel='SELECT ci.id, ci.city, 
	ho.id, ho.hotel, ho.cityid, ho.countryid, ho.stars, ho.info, 
	co.id, co.country
	from cities ci, hotels ho, countries co
	WHERE ho.cityid=ci.id and ho.countryid=co.id';
	$res=mysql_query($sel);
	$err=mysql_errno();
	echo '<table class="table" width="100%">';
	while ($row=mysql_fetch_array($res,MYSQL_NUM)) {
		echo '<tr>';
		echo '<td>'.$row[2].'</td>';
		echo '<td>'.$row[1]."-".$row[9].'</td>';
		echo '<td>'.$row[3].'</td>';
		echo '<td>'.$row[6].'</td>';
		echo '<td><input type="checkbox" name="hb'.$row[2].'"></td>';
		echo '</tr>';
	}
	echo '</table>';
	mysql_free_result($res);

	$sel='SELECT ci.id, ci.city, co.country, co.id
	from countries co, cities ci
	WHERE ci.countryid=co.id';
	$res=mysql_query($sel);
	$csel=array();
	echo '<select name="hcity" class="">';
	while ($row=mysql_fetch_array($res,MYSQL_NUM)){
		echo '<option value="'.$row[0].'">'.$row[1]." : ".$row[2].'</option>';
		$csel[$row[0]]=$row[3];
	}
	echo '</select>';
	echo '<input type="text" name="hotel" placeholder="Hotel">';
	echo '<input type="text" name="cost" placeholder="Cost">';
	echo '&nbsp;&nbsp;Stars: <input type="number" name="stars" min="1" max="5">';
	echo '<br><textarea name="info" placeholder="Description">';
	echo '</textarea><br>';
	echo '<input type="submit" name="addhotel" value="Add" 
		class="btn btn-primary">';
	echo '<input type="submit" name="delhotel" value="Delete"
		class="btn btn-warning">';
	echo '</form>';
	echo '</div>';
	mysql_free_result($res);

  if(isset($_POST['addhotel']))
{
	$hotel=trim(htmlspecialchars($_POST['hotel']));
	$info= trim(htmlspecialchars($_POST['info'])); 
	$cost=trim(htmlspecialchars($_POST['cost']));
  $stars=trim(htmlspecialchars($_POST['stars']));
  //if ($hotel=="" || $cost=="" ||$stars=="") 
 // {
  //	exit();
 // } 
  $cityid=$_POST['hcity'];
  $countryid=$csel[$cityid];
  $ins='insert into Hotels (hotel,cityid,countryid,stars,cost,info) values ("'.$hotel.'",'.$cityid.','.$countryid.','.$stars.','.$cost.',"'.$info.'" )';
  echo $ins;
  mysql_query($ins);
  echo '<script>window.location=document.URL;</script>';
}
if(isset($_POST['delhotel']))
{
    foreach($_POST as $k=>$v)
    {
      echo $k.':'.$v.'<br/>';    
       if(substr($k,0,2)=="hb")
      {
      	$idd=substr($k,2);
      	$del='delete from hotels where id='.$idd;
      	mysql_query($del); 
      }  	
    }	
   echo '<script>window.location=document.URL;</script>'; 
}

echo '<form action="index.php?menu=4" method="post" enctype="multipart/form-data" class="input-group">';
echo '<select name="hotelid">';
$sel='select ho.id, co.country, ci.city, ho.hotel
      from countries co, cities ci, hotels ho
      where co.id=ho.countryid and ci.id=ho.cityid 
      order by co.country';
      $res=mysql_query($sel);
while($row=mysql_fetch_array($res))
{
     echo '<option value="'.$row[0].'">';
     echo $row[1].'&nbsp;&nbsp;'.$row[2].'&nbsp;&nbsp;'.$row[3].'</option>';
}
echo '</select>';
echo '<input type=file name="fn[]" multiple accept="image/*">';
echo '<input type="submit" name="addimg" value="Add image" class="btn btn-primary">';
echo '</form>';

if(isset($_POST['addimg']))
{
  foreach($_FILES['fn']['name'] as $k=>$v)
  {
  	if($_FILES['fn']['error'][$k] !=0)
  	{
  		echo 'Error with file '.$v.'<br/>';
  		continue;
  	}	 
  	if(move_uploaded_file($_FILES['fn']['tmp_name'][$k],'images/'.$v))
  	{
  		$ins='insert into Images (hotelid,imagepath) values ('.$_POST['hotelid'].',"images/'.$v.'")';
  		mysql_query($ins);
  		echo 'Images are successfully added!';
  	}
  }

}
}
	?>


