<?

class Sockets {
    

    public static function GetSocket($errno = NULL, $errstr = NULL){


        stream_socket_server("tcp://127.0.0.1:8000", $errno, $errstr);

        
    }










}
