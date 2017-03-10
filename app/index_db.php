<?php date_default_timezone_set('Europe/London'); ?>
    <!doctype html>

    <html class="no-js">

    <head>
        <meta charset="utf-8">
        <title>test</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="//ajax.googleapis.com" rel="dns-prefetch">
        <link href="assets/css/style.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Copse|Droid+Sans|Khand|Oswald|Sintony" rel="stylesheet">

        <script src="assets/components/modernizr/modernizr.js"></script>
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="favicon-128.png" sizes="128x128" />
        <meta name="application-name" content="&nbsp;" />
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />


        <style>
            .navbar-brand {
                width: 100px;
                padding: 0 10px 10px 10px;
            }

            body {
                background: #f1f1f1;
                font-family: 'Droid Sans';
            }

            ul {
                list-style-type: none;
            }

            h2 {
                font-family: 'Oswald';
                font-size: 20px;
                color: black;
                margin-top: 0;
                max-height: 60px;
                overflow: hidden;
            }

            #logError {
                background: red;
                color: white;
            }
            
            .masonry.hide {
                display: none
            }
            
            .masonry {
                /* Masonry container */
                column-count: 5;
                column-gap: 2em;
                position: relative;
                border: 10px solid black;
                overflow: hidden;
                -webkit-transform: rotate(-1deg);
                top: -44px;
                left: -13px;
            }
            
            .caption {
                position: absolute;
                bottom: 0;
                width: 100%;
                background: black;
                font-size: 20px;
                color: white;
                text-decoration: bold;
                text-transform: uppercase;
                opacity: .7;
                padding: 15px;
            }
            
            .item {
                /* Masonry bricks or child elements */
                background-color: #eee;
                display: inline-block;
                margin: 0 0 .5em;
                width: 100%;
                border: 0;
            }
            
            .hero-container {
                overflow: hidden;
                --width: 600px;
                height: 330px;
                position: relative;
                margin-bottom: 30px;
                background: -moz-linear-gradient(45deg, rgba(192, 192, 192, 1) 0%, rgba(192, 192, 192, 1) 49%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 100%);
                /* ff3.6+ */
                background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(192, 192, 192, 1)), color-stop(49%, rgba(192, 192, 192, 1)), color-stop(50%, rgba(0, 0, 0, 1)), color-stop(100%, rgba(0, 0, 0, 1)));
                /* safari4+,chrome */
                background: -webkit-linear-gradient(45deg, rgba(192, 192, 192, 1) 0%, rgba(192, 192, 192, 1) 49%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 100%);
                /* safari5.1+,chrome10+ */
                background: -o-linear-gradient(45deg, rgba(192, 192, 192, 1) 0%, rgba(192, 192, 192, 1) 49%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 100%);
                /* opera 11.10+ */
                background: -ms-linear-gradient(45deg, rgba(192, 192, 192, 1) 0%, rgba(192, 192, 192, 1) 49%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 100%);
                /* ie10+ */
                background: linear-gradient(45deg, rgba(192, 192, 192, 1) 0%, rgba(192, 192, 192, 1) 49%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1) 100%);
                /* w3c */
                filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#c0c0c0', GradientType=1);
                /* ie6-9 */
            }
            
            .text img {
                width: 230px;
                float: left;
                margin-bottom: 15px;
            }
            
            .text {
                float: left;
                width: 270px;
                background: #fff;
                padding: 20px;
                min-height: 200px;
                border: 1px solid #e1e1e1;
                border-top: 1px solid red;
                margin: 10px;
                height: 447px;
                overflow: hidden;
            }
            
            .main {
                margin: 100px;
                --width: 900px;
            }
            
            h2 {
                color: black;
                margin-top: 0;
            }
            
            ul {
                padding-left: 0px;
            }
            
            .hero-img {
                -webkit-transform: rotate(-7deg);
                border: 1px solid #999;
                width: 700px;
                height: 400px;
            }

        </style>
    </head>

    <body>
        <div id="logError"></div>

        <header class="header" role="banner">

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 67 67">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #eb0000;
                                        }

                                        .cls-2 {
                                            fill: #fff;
                                        }

                                    </style>
                                </defs>
                                <title>cityonlive1</title>
                                <rect class="cls-1" width="67" height="67" />
                                <path class="cls-2" d="M11.77,39.84a4.25,4.25,0,0,1-1.63.26c-2.75,0-4.07-2.27-4.07-5.33,0-4.07,2.26-5.65,4.35-5.65a2.88,2.88,0,0,1,1.46.29l-.35,1.76a2.11,2.11,0,0,0-1-.21c-1.18,0-2.26,1-2.26,3.7s1,3.59,2.26,3.59a3.69,3.69,0,0,0,1-.16Z" />
                                <path class="cls-2" d="M15,29.21V40h-2.1V29.21Z" />
                                <path class="cls-2" d="M18.05,31.15h-1.9V29.21h5.92v1.94H20.15V40h-2.1Z" />
                                <path class="cls-2" d="M24.92,40V35.87l-2.37-6.66h2.24l.74,2.58c.19.69.4,1.49.56,2.29h0c.13-.78.3-1.57.5-2.34l.64-2.53h2.18L27,35.79V40Z" />
                                <path class="cls-2" d="M13,53.61c0,4.07-1.44,5.71-3.49,5.71-2.45,0-3.41-2.59-3.41-5.55s1.17-5.49,3.55-5.49C12.23,48.28,13,51.15,13,53.61Zm-4.72.19c0,2.45.46,3.7,1.31,3.7s1.22-1.6,1.22-3.79c0-1.89-.29-3.6-1.23-3.6S8.24,51.48,8.24,53.81Z" />
                                <path class="cls-2" d="M14.29,59.2V48.41h1.92l1.66,4.23c.32.83.85,2.22,1.15,3.15h0c-.06-1.14-.21-3-.21-5V48.41h1.84V59.2H18.77l-1.65-4.1A30.9,30.9,0,0,1,16,51.85h0c0,1.09.13,2.75.13,4.91V59.2Z" />
                                <path class="cls-2" d="M22.55,48.41h2.1v9h2.77V59.2H22.55Z" />
                                <path class="cls-2" d="M30.72,48.41V59.2h-2.1V48.41Z" />
                                <path class="cls-2" d="M34.1,59.2,31.68,48.41H34l.77,4.66c.19,1.15.42,2.48.56,3.75h0c.14-1.28.32-2.58.51-3.79l.74-4.61h2.31L36.45,59.2Z" />
                                <path class="cls-2" d="M44.39,54.46H41.92v2.91h2.79V59.2H39.83V48.41h4.69v1.82H41.92v2.48h2.46Z" />
                            </svg>
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#">Services</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>

            <nav class="nav" role="navigation">
                <ul>
                    <li>
                        <a href="/"></a>
                    </li>
                </ul>
            </nav>
        </header>

        <main class="main" role="main">
            <div class="hero-container">
                <div class="hero-img masonry"></div>
                <div class="caption">
                    World Hightlights
                </div>
            </div>
            <?php include 'db-connect/db-connect.php'; ?>
                <?php include 'process-service.php'; ?>
        </main>

        <div class="hero-img masonry hide">
            <?php echo $heroimgs; ?>
        </div>
        <aside class="sidebar" role="complementary">

        </aside>

        <footer class="footer" role="contentinfo">

        </footer>

        <script src="assets/components/jquery/jquery.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script>
            var logErr = <?= $log ?>;

        </script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            $('.masonry')[0].innerHTML = $('.masonry')[1].innerHTML;
            (function(b, o, i, l, e, r) {
                b.GoogleAnalyticsObject = l;
                b[l] || (b[l] =
                    function() {
                        (b[l].q = b[l].q || []).push(arguments)
                    });
                b[l].l = +new Date;
                e = o.createElement(i);
                r = o.getElementsByTagName(i)[0];
                e.src = '//www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e, r)
            }(window, document, 'script', 'ga'));
            ga('create', 'UA-XXXXX-X');
            ga('send', 'pageview');

        </script>

    </body>

    </html>
