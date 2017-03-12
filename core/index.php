<?php
//header used for sending a raw HTTP header to a client.
header("Content-type:application/json");


//Class imported for calling main Twitter SDK api.
require_once('TwitterInit.php');

//Making object of the class , Class is declared in above file.
$new_init = new TwitterInit("YbREqWRM6nV5uu8McBLy91fQH" ,"Jl6otpU4xgCwzfsCtM4yClfKqHtFHqCgQaoYbxN1ombviVNiSd" , "839898479023443968-cWO3StRAncTzmvBwklEdeONwRxlUumg","X5cpepjBU3XVL3Q98ofz23fCYMAILCvkkaItK6mDNppgj");

//Taking the json outputed.

$arr = $new_init->connect("%23custserv" , 200 , "typd");

//encoding the json from the Outputted above line.
$arr =  json_encode($arr->statuses);

//echo $arr; //For checking the outputted json.

//Process To make new json, with tweeted_count > 0.
$arr = json_decode($arr);

$count = 0;
$new_array =[];
foreach($arr as $item){
    if($item->retweet_count > 0){

        $new_tweet = array(
            "name" => $item->user->name,
            "screen_name" => $item->user->screen_name,
            "time" => $item->created_at,
            "post" => $item->text,
            "id" => $item->id,
            "profile_pic" => $item->user->profile_image_url,
            "retweet" => $item->retweet_count,
            "fav" => $item->favorite_count,
            "hashtags" => $item->entities->hashtags
        ); 
        //Make the array to a json.
        $new_array = json_encode($new_tweet). ",";
        //Output the json.
        echo $new_array;
    }
}

?>