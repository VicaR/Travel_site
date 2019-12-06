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
$cityid=$_GET['cityid'];
$ps=$pdo->prepare('select co.country,ci.city,ho.hotel,ho.stars,ho.cost,ho.id
	        from Countries co, Cities ci, Hotels ho
	        where ho.cityid='.$cityid.' and ho.countryid=co.id and ho.cityid=ci.id and ci.countryid=co.id
	        order by 2');
$ps->execute();
$ps->setFetchMode(PDO::FETCH_NUM);

echo '<table width="100%" class="table table-striped tbtours text-center">';
echo '<tr><th style="text-align:center;">Country</th><th style="text-align:center;">City</th><th style="text-align:center;">Hotel</th><th style="text-align:center;">Stars</th><th style="text-align:center;">Cost</th><th style="text-align:center;">Info</th></tr>';
while ($row=$ps->fetch()) 
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

 ?>