<?php 
ini_set('display_errors','On');
error_reporting(E_ALL);


$seriesMoist=null;
$seriesTemp=null;
$seriesLight=null;
$seriesHumidity=null;

$device="5C:CF:7F:10:4D:";
$minTimestamp = strtotime("-24 hours"); 
$minTime = date('Y-m-d H:i:s', $minTimestamp);
$plantreadings = getAllReadings($device, $minTime); //sort by time, get newest ones
$jsonReadings = json_decode($plantreadings); // get readings table


$moist = array();
$temp = array();
$humidity = array();
$light = array();
$i=0;
$z = '';
$seriesMoist=$seriesMoist.'{"name": "Today", "data":[';
$seriesTemp=$seriesTemp.'{"name": "Today", "data":[';
$seriesLight=$seriesLight.'{"name": "Today", "data":[';
$seriesHumidity=$seriesHumidity.'{"name": "Today", "data":[';


foreach($jsonReadings as $data)
{

    $date = $data->time;
    $readings = json_decode($data->readings); //get very readings
    $time[$i] = date("H:i",strtotime($date)); //get time e.q. 12.25 || 18.01
    $neww1 = $readings->m/10;
    $neww2 = $readings->t;
    $neww3 = $readings->h;
    $neww4 = $readings->l/10;
    $moist[$i] = $neww1;
    $temp[$i] = $neww2;
    $humidity[$i] = $neww3;
    $light[$i] = $neww4;

    $i++;


}

for($j=0;$j<$i-1;$j++)
{

    $z=$z."'". $time[$j] . "',";
    $seriesMoist=$seriesMoist."". $moist[$j] . ",";
    $seriesTemp=$seriesTemp."". $temp[$j] . ",";
    $seriesLight=$seriesLight."". $moist[$j] . ",";
    $seriesHumidity=$seriesHumidity."". $humidity[$j] . ",";

}


$z=$z."'". $time[$i-1] . "'";
$seriesMoist=$seriesMoist."". $moist[$i-1]."]},";
$seriesTemp=$seriesTemp."". $temp[$i-1]."]},";
$seriesLight=$seriesLight."". $light[$i-1]."]},";
$seriesHumidity=$seriesHumidity."". $humidity[$i-1]."]},";


echo"<script>



            var someDiv = document.getElementById('legends1');
           
            var chart = new Chartist.Line('#chart1', {

              labels: [".$z."],
                series: [".$seriesMoist."]


            }, {

                fullWidth: true,
                chartPadding: {
                    right: 40
                },
                plugins: [
                    Chartist.plugins.legend({
                        clickable: true,
                        position: someDiv
                    })
                ]
            });


            var someDiv = document.getElementById('legends2');
            var chart = new Chartist.Line('#chart2', {

              labels: [".$z."],
                series: [".$seriesTemp."]


            }, {

                fullWidth: true,
                chartPadding: {
                    right: 40
                },
                plugins: [
                    Chartist.plugins.legend({
                        clickable: true,
                        position: someDiv
                    })
                ]
            });


            var someDiv = document.getElementById('legends3');
            var chart = new Chartist.Line('#chart3', {

              labels: [".$z."],
                series: [".$seriesLight."]


            }, {

                fullWidth: true,
                chartPadding: {
                    right: 40
                },
                plugins: [
                    Chartist.plugins.legend({
                        clickable: true,
                        position: someDiv
                    })
                ]
            });

            var someDiv = document.getElementById('legends4');
            var chart = new Chartist.Line('#chart4', {

              labels: [".$z."],
                series: [".$seriesHumidity."]


            }, {

                fullWidth: true,
                chartPadding: {
                    right: 40
                },
                plugins: [
                    Chartist.plugins.legend({
                        clickable: true,
                        position: someDiv
                    })
                ]
            });




                     // Let's put a sequence number aside so we can use it in the event callbacks
                     var seq = 0,
                     delays = 80,
                     durations = 500;

                     // Once the chart is fully created we reset the sequence
                     chart.on('created', function() {
                     seq = 0;
                     });

                     // On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
                     chart.on('draw', function(data) {
                     seq++;

                     if(data.type === 'line') {
                     // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
                     data.element.animate({
                     opacity: {
                     // The delay when we like to start the animation
                     begin: seq * delays + 1000,
                     // Duration of the animation
                     dur: durations,
                     // The value where the animation should start
                     from: 0,
                     // The value where it should end
                     to: 1
                     }
                     });
                     } else if(data.type === 'label' && data.axis === 'x') {
                     data.element.animate({
                     y: {
                     begin: seq * delays,
                     dur: durations,
                     from: data.y + 100,
                     to: data.y,
                     // We can specify an easing function from Chartist.Svg.Easing
                     easing: 'easeOutQuart'
                     }
                     });
                     } else if(data.type === 'label' && data.axis === 'y') {
                     data.element.animate({
                     x: {
                     begin: seq * delays,
                     dur: durations,
                     from: data.x - 100,
                     to: data.x,
                     easing: 'easeOutQuart'
                     }
                     });
                     } else if(data.type === 'point') {
                     data.element.animate({
                     x1: {
                     begin: seq * delays,
                     dur: durations,
                     from: data.x - 10,
                     to: data.x,
                     easing: 'easeOutQuart'
                     },
                     x2: {
                     begin: seq * delays,
                     dur: durations,
                     from: data.x - 10,
                     to: data.x,
                     easing: 'easeOutQuart'
                     },
                     opacity: {
                     begin: seq * delays,
                     dur: durations,
                     from: 0,
                     to: 1,
                     easing: 'easeOutQuart'
                     }
                     });
                     } else if(data.type === 'grid') {
                     // Using data.axis we get x or y which we can use to construct our animation definition objects
                     var pos1Animation = {
                     begin: seq * delays,
                     dur: durations,
                     from: data[data.axis.units.pos + '1'] - 30,
                to: data[data.axis.units.pos + '1'],
                    easing: 'easeOutQuart'
            };

            var pos2Animation = {
                begin: seq * delays,
                dur: durations,
                from: data[data.axis.units.pos + '2'] - 100,
                to: data[data.axis.units.pos + '2'],
                easing: 'easeOutQuart'
            };

            var animations = {};
            animations[data.axis.units.pos + '1'] = pos1Animation;
            animations[data.axis.units.pos + '2'] = pos2Animation;
            animations['opacity'] = {
                begin: seq * delays,
                dur: durations,
                from: 0,
                to: 1,
                easing: 'easeOutQuart'
            };

            data.element.animate(animations);
            }
            });





            chart.on('created', function() {
                if(window.__exampleAnimateTimeout) {
                    clearTimeout(window.__exampleAnimateTimeout);
                    window.__exampleAnimateTimeout = null;
                }
                window.__exampleAnimateTimeout = setTimeout(chart.update.bind(chart), 100000);
            });


        </script>";

?>