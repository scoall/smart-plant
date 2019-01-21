<?php

ini_set('display_errors','On');
error_reporting("Error 23");
session_start();


?>


<html>
    <head>
        <title>Welcome to SmartEcoSystem !</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Css.css">
        <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Thasadith" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Caveat|Thasadith" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet"> 

    </head>


    <body>
        <div id="background"></div>
        <div id="background2"></div>
        <div id="background3"></div>
        <script>

            document.addEventListener('DOMContentLoaded', function(){
                var movementStrength = 60;
                var height = movementStrength / window.innerHeight;
                var width = movementStrength / window.innerWidth;

                document.addEventListener('mousemove',function(e){
                    var pageX = e.pageX - (window.innerWidth / 4);
                    var pageY = e.pageY - (window.innerHeight / 4);
                    var valueX = width * pageX * -1;
                    var valueY = height * pageY * -1;
                    var valueX1 = width * pageX * -2;
                    var valueY1 = height * pageY * -2;
                    var valueX2 = width * pageX * -3;
                    var valueY2 = height * pageY * -3;

                    document.getElementById("background").style.transform = "translate(" + valueX / 4 +"px,     " + valueY / 4 + "px)";
                    document.getElementById("background2").style.transform = "translate(" + valueX1 / 4 +"px,     " + valueY1 / 4 + "px)";
                    document.getElementById("background3").style.transform = "translate(" + valueX2 / 4 +"px,     " + valueY2 / 4 + "px)";

                });
            })


            $('this').ready(function(){


                /*

                $(".image-cropper").eq(0).css({"width": "85px",  "height": "85px",  "position": "relative", "overflow": "hidden", "border-radius" : "50%", "margin-right": "25px", "box-shadow" : "5px 0px 8px black", "margin-top": "50px", "margin-left": "10px"});
                $(".image-cropper").eq(1).css({"width": "100px",  "height": "100px",  "position": "relative", "overflow": "hidden", "border-radius" : "50%", "margin-right": "25px", "box-shadow" : "5px 0px 8px black", "margin-top": "20px"});
                $(".image-cropper").eq(2).css({"width": "130px",  "height": "130px",  "position": "relative", "overflow": "hidden", "border-radius" : "50%", "margin-right": "25px", "box-shadow" : "5px 0px 8px black","opacity" : "1"});
                $(".image-cropper").eq(3).css({"width": "100px",  "height": "100px",  "position": "relative", "overflow": "hidden", "border-radius" : "50%", "margin-right": "25px", "box-shadow" : "5px 0px 8px black", "margin-top": "20px"});
                $(".image-cropper").eq(4).css({"width": "85px",  "height": "85px",  "position": "relative", "overflow": "hidden", "border-radius" : "50%", "margin-right": "10px", "box-shadow" : "5px 0px 8px black", "margin-top": "50px"});
                $(".profile-pic").css({"margin-left": "-60%", "margin-top": "-25%"}); 

                */


                $('.toggle-register').click(function(){
                    $(this).addClass('active');
                    $('.toggle-login').removeClass('active');
                    $('.login-body').slideUp("slow");
                    $('.register-body').delay(625).slideDown("slow");
                });

                $('.toggle-login').click(function(){
                    $(this).addClass('active');
                    $('.toggle-register').removeClass('active');
                    $('.register-body').slideUp("slow");
                    $('.login-body').delay(625).slideDown("slow");
                });

                $('#registered').click(function(){
                    $('.toggle-login').click();
                });    



            });

        </script>
        <div class="menu">
            <nav class="navbar navbar-inner">
                <div class="container text-center">
                    <div class="row new2"><div class="col-lg-2"></div><div class="col-lg-8">

                        <ul class="nav navbar-nav">

                            <li><a href="">START</a></li>
                            <li><a href="">ABOUT SMART ECO SYSTEM</a></li>
                            <li><a href="">HOW IT WORKS</a></li>
                            <li><a href="">ABOUT US</a></li>
                            <li><a href="">CONTACT</a></li>


                        </ul>
                        </div><div class="col-lg-2">


                        </div></div></div>
            </nav>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="new">
                    <div class="col-lg-2">                      
                    </div>
                    <div class="col-lg-8"  align="center" >
                        <p class="intro1" >At Abertay Plant System we aim to supply you with the tools<br> for keeping your homes and gardens fresh and green. </p>
                        <p class="intro2" >Get ready for a whole range of smart devices <br> that make monitoring your plants as easy as pie.</p>
                        <p class="intro3"  >New to gardening? Don’t worry! <br> We’ll help you colour your thumbs green in no time.</p>
                    </div>
                    <div class="col-lg-2" id="tempid" style="">

                        <div class="social-container">
                            <!--<button type="button" style="background-color:transparent" data-toggle="modal" data-target="#myModal"><img src="images/user.png" style="height:50px;width:50px"></button> -->
                            <ul class="social-icons">
                                <li><a href="#" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-o"></i></a></li><br>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li><br/>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li><br/>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li><br/>
                                <li><a href="#"><i class="fa fa-snapchat"></i></a></li><br/>
                            </ul>

                        </div>


                    </div>

                </div>        

            </div>  </div>

        <!--

<div class="container">
<div class="row new2">
<div class="col-lg-2" style=""></div>
<div class="col-lg-1" style="" align="center"> <img src="images/leftarrow.png" alt="Avatar"  class="arrow" style="height:50px"></div>

<div class="col-lg-6 center-block" style="margin-left:0;padding-left:0" id="izaismakingtrouble" align="center">
<div class="row new2" align="center" style="" id="here" >

<div class="image-cropper col-lg-2"><img src="images/flower1.png" alt="Avatar" class="profile-pic" style="height:130px"></div>
<div class="image-cropper col-lg-2"><img src="images/flower2.png" alt="Avatar" class="profile-pic" style="height:130px"></div>
<div class="image-cropper col-lg-2"><img src="images/flower3.png" alt="Avatar" class="profile-pic" style="height:170px"></div>
<div class="image-cropper col-lg-2"><img src="images/flower4.png" alt="Avatar" class="profile-pic" style="height:130px"></div>   
<div class="image-cropper col-lg-2"><img src="images/flower5.png" alt="Avatar" class="profile-pic" style="height:130px"></div> 
</div>
</div>

<div class="col-lg-1" style="" align="center"><img src="images/rightarrow.png" alt="Avatar" class="arrow"  style="height:50px"></div>
<div class="col-lg-2" style="">


</div>




</div></div>
-->

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet"> 
                    <div class="wrap">
                        <div class="login">
                            <div class="toggle-bar">
                                <div class="toggle-login active">
                                    <span>Login</span>
                                </div>
                                <div class="toggle-register">
                                    <span>Register</span>
                                </div>
                            </div>
                            <div class="login-body">
                                <form>
                                    <div class="input-section">

                                        <input class="user-input" type="text" placeholder="Username">
                                    </div>
                                    <div class="input-section">

                                        <input class="user-input" type="password" placeholder="Password">
                                    </div><br>
                                    <p id="forgot-password">Forgot your password?</p>
                                    <button class="btn" id="btn-login">Login</button>
                                </form>
                            </div>
                            <div class="register-body" style="display:none;">
                                <form action="../model/register.php" method="post">
                                    <div class="input-section">
                                        <input class="user-input" type="text"  name="name" placeholder="Name">
                                    </div> 
                                    <div class="input-section">
                                        <input class="user-input" type="text"  name="surname" placeholder="Surname">
                                    </div>
                                    <div class="input-section">
                                        <input class="user-input" type="text"  name="username" placeholder="Username">
                                    </div>
                                    <div class="input-section">
                                        <input class="user-input" type="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="input-section">
                                        <input class="user-input" type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="input-section">
                                        <input class="user-input" type="password" name="confirm_pass" placeholder="Confirm Password">
                                    </div>
                                    <p id="registered">Already registered?</p>
                                    <button class="btn" type="submit" name="submit-reg" id="btn-login">Register</button>
                                </form>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>


        <footer style="">
            <h5>© DNS Team 2019</h5>


        </footer>




    </body>
</html>

