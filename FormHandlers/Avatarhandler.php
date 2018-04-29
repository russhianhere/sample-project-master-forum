<?$User = User::GetByID($_SESSION['id'])?>

<?
$allowed_types = array('image/gif', 'image/png', 'image/jpeg');
$size = 4096000;

if (!in_array($_FILES['file']['type'], $allowed_types)){

    ?>


        <script> 

            swal({
                title: "Неверный тип файла",
                text: "Это кто тут пытается загрузить вирус, а?",
                icon: "error"
            });

        </script> 


    <?



}


else if ($_FILES['file']['size'] > $size){

    ?>


        <script> 

            swal({
                title: "Файл весит больше 4 Мб",
                text: "4К?",
                icon: "error"
            });

        </script> 


    <?



}

else{

    $path = $_SERVER['DOCUMENT_ROOT'].'/Public/Images/Avatars/';;


    $ext = array_pop(explode('.',$_FILES['file']['name']));
    
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
    $numChars = strlen($chars);

    for ($i = 0; $i < 8; $i++) {
        $name1 .= substr($chars, rand(1, $numChars) - 1, 1);
    }

    for ($i = 0; $i < 16; $i++) {
        $name2 .= substr($chars, rand(1, $numChars) - 1, 1);
    }

	$new_name = $name1."_".$name2.'.'.$ext;
    $full_path = $path.$new_name;

    copy($_FILES['file']['tmp_name'], $full_path);
    
    $url = "/Public/Images/Avatars/".$new_name;
    
    unlink ($_SERVER['DOCUMENT_ROOT'].$User['avatar']);

    DB_C::SetAvatar($url,$User['id']);


    ?>

        <script> 

            swal({
                title: "Готово!",
                text: "Вы успешно обновили аватар. Перезагрузите страницу, чтобы увидеть изменения",
                icon: "success"
            });

        </script> 


    <?




}

?>


