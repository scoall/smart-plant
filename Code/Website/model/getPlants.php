<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
include("apiMayar.php") ; // CHANGE THERE

$username = "Missmeva";

if(isset($username))
{

    

    $plant = getPlant($username); 
    $json = json_decode($plant);
    
    for ($i=0 ; $i<sizeof($json) ; $i++) 
    {
        
        $device = $json[$i] -> device; // pass key/device id
        $plantreadings = getReadings($device); //sort by time, get newest ones
        $jsonReadings = json_decode($plantreadings); // get readings table
        $readings = json_decode($jsonReadings[0]->readings); //get very readings
        $requirements = json_decode($json[$i] -> requirements); // get requirements table
        
        
        $minLight=0;
        $minTemp=0;
        $minMoisture=20;
        $maxLight=1000;
        $maxTemp=40;
        $maxMoisture=1000;
        
        switch($requirements->light) //set light level range -> CHANGE IT
        {
            case 1:
                $maxLight=100; 
                break;
            case 2:
                $minLight=100;
                $maxLight=300; 
                break;
            case 3:
                $minLight=300;
                break;    
                
        }
         switch($requirements->water)  //set moisture range -> CHANGE IT
        {
            case 1:
                $maxMoisture=200;
                break;
            case 2:
                $minMoisture=200;
                $maxMoisture=600;
                break;
            case 3:
                $minMoisture=600;
                break;        
        }
         switch($requirements->temperature) //set temperature range
        {
            case 1:
                 $maxTemp=15;
                break;
            case 2:
                 $minTemp=15;
                 $maxTemp=24; 
                break;
            case 3:
                 $minTemp=24;
                  
                break;        
        }
	    

        echo'
            <tr>
                <th><img src="'.$json[$i] -> image.'" class="img-circle" height="80" width="80" style="display:block"></th>
                <td>'.$json[$i] -> species.'</td>
                <th><center>';
        
        if($readings->m<$minTemp)
        {
            echo'<img src="water.png"  height="50" width="50" style="display:block">Water me !</center></th>';
        }
        else if($readings->m>$maxTemp)
        {
            echo'<img src="toomuchwater.png"  height="50" width="50" style="display:block">Too much water</center></th>';
        }
        else
        {
            echo'<img src="like.png"  height="40" width="40" style="display:block">Perfect</center></th>';
        }
        
        
            echo'
                <td>'.$readings->m.'</td>
                <td>'.$readings->t.'</td>
                <td>'.$readings->l.'</td>
                <td>'.$readings->h.'</td>
                <td><button type="button" class="btn btn-info" height="60" width="60">MORE</button></td>
            </tr>';


    }
}




?>