<?php
// Be sure to include our gateway class
require_once('AfricasTalkingGateway.php');
// Specify your login credentials
$username   = "MICKEMLYN";
$apikey     = "0caec7b981b5cde881574ff19f5edc742b965ff0ab73a7db546093c51172a111";
// Specify your Africa's Talking phone number in international format
$from = "+254711082732";

// Specify the numbers that you want to call to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case, +256 for Uganda)
$to   = "+254703539358,+254712581062,+254792906855";

// Create a new instance of our awesome gateway class
$gateway = new AfricasTalkingGateway($username, $apikey);

try 
{
  $results = $gateway->call($from, $to);

  //This will loop through all the numbers you requested to be called
  foreach($results as $result) {
    echo $result->status;
    echo $result->phoneNumber;
    echo "<br/>";
  }

}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while making the call: ".$e->getMessage();
}