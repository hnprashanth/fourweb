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
                'geolat' => $_REQUEST[lat],
                'geolong' => $_REQUEST[long],
                'l' => 20,
                );

	##########################################################################################
	#
	# STEP 3 - access the protected resource
	#
	$ret = oauth_request($keys, OAUTH_PROTECTED_URL, $params);
	if (!strlen($ret)) dump_last_request();
	//echo $ret;
        $xml = simplexml_load_string($ret);
        //print_r($xml);
        foreach ($xml->group[0]->venue as $value){
        echo "<strong>".$value->name."</strong><br>";
        if(trim($value->address))echo $value->address ."<br>";
        if(trim($value->crossstreet))echo $value->crossstreet."<br>";
        if(trim($value->city))echo $value->city."<br>";
        if(trim($value->state))echo $value->state."<br>";
        if(trim($value->zip))echo $value->zip;
        echo "<br>";
        echo
        '<form action="checkin.php" method="POST">
         Add Shout<input type="text" name="shout" /><br>
         <input type="hidden" name="vid" value="'.$value->id.'" />
         <input type="hidden" name="geolat" value="'.$value->geolat.'" />
         <input type="hidden" name="geolong" value="'.$value->geolong.'" />
         Don\'t Show to Friends <input type="checkbox" name="pvt" value="1" /><br>
         Send to Twitter <input type="checkbox" name="twitter" value="1" /><br>
         Send to Facebook <input type="checkbox" name="facebook" value="1" /><br>
         <input type="submit" value="Check In" />
         </form>'
 ;
        }
if(trim($xml->group[1] != null)){
        foreach ($xml->group[1]->venue as $value){
        echo "<strong>".$value->name."</strong><br>";
        if(trim($value->address))echo $value->address ."<br>";
        if(trim($value->crossstreet))echo $value->crossstreet."<br>";
        if(trim($value->city))echo $value->city."<br>";
        if(trim($value->state))echo $value->state."<br>";
        if(trim($value->zip))echo $value->zip;
        echo "<br>";
                echo
        '<form action="checkin.php" method="POST">
         Add Shout<input type="text" name="shout" /><br>
         <input type="hidden" name="vid" value="'.$value->id.'" />
         <input type="hidden" name="geolat" value="'.$value->geolat.'" />
         <input type="hidden" name="geolong" value="'.$value->geolong.'" />
         Don\'t Show to Friends <input type="checkbox" name="pvt" /><br>
         Send to Twitter <input type="checkbox" name="twitter" /><br>
         Send to Facebook <input type="checkbox" name="facebook" /><br>
         <input type="submit" value="Check In" />
         </form>';
        }
}
?>