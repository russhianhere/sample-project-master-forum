<?

Class Template{

    public static function Header($title = NULL){

        if (!isset($_SERVER['HTTP_X_PJAX'])){

            header('Content-Type: text/html; charset=utf-8');


            ?>

            <!DOCTYPE html>
            
            <html>
            <head>
            <title><?=$title?></title>

            <link rel="stylesheet" href="Public/Style/stylev8.css">
            <link rel="stylesheet" href="Public/Style/bootstrap.css">
            <link rel="stylesheet" href="Public/Style/semantic.css">
            <link rel="stylesheet" href="Public/Style/linear.css">
            <link href="http://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">
            
            
            <script src="Public/Js/jquery.js" type="text/javascript"></script>
            <script src="Public/Js/Core.js"></script>
            <script src="Public/Js/pjax.js" type="text/javascript"></script>
            <script src="Public/Js/sweetalert.js" type="text/javascript"></script>
            <script src="Public/Js/semantic.js" type="text/javascript"></script>
            <script src="Public/Js/bootstrap.min.js"></script>
            <script src="Public/Js/DragTags.js"></script>
            <script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
            
            
            </head>
            <body>

            
            <section name="Header">

                <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3E5196;">

                    <a class="navbar-brand" href="/">
                        Гимназия 1516
                    </a>

                    
                    <div class="w-100 order-1 order-md-0 dual-collapse2">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Главная</a>
                            </li>
                        </ul>
                    </div>

                    <div class="w-100 order-3 dual-collapse2">
                        <ul class="navbar-nav ml-auto" style="float: right;">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ещё
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="FAQ">Помощь</a>
                                <a class="dropdown-item" href="#">О нас</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Terms of use</a>
                                </div>
                            </li>

                            <?if(!isset($_SESSION['logged_in'])):?>

                            <li class="nav-item">
                                <a class="nav-link" href="/Register">Регистрация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/Login">Вход</a>
                            </li>

                            <?else:?>
                            <?$User = User::GetByID($_SESSION['id']);?>
                            <li class="nav-item dropdown">
                                

                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$User['lastname']?> <?=$User['firstname']?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/Profile">Моя страница</a>
                                <a class="dropdown-item" href="/Settings">Настройки</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/Logout">Выход</a>
                                
                                </div>

                            </li>

                            <?endif?>

                        </ul>
                    </div>


                </nav>

            </section>


            <script type="text/javascript">
                var direction = "right";
                $(document).ready(function(){
                    $(document).pjax('a', '#main');
                    $(document).on('pjax:start', function() {
                        $(this).addClass('loading')
                    });
                    $(document).on('pjax:end', function() {
                        $(this).removeClass('loading')
                    });
                });
            </script>

            <div id = "main" class="wrapper"><div class = "wrapper_sub">
            <?

        }

        else{
            
            ?> 
            <script type="text/javascript">
            $('title').text('<?=$title?>'); 
            </script>
            <?

        }

    }

    public static function MainBlock(){

        ?>

        <div class = "main">

        <?

    }

    public static function MainBlock_End(){

        ?>

        </div>
        
        <?

    }



    
    public static function Bottom(){

        if (!isset($_SERVER['HTTP_X_PJAX'])){

            ?>

            </div></div>
            
        <section name="Footer">

            <div class="footer">

            </div
		
	    </section>

</body></html>

            <?

        }

    }

    public static function Divider(){

        ?>

       <div class="ui inverted divider"></div>

       <?


    }


    public static function IndexCards(){

        ?>

        <div class="ui card">

             <div class="content">
            
                <a class="header">Социальная сеть Гимназии #1516 v.2</a>

                <div class="description">Вам здесь рады!</div>
        
            </div>

        </div>

        <div class="ui card">

            <div class="content">

                <a class="header">Разработка проекта</a>
                <div class="description">Великие (нет)</div>

                <h4 class="ui sub header">Руководители</h4><br/>
                
                <div class="event">
                    <div class="content">
                        <div class="summary">Моденов Даниил</div>
                    </div>
                </div>


                <h4 class="ui sub header">Ведущий разработчик</h4><br/>
                
                <div class="event">
                    <div class="content">
                        <div class="summary">Волошинский Максим</div>
                    </div>
                </div>

                <h4 class="ui sub header">Тестирование</h4><br/>
                
                <div class="event">
                    <div class="content">
                        <div class="summary">Левковский Павел</div>
                    </div>
                </div>

                <div class="event">
                    <div class="content">
                        <div class="summary">Баранов Олег</div>
                    </div>
                </div>

                <div class="event">
                    <div class="content">
                        <div class="summary">Бурлаков Илья</div>
                    </div>
                </div>

                <h4 class="ui sub header">Несменяемый дизайнер</h4><br/>
                
                <div class="event">
                    <div class="content">
                        <div class="summary">Матинян Алексей</div>
                    </div>
                </div>
            </div>

        </div>

            



        <?


    }


}




Class Conj{


    public static function ConjPosts($int){

        $Array = array( 'Пост', 'Поста', 'Постов' );


        return Etc::getPhrase($int, $Array);

    }



    public static function ConjSubs($int){

        $Array = array( 'Подписчик', 'Подписчика', 'Подписчиков' );

        return Etc::getPhrase($int, $Array);


    }


}









?>