<?php

///////////////Common Functions For Notification/////////////////////////////////

  function  error_notification_message($message_string)
  {
  $notification_messages  ='<div class="alert alert-success alert-dismissable"><p align="center"><strong>'.$message_string.'</strong></p></div>';
  return $notification_messages; 
}  




/***********************************************************************************/


function print_seo_link($id,$title){
  $seo_patterns = array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/','/quot/');
  $seo_replace = array('', '-', '', '');
  $seo_name = preg_replace($seo_patterns,$seo_replace,$title)."-".$id;
  return strtolower($seo_name);
}
function print_seo_link_admin($title){
  $seo_patterns = array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/','/quot/');
  $seo_replace = array('', '-', '', '');
  $seo_name = preg_replace($seo_patterns,$seo_replace,$title);
  return strtolower($seo_name);
}
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


function get_seo_id($seo_title){
  $id=false;
  $parts = explode("-",$seo_title);
  if(count($parts) > 1){
    $seo_id=$parts[count($parts)-1];
    if((string)$seo_id == (string)(int)$seo_id){
      $id=$seo_id;
    }
  }
  return $id;
}

function auto_copyright($year = 'auto'){ 
 if(intval($year) == 'auto'){ $year = date('Y'); } 
  if(intval($year) == date('Y')){ echo intval($year); } 
  if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); } 
    if(intval($year) > date('Y')){ echo date('Y'); } 
 } 
 
 function base_url(){

    $baseUrl = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://'; // checking if the https is enabled

    $baseUrl .= isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : getenv('HTTP_HOST'); // checking adding the host name to the website address

     $baseUrl .= isset($_SERVER['SCRIPT_NAME']) ? dirname($_SERVER['SCRIPT_NAME']) : dirname(getenv('SCRIPT_NAME')); // adding the directory name to the created url and then returning it.
	 return  $baseUrl;

}

function generateRandomString($length = 10) {
    $characters = '0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

?>