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
if($argv[1] == "help" || $argv[1] == "h" || $argv[1] == "H")
{
  print "***  Welcome to Gitstats CL Admin Client  ***\n\n
Gitstats is a very simple script used to get information about\n
your github account and individual github repositories\n\n
| Name | Usage                  |    Description                         |\n
| cred | cred username password | Used to establish your git credentials |\n";
}
else if($argv[1] == "cred")
{
  $client = new GitHubClient();
  $client->setCredentials($argv[2], $argv[3]);
}
else if($argv[1] == "c")
{
  $client = new GitHubClient();
  $client->setCredentials("****", "*****");
  $commits = $client->repos->commits->listCommitsOnRepository($argv[2], $argv[3]);
  echo "Count: " . count($commits) . "\n";
}


?>
