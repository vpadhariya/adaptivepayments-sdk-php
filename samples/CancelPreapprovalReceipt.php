<?php
require_once('PPBootStrap.php');

/*
 * Use the CancelPreapproval API operation to handle the canceling of preapprovals. Preapprovals can be canceled regardless of the state they are in, such as active, expired, deactivated, and previously canceled. 
 */

/*
 * (Required) Information common to each API operation, such as the language in which an error message is returned.
 */
$requestEnvelope = new RequestEnvelope("en_US");
/*
 * (Required) The preapproval key that identifies the preapproval to be canceled. 
 */
$cancelPreapprovalReq = new CancelPreapprovalRequest($requestEnvelope, $_POST['preapprovalKey']);
/*
 * 	 ## Creating service wrapper object
Creating service wrapper object to make API call and loading
configuration file for your credentials and endpoint
*/
$service = new AdaptivePaymentsService();
try {
	/* wrap API method calls on the service object with a try catch */
	$response = $service->CancelPreapproval($cancelPreapprovalReq);
} catch(Exception $ex) {
	require_once 'Common/Error.php';
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>PayPal Adaptive Payments - Cancel Preapproval</title>
<link href="Common/sdk.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="Common/sdk_functions.js"></script>
</head>

<body>
<div id="wrapper">
<div id="response_form">
<h3>Cancel Preapproval</h3>
<?php

$ack = strtoupper($response->responseEnvelope->ack);
if($ack != "SUCCESS"){
	echo "<b>Error </b>";
	echo "<pre>";
	print_r($response);
	echo "</pre>";
} else {
	echo "<pre>";
	print_r($response);
	echo "</pre>";
	echo "</pre>";
	echo "<table>";
	echo "<tr><td>Ack :</td><td><div id='Ack'>$ack</div> </td></tr>";
	echo "</table>";
}
require_once 'Common/Response.php';
?></div>
</div>
</body>
</html>