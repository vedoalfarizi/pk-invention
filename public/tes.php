<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="code/highcharts.js"></script>
    <script src="code/modules/exporting.js"></script>
</head>
<body>


    <?php
    define('db_host','localhost');
    define('db_user','root');
    define('db_pass','');
    define('db_name','pk');
    $db = new mysqli(db_host,db_user,db_pass,db_name);
    if($db->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }

    $sql="select * from perkaras ORDER BY id";
    if(!$result = $db->query($sql)){
        die(' query error [' . $db->error . ']');
    }
    $n=0;
    while($perkara = $result->fetch_object()){
        $p[$n]=$perkara->nama;
        $pid[$n]=$perkara->id;
        $n++;
    }

    $i=0;
    while ($i<$n) {
        $pp=$pid[$i];
        $sql="select * from infos WHERE perkara_id=".$pp;
        if(!$result = $db->query($sql)){
            die(' query error [' . $db->error . ']');
        }
        $jp[$i]=mysqli_num_rows($result);
        $i++;
    }

    ?>


    <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
    <script type="text/javascript">

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Tindakan Kriminalitas Berdasarkan Jenis'
            },

            xAxis: {
                categories: ['<?= join($p, ',') ?>'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah tindakan kriminal',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total kriminalitas',
                data: [<?= join($jp, ',') ?>]
            }]
        });
    </script>

</body>
</html>    