<?

    if (!empty($_POST['text'])){


        DB_C::PostComment($_POST['post'],$_POST['text'],$_SESSION['id']);
        


    }




?>