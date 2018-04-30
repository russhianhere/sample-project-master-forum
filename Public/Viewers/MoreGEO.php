<?



Template::Header("MoreGEO");

?>
<div class = "MoreGEOHead"><h2 style = "color: white" class = "GEOHead">MoreGEO</h2></div>
<div id = "app">
<div id = "stage1">
<h1 id = "Title">Назовите столицу государства: Словения</h1>

<button class = "MoreGEOButton" onclick = "CheckAnswer('0', 'btn1', '1')" id = "btn1">Прага</button>
<button class = "MoreGEOButton" onclick = "CheckAnswer('1', 'btn2', '1')" id = "btn2">Любляна</button><br/>
<button class = "MoreGEOButton" onclick = "CheckAnswer('0', 'btn3', '1')" id = "btn3">Москва</button>
<button class = "MoreGEOButton" onclick = "CheckAnswer('0', 'btn4', '1')" id = "btn4">Будапешт</button>
</div></div>
  <script>
var errors = 0;
function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

    function CheckAnswer(response, btn_id, stage) {
        


        if (response == 1){
            document.getElementById(btn_id).style.background = "green";
            document.getElementById(btn_id).style.color = "white";

            setTimeout("NextStage("+stage+")",500);


        }

        else{

            document.getElementById(btn_id).style.background = "red";
            document.getElementById(btn_id).style.color = "white";
            errors+= 1;

        }


        

    }

    function NextStage(stage) {

        if (stage == 1){

            var div = document.getElementById('app');
            div.innerHTML = '<div id = "stage2"><h1 id = "Title">Назовите столицу государства: Греция</h1><button class = "MoreGEOButton" onclick = "CheckAnswer(\'0\',\'btn1\', \'2\')" id = "btn1">Рига</button><button class = "MoreGEOButton" onclick = "CheckAnswer(\'0\', \'btn2\', \'2\')" id = "btn2">Копенгаген</button><br/><button class = "MoreGEOButton" onclick = "CheckAnswer(\'1\', \'btn3\', \'2\')" id = "btn3">Афины</button><button class = "MoreGEOButton" onclick = "CheckAnswer(\'0\', \'btn4\', \'2\')" id = "btn4">Скопье</button></div>';
        }

        if (stage == 2){

            var div = document.getElementById('app');
            div.innerHTML = '<div id = "stage3"><h1 id = "Title">Назовите столицу государства: Словакия</h1><button class = "MoreGEOButton" onclick = "CheckAnswer(\'0\',\'btn1\', \'3\')" id = "btn1">Рейкьявик</button><button class = "MoreGEOButton" onclick = "CheckAnswer(\'1\', \'btn2\', \'3\')" id = "btn2">Братислава</button><br/><button class = "MoreGEOButton" onclick = "CheckAnswer(\'0\', \'btn3\', \'3\')" id = "btn3">Рим</button><button class = "MoreGEOButton" onclick = "CheckAnswer(\'0\', \'btn4\', \'3\')" id = "btn4">Монако</button></div>';
            }
        
            if (stage == 3){

var div = document.getElementById('app');
div.innerHTML = '<div id = "end"><h1 id = "Title">Тест завершён</h1>Допущено ошибок: '+errors+'<br/><a href = "https://play.google.com/store/apps/details?id=ru.geo.more.moregeo">Наше приложение в Google Play</a><br/><br/></div>';
}
        
    }
  </script>

<?

Template::Bottom();



?>