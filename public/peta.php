
    <script src="{!! asset('code/highcharts.js') !!}"></script>
    <script src="{!! asset('code/modules/exporting.js') !!}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script>
<div class="container">
    <div class="row">
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



        <script type="text/javascript">

            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Peringkat Kejadian Kriminal'
                },
                subtitle: {
                    text: 'per provinsi di Indonesia'
                },
                xAxis: {
                    categories: [
                        'Nanggroe Aceh Darussalam',
                        'Sumatera Utara',
                        'Riau',
                        'Kep. Riau',
                        'Sumatera Barat',
                        'Bengkulu',
                        'Jambi',
                        'Bangka Belitung',
                        'Sumatera Selatan',
                        'Lampung',
                        'Banten',
                        'Jakarta',
                        'Jawa Barat',
                        'Jawa Tengah',
                        'D.I. Yogyakarta',
                        'Jawa Timur'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah kriminalitas per provinsi'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Total kriminalitas',
                    data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4, 55, 25, 33, 45]

                }]
            });
        </script>
        <center>
            <br/>
            <h2>Peta Persebaran Tindak Kejahatan Kriminal</h2>
   
        <div id="map" style="width:100%;height:400px"></div>
    </div>




</div>



    </section>

    </section>

    </body>
    </html>

  <script type="text/javascript">
    
   (function() {
  window.onload = function() {
var map;
    //Parameter Google maps
    var options = {
      zoom: 5, //level zoom
     //posisi tengah peta
      center: new google.maps.LatLng(-0.456972, 118.433241),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
   
    // Buat peta di 
    var map = new google.maps.Map(document.getElementById('map'), options);
    // Tambahkan Marker 
     var locations = [
               <?php
                    define('db_host','localhost');
                    define('db_user','root');
                    define('db_pass','');
                    define('db_name','pk');
                     
                  $db = new mysqli(db_host,db_user,db_pass,db_name);

                   
                  if($db->connect_errno > 0){
                      die('Unable to connect to database [' . $db->connect_error . ']');
                  }  
                  $sql="select * from laporans";
                       if(!$result = $db->query($sql)){
                       die(' query error [' . $db->error . ']');
                  }
                   while($kriminal = $result->fetch_object()){
                     echo "['".$kriminal->no_surat."', ".$kriminal->lat.", ".$kriminal->long.", ".$kriminal->id."],";
                  }
               ?>
                        //  ['STMIK AKAKOM', -7.790085, 110.408465],
                        // ['Universitas Gadjah Mada', -7.764147, 110.378939],
                        // ['Universitas Muhamadiyah Yogyakarta', -7.810845, 110.324223],
                         //['Univeritas Ahmad Dahlan', -7.819295, 110.387915],      
    
    ];
     var infowindow = new google.maps.InfoWindow();

    var marker, i;
     /* kode untuk menampilkan banyak marker */
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
       icon: 'marker.png',
       animation: google.maps.Animation.BOUNCE
      });
     /* menambahkan event clik untuk menampikan
       infowindows dengan isi sesuai denga
       marker yang di klik */
      
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
      var ContenString='<a href="#'+locations[i][3]+'">No. Surat:'+locations[i][0]+'</a>"'
        return function() {
          infowindow.setContent(ContenString);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  

  };
})();

   </script>
    </div>
@endsection
