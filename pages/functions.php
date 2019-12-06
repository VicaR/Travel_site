<?php
function connect(
	       $host='localhost',
	       $user='root',
	       $pass='site_Travel',
	       $dbname='site_Travel')
{
         $link=mysql_connect($host,$user,$pass) or die('Connection Error');
         mysql_select_db($dbname) or die('DB not Selected');
         mysql_query('Set names "utf8"');
}


function register($email,$name,$pass)
{
	$email=trim(htmlspecialchars($email));
	$name=trim(htmlspecialchars($name));
	$pass=trim(htmlspecialchars($pass));
	if($name=="" || $email=="" || $pass=="")
	{
		echo '<h3 class="text-content"><span style="color:red;">Fill all required fields!</span></h3>';
		return false;
	}
	if(strlen($name)<3 || strlen($name)>30 || strlen($pass)<3 || strlen($pass)>30)
	{
		echo '<h3 class="text-content"><span style="color:red;">Wrong data!</span></h3>';
		return false;
	}
	$pass=md5($pass);
	$ins='insert into Users (login,pass,email) values ("'.$name.'","'.$pass.'","'.$email.'")';
  mysql_query($ins);
  $err=mysql_errno();
  if ($err)
           {
             echo 'Error code:'.$err.'<br>';
             if ($err==1062)
           	 {
           	   echo '<h3 class="text-content"><span style="color:red;">User already exists!</span></h3>';	
           	 }
             exit();
           }   
  else
  {
   return true;
  } 
       
}
  
function login($login, $pass)
{
  $login=trim(htmlspecialchars($login));
	$pass=md5(trim(htmlspecialchars($pass)));
	$sel='select * from Users';
  $res=mysql_query($sel);
  while($row=mysql_fetch_array($res,MYSQL_NUM))
	         {
	           if ($row[1]==$login && $row[2]==$pass) 
                  {
                   $_SESSION['reg'] = $login;
                   return true; 
                   exit();
                  }
	         }
      

}        


?>