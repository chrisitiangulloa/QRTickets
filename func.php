<?php
@session_start();

function sqlconnect() {
	define('TIMEZONE', 'America/Guayaquil');
	date_default_timezone_set(TIMEZONE);
	$tz = (new DateTime('now', new DateTimeZone('America/Guayaquil')))->format('P');
	$_SESSION['con'] = new mysqli("localhost", "dbtickets", "Y._nj;2xR1sP", "dbtickets");
	$_SESSION['con']->query("SET time_zone='".$tz."'");



if (!$_SESSION['con']) {
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
  echo "errno de depuraci贸n: " . mysqli_connect_errno() . PHP_EOL;
  echo "error de depuraci贸n: " . mysqli_connect_error() . PHP_EOL;
  exit;
}

}

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

?>
