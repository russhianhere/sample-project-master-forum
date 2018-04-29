
<?Permission::PermDeny(0)?>

<?$User = User::GetByID($_SESSION['id'])?>




<? Template::Header($User['lastname']." ".$User['firstname']) ?>

<? Template::MainBlock() ?>



<div style = "float: left;
    width: calc(100% - 380px);
    margin-right: 60px;">


            <div style = "width:80%;margin: auto;margin-bottom: 25px;"><button class="ui inverted green button" style = "width:100%;" onclick="window.location.href='/CreatePost'"><span class="lnr lnr-pencil"></span> Добавить пост</button></div>

<? 

$Posts = Post::GetPostsOfUser($User['id']); 

Post::GetStyleOfPosts($Posts, $_SESSION['logged_in']);

?>



    </div>


    <div style = "float:right">


        <?User::Cards($User)?>
    
    </div>


<? Template::MainBlock_End() ?>

<? Template::Bottom() ?>

