var $ = jQuery.noConflict();
$(document).ready(function(){
  if ($('body').hasClass('postid-97')) {
    $('.qb-btn-container').show(); 
   } else {
      $('.qb-btn-container').hide(); 
    }


$('.qb-answer').hide();
$('.qb-button').click(function() {
  $('.qb-answer').fadeIn();
});



  

  $(function(){
    $('a').each(function(){
        if ($(this).prop('href') == window.location.href) {
            $(this).addClass('active'); $(this).parents('a').addClass('active');
        } 
    });
});

$('.close-btn').hide();
  $('.hamburger-menu-icon').on('click', function(){
    $('.hamburger-menu-icon').hide();
    $('.close-btn').show();
    $('.mobile-nav #primary-menu').show();
    $('header').addClass('menu-overlay');
    
  });
  $('.close-btn').on('click', function(){
    $('.close-btn').hide();
    $('.hamburger-menu-icon').show();
    $('.mobile-nav #primary-menu').hide();
    $('header').removeClass('menu-overlay');
  });

});