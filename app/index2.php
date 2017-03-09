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
          img {
              width: 200px;
              float: left;
              margin-right: 20px;
              margin-bottom: 10px;
              margin-top: 10px;
              border: 10px solid #f1f1f1;
          }
          .text {
              float: left;
              width: 500px;
              min-height: 200px;
          }
          .main {
              margin-left: 10px;
              width: 900px;
          }
          h2 {
              color:teal;
              margin-top: 0;
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
        <?php
            $news= $_GET["news"];
            $loc=$_GET["loc"];
        
            function formEndPoint($loc, $news) {
                $apiStr = 'http://webhose.io/search?token=c64911e8-e69c-48b6-b7b7-0a9ccdea514a&format=json&q=language%3A(english)%20thread.country%3A'.$loc.'%20location%3A%22'.$news.'%22%20performance_score%3A%3E1%20(site_type%3Anews)&sort=relevancy';
                
                return $apiStr;
            }
        
            // Main function
            function fetchData() {
                $str = formEndPoint($loc, $news);
                $fetchApi = file_get_contents($str);
    

               //echo formateData($json);
                formateData(json_decode($fetchApi, true));
            }
        
            function formateData($json){

                echo "print here".$json;
                print_r($json['posts'][0]['title']);
                foreach ($json['posts'] as $field => $value) {
                    echo "00000";
                    $img2 = $json['posts'][$field]['thread']['main_image'];
                    if ($img2 ){
                        echo "<img src='".$img2."'>";
                    }
                echo "<div class='text'><h2>".$json['posts'][$field]['title'] ."</h2>";
                echo "<p>". substr($json['posts'][$field]['text'], 0, 700) ."</p></div>";
                }
            }
            //print_r( fetchData());
            
        fetchData();
        ?>
        sdafsdfasdf
    </main>

    <aside class="sidebar" role="complementary">

    </aside>

    <footer class="footer" role="contentinfo">

    </footer>

    <script src="assets/components/jquery/jquery.min.js"></script>
    <script src="assets/js/scripts.min.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>

  </body>
</html>
