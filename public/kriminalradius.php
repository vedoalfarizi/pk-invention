<?php
define('db_host','localhost');
define('db_user','root');
define('db_pass','');
define('db_name','pk');
$db = new mysqli(db_host,db_user,db_pass,db_name);
if($db->connect_errno > 0){
die('Unable to connect to database [' . $db->connect_error . ']');
}

$latit=$_GET["lat"];
$longi=$_GET["lng"];
$rad=$_GET["rad"];



$sql="SELECT id, judul, lat, lng,
(6371 * acos(cos(radians(".$latit."))
* cos(radians(lat)) * cos(radians(lng)
- radians(".$longi.")) + sin(radians(".$latit."))
* sin(radians(lat)))) *1000 AS jarak
FROM infos
HAVING jarak <= ".$rad." ORDER BY jarak;
			 ";
if(!$result = $db->query($sql)){
    die(' query error [' . $db->error . ']');
}

while($row = $result->fetch_assoc())
{
    $id=$row['id'];
    $name=$row['judul'];
    $longitude=$row['lng'];
    $latitude=$row['lat'];
    $jarak=$row['jarak'];
    $dataarray[]=array('id'=>$id,'name'=>$name, 'jarak'=>$jarak,
        'longitude'=>$longitude,'latitude'=>$latitude, 'radius'=>$rad);
}
echo json_encode ($dataarray);

?>