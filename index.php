<?php
session_start ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>	</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link type='text/css' rel='stylesheet' href='css/style.css'
</head>
<body class='bodystyle'>
<div class="header">
<img src="images/timthumb.png" class="logostyle" alt="Travel"/>
<?php 
 include_once ('pages/functions.php');
 connect ();
 ?>

   <?php
          if(isset($_SESSION['reg']))
          {
            echo '<h3 align="right">You logged In as '.$_SESSION['reg']."</h3>";
          ?>
          
          <form action="index.php" method="POST" align="right" class="autorize">
          <input type='submit' name="logout" value="Sign Out" class="btn btn-primary">	
          </form>
       
          <?php
          }
          elseif(isset($_POST['name']))
          {
          	if(login($_POST['name'],$_POST['password']))
                {
                
                 $_SESSION['reg']=$_POST['name']; 
          
                 echo '<script>window.location=document.URL</script>';
                
                }
                else
                {
                   echo '<h3 align="right">Wrong data! </h3>'; 
                ?>
                   <form action="index.php" method="POST" align="right" class="autorize">
                   <input type="text" name="name" class="input">
                   <input type="password" name="password" class="input">
                   <input type="submit" name="log" value="Sigh In" class="btn btn-primary">
                   </form>
                   <p align="right" style="position:relative; left:-60px"><a href="index.php?menu=5" target="_blank" style="color:red;">Register</a></p>
               <?php 
                
                }  
          } 
         elseif(isset($_POST['logout']))
          {
           unset($_SESSION['reg']);
           //echo'<script>window.location=document.URL</script>';
          }
          else 
          {
           ?>
                   <form action="index.php" method="POST" align="right" class="autorize">
                   <input type="text" name="name" class="input">
                   <input type="password" name="password" class="input">
                   <input type="submit" name="log" value="Sigh In" class="btn btn-primary">
                   </form>
          <?php         
           }        
          ?>
       </div>




  <div class="menu">
	<?php include_once('pages/menu.php');
	?>
	</div> 
  <div class='content'>
	<?php
	if(isset($_GET['menu']))
	{
		$menu=$_GET['menu'];
		if($menu==1) include_once('pages/tourajax.php');
		if($menu==2) include_once('pages/countries.php');
		if($menu==3) include_once('pages/cities.php');
		if($menu==4) include_once('pages/hotels.php');
		if($menu==5) include_once('pages/register.php');
	}
  else
  {
   include_once('pages/tourajax.php'); 
  }  
	?>
	</div>

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>