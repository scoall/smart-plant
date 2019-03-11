<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
include("apiMayar.php") ; // CHANGE THERE


echo 'IZA';
function safe($variable) //move the function to the proper file
{
    $variable = trim($variable);
    $variable = htmlspecialchars($variable);
    $variable = stripslashes($variable);


    return $variable;
}

if(isset($_POST['key']))
{

    $target_dir = "../view/images/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["pic"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $location = $target_dir.basename($_FILES["pic"]["name"]);
    $_POST['location'] = $location;





    $key = $_POST['key'];
    $image=$location;
    $species = safe($_POST['species']);



    $light = safe($_POST['light']);
    $water = safe($_POST['water']);
    $temperature = safe($_POST['temperature']);
    $user = $_POST['username'];

    $foo = new StdClass();
    $foo->light = $light;
    $foo->water = $water;
    $foo->temperature = $temperature;

    $requirements = json_encode($foo);


    echo'<script>alert("Hi");</script>';

    $plant = addPlant($key, $user, $image, $species, $requirements); 
    $json = json_decode($plant);



}

//header('Location: ../view/new2.php'); // change to javascript + display message


?>