<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
// Connect to database
include("connectionMayar.php");
$db = new dbObj();
$conn =  $db->getConnstring();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


function addPlant($key, $username, $image, $species, $requirements)
{
        echo '<script>alert("Hi");</script>';
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM plants WHERE device = ?" ;
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,'s', $key);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0)
    {
        echo "<script>window.location.href = '../view/new2.php'; alert('Device is already registered');</script>";
    }
    else {
       
            $stmt = mysqli_stmt_init($conn);
            $sql = "INSERT INTO plants(device, username,image, species, requirements) VALUES (?,?,?,?,?)" ;
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, 'sssss', $key, $username, $image, $species, $requirements);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            return json_encode($result);
            echo "<script>window.location.href = '../view/new2.php'; alert('Plant has been successfully added');</script>";
        }
    
   
}

function getPlant($username)
{
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM plants WHERE username = ?" ;
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,'s', $username);
    mysqli_stmt_execute($stmt);
    try
    {
    $result = mysqli_stmt_get_result($stmt);
    $rows = array();
		while($r = mysqli_fetch_assoc($result)) 
        {
    		$rows[] = $r;
		}
		
		return json_encode($rows);
    }
    catch(Exception $e)
    {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
        
          
}



function getReadings($device)
{
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM plant_readings WHERE device = ? ORDER BY time DESC LIMIT 1 " ;
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,'s', $device);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = array();
		while($r = mysqli_fetch_assoc($result)) 
        {
    		$rows[] = $r;
		}
		
		return json_encode($rows);
		
		
		
    
   
          
}