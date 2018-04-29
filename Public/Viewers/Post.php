<?

Template::Header("Комментарии к посту");

$User = User::GetByID($_SESSION['id']);
$Post = Post::GetByID($_GET['id']);



if (empty($Post)){

    header("Location: /404");

}

Template::MainBlock();


?>
<script>

window.onload=function(){

}

</script>

<?

Post::GetStyleOfPosts($Post, $_SESSION['logged_in']);

$Comments = DB_C::GetComments($Post['0']['id']);

Post::GetStyleOfComments($Comments,$Post['0']['id']);

Template::MainBlock_End();


Template::Bottom();











?>