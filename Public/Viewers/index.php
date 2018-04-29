
<? Template::Header("Главная страница"); ?>

<? Template::MainBlock(); ?>



<div style = "float: left;
    width: calc(100% - 380px);
    margin-right: 60px;">


            <div style = "width:80%;margin: auto;margin-bottom: 25px;"><button class="ui inverted green button" style = "width:100%;" onclick="window.location.href='/CreatePost'"><span class="lnr lnr-pencil"></span> Добавить пост</button></div>

<?


    $Subscribed_to = DB_C::GetSubscribed($_SESSION['id']);

    if(empty($Subscribed_to)){ $Subscribed_to = array ("0" => -1);}


    $Posts = Post::GetPostsOfUsers($Subscribed_to);
    $News = Post::GetNews();
    $Posts = array_merge($News, $Posts);
    $Posts = Etc::unique_arrays($Posts, "id");
    Post::GetStyleOfPosts($Posts, $_SESSION['logged_in']);

?>

</div>


<div style = "float:right">


    <?Template::IndexCards()?>

</div>




<? Template::MainBlock_End() ?>

<? Template::Bottom() ?>


