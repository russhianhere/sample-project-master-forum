<?

$phone = preg_replace('/\D/', '', $_POST['phone']);

if ($phone[0] == '7' or $phone[0] == 8){

    $phone = substr($phone, 1); 

}

if (empty($_POST['firstname']) or
    empty($_POST['lastname']) or  
    empty($_POST['phone']) or 
    empty($_POST['password1']) or 
    empty($_POST['password2']) or 
    ($_POST['role'] != 0 and $_POST['role'] != 1)
    ){


    ?>

    <script> 

    swal({
        title: "Ошибка № 100",
        text: "Все поля обязательны к заполнению",
        icon: "error"
    });
    </script> 


    <?

}

else if ($_POST['role'] == 1 and (empty($_POST['class_dig']) or empty($_POST['class']))){


    ?>

    <script> 

    swal({
        title: "Ошибка № 101",
        text: "Ошибка в классе",
        icon: "error"
    });
    </script> 


    <?



}

else if ($_POST['role'] == 2 and empty($_POST['desc'])){


    ?>

    <script> 

    swal({
        title: "Ошибка № 102",
        text: "Ошибка в описании",
        icon: "error"
    });
    </script> 


    <?



}

else if ($_POST['role'] != 0 and $_POST['role'] != 1){


    ?>

    <script> 

    swal({
        title: "Ошибка № 108",
        text: "Ошибка в роли",
        icon: "error"
    });
    </script> 


    <?



}


else if ($_POST['password1'] != $_POST['password2']){


    ?>

    <script> 

    swal({
        title: "Ошибка № 103",
        text: "Несовпадение паролей",
        icon: "error"
    });
    </script> 


    <?



}

else if(!Validates::ValidatePassword($_POST['password1'])){

    
    ?>

    <script> 

    swal({
        title: "Ошибка № 104",
        text: "Пароль должен состоять как минимум из 8 знаков, 1 цифры",
        icon: "error"
    });
    </script> 


    <?


}



else if (DB_C::CntPhone($phone) > 0){

    ?>

    <script> 

    swal({
        title: "Ошибка № 102",
        text: "Пользователь с таким номером уже зарегистрирован",
        icon: "error"
    });
    </script> 


    <?

}



else{

    if ($_POST['role'] == 1){

        $class = $_POST['class_dig'];
        $desc = $_POST['class'];

    }

    else{

        $class = 0;
        $desc = $_POST['desc_1'];

    }

    $User = array(

        "password"=> $_POST['password1'],
        "firstname"=> $_POST['firstname'],
        "lastname"=> $_POST['lastname'],
        "digit_class" => $class,
        "description" => $desc,
        "phone"=> $phone,
        "role"=> $_POST['role'],


    );


    DB_C::RegisterUser($User);


    ?>

    <script>          
     
    swal({
        title: "Вы успешно зарегистрировались!",
        text: "Теперь Вы можете войти в свой профиль",
        icon: "success"
    });

    </script> 

    <?

}

/*     <script>           
    swal({             
        title: "Вы почти зарегистрировались",             
        text: "Осталось ввести четырёхзначный код подтверждения, отправленный Вам на телефон",             
        icon: "success",             
        content: {                 
        element: "input",                 
        attributes: {                   
            placeholder: "Код подтверждения",                   
            type: "text",                 },},             
            button: "В бой!",         });     
    </script> 
*/

?>




