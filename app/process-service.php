<?php
    
    $log = "";
    $keyword = ($_GET["q"]? $_GET["q"] : 'chennai');
    $fetchInterval = 6;

    $loc="GB";//$_GET["loc"];
    $token = "d12ca556-c9d7-4bb8-ab53-6b51affadae3";
    $str = "assets/data/feed.js";
    //$str='http://webhose.io/search?token='.$token.'&format=json&q='.$keyword.'%20language%3A(english)%20performance_score%3A%3E1%20(site_type%3Anews)&sort=social.facebook.likes';
    //$str = 'http://webhose.io/search?token=d1 2ca556-c9d7-4bb8-ab53-6b51affadae3&format=json&q='.$keyword.'%20language%3A(english)%20(site_type%3Anews)&sort=relevancy';
    //$str = 'http://webhose.io/search?token=d12ca556-c9d7-4bb8-ab53-6b51affadae3&format=json&q='.$keyword.' language%3A(english)%20performance_score%3A%3E4%20(site_type%3Anews)&sort=relevancy&ts=1489363200';

//$str = 'http://webhose.io/search?token=d12ca556-c9d7-4bb8-ab53-6b51affadae3&format=json&q='.$keyword.'%20language%3A(english)%20performance_score%3A%3E1%20(site_type%3Anews)';
    $str = file_get_contents($str);
    $json = json_decode($str, true);

class Editorial {
  
    public function __construct($json, $keyword) {
        $this->json = $json;
        $this->keyword = $keyword;
    }
    
    function fetchFromSource($link) {
        $log = "";
        foreach ($this->json['posts'] as $field => $value) {

            $uuid = $value['uuid'];
            $pdate = strtotime($value['published']);

            $cdate = strtotime($value['crawled']);
            $title = $value['title'];
            $img = $value['thread']['main_image'];
            $text = $value['text'];
            
            $site = $value['thread']['site'];
            $country = $value['thread']['country'];
            $social = $value['thread']['social']['facebook']['likes'];
            $lo = "";
            foreach ($value['entities']['locations'] as $f => $v) {
               $lo = $lo . $v['name']. ", ";
            }
            $locations = (string) $lo;

            
                
        //insert into db    
            $log = $log . $this->storeToEditorial($uuid, $title, $text, $img, $pdate, $cdate, $this->keyword, $site, $country, $social, $locations, $link);
            //if ($field == 5) break;
        }
        echo "<h1>fetchFromSource (".$field.")</h1>";
    }

    private function storeToEditorial($uuid, $title, $text, $img, $pdate, $cdate, $keyword, $site, $country, $social, $locations, $link) {
        $log = "";

        $uuid = mysqli_real_escape_string($link, $uuid);
        $title = mysqli_real_escape_string($link, $title);
        $text = mysqli_real_escape_string($link, $text);
        $img = mysqli_real_escape_string($link, $img);
        
        $site = mysqli_real_escape_string($link, $site);
        $country = mysqli_real_escape_string($link, $country);
        $social = mysqli_real_escape_string($link, $social);
        $locations = mysqli_real_escape_string($link, $locations);
        echo "hellow";

        if (mysqli_query($link, "INSERT INTO EDITORIAL (UUID, TITLE, TEXT, IMG, PUB_DATE, CRAWL_DATE, KEYWORD, SITE, SITE_COUNTRY, SOCIAL, LOCATIONS) SELECT * FROM (SELECT '$uuid', '$title', '$text', '$img', '$pdate', '$cdate', '$keyword', '$site', '$country', '$social', '$locations') AS temp WHERE NOT EXISTS ( SELECT UUID FROM EDITORIAL WHERE UUID = '$uuid')")){

           $log = $log . mysqli_affected_rows($link);
        }
        
       //echo "keyword = ".$keyword. "storeToEditorial (".$log.")";

    } 
    
    function fetchFromEditorial($link) {
        global $heroimgs;
        $query = "select * from EDITORIAL WHERE KEYWORD = '".$this->keyword."' order by IDNO desc LIMIT 100;";
        $i =0;
        if ($result = mysqli_query($link, $query)){
            while ($row = mysqli_fetch_array($result))  {
                
                $img = $row['IMG'];
                $title = $row['TITLE'];
                $pdate = $row['PUB_DATE'];
                $site = $row['SITE'];
                $country = $row['SITE_COUNTRY'];
                $social = $row['SOCIAL'];
                $locations = $row['LOCATIONS'];
                $cdate = intval($row['CRAWL_DATE']);
                $text = $row['TEXT'];             
                $this->comp(++$i, $img, $title, $text, $pdate, $site, $country, $social, $locations, $cdate);
            }
        }
    }
    
    function checkEditorial($link) {
        $fetchInterval = 60; //(24*60*60 sec)
        
        mysqli_query($link, "select * from M_EDITORIAL WHERE KEYWORD = '".$this->keyword."' AND UPDATED > ". (time() - $fetchInterval) ." ;");
        
            if(mysqli_affected_rows($link) == 0) {
                mysqli_query($link, "INSERT INTO M_EDITORIAL (KEYWORD, UPDATED) VALUES ('".$this->keyword."', ". time() .") ON DUPLICATE KEY UPDATE UPDATED = ".time().", COUNT = COUNT + 1"); 
                
                echo mysqli_affected_rows($link) . "Please wait we are fetching for the keyword <br />".$this->keyword." ...";
                $this->fetchFromSource($link);
            };
        
        $this->fetchFromEditorial($link);
    }
    
    function comp($i, $img, $title, $text, $pdate, $site, $country, $social, $locations, $cdate) {
        global $heroimgs;
        $img = "<img src='$img' class='item' />";

        $textArr = explode('. ', $text);
        $li = "";
        
        foreach ($textArr as $key => $value) {
            $trimValue = strlen($value) > 200 ? substr($value ,0, 200)."..." : $value;
            $li .= "<li>".$trimValue."</li>";
            if ($key == 2) break;
        }
        
        $comp = "";
        $comp .= "<div class='text'>";
        $comp .= "<h2>". $i." | " . $title ."</h2>";
        
        $comp .= "<div> $img </div>";
        $comp .= "<ul> $li </ul>";
        $comp .= "<p>". date('l dS \o\f F Y h:i A', $pdate) ."</p>";
        $comp .= "<p> $site | $country | $social | $locations</p>";
        $comp .= "</div>";

        echo $comp;
        $heroimgs =  $heroimgs . $img;

    }

}
 

$something = new Editorial($json, $keyword);
$something->checkEditorial($link);
mysqli_close($link);

?>
