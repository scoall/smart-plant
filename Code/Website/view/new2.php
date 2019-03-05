<html>
    <head>
        <title>Welcome to SmartEcoSystem !</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="newcss2.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="JS.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/normalize.css">

    </head>
    <body>

        <header class="main_header sticky">

            <div class="row">
                <div class="content"> 
                    <p class="logo" href="#">Abertay Plant System</p>

                    <div class="mobile-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <nav>
                        <ul>
                            <li><a href="#sec01">Section 01</a></li>
                            <li><a href="#sec02">Section 02</a></li>
                            <li><a href="#sec03">Section 03</a></li>
                            <li><a href="#sec04">Section 04</a></li>
                        </ul>
                    </nav>
                </div>
            </div> <!-- END row -->

        </header>

        <div class="sections">

            <section id="hero">

               
                <div><h1 class="headerr">SMART ECO SYSTEM</h1></div>
               

            </section><!-- END hero -->

            <section class="row dark" id="sec01">
                <div class="content">
                    <h1 >Section 01</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, recusandae, at, labore velit eligendi amet nobis repellat natus sequi sint consectetur excepturi doloribus vero provident consequuntur accusamus quisquam nesciunt cupiditate soluta alias illo et deleniti voluptates facilis repudiandae similique dolore quaerat architecto perspiciatis officiis dolor ullam expedita suscipit neque minima rem praesentium inventore ab officia quos dignissimos esse quam placeat iste porro eius! Minus, aspernatur nesciunt consectetur. Sit, eius, itaque, porro, beatae impedit officia tenetur reiciendis autem vitae a quae ipsam repudiandae odio dolorum </p>
                </div>
            </section><!-- END row -->

            <section class="row" id="sec02">
                <div class="content">
                    <h1>Section 02</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, recusandae, at, labore velit eligendi amet nobis repellat natus sequi sint consectetur excepturi doloribus vero provident consequuntur accusamus quisquam nesciunt cupiditate soluta alias illo et deleniti voluptates facilis repudiandae similique dolore quaerat architecto perspiciatis officiis dolor ullam expedita suscipit neque minima rem praesentium inventore ab officia quos dignissimos esse quam placeat iste porro eius! Minus, aspernatur nesciunt </p>
                </div>
            </section><!-- END row -->

            <section class="row dark" id="sec03">
                <div class="content">
                    <h1>Section 03</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, recusandae, at, labore velit eligendi amet nobis repellat natus sequi sint consectetur excepturi doloribus vero provident consequuntur accusamus quisquam nesciunt cupiditate soluta alias illo et deleniti voluptates facilis repudiandae similique dolore quaerat architecto perspiciatis officiis dolor ullam expedita suscipit neque minima rem praesentium inventore ab officia quos dignissimos esse quam placeat iste porro eius! Minus, aspernatur nesciunt consectetur. Sit, eius, itaque, porro, beatae impedit officia tenetur reiciendis autem vitae a quae ipsam repudiandae odio dolorum </p>
                </div>
            </section><!-- END row -->

            <section class="row" id="sec04">
                <div class="content">
                    <h1>Section 04</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, recusandae, at, labore velit eligendi amet nobis repellat natus sequi sint consectetur excepturi doloribus vero provident consequuntur accusamus quisquam nesciunt cupiditate soluta alias illo et deleniti voluptates facilis repudiandae similique dolore quaerat architecto perspiciatis officiis dolor ullam expedita suscipit neque minima rem praesentium inventore ab officia quos dignissimos esse quam placeat iste porro eius! Minus, aspernatur nesciunt consectetur. Sit, eius, itaque, porro, beatae impedit officia tenetur reiciendis autem vitae a quae ipsam repudiandae odio dolorum </p>
                </div>
            </section><!-- END row -->

            <!-- Scroll-to-Top -->
            <a href="#" class="scrollup"><i class="fa fa-arrow-circle-o-up"></i></a>

        </div><!-- END sections -->
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

    </body>