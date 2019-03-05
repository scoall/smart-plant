<?php

session_start();

?>

<?php 


if(isset($_POST['sublog']))
{
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    include("../model/api.php");
    $articletxt = login($_POST['userlog'], $_POST['passlog']);
    $articlejson = json_decode($articletxt) ;
}

else if(isset($_POST['submit-reg']))
{
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    include("../model/api.php");
    if ($_POST['password']==$_POST['confirm_pass'])
    {
        $articletxt = register($_POST['username'],$_POST['email'],$_POST['password']);
        $articlejson = json_decode($articletxt) ;
    }
    else

    {
        echo "<script>alert('Passwords do not match');window.location.href = '..view/new1.php';</script>";
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
                                <button id="move" data-dismiss="modal" class="close" type="button">
                                    <span aria-hidden="true">×</span>
                                    <span class="sr-only">Close</span>
                                </button>

                                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab" class="edit">LOG IN</label>
                                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab" class="edit">REGISTER</label>
                                <div class="login-form">

                                    <div class="sign-in-htm">



                                        <form action="" method="post">
                                            <div class="group">
                                                <label for="user" class="label" name="userlog">Username</label>
                                                <input id="user" type="text" class="input">
                                            </div>
                                            <div class="group">
                                                <label for="pass" class="label" name="passlog">Password</label>
                                                <input id="pass" type="password" class="input" data-type="password">
                                            </div>
                                            <div class="group">
                                                <input id="check" type="checkbox" class="check" checked>
                                                <label for="check"><span class="icon"></span> Remember me</label>
                                            </div>
                                            <div class="group">
                                                <input class="button loginbutton" type="submit" name="sublog" value="Log in">
                                            </div>
                                            <div class="hr"></div>
                                        </form>


                                    </div>
                                    <div class="sign-up-htm">
                                        <form action="" method="post">
                                            <div class="group">
                                                <label for="user" class="label">Username</label>
                                                <input id="user" type="text" class="input" name="username">
                                            </div>
                                            <div class="group">
                                                <label for="email" class="label">Email</label>
                                                <input id="email" type="email" class="input" name = "email">
                                            </div>
                                            <div class="group">
                                                <label for="pass" class="label">Password</label>
                                                <input id="pass" type="password" class="input" name="password" data-type="password">
                                            </div>
                                            <div class="group">
                                                <label for="pass" class="label">Repeat password</label>
                                                <input id="pass" type="password" class="input" name="confirm_pass" data-type="password">
                                            </div>

                                            <div class="group">
                                                <input class="button" type="submit" name="submit-reg" value="Register">
                                            </div>
                                            <div class="hr"></div>
                                            <div class="foot-lnk">

                                            </div>
                                        </form>
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


                <div class="w3-content w3-section" style="max-width:500px">
                    <div class="mySlides"> 
                        <button class="w3-button fa fa-chevron-left" style="border:none; background-color:white;color:black;font-size:30px" onclick="plusDivs(-1)"></button>
                        <img src="arduino.png" style="width:100%"><button class="w3-button fa fa-chevron-right" style="border:none; background-color:white;color:black;font-size:30px" onclick="plusDivs(+1)"></button>
                        <p style="color:black;z-index:100">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione  </p>

                    </div>
                    <div class="mySlides"> 
                        <button class="w3-button fa fa-chevron-left" style="border:none; background-color:white;color:black;font-size:30px" onclick="plusDivs(-1)"></button>
                        <img  src="sensor.png" style="width:100%"><button class="w3-button fa fa-chevron-right" style="border:none; background-color:white;color:black;font-size:30px" onclick="plusDivs(+1)"></button>
                        <p style="color:black;z-index:100"> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur</p>
                    </div>
                    <div class="mySlides"> 
                        <button class="w3-button fa fa-chevron-left" style="border:none; background-color:white;color:black;font-size:30px" onclick="plusDivs(-1)"></button>
                        <img  src="db.png" style="width:100%"><button class="w3-button fa fa-chevron-right" style="border:none; background-color:white;color:black;font-size:30px"   onclick="plusDivs(+1)"></button>
                        <p style="color:black;z-index:100"> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione </p>
                    </div>
                    <div class="mySlides"> 
                        <button class="w3-button fa fa-chevron-left" style="border:none; background-color:white;color:black;font-size:30px" onclick="plusDivs(-1)"></button>
                        <img  src="plant.png" style="width:100%"><button class="w3-button fa fa-chevron-right" style="border:none; background-color:white;color:black;font-size:30px" onclick="plusDivs(+1)"></button>
                        <p style="color:black;z-index:100"> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur</p>
                    </div>

                    <div class="mySlides"> 
                         <button class="w3-button fa fa-chevron-left" style="border:none; background-color:white;color:black;font-size:30px" onclick="plusDivs(-1)"></button><img  src="website.png" style="width:100%"><button class="w3-button fa fa-chevron-right" style="border:none; background-color:white;color:black;font-size:30px" onclick="plusDivs(+1)"></button>
                        <p style="color:black;z-index:100">  Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p>
                    </div>
                </div>

               
                



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

                <p  style="color:black">Abertay Plant System<br>1604779@uad.ac.uk <br> tel 012335653213 <br> Bell St<br>DD1 1HG<br> DUNDEE <br>

                </p>

                <div id="map"></div>
                <button class="btn btn-hero btn-lg herro" id="hidetext5" style="margin-bottom=0;bottom:0;" >Come back</button>




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
                var uluru = {lat: 56.465022, lng: -2.966366};
                // The map, centered at Uluru
                var map = new google.maps.Map(
                    document.getElementById('map'), {zoom: 14, center: uluru});
                // The marker, positioned at Uluru
                var marker = new google.maps.Marker({position: uluru, map: map});
            }

            $(document).ready(function()
                              {
                $('#newww').click(function()

                                  {
                    $('#myModal').modal('hide');
                }) 
            } );
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSxbCdXxIhCJwpHndEM5WAjYNUqqXAQBs&callback=initMap">
        </script>

        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
                myIndex++;
                if (myIndex > x.length) {myIndex = 1}    
                x[myIndex-1].style.display = "block";  
                setTimeout(carousel, 4000); // Change image every 4 seconds
            }
        </script>
        <script>
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                if (n > x.length) {slideIndex = 1}
                if (n < 1) {slideIndex = x.length}
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
                x[slideIndex-1].style.display = "block";  
            }
        </script>



    </body>
