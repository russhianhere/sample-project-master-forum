<?

if (empty($_POST['text'])){

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

    $Post = array(

        "text"=> $_POST['text'],
        "author"=> $_SESSION['id'],


    );

    $User = User::GetByID($_SESSION['id']);

    $Tags = $_POST['tags'];

    User::AddPost($Post, $User, $Tags);

        ?>

        <script>          
        
            window.location.href = '/Profile';

        </script> 

        <?

    

}


?>
