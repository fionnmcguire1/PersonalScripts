<?php
/*
Author: Fionn Mcguire
Date: 04-08-2017
Description:
    To query statistical and informative information from an owned github repository from command line.


*/
date_default_timezone_set('Europe/Dublin');

require_once('../github-php-client-master/client/GitHubClient.php');

/*foreach($argv as $value)
{
  echo "$value\n";
}*/
print "***  Welcome to Gitstats CL Admin Client  ***\n\n
Gitstats is a very simple script used to get information about\n
your github account and individual github repositories\n\n";
$uname = readline("Enter Username: ");
$pass = readline("Enter Password: ");
$client = new GitHubClient();
$client->setCredentials($uname, $pass);
$withbase = false;
$allData = json_decode(get_json("/users/$uname/repos",$uname,$withbase), true);

$response = true;
while($response != false)
{
  $command = readline("Enter Command: ");

  if(substr($command, 0, 5) == 'rlist')
  {
    $i = 0;
    while($i < count($allData))
    {
      echo "------> ".$allData[$i]['name']."\n";
      $i+=1;
    }
  }
  else if(substr($command, 0, 6) == 'rstats')
  {
    if(strlen($command) > 6)
    {
        $repo = trim(substr($command, 6));
        $i = 0;
        while($i < count($allData))
        {
          if($allData[$i]['name'] == $repo)
          {
            $commitsData = json_decode(get_json($allData[$i]['commits_url'],$uname,true), true);
            print "-----> Commits: ".count($commitsData)."\n";
            print "-----> Last Commit: ".ConvertToReadableTimePast(substr($commitsData[0]['committer']['date'], 0, 10))."\n";
            print "-----> Number of Files: ".$allData[$i]['size']."\n";
            print "-----> Issue Count: ".$allData[$i]['open_issues_count']."\n";
            print "-----> Dev Time: ".((strtotime(date('Y-m-d')) - strtotime(substr($allData[$i]['created_at'], 0, 10)))/ (86400))." Days \n";

            break 2;
          }
          $i+=1;
        }
    }

  }
  else if($command == 'q' || $command == 'Q' || $command == 'quit')
  {
    $response = false;
  }
}

function get_json($url,$uname,$withbase){
  $base = "https://api.github.com";
  $curl = curl_init();
  if($withbase == true)
  {
    curl_setopt($curl, CURLOPT_URL, $url);

  }
  else
  {
    curl_setopt($curl, CURLOPT_URL, $base . $url);
  }
  curl_setopt($curl, CURLOPT_USERAGENT, $uname);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    //curl_setopt($curl, CONNECTTIMEOUT, 1);
  $content = curl_exec($curl);
  //echo $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);

  return $content;
}

function ConvertToReadableTimePast($time)
{

    $time = strtotime(date('Y-m-d H:i:s')) - strtotime($time); // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}

?>
