<?

class Forms{
    
    public static function RegisterForm(){


        ?>


        <form id = "Register" class = "RegisterForm ui form" method = "Post" action="javascript:void(null);" onsubmit="Register()">

                <div id = "Result"></div>

                <div class = "Register__Header">
                    
                    <h1 class = "Register_h1">Регистрация</h1><br/>

                    <?Template::Divider()?>
                
                    <p class = "Register_P">Добро пожаловать в социальную сеть Гимназии 1516!
                    </p>
                    
                    
                    
                </div>


                    <div class="field">
                        <label>Телефон</label>
                        <input type="text" name="phone" placeholder="Номер телефона">
                    </div>
                    <div class="field">
                        <label>Имя</label>
                        <input type="text" name="firstname" placeholder="Ваше имя">
                    </div>
                    <div class="field">
                        <label>Фамилия</label>
                        <input type="text" name="lastname" placeholder="Ваша фамилия">
                    </div>
                    <div class="field">
                        <label>Пароль</label>
                        <input type="password" name="password1" placeholder="Ваш пароль. Выбирайте с умом!">
                    </div>
                    <div class="field">
                        <label>Повторите пароль</label>
                        <input type="password" name="password2" placeholder="Повторите пароль">
                    </div>

                    <div class="field">
                        <select name = "role" onclick = "Display()" id = "role" class="ui dropdown">
                            <option value="">Роль</option>
                            <option value="1">Ученик</option>
                            <option value="0">Учитель</option>
                        </select>
                    </div>

                    <div id = "select_next" style = "display: none;" class="field">
                        <select id = "desc" name = "class_dig" class="ui dropdown">
                            <option value="">Класс</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                        </select><br/>
                        <select id = "desc" name = "class" class="ui dropdown">
                            <option value="">Буква</option>
                            <option value="А">А</option>
                            <option value="Б">Б</option>
                            <option value="В">В</option>
                        </select>
                    </div>

                    <div id = "select_next_1" style = "display: none;" class="field">
                        <label>Должность</label>
                        <input type="text" name="desc_1" placeholder="Ваша должность">
                    </div>

                    <script>
                    
                        function Display() {
                            
                            var selected = $('#role').val();
                            if(selected == '1'){
                                 $("#select_next").removeAttr("style");
                                 $("#select_next_1").css({ display: "none" }); 
                            
                            };
                            if(selected == '0'){
                                 $("#select_next").css({ display: "none" });
                                 $("#select_next_1").removeAttr("style");
                                 };
                            if(selected == ''){ 
                                
                                $("#select_next").css({ display: "none" });
                                $("#select_next_1").css({ display: "none" });
                            
                            };

                        }

                    
                    </script>

                    <button class="ui green button" type="submit">Зарегистрироваться</button>

                <div class="ui horizontal divider">Или</div>
                <button class="ui disabled vk button">Войти используя VK </button><button class="ui disabled google plus button">Google Plus</button>





        </form>

        <script type="text/javascript" language="javascript">



            function Register() {
                
                var msg   = $('#Register').serialize();
                $.ajax({
                type: 'POST',
                url: 'Registerhandler',
                data: msg,
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

        <?



    }



    public static function LoginForm(){


        ?>


        <form id = "Login" class = "RegisterForm" method = "Post" action="javascript:void(null);" onsubmit="Login()">

                <div id = "Result"></div>

                <div class = "Register__Header">
                    
                    <h1 class = "Register_h1">Вход</h1><br/>
                
                    
                </div>


                <?Template::Divider()?>

                <input class = "input" name = "phone" placeholder = "Номер телефона" type = "phone"></input><br/>
                <input class = "input" name = "password" placeholder = "Ваш пароль" type = "password"></input><br/>

                <button type = "submit" class = "ui green button" name = "button">Войти</button>
                <div class="ui horizontal divider">Или</div>
                <button class="ui disabled vk button">Войти используя VK </button><button class="ui disabled google plus button">Google Plus</button>






        </form>

        <script type="text/javascript" language="javascript">



            function Login() {
                
                var msg   = $('#Login').serialize();
                $.ajax({
                type: 'POST',
                url: 'Loginhandler',
                data: msg,
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

        <?



    }



    public static function CreatePostForm(){


        ?>


        <form id = "CreatePost" class = "RegisterForm" method = "Post" action="javascript:void(null);" onsubmit="CreatePost()">

                <div id = "Result"></div>

                <div class = "Register__Header">
                    
                    <h1 class = "Register_h1">Добавить пост</h1><br/>

                    
                    
                    
                </div>


                <?Template::Divider()?>

        

                <div class="form-group">
                    <label for="comment"></label>
                    <textarea style = "width:80%;margin:auto" name = "text" placeholder= "Есть новости?" class="form-control" rows="4" id="text"></textarea>
                </div>

    

                        <script>
                        
                        function Add(id,lvl) {

                            var Item = document.getElementById(id);
                            var Droppable = document.getElementById("drophere");
                            
                            Droppable.appendChild(Item);

                            Item.onclick=function(){Remove(id,lvl)};

                            
                        }

                        function Remove(id,lvl) {

                            var Item = document.getElementById(id);
                            var Droppable = document.getElementById("drophere"+lvl);
                            
                            Droppable.appendChild(Item);

                            Item.onclick=function(){Add(id,lvl)};
                            
                        }


                        DragManager.onDragCancel = function(dragObject) {

                            dragObject.avatar.rollback();

                        };

                        DragManager.onDragEnd = function(dragObject, dropElem) {

                            var Droppable = document.getElementById(dropElem.id);

                            dragObject.elem.removeAttribute("style");
                            Droppable.appendChild(dragObject.elem);

                        };

                        </script>

                        <div class="ui card" id="lvl1" style="width: 80%; margin:auto; margin-bottom: 30px">
                            <div class="content">
                                <div class="header">Теги</div>
                            </div>
                            <div class="content" style = "min-height:100px">
                                <h4 class="ui sub header text-left">Выбранные</h4>
                                <div class="ui small feed">
                                    <div class="event">
                                        <div class="content">
                                            <div class="summary droppable" style = "min-height:100px" id = "drophere">
                                            
                                            </div>

                                            <input id = "tags" name = "tags" type="hidden"></input>

                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>

                        <div class="form-group">
                        <div class="ui card" id = "lvl1" style="display:inline-block; margin:25px;vertical-align:top;">
                            <div class="content">
                                <div class="header">Школа</div>
                            </div>
                            <div class="content">
                                <h4 class="ui sub header text-left">Доступные</h4>
                                <div class="ui small feed">
                                    <div class="event">
                                        <div class="content dro">
                                            <div class="summary droppable" id = "drophere1">
                                                <label id = "1" onclick="Add(1,1)" class="badge badge-red badge-default draggable">Новости</label>
                                                <label id = "2" onclick="Add(2,1)" class="badge badge-red badge-default draggable">Домашнее задание</label>
                                                <label id = "3" onclick="Add(3,1)" class="badge badge-red badge-default draggable">Помощь</label>
                                                <label id = "4" onclick="Add(4,1)" class="badge badge-red badge-default draggable">Каникулы</label>
                                                <label id = "5" onclick="Add(5,1)" class="badge badge-red badge-default draggable">Важное!</label>
                                                <label id = "6" onclick="Add(6,1)" class="badge badge-red badge-default draggable">Параллель</label>
                                                <label id = "7" onclick="Add(7,1)" class="badge badge-red badge-default draggable">1 класс</label>
                                                <label id = "8" onclick="Add(8,1)" class="badge badge-red badge-default draggable">2 класс</label>
                                                <label id = "9" onclick="Add(9,1)" class="badge badge-red badge-default draggable">3 класс</label>
                                                <label id = "10" onclick="Add(10,1)" class="badge badge-red badge-default draggable">4 класс</label>
                                                <label id = "11" onclick="Add(11,1)" class="badge badge-red badge-default draggable">5 класс</label>
                                                <label id = "12" onclick="Add(12,1)" class="badge badge-red badge-default draggable">6 класс</label>
                                                <label id = "13" onclick="Add(13,1)" class="badge badge-red badge-default draggable">7 класс</label>
                                                <label id = "14" onclick="Add(14,1)" class="badge badge-red badge-default draggable">8 класс</label>
                                                <label id = "15" onclick="Add(15,1)" class="badge badge-red badge-default draggable">9 класс</label>
                                                <label id = "16" onclick="Add(16,1)" class="badge badge-red badge-default draggable">10 класс</label>
                                                <label id = "17" onclick="Add(17,1)" class="badge badge-red badge-default draggable">11 класс</label>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="ui card" id = "lvl2" style="display:inline-block; margin:25px;vertical-align:top;">
                            <div class="content">
                                <div class="header">Хобби</div>
                            </div>
                            <div class="content">
                                <h4 class="ui sub header text-left">Доступные</h4>
                                <div class="ui small feed">
                                    <div class="event">
                                        <div class="content dro">
                                            <div class="summary droppable" id = "drophere2">
                                                <label id = "18" onclick="Add(18,2)" class="badge badge-blue badge-default draggable">Аниме</label>
                                                <label id = "19" onclick="Add(19,2)" class="badge badge-blue badge-default draggable">Фильмы</label>
                                                <label id = "20" onclick="Add(20,2)" class="badge badge-blue badge-default draggable">Музыка</label>
                                                <label id = "21" onclick="Add(21,2)" class="badge badge-blue badge-default draggable">Общение</label>
                                                

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                </div>

                


                <button type = "submit" class = "ui inverted blue button" name = "button">Добавить</button>




        </form>

        <script type="text/javascript" language="javascript">



            function CreatePost() {

                var Tags = document.getElementById("drophere");
                var Input = document.getElementById("tags");

                for (var i = 0; i < Tags.childNodes.length; i++) {
                    Input.value += $(Tags.childNodes[i]).attr("id") + " ";
                }
                
                var msg   = $('#CreatePost').serialize();
                $.ajax({
                type: 'POST',
                url: 'CreatePosthandler',
                data: msg,
                success: function(data) {
                    $('#Result').html(data);
                },
                error:  function(xhr, str){
                alert('Возникла ошибка ' + xhr.responseCode);
                }
                });

                Input.value = "";
        
            }
        </script>

        <div id = "Result"></div>

        <?



    }


    public static function TagForm(){


        ?>


        <form id = "Tag" class = "RegisterForm" method = "Post" action="javascript:void(null);" onsubmit="Login()">

                <div id = "Result"></div>

                <div class = "Register__Header">
                    
                    <h1 class = "Register_h1">Генерация тега</h1><br/>
                
                    
                </div>


                <?Template::Divider()?>

                <input class = "input" name = "label" placeholder = "Название" type = "text"></input><br/>

                <button type = "submit" class = "btn_reg" name = "button">Готово</button>





        </form>

        <script type="text/javascript" language="javascript">



            function Login() {
                
                var msg   = $('#Tag').serialize();
                $.ajax({
                type: 'POST',
                url: 'Taghandler',
                data: msg,
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

        <?



    }






}







?>
