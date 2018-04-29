<?

session_start();

$_SESSION = array();

session_destroy();

exit("<meta http-equiv='refresh' content='0; url= /'>");


?>