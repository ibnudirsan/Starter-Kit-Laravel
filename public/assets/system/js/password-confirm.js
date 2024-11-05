$(function(){
  $('.hideshow').show();
  $('.hideshow span').addClass('show').html('<i class="fas fa-eye"></i>');
  
  $('.hideshow span').click(function(){
      if ($(this).hasClass('show')) {
          $(this).html('<i class="fas fa-eye-slash"></i>');
          $('input[id="password_confirm"]').attr('type', 'text');
          $(this).removeClass('show');
      } else {
          $(this).html('<i class="fas fa-eye"></i>');
          $('input[id="password_confirm"]').attr('type', 'password');
          $(this).addClass('show');
      }
  });
  
  $('form button[type="submit"]').on('click', function(){
      $('.hideshow span').html('<i class="fas fa-eye"></i>').addClass('show');
      $('.hideshow').parent().find('input[id="password_confirm"]').attr('type', 'password');
  });
});