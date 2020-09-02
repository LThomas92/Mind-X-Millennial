<?php get_header();?>

<main>

<div class="about-us">
<h2 class="about-us__title"><?php the_title();?></h2>

<?php

  if( have_rows('about_us_image') ):
  while( have_rows('about_us_image') ): the_row();

endwhile;
endif;
 ?>


<div class="about-us__img-container">
<div class="about-us__img-single-block">
<img class="about-us__img" src="<?php echo get_field('about_us_image_1');?>" alt=""/>
<div class="about-us__img-whitebg">
<?php the_content(); ?>
</div>
</div>

</div>
</div>

</main>

<?php get_footer();?>