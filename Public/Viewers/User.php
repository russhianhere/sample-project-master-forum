<?

$User = User::GetByID($_SESSION['id']);
$Profile = User::GetByID($_GET['id']);

if (!isset($Profile['id'])){

    header("Location: /UnknownUser");

}

if ($Profile['id'] == $User['id']){

    header("Location: /Profile");

}

?>


<? Template::Header($Profile['lastname']." ".$Profile['firstname']) ?>

<? Template::MainBlock() ?>



<div style = "float: left;
    width: calc(100% - 380px);
    margin-right: 60px;">


<? 

$Posts = Post::GetPostsOfUser($Profile['id']); 

Post::GetStyleOfPosts($Posts, $_SESSION['logged_in']);

?>



    </div>


    <div style = "float:right">


        <?User::Cards($Profile, 0, $User)?>
    
    </div>


<? Template::MainBlock_End() ?>

<? Template::Bottom() ?>





