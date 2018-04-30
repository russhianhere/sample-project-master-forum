<?

Class User{



    public static function Login(array $User){


        session_start ();

        $_SESSION['id'] = $User['id'];
        $_SESSION['logged_in'] = 1;

    }

    public static function GetByID($id){

        $User = DB_C::GetByID($id);

        if (!isset($User['about'])){

            $User['about'] = "Герой решил не рассказывать о своих доблесных приключениях";

        }

        return $User;


    }

    public static function ClassShow($class){

        if($class != 0) {

            return $class;

        }

    }

    public static function PostsCnt($id)
    {


        return DB_C::PostsCnt($id);


    }

    public static function CntSubscribers($id)
    {


        return DB_C::CntSubscribers($id);


    }

    public static function CntRatingUser($id)
    {


        return DB_C::CntRatingUser($id);


    }

    public static function Cards(array $Profile, $ishe = 1, array $User = NULL){

        ?>

        <div class="ui card" style = "width: 320px">

            <div class="image">

                <?if (!isset($Profile['avatar'])): ?><img src="/Public/Images/default.png"></img>

                <?else:?><img src="<?=$Profile['avatar']?>"></img>

                <?endif?>

            </div>

             <div class="content">

                <a class="header"><?=$Profile['firstname']?> <?=$Profile['lastname']?></a>

                <div class="meta">
                <?=self::ClassShow($Profile['digit_class'])?> <?=$Profile['description']?>
                </div>

            <div class="description"><?=$Profile['about']?></div>

            </div>

            <div class="extra content" style="text-align: center">

                <div class="ui mini statistic">
                <div class="value"><?=User::CntRatingUser($Profile['id'])?></div>
                <div class="label">рейтинг</div>
                </div>

                <div class="ui mini statistic">

                <?$SubsCnt = User::CntSubscribers($Profile['id'])?>

                <div id = "subcount<?=$Profile['id']?>" class="value"><?=$SubsCnt?></div>
                <div class="label"><?=Conj::ConjSubs($SubsCnt)?></div>
                </div>
                <div class="ui mini statistic">

                <?$PostsCnt = User::PostsCnt($Profile['id'])?>

                <div class="value"><?=$PostsCnt?></div>
                <div class="label"><?=Conj::ConjPosts($PostsCnt)?></div>
                </div>

            </div>



            <?if ($ishe == 0):?>

                <?if(Permission::IsLogged()):?>

                    <div class="extra content">

                        <?if(!DB_C::IsSub($User['id'],$Profile['id'])):?>
                        <button id = "subscribe<?=$Profile['id']?>" onclick = "Subscribe(<?=$Profile['id']?>)" class="fluid ui basic button">Подписаться</button>
                        <?else:?>
                        <button id = "subscribe<?=$Profile['id']?>" onclick = "Unsubscribe(<?=$Profile['id']?>)" class="fluid ui basic button">Отписаться</button>
                        <?endif?>

                    </div>

                <?endif?>

            <?endif?>



            <div class="extra content">
                <span>

                    Зарегистрирован

                    <? setlocale(LC_ALL, 'ru_RU.UTF-8'); ?>
                    <?= strftime("%d %B, %Y", strtotime($Profile['Regstamp']))?>

                </span>
            </div>

        </div>

            <div class="ui card" style = "width: 320px">

                <div class="content">

                    <a class="header">Достижения <div class="ui teal left pointing label">0</div></a>

                </div>

            </div>


            <div class="ui card" style = "width: 320px">

                <div class="content">

                    <a class="header">Любимые теги</a>

                </div>

                <div class="extra content">

                    <?User::GetStyleOfTagsUser($Profile['id'])?>

                </div>


            </div>



        <?


    }

    public static function CardSettings(array $User){

        ?>

        <div class="ui card" style = "display:inline-block; margin:25px;vertical-align:top;">


            <div class="content">

            <a class="header">Смена аватара</a>

            <div class="meta">

            </div>

            <div class="description">Боже, да Вы круты!</div>

            </div>

            <div class="image">

                <?if (!isset($User['avatar'])): ?><img src="/Public/Images/default.png"></img>

                <?else:?><img src="<?=$User['avatar']?>"></img>

                <?endif?>

            </div>


            <div class="extra content">

                <div class="file_upload">

                    <form id = "SendAvatar" method = "Post" action="javascript:void(null);" onsubmit="SendAvatar()" enctype="multipart/form-data">

                        <input id = "avatar" name = "avatar" type="file"><br/><br/>

                        <button type = "submit" class = "fluid ui inverted blue button" name = "button">Сменить</button>

                    </form>

                    <script type="text/javascript" language="javascript">



                        function SendAvatar() {

                            var file = $('#avatar').prop('files')[0];

                            var data = new FormData();
                            data.append('file', file);

                            $.ajax({
                            type: 'POST',
                            url: 'Avatarhandler',
                            processData: false,
                            contentType: false,
                            cache:false,
                            data: data,
                            success: function(data) {
                                $('#Result').html(data);
                            },
                            error:  function(xhr, str){
                            alert('Возникла ошибка ' + xhr.responseCode);
                            }
                            });

                        }

                    </script>

                    <div id = "Result"></div>

                </div>

            </div>

        </div>


        <div class="ui card" style = "display:inline-block; margin:25px;vertical-align:top; width: 400px;">


            <div class="content">
                <a class="header">Адрес страницы</a>
            <div class="meta">

            </div>

                <div class="description">Вы можете изменить короткий адрес Вашей страницы на более удобный и запоминающийся. Для этого введите имя страницы, состоящее из латинских букв, цифр или знаков «_».</div>

            </div>



                <div class="ui labeled input" style = "box-shadow: none !important; margin: auto; width: calc(100% - 40px);">
                    <div class="ui label">https://forum.gogi1516.ru </div>
                        <input type="text" name = "url">
                    </div>


        </div>



        <?


    }

    public static function AddPost(array $Post, array $User, $Tags){

        $id = DB_C::AddPost($Post);

        $TagsArr = explode(" ", Etc::OnlyDigitsAndSpaces($Tags));
        $TagsArr = array_unique ($TagsArr);

        $TagsArr = DB_C::VerifyTags($TagsArr,$User['exp']);

        DB_C::PostTags($id,$TagsArr,$User['id']);



    }

    public static function GetStyleOfTagsUser($id){

        $Tags = DB_C::GetTagsOfUser($id);

        foreach ($Tags as $Tag) {


            ?>


                <label class="badge badge-<?=$Tag['color']?> badge-default"><?= $Tag['label'] ?></label>


            <?


        }

    }


}


Class Post{

    public static function GetPostsOfUser ($id){

        return DB_C::GetPostsOfUser($id);

    }

    public static function GetNews (){

        return DB_C::GetNews();

    }

    public static function GetPostsOfUsers (array $id){

        return DB_C::GetPostsOfUsers($id);

    }


    public static function GetStyleOfPosts ($Posts, $is_logged = 0){


        foreach ($Posts as $Post) {


            $User = User::GetByID($Post['author']);

            ?>


            <div class="post">

            <div class="post_head">

                <a href = "/User?id=<?=$User['id']?>" style = "background:

                    <?if (!isset($User['avatar'])): ?>url(Public/Images/default.png)

                <?else:?>url(<?=$User['avatar']?>)

                <?endif?>

                100% 100% no-repeat; background-size: cover;" class="ex_avatar"></a><a href = "/User?id=<?=$User['id']?>" class="author"><?=$User['firstname']?> <?=$User['lastname']?>
                <p class="level"><?=User::ClassShow($User['digit_class'])?> <?=$User['description']?></p></a>

            </div>

            <div class="post_text">

                <p><?=$Post['text']?></p>


                </div>


            <?Template::Divider()?>


            <div class="post_bottom">

                <?if ($is_logged == 1):?>

                <div id = "<?=$Post['id']?>" class="ui left labeled button" tabindex="0">
                    <div id = "label<?=$Post['id']?>" class="ui basic label">
                        <?=DB_C::CntRatingPost($Post['id'])?>
                    </div>

                        <?if(!DB_C::IsRated($_SESSION['id'],$Post['id'])):?>
                        <button id = "button<?=$Post['id']?>" Onclick = "Like(<?=$Post['id']?>,<?=$Post['author']?>)" class="ui red button">Мне нравится!</button>
                        <?else:?>
                        <button id = "button<?=$Post['id']?>" Onclick = "Unlike(<?=$Post['id']?>,<?=$Post['author']?>)" class="ui red button">Убрать оценку</button>
                        <?endif?>

                </div><button type="button" class="btn btn-link" onclick="location.href='/Post?id=<?=$Post['id']?>'">Комментарии</button>

                <?endif?>

            </div>

            <br/>

            <div class = "tags">

                    <?Post::GetStyleOfTags($Post['id'])?>


            </div>

            </div>

            <?

        }
    }

    public static function GetStyleOfTags($postid){

        $Tags = DB_C::GetTagsOfPost($postid);

        foreach ($Tags as $Tag) {


            ?>


                <label class="badge badge-<?=$Tag['color']?> badge-default"><?=$Tag['label']?></label>


            <?


        }

    }


    public static function GetByID($id){

        return DB_C::GetPostByID($id);


    }



    public static function GetStyleOfComments($Comments,$id){

        ?>

            <div class="ui card" style = "width:80%;margin:auto">
                <div class="ui comments" style = "padding:10px">
                    <h3 class="ui dividing header">Комментарии</h3>
                    <div class="comment">


        <?


            foreach ($Comments as $Comment) {

                self::GetStyleOfComment($Comment);

            }




        ?>


                    <form id = "Comment<?=$id?>" method = "Post" action="javascript:void(null);" onsubmit="Comment(<?=$id?>)" class="ui reply form">
                        <div class="field">
                            <textarea name = "text" style="margin-top: 0px; margin-bottom: 0px; height: 112px;"></textarea>
                            <input id="post" name="post" type="hidden" value="<?=$id?>">
                        </div>
                        <button type = "submit" class = "ui blue submit button" name = "button">Ответить</button>
                    </form>
                </div>
            </div>

        <?




    }




    public static function GetStyleOfComment($Comment){

        $User = DB_C::GetByID($Comment['author']);


        ?>


            <div class="image">
                <a href="/User?id=<?=$User['id']?>" style="background:url(<?=$User['avatar']?>)100% 100% no-repeat; background-size: cover; margin:0; margin-left:6px;margin-right:10px;" class="ex_avatar"></a>
            </div>

            <div class="content" style ="margin-bottom:30px;">
                <a class="header"><?=$User['firstname']?></a>

                <div class="meta">
                    <span class="date"><?=Etc::time_ago(strtotime($Comment['timestamp']))?></span>
                </div>

                <div class="text" style = "margin: 5px 0em 5px;"><?=$Comment['text']?></div>

                <div class="actions">

                </div>
            </div>




        <?


    }



}




?>
