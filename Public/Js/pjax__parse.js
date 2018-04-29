
$.siteurl = 'https://mymodcoin.com';
$.container = '#main';


$('#main a:not(.logout-link,.login-link,.login_link,[id*="login_link"],[href*="#"],[target="_blank"],'
      +'[href$="mp3"],[href$="jpg"],[href$="jpeg"],[href$="gif"],[href$="png"],[href$="doc"],[href$="pdf"])')
   .pjax('#main', {
      timeout: 0
   });

   $('#main form').live('submit',function(a){

    // display loading message
     $('#loading-shade').show();

     if( !$(a.target).attr('action'))
        a.target = $(a.target).closest('form');

     data = $(a.target).serialize();

     cont = $('#main');

     $.ajax({
        type: "POST",
        url: $(a.target).attr('action'),
        data: data,
        beforeSend : function(xhr) {
           return xhr.setRequestHeader('X-PJAX','true'); // IMPORTANT
        },
        success: function(msg){
           cont.html(msg);
           $('#loading-shade').hide();
        },
        error: function(a,b,c) {
           $('#loading-shade').hide();
        }
     });

     a.preventDefault();
     return false;
  });

  $('body').bind('start.pjax',function() {
    setTimeout("$('#loading-shade').hide();",2000); // to be sure that loading message hides
    $('#loading-shade').show();
 });
 $('body').bind('end.pjax',function() {
    $('#loading-shade').hide();
 });

 