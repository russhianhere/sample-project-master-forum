<?


if (empty($_POST['label'])){

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

    DB_C::InsertTag($_POST['label']);

    ?>

    <script> 

    swal({
        title: "Успешно!",
        text: "Тег добавлен",
        icon: "success"
    });
    </script> 


    <?

}