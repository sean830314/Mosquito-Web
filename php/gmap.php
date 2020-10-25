<?php include('db_link.php');
$sql_query ="Select * from mos_device";
//$sql_query = "SELECT * FROM `mos_device` order by `in_database_time` desc";
  $result = mysql_query($sql_query);
  $key=0;
  while($row = mysql_fetch_array($result))
  {
    $data[$key]['location']=$row['location'];
    $NewString = split (',', $data[$key]['location']);
    $data[$key]['x_location']= $NewString[0];
    $data[$key]['y_location']= $NewString[1];
    //echo $NewString[0]."ANN".$NewString[1];
    $key++;
  }
  //mysql_free_result($result);
  mysql_close($conn);
?>
<html>
  <head>
    <meta charset="utf-8">
    <style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; }
    </style>
  </head>
      <body>
        <div id="map"></div>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<key>&callback=initMap"
    type="text/javascript"></script>
    <script>
    var map;
    function initMap() {
    var myLatLng = {lat: 21.363, lng: 121.044};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 6,
      center: myLatLng
      });
     <?php foreach($data as $key => $item): ?>
    var myLatLng = {lat: <?php echo $item['x_location'];?> , lng: <?php echo $item['y_location'];?>};
    var x_location=<?=$item['x_location']?>;
    var y_location=<?=$item['y_location']?>;
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: ""+x_location+","+y_location+""
        });
     <?php endforeach; ?>
    }
    </script>
  </body>
</html>