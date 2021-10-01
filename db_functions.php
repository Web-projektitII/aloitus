<?php
//$_GLOBALS['link'] = $link;
$tiedosto_tunnukset = "../../tunnukset.php";
if (file_exists($tiedosto_tunnukset)) {
  include($tiedosto_tunnukset);
  }
else {
  echo "Virhe, yritä myöhemmin uudelleen.";
  exit;
  }
$local = in_array($_SERVER['REMOTE_ADDR'],array('127.0.0.1','REMOTE_ADDR' => '::1'));
if ($local){
  define('DB_SERVER',$db_server_local);
  define('DB_USERNAME',$db_username_local);
  define('DB_PASSWORD',$db_password_local);
  }
else {
  //$portno = "8374877";	
  //define('DB_SERVER','localhost:$portno');
  define('DB_SERVER',$db_server_remote);
  define('DB_USERNAME',$db_username_remote);
  define('DB_PASSWORD',$db_password_remote);
  }	


function db_connect($ajax = false){
/* Objektiorientoitunut koodi */  
static $link;
$server = DB_SERVER;
if (!isset($link) or empty($link)) {	
  try {
    @$link = new mysqli($server,DB_USERNAME,DB_PASSWORD,DB);
    /* Virheilmoitus korvataan omalla poikkeuksella. */
    if ($link_error = $link->connect_errno){  
      throw new Exception("Virhe tietokantayhteydessä $server.",$link_error);
      }
    }
  catch (Exception $e) {
    if (defined('DEBUG') and DEBUG)  
      $msg = "Poikkeus ".$e->getCode().": ".$e->getMessage()." ".
      "rivillä ". $e->getLine().", tiedosto: ".$e->getFile()."<br />";
    else $msg = "Virhe tietokantayhteydessä. Yritä hetken päästä uudestaan.<br>";
    echo ($ajax) ? json_encode($msg) : "<p>$msg</p>"; 
    return false;
    }
  }
return $link;
}
?>