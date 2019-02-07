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
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet"> 

    </head>


    <body>
        <div id="background6"></div>


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

                    document.getElementById("background6").style.transform = "translate(" + valueX / 4 +"px,     " + valueY / 4 + "px)";


                });
            })


        </script>
        <div class="menu">
            <nav class="navbar navbar-inner">
                <div class="container text-center">
                    <div class="row new2">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-8">
                            <ul class="nav navbar-nav">
                                <li><a href="">START</a></li>
                                <li><a href="">ABOUT SMART ECO SYSTEM</a></li>
                                <li><a href="">HOW IT WORKS</a></li>
                                <li><a href="aboutus.php">ABOUT US</a></li>
                                <li><a href="contact.php">CONTACT</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2">
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div id="menu2">
            <img id="menu2" src="images/menu2.png">



            <div class="container aboutus text-center">
                <div class="row"><div class="col-lg-3" text-align="center">

                    <h3 class="menu2">
                        Abertay Plant System Ltd.<br>
                        Kydd Building <br>
                        Bell St <br>
                        DD1 1HG <br>
                        Dundee <br><br>
                        Mobile: 01382 308000 <br>
                        Phone: 562-436-7600 <br>
                        Fax: 562-495-1528 <br>
                    </h3>
                    </div><div class="col-lg-9">
                    </div>


                </div></div></div>

        <div id="background5"></div>

        <footer style="">
            <h5>© DNS Team 2019</h5>


        </footer>




    </body>
</html>
