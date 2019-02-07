<?php 
if(isset($_POST['submit-reg'])){
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    include("api-sec.php");
    if ($_POST['password']==$_POST['confirm_pass']){
        $articletxt = register($_POST['name'], $_POST['surname'],$_POST['username'],$_POST['email'],$_POST['password']);
        $articlejson = json_decode($articletxt) ;
    }
}

?>