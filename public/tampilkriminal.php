<?php
echo "<script>alert(00000000000)</script>";
  define('db_host','localhost');
  define('db_user','root');
  define('db_pass','');
  define('db_name','pk');
   
$db = new mysqli(db_host,db_user,db_pass,db_name);
$dataarray=[];
 
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}  
$sql="select * from laporans";
     if(!$result = $db->query($sql)){
     die(' query error [' . $db->error . ']');
}
 while($kriminal = $result->fetch_object()){

    $id=$kriminal->id;
   $name=$kriminal->korban;
   $address=$kriminal->tempat_kejadian;
   $capacity=$kriminal->kerugian;
   $longitude=$kriminal->long;
   $latitude=$kriminal->lat;
   $dataarray[]=array('id'=>$id,'name'=>$name, 'address'=>$address, 'capacity'=>$capacity, 'longitude'=>$longitude,'latitude'=>$latitude);
}
echo json_encode ($dataarray);

// $querysearch = "SELECT * FROM laporans";
// $hasil=mysql_query($querysearch);
// while($row = mysql_fetch_array($hasil))
// {
//    $id=$row['id'];
//    $name=$row['korban'];
//    $address=$row['tempat_kejadian'];
//    $capacity=$row['kerugian'];
//    $longitude=$row['long'];
//    $latitude=$row['lat'];
//    $dataarray[]=array('id'=>$id,'name'=>$name, 'address'=>$address, 'capacity'=>$capacity, 'longitude'=>$longitude,'latitude'=>$latitude);
// }
// echo json_encode ($dataArray);