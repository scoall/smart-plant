<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
// Connect to database
include("connection.php");
$db = new dbObj();
$conn =  $db->getConnstring();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
function register($username,$email,$password){
    $pwdhash = password_hash($password, PASSWORD_DEFAULT);
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM plant_users WHERE email = ?" ;
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,'s', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0){
        echo "<script>alert('Email already registered');window.location.href = '../view/new1.php';</script>";
    }
    else {
        $sql = "SELECT * FROM plant_users WHERE username = ?" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt,'s', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result)>0){
            echo "<script>alert('Mobile already registered');window.location.href = '../view/new1.php';</script>";
        }
        else{
            $stmt = mysqli_stmt_init($conn);
            $sql = "INSERT INTO plant_users(email, password, username) VALUES (?,?,?)" ;
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, 'sss', $email,$pwdhash,$username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            echo "<script>alert('Successfully registered');window.location.href = '../view/new2.php';</script>";
        }
    }
    return json_encode($result);
}
function login($lgnuser, $lgnpassword){
    $_SESSION["tlog"]=false;
    global $conn;
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT password FROM plant_users WHERE username = ?" ;
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,'s', $lgnuser);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0){ 
        $r = mysqli_fetch_assoc($result);
        if(password_verify($lgnpassword, $r['password'])) {
           
            $_SESSION["username"] = $lgnuser;
            echo "<script>window.location.href = '../view/new2.php';</script>";
        }
        else{
            echo "<script>alert('Wrong login details');window.location.href = '..view/new1.php';</script>";
        }
    }
    else{
        echo "<script>alert('Wrong login details');window.location.href = '../view/new1.php';</script>";
    }
}