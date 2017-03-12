<?php
//Include Library taken from official site of twitter - https://dev.twitter.com/resources/twitter-libraries IN Php section. 
require '../TwitterSDK/autoload.php';
//Using the Library
use Abraham\TwitterOAuth\TwitterOAuth;

?>

<?php
//Class to initialize the TwitterOauth with the SECRET keys and getting the JSON.
class TwitterInit{
    //Keys From App 
    public $consume_key;
    public $consumer_secret;
    public $access_token;
    public $access_token_secret;
    
    //Constructor for the initialization.
    public function __construct($consume_key , $consumer_secret , $access_token , $access_token_secret){
        $this->consume_key = $consume_key;
        $this->consumer_secret = $consumer_secret;
        $this->access_token = $access_token;
        $this->access_token_secret = $access_token_secret;
        
    }
    //Fetching Tweets with hashTags #custserv , and tweeted again.
    public function connect($hash , $count , $str){
        $connection = new TwitterOAuth($this->consume_key, $this->consumer_secret, $this->access_token, $this->access_token_secret);
        $content = $connection->get("account/verify_credentials");
        $statuses = $connection->get("search/tweets" , ["q" => $hash , "src" => $str , "count" => $count]);
        return $statuses;
    }
}

?>