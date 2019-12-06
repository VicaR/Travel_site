<?php 
session_start(); 
if (isset($_SESSION['reg']))
{
 echo '<h3 class="text-content"><span style="color:red;">You signed in as '.$_SESSION['reg'].'</span></h3>'; 
}
else
{
include_once ('functions.php');
connect();
if(!isset($_POST['send']))
{
?>
<div class="col-sm-6 col-md-6 col-lg-6 left">
<form action='index.php?menu=5' method='post' class='text-content'>
<div>
<label for="email">Email:</label>
<input type="email" name="email"/>
</div>
<div>
<label for="login">Login:</label>
<input type="text" name="login"/>
</div>
<div>
<label for="pass1">Enter Password</label>
<input type="password" name="pass1"/>
</div>
<div>
<label for="pass2">Confirm Password</label>
<input type="password" name="pass2"/>
</div>
<input type="reset" value="Clear" class="btn btn-primary"/>
<input type="submit" value="Register" name="send" class="btn btn-warning"/>
</form>
</div>
<?php
}
else
{
	if(register($_POST['email'], $_POST['login'], $_POST['pass1']))
	{
		echo '<h3 class="text-content"><span style="color:red;">User succesfully registred! </span></h3>';
	}
}
}
 ?>
