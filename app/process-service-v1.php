<?php
    
    $log = "";
    $keyword = ($_GET["q"]? $_GET["q"] : 'chennai');

    $loc="GB";//$_GET["loc"];
    $token = "d12ca556-c9d7-4bb8-ab53-6b51affadae3";
    //$str = "assets/data/feed.js";
    //$str='http://webhose.io/search?token='.$token.'&format=json&q='.$keyword.'%20language%3A(english)%20performance_score%3A%3E1%20(site_type%3Anews)&sort=social.facebook.likes';
    //$str = 'http://webhose.io/search?token=d12ca556-c9d7-4bb8-ab53-6b51affadae3&format=json&q='.$keyword.'%20language%3A(english)%20(site_type%3Anews)&sort=relevancy';
    //$str = 'http://webhose.io/search?token=d12ca556-c9d7-4bb8-ab53-6b51affadae3&format=json&q='.$keyword.' language%3A(english)%20performance_score%3A%3E4%20(site_type%3Anews)&sort=relevancy&ts=1489363200';

$str = 'http://webhose.io/search?token=d12ca556-c9d7-4bb8-ab53-6b51affadae3&format=json&q='.$keyword.'%20language%3A(english)%20performance_score%3A%3E1%20(site_type%3Anews)';
    //echo $str;
    $str = file_get_contents($str);
    $json = json_decode($str, true);

class Editorial {
  
    public function __construct($json, $keyword) {
        $this->json = $json;
        $this->keyword = $keyword;
    }
    
    function fetchFromSource($link) {
        foreach ($this->json['posts'] as $field => $value) {

            $uuid = $value['uuid'];
           // $pdate = strtotime($value['published']);
             $pdate = strtotime($value['published']);
           // echo "<h1>".strtotime('13 mar 2017')."</h1>";
            //echo "<h2>".date('l dS \o\f F Y h:i A', 1489276800)."</h2>";
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
            $log = $log + $this->storeToEditorial($uuid, $title, $text, $img, $pdate, $cdate, $this->keyword, $site, $country, $social, $locations, $link);
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

        if (mysqli_query($link, "INSERT INTO EDITORIAL (UUID, TITLE, TEXT, IMG, PUB_DATE, CRAWL_DATE, KEYWORD, SITE, SITE_COUNTRY, SOCIAL, LOCATIONS) SELECT  '$uuid', '$title', '$text', '$img', '$pdate', '$cdate', '$keyword', '$site', '$country', '$social', '$locations'  WHERE NOT EXISTS ( SELECT 1 FROM EDITORIAL WHERE UUID = '$uuid')")){   

           $log += $log . mysqli_affected_rows($link);
        }
        
       echo "keyword = ".$keyword. "storeToEditorial (".$log.")";

    }
    
    function fetchFromEditorial($link) {
        echo "fetchFromEditorial";
        global $heroimgs;
        $query = "select * from EDITORIAL WHERE KEYWORD = '".$this->keyword."' order by IDNO desc LIMIT 100;";
        $i =0;
        if ($result = mysqli_query($link, $query)){
            while ($row = mysqli_fetch_array($result))  {
            
            //image
                $img = $row['IMG'];
                if ($img){
                    $img = "<img src='$img' class='item' />";
                    
               
                
                //title
                    $title = $row['TITLE'];
                    $pdate = $row['PUB_DATE'];
                    echo "<div class='text'>";
                    echo"<p>" .date('l dS \o\f F Y h:i A', $pdate). "</p>";
                    echo"<h2>".++$i." - ". $title ."</h2>";
                    $site = $row['SITE'];
                    $country = $row['SITE_COUNTRY'];
                    $social = $row['SOCIAL'];
                    $locations = $row['LOCATIONS'];
                    $cdate = intval($row['CRAWL_DATE']);
                    
                    echo "TYPE: $cdate" .$cdate. gettype($cdate);
                    if ($cdate < intval(strtotime(date('d F Y')))){
                        echo "dominic TRUE ";}
                        else {
                            echo "dominic false strtotime(date('d F Y'))".strtotime(date('d F Y'));
                    };
                    echo "<p> $site | $country | $social | $locations</p>";
                    echo $img;
                    $heroimgs = $heroimgs .$img;
            
                //text
                    $text = $row['TEXT'];
                    $textArr = explode('. ', $text);
                    echo "<ul>";
                        foreach ($textArr as $key => $value) {
                            $trimValue = strlen($value) > 200 ? substr($value ,0, 200)."..." : $value;
                            echo "<li>".$trimValue."</li>";
                            if ($key == 2) break;
                        }
                    echo "</ul>";
                    echo "</div>";               
                }
            }
        }
    }
    
    function checkEditorial($link) {
        //echo "checkEditorial". mysqli_affected_rows($link);
        mysqli_query($link, "select * from EDITORIAL WHERE KEYWORD = '".$this->keyword."' AND CRAWL_DATE > ". strtotime(date('d F Y')) ." ;");

       // echo "<h1>checkEditorial ". mysqli_affected_rows($link)."</h1>";
            if(mysqli_affected_rows($link) == 0) {
                 echo mysqli_affected_rows($link) . "Please wait we are fetching for the keyword <br />".$this->keyword." ...";
                $this->fetchFromSource($link);
            };

        $this->fetchFromEditorial($link, $keyword);
    }

}
 

$something = new Editorial($json, $keyword);
$something->checkEditorial($link);
mysqli_close($link);
//echo date(' d F Y');
echo "777777777777". gettype(strtotime(date('d F Y')));

?>
