$(function(){
    $('.hideshow').show();
    $('.hideshow span').addClass('show')
    
      $('.hideshow span').click(function(){
        if( $(this).hasClass('show') ) {
          $(this).text('Hide');
          $('input[id="password_confirm"]').attr('type','text');
          $(this).removeClass('show');
        } else {
          $(this).text('Show');
          $('input[id="password_confirm"]').attr('type','password');
          $(this).addClass('show');
        }
      });
    
      $('form button[type="submit"]').on('click', function(){
        $('.hideshow span').text('Show').addClass('show');
        $('.hideshow').parent().find('input[id="password_confirm"]').attr('type','password');
      }); 
});