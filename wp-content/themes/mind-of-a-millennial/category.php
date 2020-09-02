<?php get_header();

?>

<main>

<div class="category-margins">

<h3 class="taxonomy-title"><?php single_cat_title(); ?> Category</h3>

<section class="taxonomy-singles-container">
<?php while ( have_posts() ) : the_post();?>
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

</main>

<?php get_footer();?>