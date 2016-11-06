<?php
require_once('AfricasTalkingGateway.php');

// Specify your login credentials
$username   = "MICKEMLYN";
$apikey     = "0caec7b981b5cde881574ff19f5edc742b965ff0ab73a7db546093c51172a111";

// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$gateway    = new AfricasTalkingGateway($username, $apikey);

try
{ 
  $data = $gateway->getUserData();
  echo "Balance: " . $data->number."\n";
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while fetching user data: ".$e->getMessage()."\n";
}