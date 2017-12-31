<?php 
	function is_url_exist($url){
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}


function make_img_url($host,$img){
		if(strpos($img,'http')===false){ 
			return prep_url($host.'/'.$img);
		}else{
			return $img;
		}
}