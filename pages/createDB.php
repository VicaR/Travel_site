<?php 
include_once('functions.php');
connect();
$roles='create table if not exists Roles(
id int not null auto_increment primary key,
role varchar(15)
)default charset="utf8"';

mysql_query($roles);

$err=mysql_errno();
if ($err)
{
	echo 'Error:'.$err.'<br/>';
}

$users='create table if not exists Users(
id int not null auto_increment primary key,
login varchar(30) unique,
pass varchar(512),
email varchar(128),
roleid int,
foreign key (roleid) references Roles (id),
discount int
)default charset="utf8"';

mysql_query($users);

$err=mysql_errno();
if ($err)
{
	echo 'Error:'.$err.'<br/>';
}

$countries='create table if not exists Countries(
	id int not null auto_increment primary key, 
	country varchar(64) unique
	)default charset="utf8"';

mysql_query($countries);

$err=mysql_errno();
if ($err)
{
	echo 'Error:'.$err.'<br/>';
}

$cities='create table if not exists Cities(
	id int not null auto_increment primary key, 
	city varchar(64), 
	countryid int, 
	foreign key(countryid) references countries(id) 
	on delete cascade,
	ucity varchar(128),
	unique index ucity(city, countryid))default charset="utf8"';

mysql_query($cities);

$err=mysql_errno();
if ($err)
{
	echo 'Error:'.$err.'<br/>';
}

$hotels='create table if not exists Hotels(
	id int not null auto_increment primary key, 
	hotel varchar(64), 
	cityid int, 
	foreign key(cityid) references cities(id) on delete cascade, 
	countryid int, 
	foreign key(countryid) references countries(id) on delete cascade, 
	stars int, 
	cost int,
	info varchar(1024))default charset="utf8"';

mysql_query($hotels);

$err=mysql_errno();
if ($err)
{
	echo 'Error:'.$err.'<br/>';
}

$images='create table if not exists Images(
	id int not null auto_increment primary key,
	imagepath varchar(255),
	hotelid int, 
	foreign key(hotelid) references hotels(id) on delete cascade)
	default charset="utf8"';


mysql_query($images);

$err=mysql_errno();
if ($err)
{
	echo 'Error:'.$err.'<br/>';
}

?>