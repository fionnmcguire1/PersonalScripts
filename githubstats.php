<?php
/*
Author: Fionn Mcguire
Date: 04-08-2017
Description:
    To query statistical and informative information from an owned github repository from command line.


*/


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

$response = true;
while($response != false)
{
  $command = readline("Enter Command: ");
  /*if(substr($command, 0, 6) == 'rstats')
  {
    if(count($command) > 7)
    {
      $repo = substr($command, 6);
      $repo = trim($repo);

      $commits = $client->repos->commits->listCommitsOnRepository($uname, $repo);
      echo "Commit Count: " . count($commits) . "\n";
    }
    else
    {
      $allInfo = $client->repos->listRepositories();
      echo json_encode($allInfo["42"]);
    }*/
    if(substr($command, 0, 6) == 'rstats')
    {
      $allData = json_decode(get_json("/users/$uname/repos",$uname), true);
      $i = 0;
      while($i < count($allData))
      {
        echo "------> ".$allData[$i]['name']."\n";
        $i+=1;
      }

    /*$allInfo = $client->repos->listRepositories();
    print(count($allInfo));
    //print_r($allInfo);
    foreach($allInfo as $value)
    {
      echo "------>$value\n";
    }*/

  }
  else if($command == 'q' || $command == 'Q' || $command == 'quit')
  {
    $response = false;
  }
}

function get_json($url,$uname){
  $base = "https://api.github.com";
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $base . $url);
  curl_setopt($curl, CURLOPT_USERAGENT, $uname);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    //curl_setopt($curl, CONNECTTIMEOUT, 1);
  $content = curl_exec($curl);
  echo $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);

  return $content;
}

?>
