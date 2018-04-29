<?Template::Header("Ответы на вопросы");?>
<? Template::MainBlock(); ?>

<div class="container">

    
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Пример текста
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                  Ага!
            </div>
        </div>
    </div>

    

</div><!-- panel-group -->


</div><!-- container -->

<? Template::MainBlock_End(); ?>
<? Template::Bottom(); ?>