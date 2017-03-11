<?php
header("Content-type:application/json");
//Making an app in our officaial twiiter account and getting all the necessary tokens and keys.
//Below are all the keys and tokens as variables.

$consume_key = "YbREqWRM6nV5uu8McBLy91fQH";
$consumer_secret = "Jl6otpU4xgCwzfsCtM4yClfKqHtFHqCgQaoYbxN1ombviVNiSd";
$access_token = "839898479023443968-cWO3StRAncTzmvBwklEdeONwRxlUumg";
$access_token_secret = "X5cpepjBU3XVL3Q98ofz23fCYMAILCvkkaItK6mDNppgj";

//Include Library
require '../TwitterSDK/autoload.php';
//Using the Library
use Abraham\TwitterOAuth\TwitterOAuth;

//Connection to the Api

$connection = new TwitterOAuth( $consume_key, $consumer_secret, $access_token, $access_token_secret);
$content = $connection->get("account/verify_credentials");

$statuses = $connection->get("search/tweets" , ["q" => "%23custserv" , "src" => "typd" , "count" => 1000]);

//$arr  = array();

$arr =  json_encode($statuses->statuses);

//    echo $arr;
$arr = json_decode($arr);
$count = 0;
$new_array =[];
foreach($arr as $item){
    if($item->retweet_count > 0){

        $new_tweet = array(
            "name" => $item->user->name,
            "screen_name" => $item->user->screen_name,
            "post" => $item->text,
            "id" => $item->id,
            "profile_pic" => $item->user->profile_image_url,
            "retweet" => $item->retweet_count,
            "fav" => $item->favorite_count,
            "hashtags" => $item->entities->hashtags
        ); 
        
        $new_array = json_encode($new_tweet). ",";
        echo $new_array;
    }
    
}

?>