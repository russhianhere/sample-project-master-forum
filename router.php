<?

class Router {
	
	
	public static function GetRoute($Request_url) {

    
        //if ($Request_url != urlencode($Request_url)){

        //    header( 'Location: http://'.$_SERVER['HTTP_HOST'].urlencode($Request_url));

        //}
    
        $page = substr($_SERVER['REQUEST_URI'], 1);
        $url = explode("?", $page);
        
        
        switch($url[0]){
        
            case '':
        
            return "Public/Viewers/index.php";
        
            break;
        
            default:
        
            if ( file_exists($_SERVER['DOCUMENT_ROOT'].'/Public/Viewers/'.$url[0].'.php')) return $_SERVER['DOCUMENT_ROOT'].'/Public/Viewers/'.$url[0].'.php' ;
            else if ( file_exists($_SERVER['DOCUMENT_ROOT'].'/Public/API/'.$url[0].'.php')) return $_SERVER['DOCUMENT_ROOT'].'/Public/API/'.$url[0].'.php' ;
            else if ( file_exists($_SERVER['DOCUMENT_ROOT'].'/FormHandlers/'.$url[0].'.php')) return $_SERVER['DOCUMENT_ROOT'].'/FormHandlers/'.$url[0].'.php' ;
        
            else{
        
                return $_SERVER['DOCUMENT_ROOT'].'/Public/Errors/404.php';
                
            }
        
            break;
        }
        
	

}

}

?>