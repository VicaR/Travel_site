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
		  $sel='select * from countries';
	    $res=mysql_query($sel);
	    echo '<form action="index.php?menu=2" method="post" class="input-group" id="formcountry">';
	    echo '<table class="table table-striped">';
	    while($row=mysql_fetch_array($res,MYSQL_NUM))
	         {
	          echo '<tr>';
	          echo '<td>'.$row[0].'</td>';
	          echo '<td>'.$row[1].'</td>';
	          echo '<td><input type="checkbox" name="cb'.$row[0].'"></td>';
	          echo '</tr>';
	         }
	    echo '</table>';
	    mysql_free_result($res);
echo'</div>';

echo '<div class="row">';
echo '<form class="col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3" action="index.php?menu=2" method="post">';
echo '<div class="form-group">';
echo '<label for="country">Country name:</label>';
echo '<input type="text" name="country">';
echo '</div>';
echo '<input type="submit" name="addcountry" value="Add Country" class="btn btn-primary">';
echo '<input type="submit" name="delcountry" value="Delete" class="btn btn btn-warning">';
echo '</form>';
echo '</div>';

if(isset($_POST['addcountry']))
{
	$country=trim(htmlspecialchars($_POST['country']));
  $ins='insert into Countries (country) values ("'.$country.'")';
  mysql_query($ins);
  echo "<script>";
		    echo "window.location=document.URL;";
	echo "</script>";
}

if(isset($_POST['delcountry']))
{
		foreach ($_POST as $k => $v) 
		        {
			       if (substr($k,0,2)=="cb")
			          {
				         $idc=substr($k,2);
				         $del='delete from countries where id='.$idc;
				         mysql_query($del);
				        }
			      }    
		echo "<script>";
		      echo "window.location=document.URL;";
		echo "</script>";	
	}
} 
 ?>
