<?php
header("Content-type:application/json");

require_once('TwitterInit.php');

$new_init = new TwitterInit("YbREqWRM6nV5uu8McBLy91fQH" ,"Jl6otpU4xgCwzfsCtM4yClfKqHtFHqCgQaoYbxN1ombviVNiSd" , "839898479023443968-cWO3StRAncTzmvBwklEdeONwRxlUumg","X5cpepjBU3XVL3Q98ofz23fCYMAILCvkkaItK6mDNppgj");

$arr = $new_init->connect();

$arr =  json_encode($arr->statuses);

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