<?php 
ini_set('display_errors','On');
error_reporting(E_ALL);


$seriesMoist=null;
$seriesTemp=null;
$seriesLight=null;
$seriesHumidity=null;

$seriesMoistWeek=null;
$seriesTempWeek=null;
$seriesLightWeek=null;
$seriesHumidityWeek=null;

$seriesMoistMonth=null;
$seriesTempMonth=null;
$seriesLightMonth=null;
$seriesHumidityMonth=null;


$device="5C:CF:7F:10:4D:"; //HARDCODED, CHANGE IT !!!!!!
$minTimestamp = strtotime("last monday midnight"); //HARDCODEEEED !!!!
$maxTimestamp = strtotime("last tuesday midnight");  //HARDCODEEEED !!!!
$minTimestampWeek = strtotime("-7 day midnight"); 
$minTimestampMonth = strtotime("first day of this month midnight ", time());
$minTime = date('Y-m-d H:i:s', $minTimestamp);
$maxTime = date('Y-m-d H:i:s', $maxTimestamp);
$minWeek = date('Y-m-d H:i:s', $minTimestampWeek);
$minMonth = date('Y-m-d H:i:s', $minTimestampMonth);

$plantreadings = getAllReadings($device, $minTime, $maxTime); //sort by time, get newest ones
$jsonReadings = json_decode($plantreadings); // get readings table

$plantreadingsWeekView = getAllReadingsWeekView($device, $minWeek); //sort by time, get newest ones
$jsonReadingsWeek = json_decode($plantreadingsWeekView); // get readings table


$plantreadingsMonthView = getAllReadingsMonthView($device, $minMonth); //sort by time, get newest ones
$jsonReadingsMonth = json_decode($plantreadingsMonthView); 


$moist = array();
$temp = array();
$humidity = array();
$light = array();
$time = array();

$moistWeek = array();
$tempWeek = array();
$humidityWeek = array();
$lightWeek = array();
$timeWeek = array();
$timeWeek2 = array();

$moistMonth = array();
$tempMonth = array();
$humidityMonth = array();
$lightMonth = array();
$timeMonth = array();



$i=0;
$iWeek=0;
$iMonth=0;

$seriesMoist=$seriesMoist.'';
$seriesTemp=$seriesTemp.'{"name": "Today", "data":[';
$seriesLight=$seriesLight.'{"name": "Today", "data":[';
$seriesHumidity=$seriesHumidity.'{"name": "Today", "data":[';

$seriesMoistWeek=$seriesMoistWeek.'{"name": "This week", "data":[';
$seriesTempWeek=$seriesTempWeek.'{"name": "This week", "data":[';
$seriesLightWeek=$seriesLightWeek.'{"name": "This week", "data":[';
$seriesHumidityWeek=$seriesHumidityWeek.'{"name": "This week", "data":[';

$seriesMoistMonth=$seriesMoistMonth.'{"name": "This month", "data":[';
$seriesTempMonth=$seriesTempMonth.'{"name": "This month", "data":[';
$seriesLightMonth=$seriesLightMonth.'{"name": "This month", "data":[';
$seriesHumidityMonth=$seriesHumidityMonth.'{"name": "This month", "data":[';


foreach($jsonReadings as $data)
{

    $date = $data->time;
    $readings = json_decode($data->readings); //get very readings
    $time[$i] = strtotime($date);

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

foreach($jsonReadingsWeek as $data)
{

    $date = $data->time;

    $readings = json_decode($data->readings); //get very readings
    $timeWeek[$iWeek] = date("H:i",strtotime($date)); //get time e.q. 12.25 || 18.01
    $timeWeek2[$iWeek] = strtotime($date)."000";
    $neww1 = $readings->m/10;
    $neww2 = $readings->t;
    $neww3 = $readings->h;
    $neww4 = $readings->l/10;
    $moistWeek[$iWeek] = $neww1;
    $tempWeek[$iWeek] = $neww2;
    $humidityWeek[$iWeek] = $neww3;
    $lightWeek[$iWeek] = $neww4;

    $iWeek++;


}

foreach($jsonReadingsMonth as $data)
{

    $date = $data->time;
    $readings = json_decode($data->readings); //get very readings
    $timeMonth[$iMonth] = date("H:i",strtotime($date)); //get time e.q. 12.25 || 18.01
    $neww1 = $readings->m/10;
    $neww2 = $readings->t;
    $neww3 = $readings->h;
    $neww4 = $readings->l/10;
    $moistMonth[$iMonth] = $neww1;
    $tempMonth[$iMonth] = $neww2;
    $humidityMonth[$iMonth] = $neww3;
    $lightMonth[$iMonth] = $neww4;

    $iMonth++;


}

for($j=0;$j<$i-1;$j++) //DAY 
{

   
    $seriesMoist=$seriesMoist."{x: moment.unix(".$time[$j].").format('HH:mm'), y: ".$moist[$j]. "},";
    $seriesTemp=$seriesTemp."". $temp[$j] . ",";
    $seriesLight=$seriesLight."". $moist[$j] . ",";
    $seriesHumidity=$seriesHumidity."". $humidity[$j] . ",";

}

for($j=0;$j<$iWeek-1;$j++) //WEEK
{
    $timeee = strtotime($timeWeek[$j]);
    $seriesMoistWeek=$seriesMoistWeek."{x: new Date(".$timeWeek2[$j]."), y: ".$moistWeek[$j]. "},";
    $seriesTempWeek=$seriesTempWeek."". $tempWeek[$j] . ",";
    $seriesLightWeek=$seriesLightWeek."". $moistWeek[$j] . ",";
    $seriesHumidityWeek=$seriesHumidityWeek."". $humidityWeek[$j] . ",";

}

for($j=0;$j<$iMonth-1;$j++) //MONTH
{

    
    $seriesMoistMonth=$seriesMoistMonth."". $moistMonth[$j] . ",";
    $seriesTempMonth=$seriesTempMonth."". $tempMonth[$j] . ",";
    $seriesLightMonth=$seriesLightMonth."". $moistMonth[$j] . ",";
    $seriesHumidityMonth=$seriesHumidityMonth."". $humidityMonth[$j] . ",";

}



$seriesMoist=$seriesMoist."{x: moment.unix(".$time[$i-1].").format('HH:mm'), y: ".$moist[$i-1]. "}";
$seriesTemp=$seriesTemp."". $temp[$i-1]."]},";
$seriesLight=$seriesLight."". $light[$i-1]."]},";
$seriesHumidity=$seriesHumidity."". $humidity[$i-1]."]},";


$seriesMoistWeek=$seriesMoistWeek."{x: new Date(".$timeWeek2[$iWeek-1]."), y: ".$moistWeek[$iWeek-1]. "}]},";
$seriesTempWeek=$seriesTempWeek."". $tempWeek[$iWeek-1]."]},";
$seriesLightWeek=$seriesLightWeek."". $lightWeek[$iWeek-1]."]},";
$seriesHumidityWeek=$seriesHumidityWeek."". $humidityWeek[$iWeek-1]."]},";


$seriesMoistMonth=$seriesMoistMonth."". $moistMonth[$iMonth-1]."]},";
$seriesTempMonth=$seriesTempMonth."". $tempMonth[$iMonth-1]."]},";
$seriesLightMonth=$seriesLightMonth."". $lightMonth[$iMonth-1]."]},";
$seriesHumidityMonth=$seriesHumidityMonth."". $humidityMonth[$iMonth-1]."]},";

//FIXED TILL THERE

echo"<script>




   var result = [".$seriesMoist."];

// parse labels and data
var labels = result.map(e => moment(e.x, 'HH:mm'));
var data = result.map(e => +e.y);

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
   type: 'line',
   data: {
      labels: labels,
      datasets: [{
         label: 'Today',
         data: data,
         borderWidth: 1,
         borderColor: 'rgb(92, 255, 244)'
      }]
   },
   options: {
      scales: {
         xAxes: [{
            type: 'time',
            ticks:
            {fontColor: 'rgba(255, 255, 255, 0.9)',
            fontSize: '9'},
            time: {
               unit: 'hour',
               displayFormats: {
                  hour: 'HH:mm'
               }
            }
         }]
      },
   }
});

$('#sel1').change(function()
                  {


                      if($(this).val()==1)

                      {
                          var result = [".$seriesMoist."];

                        // parse labels and data
                        var labels = result.map(e => moment(e.x, 'HH:mm'));
                        var data = result.map(e => +e.y);

                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                           type: 'line',
                           data: {
                              labels: labels,
                              datasets: [{
                                 label: 'Today',
                                 data: data,

                                 borderWidth: 1,
                                 borderColor: 'rgb(92, 255, 244)'
                              }]
                           },
                           options: {
                              scales: {
                                 xAxes: [{
                                    type: 'time',
                                    ticks:
                                    {fontColor: '#fff'},
                                    time: {
                                       unit: 'hour',
                                       displayFormats: {
                                          hour: 'HH:mm'
                                       }
                                    }
                                 }]
                              },
                           }
                        });


                      }


                      else if($(this).val()==2) // WEEK VIEW

                      {
                      
                      var result = [".$seriesMoistWeek."];

                        // parse labels and data
                        var labels = result.map(e => moment(e.x, 'HH:mm'));
                        var data = result.map(e => +e.y);

                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                           type: 'line',
                           data: {
                              labels: labels,
                              datasets: [{
                                 label: 'Today',
                                 data: data,

                                 borderWidth: 1,
                                 borderColor: 'rgb(92, 255, 244)'
                              }]
                           },
                           options: {
                              scales: {
                                 xAxes: [{
                                    type: 'time',
                                    ticks:
                                    {fontColor: '#fff'},
                                    time: {
                                       unit: 'hour',
                                       displayFormats: {
                                          hour: 'HH:mm'
                                       }
                                    }
                                 }]
                              },
                           }
                        });

                      
                      
                      }

                      else if($(this).val()==3)

                      {alert(3);}

                  });




</script>";

?>