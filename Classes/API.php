<?

Class API{


public static function RegisterUser(array $User)
{
    if (!isset($User['email'])){

        $return['ok'] = false;
        $return['description'] = "Email is not set";

    }

    else if (!isset($User['password'])){

        $return['ok'] = false;
        $return['description'] = "Password is not set";

    }

    else if (!isset($User['nickname'])){

        $return['ok'] = false;
        $return['description'] = "Nickname is not set";

    }
    
    else{
        $User = DataBase::RegisterUser($User);

        $return['ok'] = true;
        $return['user'] = $User;

    }

    return $return;

}







}





?>