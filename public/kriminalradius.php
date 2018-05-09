<?php
define('db_host','localhost');
define('db_user','root');
define('db_pass','');
define('db_name','pk');
$db = new mysqli(db_host,db_user,db_pass,db_name);
if($db->connect_errno > 0){
die('Unable to connect to database [' . $db->connect_error . ']');
}
//
//$latit=$_GET["lat"];
//$longi=$_GET["lng"];
//$rad=$_GET["rad"];


$latit=2.5727;
$longi=98.8156;
$rad=36000;

$sql="SELECT id, judul, lat, long,
(6371 * acos(cos(radians(".$latit."))
* cos(radians(lat)) * cos(radians(long)
- radians(".$longi.")) + sin(radians(".$latit."))
* sin(radians(lat)))) AS jarak
FROM infos
HAVING jarak <= ".$rad." ORDER BY jarak";
if(!$result = $db->query($sql)){
    die(' query error [' . $db->error . ']');
}

while($hasil = $result->fetch_object())
{
    $id=$row['id'];
    $name=$row['judul'];
    $longitude=$row['long'];
    $latitude=$row['lat'];
    $dataarray[]=array('id'=>$id,'name'=>$name,
        'longitude'=>$longitude,'latitude'=>$latitude);
}
echo json_encode ($dataarray);

?>