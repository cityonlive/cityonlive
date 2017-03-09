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

    <script src="assets/components/modernizr/modernizr.js"></script>

    <style>
        .masonry {
            /* Masonry container */
            column-count: 6;
            column-gap: 1em;
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
            width: 600px;
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
            width: 200px;
            float: left;
            margin-right: 30px;
            margin-bottom: 0px;
            margin-top: 0px;
            border: 10px solid #f1f1f1;
        }
        
        .text {
            float: left;
            width: 700px;
            min-height: 200px;
        }
        
        .main {
            margin: 100px;
            width: 900px;
        }
        
        h2 {
            color: teal;
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
            <div class="hero-img masonry">


                <?php 
      echo $heroimgs; 
      ?>

            </div>
            <div class="caption">
                World Hightlights
            </div>
        </div>
        <?php
        $news= $_GET["news"];
        $loc=$_GET["loc"];
        $token = "d12ca556-c9d7-4bb8-ab53-6b51affadae3";
       // $str2 = 'http://webhose.io/search?token='.$token.'&format=json&q=language%3A(english)%20thread.country%3A'.$loc.'%20location%3A%22'.$news.'%22%20performance_score%3A%3E1%20(site_type%3Anews)&sort=relevancy';
        $str = "assets/data/feed.js";
        $str = file_get_contents($str);
        $json = json_decode($str, true); //
       // print_r($json['posts'][0]['thread']['title']);
        $heroimgs = "";
        foreach ($json['posts'] as $field => $value) {

            
            echo "<div class='text'><h2>".$json['posts'][$field]['title'] ."</h2>";
            $img2 = $json['posts'][$field]['thread']['main_image'];
            if ($img2 ){
            echo "<img src='".$img2."'>";
                $heroimgs = $heroimgs ."<img src='".$img2."' class='item'>";
            }
            $text = $json['posts'][$field]['text'];
            $textArr = explode('.', $text);
            echo "<ul>";
            foreach ($textArr as $key => $value) {
                
                $trimValue = strlen($value) > 200 ? substr($value,0,200)."..." : $value;
                
                echo "<li>".$trimValue."</li>";
                if ($key == 2) break;
            }
            echo "</ul></div>";
            
            
        }
    //    echo '<pre>' . print_r($json, true) . '</pre>';
        
        ?>

    </main>

    <div class="hero-img masonry">


        <?php 
      echo $heroimgs; 
      ?>


    </div>
    <aside class="sidebar" role="complementary">

    </aside>

    <footer class="footer" role="contentinfo">

    </footer>

    <script src="assets/components/jquery/jquery.min.js"></script>
    <script src="assets/js/scripts.min.js"></script>

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
