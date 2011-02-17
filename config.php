<?php

	define('OAUTH_CONSUMER_KEY',	'LJT2B2RXINKET5IDY5GDYEFRSALWO44ZVUWYGIBYYGHUV0FI');
	define('OAUTH_CONSUMER_SECRET',	'LQGRW0UUOSIXVTJO1WEHAPAREBRXUIJ2S5BIMWGHIWP5ZWXS');

	define('OAUTH_REQUEST_URL',	'http://foursquare.com/oauth/request_token');
	define('OAUTH_ACCESS_URL',	'http://foursquare.com/oauth/access_token');
	define('OAUTH_AUTHORIZE_URL',	'http://foursquare.com/oauth/authorize');

	define('OAUTH_CALLBACK_URL',	'http://techbangalore.com/fourweb/callback.php');

	define('OAUTH_PROTECTED_URL',	'http://api.foursquare.com/v1/venues');


	function dump_last_request(){

		echo "<div style=\"background-color: #fee; border: 4px solid #900; padding: 1em; margin: 1em 0;\">";
		echo "Last HTTP Request:";
		echo "<pre>".htmlspecialchars(var_export($GLOBALS[oauth_last_request],1))."</pre>";
		echo "</div>";
		exit;
	}
?>