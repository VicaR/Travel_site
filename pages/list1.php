<?php 
function connect($host='localhost',$user='root', $pass='site_Travel',$dbname='site_Travel')
		{
			$cs='mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
			$options=array(
				PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
				PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'
				);
			try {
				$pdo=new PDO($cs,$user,$pass,$options);
				return $pdo;
			}
			catch(PDOexception $e)
			{
				echo $e->getMessage();
				return false;
			}
		}
		
$pdo=connect();
$ps=$pdo->prepare('select * from countries');
$ps->execute();
echo '<option value="0">select country</option>';
while($row=$ps->fetch())
{
	echo '<option value="'.$row['id'].'">';
	echo $row['country'];
	echo '</option>';
}

 ?>