<?php

session_start();

?>

<?php 


if(isset($_SESSION['sublog']))
{
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    include("../model/api-sec.php");
    $articletxt = login($_POST['userlog'], $_POST['passlog']);
    $articlejson = json_decode($articletxt) ;
}

else if(isset($_POST['submit-reg']))
{
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    include("api-sec.php");
    if ($_POST['password']==$_POST['confirm_pass'])
    {
        $articletxt = register($_POST['name'], $_POST['surname'],$_POST['username'],$_POST['email'],$_POST['password']);
        $articlejson = json_decode($articletxt) ;
    }
}
?>



<html>
    <head>
        <title>Welcome to SmartEcoSystem !</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="newcss.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="JS.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/normalize.css">






    </head>

    <body>

        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/normalize.css">


        <link rel="stylesheet" href="css/style.css">

        <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="5000" id="bs-carousel">

            <a data-toggle="modal" data-target="#myModal" class="login">LOG IN | REGISTER</a>

            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="login-wrap">
                            <div class="login-html">
                                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">LOG IN</label>
                                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">REGISTER</label>
                                <div class="login-form">
                                    <div class="sign-in-htm">
                                        <div class="group">
                                            <label for="user" class="label">Username</label>
                                            <input id="user" type="text" class="input">
                                        </div>
                                        <div class="group">
                                            <label for="pass" class="label">Password</label>
                                            <input id="pass" type="password" class="input" data-type="password">
                                        </div>
                                        <div class="group">
                                            <input id="check" type="checkbox" class="check" checked>
                                            <label for="check"><span class="icon"></span> Remember me</label>
                                        </div>
                                        <div class="group">
                                            <input type="button" class="button loginbutton" value="Log in">
                                        </div>
                                        <div class="hr"></div>

                                    </div>
                                    <div class="sign-up-htm">
                                        <div class="group">
                                            <label for="user" class="label">Username</label>
                                            <input id="user" type="text" class="input">
                                        </div>
                                        <div class="group">
                                            <label for="pass" class="label">Email</label>
                                            <input id="pass" type="text" class="input">
                                        </div>
                                        <div class="group">
                                            <label for="pass" class="label">Password</label>
                                            <input id="pass" type="password" class="input" data-type="password">
                                        </div>
                                        <div class="group">
                                            <label for="pass" class="label">Repeat password</label>
                                            <input id="pass" type="password" class="input" data-type="password">
                                        </div>

                                        <div class="group">
                                            <input type="submit" class="button" value="Register">
                                        </div>
                                        <div class="hr"></div>
                                        <div class="foot-lnk">

                                        </div>
                                    </div>
                                </div>
                                <div class="success-fail-htm transformhp">
                                    <div class="group">
                                        <label>Continue</label>
                                    </div>
                                    <div class="group">
                                        <input class="button visiblebutton" type="button" value="Visible"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div></div></div>

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#bs-carousel" data-slide-to="1"></li>
                <li data-target="#bs-carousel" data-slide-to="2"></li>
                <li data-target="#bs-carousel" data-slide-to="3"></li>
                <li data-target="#bs-carousel" data-slide-to="4"></li>
            </ol>


            <!-- Wrapper for slides -->
            <div class="carousel-inner">


                <div class="item slides active">
                    <div class="slide-1"></div>

                    <div class="hero">
                        <hgroup>
                            <h1>Abertay Plant System</h1>        
                            <h3>Our company provides gardening equipment that allow anyone <br> - hobbyists, enthusiasts, and professionals -  <br> to work on their plants and gardens. </h3>
                        </hgroup>
                        <button class="btn btn-hero" id="showtext1">Read more</button>



                    </div>
                </div>
                <div class="item slides">
                    <div class="slide-2"></div>
                    <div class="hero">        
                        <hgroup>
                            <h1>Smart Eco System - Future of Gardening</h1>        
                            <h3>Our company provides gardening equipment that allow anyone <br> - hobbyists, enthusiasts, and professionals -  <br> to work on their plants and gardens. </h3>
                        </hgroup>       
                        <button class="btn btn-hero" id="showtext2">Read more</button>
                    </div>
                </div>
                <div class="item slides">
                    <div class="slide-3"></div>
                    <div class="hero">        
                        <hgroup>
                            <h1>How does it work?</h1>        
                            <h3>Get start your next awesome project</h3>
                        </hgroup>
                        <button class="btn btn-hero" id="showtext3">Read more</button>
                    </div>
                </div>
                <div class="item slides">
                    <div class="slide-4"></div>
                    <div class="hero">        
                        <hgroup>
                            <h1>Interested ? </h1>        

                        </hgroup>

                    </div>
                </div>
                <div class="item slides">
                    <div class="slide-5"></div>
                    <div class="hero">        
                        <hgroup>
                            <h1>Contact us</h1>        
                            <h3>Get start your next awesome project</h3>
                        </hgroup>
                        <button class="btn btn-hero" id="showtext5">Read more</button>
                    </div>
                </div>
            </div> 
        </div>




        <div class="slider1">
            <div class="hero">
                <p  style="color:black">
                    We are a Dundee based company that provide gardening equipment <br> that allow anyone to work on their plants and gardens. <br> This is also why we endeavour to provide our customers <br> with top of the line equipment of all types. <br> We have many of the industry standard items <br> that hobbyists, enthusiasts, and professionals depend on <br> to have the greenest and fullest gardens.


                </p>

                <button class="btn btn-hero btn-lg herro" id="hidetext1" >Come back</button>

            </div>
            <img id="newimage" src="https://proxy.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.pngpix.com%2Fwp-content%2Fuploads%2F2016%2F03%2FCosmea-Flower-PNG-Image.png&f=1" >
        </div>   

        <div class="slider2">
            <div class="hero">
                <p  style="color:black">Sed ut perspiciatis unde omnis iste natus error sit voluptatem <br> accusantium doloremque laudantium, totam rem aperiam, <br> eaque ipsa quae ab illo inventore veritatis et quasi architecto <br> beatae  vitae dicta sunt explicabo.<br> Nemo enim ipsam voluptatem quia voluptas sit odit aut fugit, <br> sed quia consequuntur magni dolores eos qui ratione. <br> Neque porro quisquam est, qui dolorem adipisci velit.

                </p>

                <button class="btn btn-hero btn-lg herro" id="hidetext2" >Come back</button>

            </div>
            <img id="newimage" src="https://proxy.duckduckgo.com/iu/?u=http%3A%2F%2F3.bp.blogspot.com%2F-6YofKDBBYp8%2FUosFXRY3RQI%2FAAAAAAAAXao%2FaNBC_LKkt54%2Fs1600%2FFLOWER_FOOTED_ME_5288b6a902004.png&f=11" >
        </div>    

        <div class="slider3">
            <div class="hero">
                <img  src="smarteco.png" style="width: 70vw;  left:50%; top:50%" >
                <button class="btn btn-hero btn-lg herro" id="hidetext3"  >Come back</button>

            </div>
            <img id="newimage" src="https://proxy.duckduckgo.com/iu/?u=http%3A%2F%2Fimages.rosendahl.dk%2Fproducts%2F434%2F353%2F2%2F4343532%2Fv%2F4343532-2%2FXXLarge%2Fdwl-hanging-pot-14-cm-design-with-light-1500x1500-2.png&f=1" >
        </div>    

        <div class="slider4">
            <div class="hero">
                <p  style="color:black">Sed ut perspiciatis unde omnis iste natus error sit voluptatem <br> accusantium doloremque laudantium, totam rem aperiam, <br> eaque ipsa quae ab illo inventore veritatis et quasi architecto <br> beatae  vitae dicta sunt explicabo.<br> Nemo enim ipsam voluptatem quia voluptas sit odit aut fugit, <br> sed quia consequuntur magni dolores eos qui ratione. <br> Neque porro quisquam est, qui dolorem adipisci velit.

                </p>

                <button class="btn btn-hero btn-lg herro" id="hidetext4" >Come back</button>

            </div>
            <img id="newimage" src="https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Fe0%2F63%2F45%2Fe06345722bb2baf7c352c9b3d49025db.png&f=1" >
        </div> 

        <div class="slider5">
            <div class="hero">
                <p  style="color:black">Sed ut perspiciatis unde omnis iste natus error sit voluptatem <br> accusantium doloremque laudantium, totam rem aperiam, <br> 

                </p>

                <div id="map"></div>


                <button class="btn btn-hero btn-lg herro" id="hidetext5" >Come back</button>

            </div>
            <img id="newimage" src="https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F82%2F25%2F51%2F822551c6500dc38cf945d0f088fc83c5.png&f=1" >
        </div> 






        <script >
            $(document).ready(function() {

                $(".slider1").hide();
                $(".slider2").hide();
                $(".slider3").hide();
                $(".slider4").hide();
                $(".slider5").hide();


                $("#showtext1").click(function(){
                    {

                        $(".slider1").fadeIn(1200);

                    }
                });

                $("#hidetext1").click(function(){
                    {
                        $(".slider1").fadeOut(900);

                    }
                });


                $("#showtext2").click(function(){
                    {

                        $(".slider2").fadeIn(1200);

                    }
                });

                $("#hidetext2").click(function(){
                    {
                        $(".slider2").fadeOut(900);

                    }
                });

                $("#showtext3").click(function(){
                    {

                        $(".slider3").fadeIn(1200);

                    }
                });

                $("#hidetext3").click(function(){
                    {
                        $(".slider3").fadeOut(900);

                    }
                });

                $("#showtext4").click(function(){
                    {

                        $(".slider4").fadeIn(1200);

                    }
                });

                $("#hidetext4").click(function(){
                    {
                        $(".slider4").fadeOut(900);

                    }
                });

                $("#showtext5").click(function(){
                    {

                        $(".slider5").fadeIn(1200);

                    }
                });

                $("#hidetext5").click(function(){
                    {
                        $(".slider5").fadeOut(900);

                    }
                });


                $('.loginbutton').on('click',function(){
                });
                $('.visiblebutton').on('click',function(){
                });




            });
        </script>

        <script>
            // Initialize and add the map
            function initMap() {
                // The location of Uluru
                var uluru = {lat: -25.344, lng: 131.036};
                // The map, centered at Uluru
                var map = new google.maps.Map(
                    document.getElementById('map'), {zoom: 4, center: uluru});
                // The marker, positioned at Uluru
                var marker = new google.maps.Marker({position: uluru, map: map});
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPJhInVh1Jps98cYiiXbfKCUXa5B2uMIU&callback=initMap">
        </script>



    </body>
