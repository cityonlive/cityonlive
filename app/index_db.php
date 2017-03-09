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

        <style>
            body {
                background: #f1f1f1;
                font-family:'Droid Sans' ;
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
