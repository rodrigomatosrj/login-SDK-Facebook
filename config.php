<?php
	
	session_start();

	include('facebook-php-sdk/autoload.php');
	use Facebook\Facebook;
	use Facebook\Exceptions\FacebookResponseException;
	use Facebook\Exceptions\FacebookSDKException;

	$appId = '788587815246479';
	$appSecret = '9c31d5037731c592d6896891f51104c9';
	$redirectUrl = 'http://localhost/login-facebook/';
	$fbPermission = array('email');

	$fb = new Facebook(array(
		'app_id'=> $appId,
		'app_secret'=> $appSecret,
		'default_graph_version' => 'v2.2'
	));

	$helper = $fb->getRedirectLoginHelper();

	try{
		if(isset($_SESSION['facebook_access_token'])){
			$accessToken = $_SESSION['facebook_access_token'];
		}else{
			$accessToken = $helper->getAccessToken();
		}
	}catch(FacebookResponseException $e){}

?>