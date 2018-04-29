<?

$phone = preg_replace('/\D/', '', $_POST['phone']);

if ($phone[0] == '7' or $phone[0] == 8){

    $phone = substr($phone, 1); 

}

if (empty($_POST['phone']) or 
    empty($_POST['password']
    )){

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


else{

    $User = array(

        "password"=> $_POST['password'],
        "phone"=> $phone,


    );


    $Response = DB_C::VerifyUser($User);


    if ($Response['ok']){

        User::Login($Response);

        ?>

        <script>          
        
        window.location.href = '/Profile';

        </script> 

        <?

    }

    else{


        ?>

        <script> 

        swal({
            title: "Ошибка № 106",
            text: "Неверное имя пользователя и/или пароль",
            icon: "error"
        });
        </script> 

        <?

    }

}


?>




