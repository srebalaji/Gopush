<html>
<body>
<form name="pushform" method="POST" action="sendMessage.php">
Chrome Channel ID :<input type="text" name="channel" size="170" value="" /> <br/>
Message : <input type="text" name="message" size="100" maxlength="100" value="" /> <br/>
<input type="submit" value="Send Message" />
</form>
<?php

if(isset($_POST['channel']))
{
$channel = $_POST['channel'];
$message = $_POST['message'];

$url= 'https://accounts.google.com/o/oauth2/token';

//If you would have got refresh token
$refresh_token = "1/9QCxvAFlgq8iLJlkC46I2ohBp30zVVWl_AYsxIndfcU"; //set ehre

$data = array();
$data['client_id']="988505596173-p8ca15fdi2nq6c5epcl7liqj02lc5ku1.apps.googleusercontent.com"; //set there
$data['client_secret']="RcBUgVRe-JHFy3Yj9EFRi3Fl"; //set here
$data['refresh_token']=$refresh_token;
$data['grant_type']="refresh_token";



// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$obj = json_decode($result);

if(!isset($obj->access_token))
{
	die("ERROR: unable to get access token.\n".$result);
}

$access_token = $obj->access_token;


$url ="https://www.googleapis.com/gcm_for_chrome/v1/messages";
$data = json_encode(array(
        'channelId' => $channel,
        'subchannelId' => "0",
        'payload'=> $message
    ));

    $ch = curl_init();
    $curlConfig = array(
        CURLOPT_URL            => "https://www.googleapis.com/gcm_for_chrome/v1/messages",
        CURLOPT_POST           => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS     => $data,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER     => array(
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        )
    );
    curl_setopt_array($ch, $curlConfig);
    $result = curl_exec($ch);
	if(strstr($result,"error"))
	{
		echo "ERROR:".$result;
	}
	else
		echo "Successfully sent message to Chrome";
		
	}
/*	
	-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEArYGwm2vlSsrWxCLvYg02
FrbysnvhMHhd3S15Nfi+l0BAzURaNVlAj9vZYJo95qLdIe5KQ2f5Od+RshwW/9hX
PPF+gVPnzckG0B1M5nXgGFVs3n22XBsSLj6NH/kXnhKxEjsaBo0HY9igROv6VXTk
qC1Zl8TumH5M8jyfSIXDBL2lMa3XjvdZhnt0bUVDv1/30guxnV0S+xsKeHQyrNuF
iMAB+Y6SkMVL1+3FArPRM55E3oFe79vSudAF15q0liA0qujW5wls6j9EWhYrRAoW
QgwfDdw5bGQ3RM8s2w9mpyau+yR6iB0OazUyyihXAPQNLO6gQJWQQzHsrvviuwm3
rQIDAQAB
-----END PUBLIC KEY-----
first one...

-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAxXSSBu1TTBdVgzJBauP5
82zs0mzSxE/7yc1NCGhwo4VOYnz3RfQV5Oc5cfjWwi/sFmUuSbzdKt+5eXDUqkKg
uwv18sXBuUcl66m4TG6mktQ+i9rN9RSyEgDRr4xbMEIwNw1CYS7uBnGXJQcOEQrY
DDTD8oOEJFgoDEkJh8NDHKc9UUKClzBaakBEm9vWTQj8DUhfgA6udhN2T86SHNnm
vI/UwND3sJ2Ssg45wtxcb7lgOFGK2BY6FSERqN6Jb2PgoX7oI288hVOT/ZQyAxIX
8M5RZbKi5OfsJeguqPq/oOD6c/IHP9GdtfSToXkMpktwm3pNyz08iaNs5e42Ph8Z
fwIDAQAB
-----END PUBLIC KEY-----

*/
?>
