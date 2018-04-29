
<? Template::Header($User['lastname']." ".$User['firstname']) ?>

<? Template::MainBlock() ?>

<audio id="audio_example" class="video-js vjs-default-skin" controls preload="auto" 
  width="300" height="100" poster="https://i1.sndcdn.com/artworks-000153235390-37gaev-t200x200.jpg" data-setup='{}'>
  <source src="Public/Images/1.mp3" type='audio/mp3'/>
</audio>

<? Template::MainBlock_End() ?>

<? Template::Bottom() ?>
