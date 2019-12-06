<?php  
session_start(); 
if (!isset($_SESSION['reg']))
{
 echo '<h3 class="text-content"><span style="color:red;">You should authorize as admin!</span></h3>'; 
}
else
{
connect();
echo '<div class="col-sm-6 col-md-6 col-lg-6 left">';
echo '<form action="index.php?menu=3" method="post" class="input-group" id="formcity">';
      $sel='SELECT ci.id, ci.city, co.country 
            from countries co, cities ci
            WHERE ci.countryid=co.id';
  $res=mysql_query($sel);
  echo '<table class="table table-striped">';
  while ($row=mysql_fetch_array($res,MYSQL_NUM)) {
    echo '<tr>';
    echo '<td>'.$row[0].'</td>';
    echo '<td>'.$row[1].'</td>';
    echo '<td>'.$row[2].'</td>';
    echo '<td><input type="checkbox" name="ci'.$row[0].'"></td>';
    echo '</tr>';
  }
  echo '</table>';
  echo '</div>';
  mysql_free_result($res);

echo '<div class="row">';
echo '<form class="col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3" action="index.php?menu=3" method="post">';
echo '<div class="form-group">';
$sel='select * from countries';
$res=mysql_query($sel);
echo '<select name="conid">';
while ($row=mysql_fetch_array($res))
      {
           echo '<option value="'.$row[0].'"">';
           echo $row[1].'</option>';
      }
echo '</select>';
mysql_free_result($res);

echo '</div>';

echo '<div class="form-group">';
echo '<label for="city">City name:</label>';
echo '<input type="text" name="city">';
echo '</div>';
echo '<input type="submit" name="addcity" value="Add City" class="btn btn-primary">';
echo '<input type="submit" name="delcity" value="Delete"class="btn btn btn-warning">';
echo '</form>';
echo '</div>';


if(isset($_POST['addcity']))
{
	$city=trim(htmlspecialchars($_POST['city']));
        $countryid=$_POST['conid'];
        $ins='insert into Cities (city,countryid) values ("'.$city.'",'.$countryid.')';
        mysql_query($ins);
        $err=mysql_errno();
        if ($err)
           {
             echo 'Error code:'.$err.'<br>';
             exit();
           }
        echo "<script>";
        echo "window.location=document.URL;";
        echo "</script>";
       
}

if(isset($_POST['delcity']))
  {
    foreach ($_POST as $k => $v) 
            {
             if (substr($k,0,2)=="ci")
             {
              $idc=substr($k,2);
              $del='delete from cities where id='.$idc;
              mysql_query($del);
             }
        $err=mysql_errno();
        if ($err)
           {
             echo 'Error code:'.$err.'<br>';
             exit();
           }
             echo "<script>";
             echo "window.location=document.URL;";
             echo "</script>";
             }
      }


    
}
?>