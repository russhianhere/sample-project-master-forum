<?

mb_internal_encoding("UTF-8");

session_start ();



include_once $_SERVER['DOCUMENT_ROOT'].'/includes.php';

$include = Router::GetRoute($_SERVER['REQUEST_URI']);

include_once $include;





?>