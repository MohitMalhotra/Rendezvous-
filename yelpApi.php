<?php

require_once ('OAuth.php');

// $options = get_option( 'boomerang_theme_options' );
$yelpId = 'urban-curry-san-francisco';

// For example, request business with id 'the-waterboy-sacramento'
// $unsigned_url = "http://api.yelp.com/v2/business/".$yelpId;
//by lat and long and location
$unsigned_url = "https://api.yelp.com/v2/search?cll=37.77493,-122.419415";


// Set your keys here
$consumer_key = "LlBoNXARsufpQMtlCKXAgg";
$consumer_secret = "iTEGsvfGY8SCLONBoN3T664jpQg";
$token = "wzPq4nBJ9htSNeI1eZf57Ov53uTtr0FM";
$token_secret = "v3wjhuEHF69rg0m3qgF9latklSo";

// Token object built using the OAuth library
$token = new OAuthToken($token, $token_secret);

// Consumer object built using the OAuth library
$consumer = new OAuthConsumer($consumer_key, $consumer_secret);

// Yelp uses HMAC SHA1 encoding
$signature_method = new OAuthSignatureMethod_HMAC_SHA1();

// Build OAuth Request using the OAuth PHP library. Uses the consumer and token object created above.
$oauthrequest = OAuthRequest::from_consumer_and_token($consumer, $token, 'GET', $unsigned_url);

// Sign the request
$oauthrequest->sign_request($signature_method, $consumer, $token);

// Get the signed URL
$signed_url = $oauthrequest->to_url();

// Send Yelp API Call
$ch = curl_init($signed_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);

// Yelp response
$data = curl_exec($ch);
curl_close($ch);

// Handle Yelp response data
$response = json_decode($data);
$json_string = file_get_contents($signed_url);
$result = json_decode($json_string);

// Print it for debugging
echo '<pre>';
print_r($result);
echo '</pre>';

?>