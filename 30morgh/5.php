<?php
$h=0;
$x=$_REQUEST['a'];
	$mycurl = curl_init();
	//post field parameters
	$fields = array( 
				'SPN'=>"CLOGIN",
				'DPN'=>"CMemSpec",
				'LANG'=>0,
				'SESSIONID'=>0,
				'HPURL'=>"../SimWebPortal.dll?LANG=",
				'CircURLIL'=>"http://lib.sharif.edu/simwebclt",
				'CircDBsLB'=>"SName=Sharif_Central_Library, HostURL=, CompName=DELTA, CName=�?تابخا�?�? �?ر�?ز�? دا�?شگا�? شر�?ف,DBName=_CircXP_sharif,Group=,STDate=0.00,FDate=1",
				'MemberNumIL'=>$x ,
				'MemBarcodeIL'=>$x ,
				'PasswordIL'=>$x 
			);
	//joining parameters by &
	foreach($fields as $key=>$value)
		{$fields_string .= $key.'='.$value.'&'; } 
		
	rtrim($fields_string,'&');
	
	//Culr options 
	curl_setopt($mycurl,CURLOPT_URL,'http://lib.sharif.edu/simwebclt/webaccess/SimWebPortal.dll/CLogin');
	curl_setopt($mycurl,CURLOPT_POST,count($fields));
	curl_setopt($mycurl,CURLOPT_POSTFIELDS,$fields_string);
	curl_setopt($mycurl,CURLOPT_RETURNTRANSFER,true);///to not to echo automatically
	curl_setopt($mycurl,CURLOPT_MAXCONNECTS,1);///to not to echo automatically
	curl_setopt($mycurl,CURLOPT_CLOSEPOLICY,CURLCLOSEPOLICY_OLDEST);///to not to echo automatically
	
	//execute page by current user ID
	$page = curl_exec($mycurl);
	
	//extraxt the name and print by number of it
		$regex=eregi('<td id="MemNameTD"><B>&#1606;&#1575;&#1605; &#1593;&#1590;&#1608;<\/b>([^<]*)</td>', $page, $regs);
		
		if($regex){
			echo $regs[1];
		}else{
			echo "fake";
		}
	//close connection
	curl_close($mycurl);	
?>