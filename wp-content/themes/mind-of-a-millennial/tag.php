<?php get_header(); ?>

<div style="flex: 1;" class="taxonomy-reviews-title-container">
<h2 class="taxonomy-title tag-title">#<span><?php single_tag_title();?></span></h2>
</div> <!-- CATEGORY TITLE CONTAINER -->
<div class="category-margins">

<section class="taxonomy-singles-container">
<?php while ( have_posts() ) : the_post(); ?>
<div class="taxonomy-single-block">
<div class="taxonomy-single-block__content">
<a href="<?php the_permalink();?>"><h2 class="taxonomy-single-block__content__title"><?php the_title(); ?></h2></a>

</div> <!-- CATEGORY SINGLE BLOCK CONTENT -->


  <div class="taxonomy-single-block__img-container">
  <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url($post_id);?>" class="taxonomy-single-block__img"></a>
</div> <!-- CATEGORY SINGLE BLOCK IMG -->
</div> <!-- CATEGORY SINGLE BLOCK -->
 
<?php endwhile; ?>
 



</section> <!-- CATEGORY SECTION -->
</div> <!-- CONTAINER MARGINS -->

<?php wp_reset_postdata(); ?>

<?php get_footer();
