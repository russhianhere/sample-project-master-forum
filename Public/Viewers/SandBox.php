
<? Template::Header($User['lastname']." ".$User['firstname']) ?>

<? Template::MainBlock() ?>

<audio class="video-js vjs-default-skin" controls preload="auto"
  width="300" height="30" data-setup='{}'>
  <source src="Public/Images/1.mp3" type='audio/mp3'/>
</audio>

<? Template::MainBlock_End() ?>

<? Template::Bottom() ?>
