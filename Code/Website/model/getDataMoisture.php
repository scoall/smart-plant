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
$labels='';

$device="5C:CF:7F:10:4D:"; //HARDCODED, CHANGE IT !!!!!!
$minTimestamp = strtotime("last monday midnight"); //HARDCODEEEED !!!!
$maxTimestamp = strtotime("last tuesday midnight");  //HARDCODEEEED !!!!
$minTimestampWeek = strtotime("-6 days midnight"); 
$currentdate = date('w',$minTimestampWeek);
$day=0;
 



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
$times = array();

$timeWeek = array();
$count = array();
$labels=" ";


$average = array();
$nr = array();
$sum = array();



for($a=0;$a<7;$a++) // declare and initialize array - readings averages - 6 per day 
{
    for($b=0;$b<6;$b++) // declare and initialize array - readings averages - 6 per day 
    {
        $sum[$a][$b] = 0; //sum of moisture reading per time range per day
        $average[$a][$b] = 0; //average per time range per day
        $nr[$a][$b] = 0; //nr of moisture reading per time range per day

    }
}

for($a=0;$a<1000;$a++)
{
    $times[$a]=0;
    $moist[$a]=0;
}



switch($currentdate)
{
    case 0:
        $labels = "'Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'";
        break;
    case 1:
        $labels = "'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'";
        break;
    case 2:
        $labels = "'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Monday'";
        break;
    case 3:
        $labels = "'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday', 'Monday', 'Tuesday'";
        break;
    case 4:
        $labels = "'Thursday', 'Friday', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday'";
        break;
    case 5:
        $labels = "'Friday', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'";
        break;
    case 6:
        $labels = "'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday','Friday'";
        break;
        
}


$i=0;

$seriesMoist=$seriesMoist.'';
$seriesTemp=$seriesTemp.'{"name": "Today", "data":[';
$seriesLight=$seriesLight.'{"name": "Today", "data":[';
$seriesHumidity=$seriesHumidity.'{"name": "Today", "data":[';


foreach($jsonReadings as $data)
{
    $date = $data->time;
    $readings = json_decode($data->readings); //get very readings
    $times[$i] = strtotime($date);
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
    $dateTimestamp = strtotime($date);
    $neww1 = $readings->m/10;
    $neww2 = $readings->t;
    $neww3 = $readings->h;
    $neww4 = $readings->l/10;
    $dayNr = date('w',$dateTimestamp); 
    
    

    if($dayNr!=$currentdate)
    {
        
        for($b=0;$b<6;$b++)
        {
        if($sum[$day][$b]!=0 && $nr[$day][$b]!=0)
        {
            $average[$day][$b] = $sum[$day][$b]/$nr[$day][$b];
        } //else zero                       
        }  
       
        if($currentdate>$dayNr)
        {
            $difference = 7-$currentdate+$dayNr;
        }
        else
        {
            $difference = $dayNr-$currentdate;
        }
        
        $day=$day+$difference;
        $currentdate=$dayNr;
        
        
    
    }   

    $time=date('G',$dateTimestamp);
    
    switch(true)
    {
        case $time<4:
            $sum[$day][0] = $sum[$day][0] + $neww1;
            $nr[$day][0]++;
            break;
        case $time<8:
            $sum[$day][1] = $sum[$day][1] + $neww1;
            $nr[$day][1]++;
            break;
        case $time<12:
            $sum[$day][2] = $sum[$day][2] + $neww1;
            $nr[$day][2]++;
            break;
        case $time<16:
            $sum[$day][3] = $sum[$day][3] + $neww1;
            $nr[$day][3]++;
            break;
        case $time<20:
            $sum[$day][4] = $sum[$day][4] + $neww1;
            $nr[$day][4]++;
            break;
        case $time<24:
            $sum[$day][5] = $sum[$day][5] + $neww1;
            $nr[$day][5]++;
            break;

    }
   
    echo $sum[6][1];
    echo " ";


}




            for($b=0;$b<6;$b++)
            {
                if($sum[6][$b]!=0 && $nr[6][$b]!=0)
                {
                    $average[6][$b] = $sum[6][$b]/$nr[6][$b];
                    $average[6][$b] = round($average[6][$b],2);
                }
            }

        


for($j=0;$j<$i-1;$j++) //DAY 
{

    $seriesMoist=$seriesMoist."{x: moment.unix(".$times[$j].").format('HH:mm'), y: ".$moist[$j]. "},";
    $seriesTemp=$seriesTemp."". $temp[$j] . ",";
    $seriesLight=$seriesLight."". $moist[$j] . ",";
    $seriesHumidity=$seriesHumidity."". $humidity[$j] . ",";
}



$seriesMoist=$seriesMoist."{x: moment.unix(".$times[$i-1].").format('HH:mm'), y: ".$moist[$i-1]. "}";
$seriesTemp=$seriesTemp."". $temp[$i-1]."]},";
$seriesLight=$seriesLight."". $light[$i-1]."]},";
$seriesHumidity=$seriesHumidity."". $humidity[$i-1]."]},";


function data($a)
{
    global $average;

    $stringtosend=" ";
    
    for($b=0;$b<6;$b++)
    {
        $stringtosend=$stringtosend.' '.round($average[$b][$a],2).', ';
    }
    
    $stringtosend=$stringtosend.' '.round($average[6][$a],2);
    
    return $stringtosend;
    
}

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


                     new Chart(document.getElementById('myChart'), { 
                        type: 'bar',
                        data: {
                          labels: [".$labels."], 
                          datasets: [
                            {
                              label: '0-4am', //Time ranges e.g 4am-8am
                              backgroundColor: '#ccccff',
                              data: [".data(0)."] //replace
                            }, {
                              label: '4am-8am',
                              backgroundColor: '#6666ff',
                              data: [".data(1)."]
                            },
                            {
                              label: '8am-12pm',
                              backgroundColor: '#0000ff',
                              data: [".data(2)."]
                            },
                             {
                              label: '12pm-4pm',
                              backgroundColor: '#000099',
                              data: [".data(3)."]
                            },
                            {
                              label: '4pm-8pm',
                              backgroundColor: '#000066',
                              data: [".data(4)."]
                            },
                             {
                              label: '8pm-12am',
                              backgroundColor: '#000033',
                              data: [".data(5)."]
                            }
                          ]
                        },
                        options: {
                          title: {
                            display: true,
                            text: 'Population growth (millions)'
                          }
                        }
                    });



                      }



                      else if($(this).val()==3)
                      {alert(3);}
                  });
</script>";
?>