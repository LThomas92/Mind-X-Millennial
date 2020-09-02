<?php get_header(); ?>

<main>

<div class="main-search-container">


    <?php if ( have_posts() ) : ?>

		
<div class="search-results-page-container">
    <div class="search-results-title-container">
    <h1 class="taxonomy-title">
    <?php
    /* translators: %s: search query. */
    printf( esc_html__( 'Search Results for: %s', 'sde_2020' ), '<span class="search-results-page-title__search-term">' . get_search_query() . '</span>' );
    ?>
</h1>
    </div>

    <div class="search-results-main-content-container">
        <div class="content-margins">

<div class="taxonomy-singles-container">

<?php
  $image_id = get_post_thumbnail_id();
  $image_attributes = wp_get_attachment_image_src( $image_id, 'full'); 

while ( have_posts() ) :
the_post(); ?>



<div class="taxonomy-single-block">
    <div class="taxonomy-single-block__img-container">
<a href="<?php the_permalink();?>"><img class="taxonomy-single-block__img" src="<?php echo $image_attributes[0];?>" alt="<?php the_title(); ?> . Thumbnail"></a>
</div>
<div class="taxonomy-single-block__content">
<h3 class="taxonomy-single-block__content__title"><?php the_title();?></h3>
<p class="search-results-single__author">By <?php the_author();?></p>
<a class="read-more-btn" href="<?php the_permalink();?>">Read More</a>

</div>

    </div> <!-- SEARCH RESULTS SINGLE CONTAINER -->

<?php endwhile;
the_posts_navigation();
else : ?>

  <div class="no-results-container">
      <h2 class="no-results-container__title">No Results Have Been Found!</h2>
      <h2 class="no-results-container__title">Try your search again</h2>
      <a class="back-btn-404" href="<?php echo site_url();?>">Back To Home</a>
  </div>  

<?php endif;
?>


</div> <!-- SEARCH RESULTS PAGE SINGLE CONTAINER -->


</div>

</div>

</main>



<?php get_footer(); ?>