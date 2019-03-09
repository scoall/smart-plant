
<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
include("../model/api-articles.php") ; // CHANGE THERE

session_start();
unset($_SESSION['LAST_ACTIVITY']);

function safe($variable) //move the function to the proper file
{
    $variable = trim($variable);
    $variable = htmlspecialchars($variable);
    $variable = stripslashes($variable);

    return $variable;
}

if(isset($_POST['KEY']) && isset($_POST['content']))
{

    $target_dir = "../view/pictures/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["pic"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $location = $target_dir.basename($_FILES["pic"]["name"]);
    $_POST['location'] = $location;




    $key = safe($_POST['key']);
    $species = safe($_POST['species']);
    $light = safe($_POST['light']);
    $water = safe($_POST['water']);
    $temperature = safe($_POST['temperature']);




    $plant = addPlant($key, $species ,$light, $water, $temperature); //CHANGE THERE TOOOOOO IF NEEDED
    $json = json_decode($plant);



}

header('Location: ../view/new2.php'); // change to javascript + display message


?>