<?php 
if(isset($_SESSION['sublog'])){
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    include("../model/api-sec.php");
    $articletxt = login($_POST['userlog'], $_POST['passlog']);
    $articlejson = json_decode($articletxt) ;
}
?>