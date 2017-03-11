<?php
//Include Library
require '../TwitterSDK/autoload.php';
//Using the Library
use Abraham\TwitterOAuth\TwitterOAuth;

?>

<?php
class TwitterInit{
    public $consume_key;
    public $consumer_secret;
    public $access_token;
    public $access_token_secret;

    public function __construct($consume_key , $consumer_secret , $access_token , $access_token_secret){
        $this->consume_key = $consume_key;
        $this->consumer_secret = $consumer_secret;
        $this->access_token = $access_token;
        $this->access_token_secret = $access_token_secret;
        
    }
    
    public function connect(){
        $connection = new TwitterOAuth($this->consume_key, $this->consumer_secret, $this->access_token, $this->access_token_secret);
        $content = $connection->get("account/verify_credentials");
        $statuses = $connection->get("search/tweets" , ["q" => "%23custserv" , "src" => "typd" , "count" => 1000]);
        return $statuses;

    }
}

?>