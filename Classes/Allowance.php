<?

Class Permission{

    public static function PermDeny($param = 0){

        switch ($param) {
            case 0:
            
                if (!isset($_SESSION['logged_in'])){

                    header("Location: /Login");

                }

                break;
            
            default:

                if (isset($_SESSION['logged_in'])){

                    header("Location: /Profile");

                }

                break;

        }


    }

    public static function IsLogged(){

        if (!isset($_SESSION['logged_in'])){

            return False;

        }

        else{

            return True;

        }




    }

    public static function OnlyAdmin($is_admin){

        switch ($is_admin) {
            case 0:

                header("Location: /Profile");

            break;
 
        }


    }


}









?>