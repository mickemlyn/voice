<?php
// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');
// Specify your login credentials
$username   = "MICKEMLYN";
$apikey     = "0caec7b981b5cde881574ff19f5edc742b965ff0ab73a7db546093c51172a111";
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = "+254792906855";
// And of course we want our recipients to know what we really do
$message    = "Ssup? We making it. Tunacode na si mchezo.";
// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);
// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block

$from = "20414";
try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message, $from);
            
  foreach($results as $result) {
    // status is either "Success" or "error message"
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}