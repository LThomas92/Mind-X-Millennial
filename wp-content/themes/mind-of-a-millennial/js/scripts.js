var $ = jQuery.noConflict();
$(document).ready(function(){


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

  //dropdown menu

 $('.search-icon').click(function(){
    $('.search-overlay-container').show();
 });

 $('.search-icon-mobile').click(function(){
  $('.search-overlay-container').show();
});

 $('.search-close').click(function() {
  $('.search-overlay-container').hide();
 });


});