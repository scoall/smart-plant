<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
session_start();
$_POST['username'] = "Missmeva"; //CHANGE IT !!!
 ?>



<html>
    <head>
        <title>Welcome to SmartEcoSystem !</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="newcss2.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.0/chartist.js"></script>
        <script src="../controller/chartist-plugin-legend.js"></script>
        <script src="JS.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.8/chartist.min.css">


        <style>
            .ct-label
            {
                color: #fff !important;
                font-size:10px;
            }
            .ct-grids
            {
                color: #fff !important;
            }
            .ct-chart {
                position: relative;
                max-height:500px;
            }
            .ct-legend {
                position: relative;
                z-index: 10;
                list-style: none;
                text-align: center;
            }
            .ct-legend li {
                position: relative;
                padding-left: 23px;
                margin-right: 10px;
                margin-bottom: 3px;
                cursor: pointer;
                display: inline-block;
            }
            .ct-legend li:before {
                width: 12px;
                height: 12px;
                position: absolute;
                left: 0;
                content: "";
                border: 3px solid transparent;
                border-radius: 2px;
            }
            .ct-legend li.inactive:before {
                background: transparent;
            }
            .ct-legend.ct-legend-inside {
                position: absolute;
                top: 0;
                right: 0;
            }
            .ct-legend.ct-legend-inside li{
                display: block;
                margin: 0;
            }
            .ct-legend .ct-series-0:before {
                background-color: #d70206;
                border-color: #d70206;
            }
            .ct-legend .ct-series-1:before {
                background-color: #f05b4f;
                border-color: #f05b4f;
            }
            .ct-legend .ct-series-2:before {
                background-color: #f4c63d;
                border-color: #f4c63d;
            }
            .ct-legend .ct-series-3:before {
                background-color: #d17905;
                border-color: #d17905;
            }
            .ct-legend .ct-series-4:before {
                background-color: #453d3f;
                border-color: #453d3f;
            }
            .ct-legend .ct-series-5:before {
                background-color: #59922b;
                border-color: #59922b;
            }

            .ct-chart-line-multipleseries .ct-legend .ct-series-0:before {
                background-color: #d70206;
                border-color: #d70206;
            }

            .ct-chart-line-multipleseries .ct-legend .ct-series-1:before {
                background-color: #f4c63d;
                border-color: #f4c63d;
            }

            .ct-chart-line-multipleseries .ct-legend li.inactive:before {
                background: transparent;
            }

            .crazyPink li.ct-series-0:before {
                background-color: #C2185B;
                border-color: #C2185B;
            }

            .crazyPink li.ct-series-1:before {
                background-color: #E91E63;
                border-color: #E91E63;
            }

            .crazyPink li.ct-series-2:before {
                background-color: #F06292;
                border-color: #F06292;
            }
            .crazyPink li.inactive:before {
                background-color: transparent;
            }

            .crazyPink ~ svg .ct-series-a .ct-line, .crazyPink ~ svg .ct-series-a .ct-point {
                stroke: #C2185B;
            }

            .crazyPink ~ svg .ct-series-b .ct-line, .crazyPink ~ svg .ct-series-b .ct-point {
                stroke: #E91E63;
            }

            .crazyPink ~ svg .ct-series-c .ct-line, .crazyPink ~ svg .ct-series-c .ct-point {
                stroke: #F06292;
            }
            /* Page styling */

            h1, h2{
                text-align: center;
            }

            h3 > * {
                text-transform: none;
            }

            .codeblock-hidden{
                display: none;
            }

            .javascript.hljs {
                background-color: #8f8f8f;
                padding: 1.3333333333rem;
                color: #f7f2ea;
                font-family: "Source Code Pro","Courier New",monospace!important;
                line-height: 1.4;
                word-wrap: break-word;
                height: auto;
                margin-bottom: 1.3333333333rem
            }

            .ct-hidden {
                opacity: 0;
            }

            .ct-dimmed {
                opacity: 0.5;
            }

            .javascript.hljs span::selection, .javascript.hljs::selection {
                background: #8f8f8f!important
            }

            .javascript.hljs .hljs-comment {
                color: #7b6d70;
            }

            .javascript.hljs .hljs-atom,.javascript.hljs .hljs-number {
                color: #F4C63D;
            }

            .cm-s-3024-day .hljs-attribute,.javascript.hljs .hljs-property {
                color: #f7f2ea;
            }

            .javascript.hljs .hljs-keyword {
                color: #F05B4F;
                font-weight: 700;
            }

            .javascript.hljs .hljs-string {
                color: #F4C63D;
            }

            .javascript.hljs .hljs-variable {
                color: #f7f2ea;
            }

            .javascript.hljs .hljs-def,.javascript.hljs .hljs-variable-2 {
                color: #f8b3ad;
            }

            .javascript.hljs .hljs-bracket {
                color: #8f8f8f;
            }

            .javascript.hljs .hljs-tag {
                color: #F05B4F;
                font-weight: 700
            }

            .javascript.hljs .hljs-link {
                color: #F4C63D
            }

            .javascript.hljs .hljs-error{
                background-color: #F05B4F;
                color: #453D3F
            }

            .javascript.hljs .hljs-literal{
                color: #F05B4F;
            }

            .javascript.hljs .CodeMirror-activeline-background {
                background: #e8f2ff!important
            }

            .javascript.hljs .CodeMirror-matchingbracket {
                text-decoration: underline;
                color: #fff!important
            }
            .button, button {
                border-radius: 0;
                border-style: solid;
                border-width: 0;
                cursor: pointer;
                font-weight: 400;
                line-height: normal;
                margin: 5px auto;
                text-align: center;
                display: block;
                padding: 1rem 2rem 1.0625rem;
                font-size: 1rem;
                background-color: #F4C63D;
                border-color: #e7b00d;
                color: #8f8f8f;
            }

        </style>



    </head>
    <body>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center><h4 class="modal-title">Add another plant to your unique collection</h4></center>
                    </div>
                    <div class="modal-body"> 
                        
                        <center><img src="planticon.png" height="100" width="100" style="display:block"></center><br>
                        
                        <form action="../model/addPlant.php" method="post" name="formm" id="formm" enctype="multipart/form-data">
                            <input type="hidden" name="username" value="Missmeva">
                            <center><div class="form-group">
                                <label>Your plant's image</label>
                                <input type="file" name="pic" id="pic" >
                                </div></center>

                            <div class="form-group">
                                <center><label for="pwd">Key <br>(please check the number located on device's case)</label></center>
                                <input type="text" class="form-control" name="key">
                            </div>
                            <div class="form-group">
                                <center><label for="pwd">Plant spiecies</label></center>
                                <input type="text" class="form-control" name="species">
                            </div>
                            <center>
                                <label>Light demand</label><br>
                                <div>

                                    <label class="radio-inline"><input type="radio" name="light" value="1" checked>Full Shade</label>
                                    <label class="radio-inline"><input type="radio" name="light" value="2" >Partial Sun/Shade</label>
                                    <label class="radio-inline"><input type="radio" name="light" value="3" >Full Sun</label> <br><br>
                                </div>
                                <label>Water demand</label><br>
                                <div>
                                    <label class="radio-inline"><input type="radio" name="water" value="1"  checked>Xerophyte (Low)</label>
                                    <label class="radio-inline"><input type="radio" name="water" value="2" >Mezophyte (Medium)</label>
                                    <label class="radio-inline"><input type="radio" name="water" value="3" >Hyhrophyte (High)</label> <br><br>
                                </div>
                                <label>Environment preferation</label><br>
                                <div>
                                    <label class="radio-inline"><input type="radio" name="temperature" value="1" checked>Low temperatures</label>
                                    <label class="radio-inline"><input type="radio" name="temperature" value="2" >Mederated temperatures</label>
                                    <label class="radio-inline"><input type="radio" name="temperature" value="3" >High temperatures</label> 
                                </div>
                            </center>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <center><button type="submit" form="formm" value="Submit" class="btn btn-default">Submit</button></center>
                    </div>
                </div>

            </div>
        </div>

        <header class="main_header sticky">

            <div class="row">
                <div class="content"> 
                    <span class="logo" href="#">Abertay Plant System</span>

                    <div class="mobile-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div>
                        <nav>
                            <ul>
                                <li><a href="#sec00">Your plants</a></li>
                                <li><a href="#sec01">Moisture</a></li>
                                <li><a href="#sec02">Temperature</a></li>
                                <li><a href="#sec03">Light level</a></li>
                                <li><a href="#sec04">Humidity</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> <!-- END row -->

        </header>

        <div class="sections">

            <section id="hero">


                <div><h1 class="headerr">SMART ECO SYSTEM</h1></div>


            </section><!-- END hero -->
            <section class="row" id="sec00">
                <div class="content">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Plant species</th>
                                <th></th>
                                <th>Moisture</th>
                                <th>Temperature</th>
                                <th>LightLevel</th>
                                <th>Humidity</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody> 
                            
                            <?php include '../model/getPlants.php'; ?>
                            
                            <!-- ALL THIS NEEDS TO BE CHANGED/DISPLAYED WITH PHP+HTML -->
                            <!--
                            <tr>
                                <th><img src="flower3.png" class="img-circle" height="80" width="80" style="display:block"></th>
                                <td>Veratrum viride</td>
                                <th><center><img src="water.png"  height="50" width="50" style="display:block">Water me !</center></th>
                                <td>300</td>
                                <td>18.2°</td>
                                <td>80%</td>
                                <td>250</td>
                                <td><button type="button" class="btn btn-info" height="60" width="60">MORE</button></td>
                            </tr>
                            <tr>
                                <th><img src="flower1.png" class="img-circle" height="80" width="80" style="display:block"></th>
                                <td>Betula pendula</td>
                                <th><center><img src="like.png"  height="40" width="40" style="display:block;margin-top:10px; margin-bottom:10px">Perfect</center></th>

                                <td>600</td>
                                <td>17.5°</td>
                                <td>65%</td>
                                <td>320</td>
                                <td><button type="button" class="btn btn-info" height="60" width="60">MORE</button></td>

                            </tr>
                            <tr>
                                <th><img src="flower2.png" class="img-circle" height="80" width="80" style="display:block"></th>
                                <td>Solanum dulcamara</td>
                                <th><center><img src="temperature.png" class="img-circle" height="50" width="50" style="display:block">Too warm</center></th>

                                <td>190</td>
                                <td>20.3°</td>
                                <td>78%</td>
                                <td>700</td>
                                <td><button type="button" class="btn btn-info" height="60" width="60">MORE</button></td>
                            </tr> -->
                            
                            
                            
                            
                            
                        </tbody> <!-- ALL THIS NEEDS TO BE CHANGED/DISPLAYED WITH PHP+HTML -->
                    </table>

                    <center><button style="border:none; background-color:white;" data-toggle="modal" data-target="#myModal"><i style="font-size:60px" class="fa">&#xf067;</i></button></center>
                </div>
            </section><!-- END row -->
            <div class="hideshow2">
                <section class="row dark" id="sec01">
                    <div class="content">
                        <h1 >Moisture readings</h1>
                        <div id="legends">

                        </div>
                        <div class="ct-chart ct-perfect-fourth"  ></div>
                    </div>
                </section><!-- END row -->

                <section class="row" id="sec02">
                    <div class="content">
                        <h1>Temperature readings</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, recusandae, at, labore velit eligendi amet nobis repellat natus sequi sint consectetur excepturi doloribus vero provident consequuntur accusamus quisquam nesciunt cupiditate soluta alias illo et deleniti voluptates facilis repudiandae similique dolore quaerat architecto perspiciatis officiis dolor ullam expedita suscipit neque minima rem praesentium inventore ab officia quos dignissimos esse quam placeat iste porro eius! Minus, aspernatur nesciunt </p>
                    </div>
                </section><!-- END row -->

                <section class="row dark" id="sec03">
                    <div class="content">
                        <h1>Light level</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, recusandae, at, labore velit eligendi amet nobis repellat natus sequi sint consectetur excepturi doloribus vero provident consequuntur accusamus quisquam nesciunt cupiditate soluta alias illo et deleniti voluptates facilis repudiandae similique dolore quaerat architecto perspiciatis officiis dolor ullam expedita suscipit neque minima rem praesentium inventore ab officia quos dignissimos esse quam placeat iste porro eius! Minus, aspernatur nesciunt consectetur. Sit, eius, itaque, porro, beatae impedit officia tenetur reiciendis autem vitae a quae ipsam repudiandae odio dolorum </p>
                    </div>
                </section><!-- END row -->

                <section class="row" id="sec04">
                    <div class="content">
                        <h1>Humidity</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, recusandae, at, labore velit eligendi amet nobis repellat natus sequi sint consectetur excepturi doloribus vero provident consequuntur accusamus quisquam nesciunt cupiditate soluta alias illo et deleniti voluptates facilis repudiandae similique dolore quaerat architecto perspiciatis officiis dolor ullam expedita suscipit neque minima rem praesentium inventore ab officia quos dignissimos esse quam placeat iste porro eius! Minus, aspernatur nesciunt consectetur. Sit, eius, itaque, porro, beatae impedit officia tenetur reiciendis autem vitae a quae ipsam repudiandae odio dolorum </p>
                    </div>
                </section><!-- END row -->
            </div>

            <!-- Scroll-to-Top -->
            <a href="#" class="scrollup"><i class="fa fa-arrow-circle-o-up"></i></a>

        </div><!-- END sections -->

        <footer><center>© Team DNS, 2019<br>By using our website's content, products & services you agree to our Terms of Usage and Privacy Policy.</center>
        </footer>
        <script type="text/javascript">
            /* $(window).scroll(function() {

                if ($(window).scrollTop() > -1) {
                    $('.main_header').addClass('sticky');
                } else {
                    $('.main_header').removeClass('sticky');
                }
            }); */

            // Mobile Navigation
            $('.mobile-toggle').click(function() {
                if ($('.main_header').hasClass('open-nav')) {
                    $('.main_header').removeClass('open-nav');
                } else {
                    $('.main_header').addClass('open-nav');
                }
            });

            $('.main_header li a').click(function() {
                if ($('.main_header').hasClass('open-nav')) {
                    $('.navigation').removeClass('open-nav');
                    $('.main_header').removeClass('open-nav');
                }
            });

            // navigation scroll
            $('nav a').click(function(event) {
                var id = $(this).attr("href");
                var offset = 0;
                var target = $(id).offset().top - offset;
                $('html, body').animate({
                    scrollTop: target
                }, 500);
                event.preventDefault();
            });
            /* Scroll-to-Top Button */
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.scrollup').fadeIn();
                } else {
                    $('.scrollup').fadeOut();
                }
            });

            $('.scrollup').click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 600);
                return false;
            });
            /* WORK IN PROGRESS
   NAVIGATION ACTIVE STATE IN SECTION AREA
*/
            var sections = $('section'), nav = $('nav'), nav_height = nav.outerHeight();

            $(window).on('scroll', function () {
                var cur_pos = $(this).scrollTop();

                sections.each(function() {
                    var top = $(this).offset().top - nav_height,
                        bottom = top + $(this).outerHeight();

                    if (cur_pos >= top && cur_pos <= bottom) {
                        nav.find('a').removeClass('active');
                        sections.removeClass('active');

                        $(this).addClass('active');
                        nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
                    }
                });
            });

        </script>
        <script>


            var someDiv = document.getElementById('legends');
            var chart = new Chartist.Line('.ct-chart', {
                labels: ['0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19'],
                series: [{"name": "2018-12-02", "data":[30.2,30.3,30.2,30.2]},{"name": "2018-12-04", "data":[30.3,30.3,30.2]},{"name": "2018-12-05", "data":[30.3,30.2,30.5,30.4,30.5]},{"name": "2018-12-06", "data":[30.4,30.4]},{"name": "2018-12-07", "data":[30.4,30.4,30.4,30.4]},{"name": "2018-12-08", "data":[30.4,30.4,30.4,30.4,30.3,30.4,30.3,30.3,30.3,30.3,30.3,30.3,30.3,30.3,30.3,30.3,30.2,30.2,30.2,30.2]},]

            }, {

                fullWidth: true,
                chartPadding: {
                    right: 40
                },
                plugins: [
                    Chartist.plugins.legend({
                        clickable: true,
                        position: someDiv
                    })
                ]
            });



            // Let's put a sequence number aside so we can use it in the event callbacks
            var seq = 0,
                delays = 80,
                durations = 500;

            // Once the chart is fully created we reset the sequence
            chart.on('created', function() {
                seq = 0;
            });

            // On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
            chart.on('draw', function(data) {
                seq++;

                if(data.type === 'line') {
                    // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
                    data.element.animate({
                        opacity: {
                            // The delay when we like to start the animation
                            begin: seq * delays + 1000,
                            // Duration of the animation
                            dur: durations,
                            // The value where the animation should start
                            from: 0,
                            // The value where it should end
                            to: 1
                        }
                    });
                } else if(data.type === 'label' && data.axis === 'x') {
                    data.element.animate({
                        y: {
                            begin: seq * delays,
                            dur: durations,
                            from: data.y + 100,
                            to: data.y,
                            // We can specify an easing function from Chartist.Svg.Easing
                            easing: 'easeOutQuart'
                        }
                    });
                } else if(data.type === 'label' && data.axis === 'y') {
                    data.element.animate({
                        x: {
                            begin: seq * delays,
                            dur: durations,
                            from: data.x - 100,
                            to: data.x,
                            easing: 'easeOutQuart'
                        }
                    });
                } else if(data.type === 'point') {
                    data.element.animate({
                        x1: {
                            begin: seq * delays,
                            dur: durations,
                            from: data.x - 10,
                            to: data.x,
                            easing: 'easeOutQuart'
                        },
                        x2: {
                            begin: seq * delays,
                            dur: durations,
                            from: data.x - 10,
                            to: data.x,
                            easing: 'easeOutQuart'
                        },
                        opacity: {
                            begin: seq * delays,
                            dur: durations,
                            from: 0,
                            to: 1,
                            easing: 'easeOutQuart'
                        }
                    });
                } else if(data.type === 'grid') {
                    // Using data.axis we get x or y which we can use to construct our animation definition objects
                    var pos1Animation = {
                        begin: seq * delays,
                        dur: durations,
                        from: data[data.axis.units.pos + '1'] - 30,
                        to: data[data.axis.units.pos + '1'],
                        easing: 'easeOutQuart'
                    };

                    var pos2Animation = {
                        begin: seq * delays,
                        dur: durations,
                        from: data[data.axis.units.pos + '2'] - 100,
                        to: data[data.axis.units.pos + '2'],
                        easing: 'easeOutQuart'
                    };

                    var animations = {};
                    animations[data.axis.units.pos + '1'] = pos1Animation;
                    animations[data.axis.units.pos + '2'] = pos2Animation;
                    animations['opacity'] = {
                        begin: seq * delays,
                        dur: durations,
                        from: 0,
                        to: 1,
                        easing: 'easeOutQuart'
                    };

                    data.element.animate(animations);
                }
            });





            chart.on('created', function() {
                if(window.__exampleAnimateTimeout) {
                    clearTimeout(window.__exampleAnimateTimeout);
                    window.__exampleAnimateTimeout = null;
                }
                window.__exampleAnimateTimeout = setTimeout(chart.update.bind(chart), 100000);
            });


        </script>
     
    </body>