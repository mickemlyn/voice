<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
<link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="bootstrap-3.3.6-dist/css/signin.css" rel="stylesheet" type="text/css"/>
<title>fetching sent text</title></head>
<body>
  <div class="well">
        <table class="table table-hover table-condensed table-bordered table-responsive" >
        <tr class="warning">
        <th> FROM</th>
        <th> TO</th>
        <th> MESSAGE</th>
        <th> Date Sent</th>
        <th> LinkId</th>
        <th> Msg Id</th>
        </tr>
<?php
// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');
// Specify your login credentials
$username   = "MICKEMLYN";
$apikey     = "0caec7b981b5cde881574ff19f5edc742b965ff0ab73a7db546093c51172a111";
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
 
$gateway    = new AfricasTalkingGateway($username, $apikey);
// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try 
{
  // Our gateway will return 100 messages at a time back to you, starting with
  // what you currently believe is the lastReceivedId. Specify 0 for the first
  // time you access the gateway, and the ID of the last message we sent you
  // on subsequent results
  $lastReceivedId = 0;

  do {

    $results = $gateway->fetchMessages($lastReceivedId);
    foreach($results as $result) {
            ?>
 <tr>
	  <td><?php echo $result->from; ?></td>
	  <td><?php echo $result->to; ?></td>
	  <td><?php echo $result->text; ?></td>
	  <td><?php echo $result->date; ?></td>
	  <td><?php echo $result->linkId; ?></td>
	  <td><?php echo $result->id; ?></td>
	  </tr>
  <?php
  
      $lastReceivedId = $result->id;

    }
  } while ( count($results) > 0 );

}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error: ".$e->getMessage();
}
            ?>
      </table>
    <script type="text/javascript" src="bootstrap-3.3.6-dist/js/jquery-2.2.2.min.js"></script>   
<script type="text/javascript" src="bootstrap-3.3.6-dist/js/bootstrap.js"></script>
</body>
</html>
