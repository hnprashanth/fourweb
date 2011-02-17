<?php
	include('lib_oauth.php');
	include('config.php');


	$keys = array(
		'oauth_key'		=> OAUTH_CONSUMER_KEY,
		'oauth_secret'		=> OAUTH_CONSUMER_SECRET,
		'user_key'		=> $_COOKIE[my_acc_key],
		'user_secret'		=> $_COOKIE[my_acc_secret],
	);

        $params = array(
                    'vid'         => $_REQUEST[vid],
                    'shout'       => $_REQUEST[shout],
                    'private'     => $_REQUEST[pvt],
                    'twitter'     => $_REQUEST[twitter],
                    'facebook'    => $_REQUEST[facebook],
                    'geolat'      => $_REQUEST[geolat],
                    'geolong'     => $_REQUEST[geolong],
                );
       $ret = oauth_request($keys, 'http://api.foursquare.com/v1/checkin', $params, $method=POST);
       // if (!strlen($ret)) dump_last_request();
        $xml = simplexml_load_string($ret);
        echo $xml->message."<br>";
        echo $xml->mayor->message."<br>";
        echo $xml->scoring->score->points." points<br>";
        echo $xml->scoring->score->message;
?>
