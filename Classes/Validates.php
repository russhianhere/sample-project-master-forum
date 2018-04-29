<?


Class Validates{

    

    public static function ValidatePassword($password){

        if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,64}$/', $password)) {
            return true;
          } 
          
        else {
            return false;
          }


    }

}



?>