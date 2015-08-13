<?php
header('Content-Type: text/html; charset=utf-8');

include($_SERVER['DOCUMENT_ROOT']."/src/BraspagApiIncludes.php");

$paymentId = $_GET['paymentId'];

$api = new BraspagApiServices();
$result = $api->Get($paymentId);

if(is_a($result, 'BraspagSale')){
    /*
     * In this case, you made a succesful call to API and receive a Sale object in response
     */
    $api->debug($result,'Success:');
} elseif(is_array($result)){
    /*
     * In this case, you made a Bad Request and receive a collection with all errors
     */
    $api->debug($result,'Bad Request:');
} else{    
    /*
     * In this case, you received other error, such as Forbidden or Unauthorized
     */
    $api->debug($result,'HTTP Status Code:');
}

?>