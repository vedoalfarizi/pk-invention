<?php

$laporans = \App\Models\laporan::get();

$dataArray = [];
foreach ($laporans as $laporan){
    $latitude = $laporan->lat;
    $longtitude = $laporan->long;
    $dataArray[] = array('longitude'=>$longitude,'latitude'=>$latitude);
}


//$hasil=mysql_query($querysearch);
//while($row = mysql_fetch_array($hasil))
//{
//    $id=$row['id'];
//    $name=$row['name'];
//    $address=$row['address'];
//    $capacity=$row['capacity'];
//    $longitude=$row['long'];
//    $latitude=$row['lat'];
//    $dataarray[]=array('id'=>$id,'name'=>$name, 'address'=>$address, 'capacity'=>$capacity, 'longitude'=>$longitude,'latitude'=>$latitude);
//}
echo json_encode ($dataArray);