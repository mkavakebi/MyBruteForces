<?php
/////initial values
$uname='87101628';
$pass='1250176824';
//login/////////////////////////
$checkpage=curl_grab_page("http://dining.sharif.ir/login","signin%5Busername%5D=".$uname."&signin%5Bpassword%5D=".$pass,$tt);
if ($tt != 'http://dining.sharif.ir/login') {		
	echo "user exists!";	
}else{
	echo "wrong user!";
}
?>
<?php
function get_userid_of_url($url){
	$url=explode("?",$url);
	$url=$url[1];
	$url=explode("&",$url);
	$url=$url[1];
	$url=explode("=",$url);
	$url=$url[1];
	return $url;
}
function curl_grab_page($url,$data,&$trueurl){
$file=dirname(__FILE__).'cookie.txt';

    $ch = curl_init();
	//curl_setopt($ch, CURLOPT_HEADER,true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $file);
    curl_setopt($ch, CURLOPT_COOKIEFILE,$file);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   
	$out= curl_exec ($ch); // execute the curl command
	$trueurl=curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close ($ch);
	unset($ch);
	return $out;
}
?>