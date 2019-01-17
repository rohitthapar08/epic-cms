
<?php
error_reporting(1);
$data = array();

function slugify($text)
{
 // replace non letter or digits by -
 $text = preg_replace('~[^\pL\d]+~u', '-', $text);

 // transliterate
 $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

 // remove unwanted characters
 $text = preg_replace('~[^-\w]+~', '', $text);

 // trim
 $text = trim($text, '-');

 // remove duplicate -
 $text = preg_replace('~-+~', '-', $text);

 // lowercase
 $text = strtolower($text);
 
 if (empty($text)) {
   return 'n-a';
 }
 return $text;
}

// $seatKarnataka = array(
//    'BJP' => array('lead'=>0,'win'=>40),
// 'JDS' => array('lead'=>0,'win'=>40),
// 'CONG' => array('lead'=>0,'win'=>122),
// 'OTH' => array('lead'=>0, 'win'=>22)
//  );
// $countKarnataka = json_encode($seatKarnataka);
// var_dump($countKarnataka);

//<--------- ELECTION ENTRY ------------------->>
// $data['id'] = 'Karnataka_Assembly_Election_2018';
// $data['entityType'] = array('set'=>'Election');
// $data['electionName'] = array('set'=>'Karnataka Assembly Election 2018');
// $data['electionType'] = array('set'=>'Assembly');
// $data['electionPhase'] = array('set'=>'Dates Announced');
// $data['stateCount'] = array('set'=>1);
// $data['electionTag'] = array('set' => array('Karnataka Assembly elections 2018'));
// $data['electionSlug'] = array('set' => slugify('karnataka Assembly Election 2018'));

// //<<--------------- STATE ENTRY Karnataka ------------->>


$data['id'] = array('set' => 1);
$data['title'] = array('set'=>'this is New Content');
$data['slug'] = array('set'=>'new-content');
$data['description'] = array('set'=>'here is the epic content');
$data['short_description'] = array('set'=>'epic content');
$data['content_type'] = array('set'=>'tv show');
$data['parent_content_id'] = array('set'=> 1);
$data['platforms'] = array('set'=>'mobile');
$data['genres'] = array('set'=>'action');
$data['languages'] = array('set' => 'english');
$data['other_languages'] = array('set' => 'english');
$data['order'] = array('set' => 1);
$data['tags'] = array('set' => 'latest');
$data['publish_start_date'] = array('set' => now());
$data['publish_end_date'] = array('set' => now());
$data['release_date'] = array('set' => now());
$data['image'] = array('set' => 'latest');
$data['rating'] = array('set' => 'flop movie');
$data['cast_and_crew'] = array('set' => 'shahid kapoor');
$data['region'] = array('set' => 'mumbai');
$data['catalog_type'] = array('set' => 'genre');
$data['status'] = array('set' => 1);
$data['video_url'] = array('set' => 'latest new');
$data['free_premium'] = array('set' => 1);
$data['login_required'] = array('set' => 1);



$res = post_data_to_solr('['.json_encode($data).']','json');


  function post_data_to_solr($inputStr, $type = "xml")
  {
      $SOLR_URL = 'http://35.173.51.156:8983/solr/epic_content/update?commit=true';
      if ($type == "json")
         $header = array("Content-type:application/json");
      else
         $header = array("Content-type:text/xml; charset=utf-8");
      $ch = curl_init() or die("error");
      curl_setopt($ch, CURLOPT_URL, $SOLR_URL);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $inputStr);
      curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
      curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
      $data = curl_exec($ch);
      print_r($data);
      $curl_errno = curl_errno($ch);
      $curl_error = curl_error($ch);
      if ($curl_errno > 0) {
          print_r($curl_error);
          curl_close($ch);
          die;
          return false;
      }
      curl_close($ch);
      return true;
  }


