<?php
/**
* import checksum generation utility
*/
require_once("encdec_paytm.php");

$paytmChecksum = "";

/* Create a Dictionary from the parameters received in POST */
$paytmParams = array();
foreach($_POST as $key => $value){
	if($key == "CHECKSUMHASH"){
		$paytmChecksum = $value;
	} else {
		$paytmParams[$key] = $value;
	}
}

/**
* Verify checksum
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$isValidChecksum = verifychecksum_e($paytmParams, "c#tHW7JtLGW4f8bw", $paytmChecksum);
if($isValidChecksum == "TRUE") {
	echo "Checksum Matched";
} else {
	echo "Checksum Mismatched";
}
?>