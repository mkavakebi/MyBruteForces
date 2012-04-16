<form>
from:<input name="a"> to:<input name="b"><input type="submit" value="Show!">
<dr>
</form></hr>
<?php
for ($x=$_GET['a'];$x<=$_GET['b'];$x=$x+1){
	// $ch = curl_init('http://127.0.0.1/30morgh/2.php?a='.$x);
	// curl_setopt($ch, CURLOPT_HEADER, 0);
	// curl_setopt($ch, CURLOPT_POST, 1);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// $output = curl_exec($ch);      
	// echo $x.": ".$output."</br>";
	// curl_close($ch);
	
	$mycurl = curl_init();
	curl_setopt($mycurl,CURLOPT_URL,'http://95.168.161.208/~kevair/sharifLIB/4.php');
	curl_setopt($mycurl,CURLOPT_POST,1);
	curl_setopt($mycurl,CURLOPT_POSTFIELDS,"a=".$x);
	curl_setopt($mycurl,CURLOPT_RETURNTRANSFER,true);///to not to echo automatically
	$page = curl_exec($mycurl);
	if($page!="fake")
		echo $x.": ".$page."</br>";
	curl_close($mycurl);
}
?>