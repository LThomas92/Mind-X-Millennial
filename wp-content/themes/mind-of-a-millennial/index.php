<?php
get_header();
?>

<main>

<div class="main-section-homepage">
	<div class="content-margins">
	<div class="new-articles"> <!-- NEW ARTICLES SECTION STARTS -->
	<div class="new-article-title-box">
	<h4 class="new-articles__title">New</h4>
	<div class="background-square-cyan"></div>
	</div>
	
		<section class="homepage-article-container">
 
		<?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 3,
   )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

  <?php $image_id = get_post_thumbnail_id(); ?>
<?php $image_attributes = wp_get_attachment_image_src( $image_id, 'full');  ?>

	<div class="article-item"> <!-- ONE ARTICLE ITEM -->
	<img src="<?php echo $image_attributes[0]; ?>" class="article-item__img">
			<div class="article-item__content"> <!-- ARTICLE CONTENT DIV -->
				<div class="date-and-category-container"> <!-- DATE AND CATEGORY -->
				<p class="article-item__date"><?php the_date( get_option( 'date_format' ) ); ?></p>
				<p class="article-item__category">
				<?php
				$category = get_the_category(); 
				echo $category[0]->cat_name;
				?></p>
				</div> <!-- DATE AND CATEGORY -->
				<a class="article-item__title-link" href="<?php the_permalink();?>"><h4 class="article-item__title"><?php the_title(); ?></h4></a>
				
				<div class="article-item__button-container"> <!-- ARTICLE ITEM BUTTON CONTAINER -->
				<a href="<?php the_permalink(); ?>" class="read-more-btn">Read More</a>
				<ul class="article-item__social-share-list">
					<li> <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
                    <a title="Share this post on Twitter" target="_blank" href="http://twitter.com/share?url=<?php echo urlencode(get_permalink($post->ID)); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter-black.svg" alt="<?php the_title();?>" class="single-post__share-icon-img"/></a></li>
					<li><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink($post->ID)); ?>" title="Share this post on Facebook" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/img/facebook-black.svg" alt="<?php the_title();?>" class="single-post__share-icon-img"/></a></li>
				</ul>
				</div> <!-- ARTICLE ITEM BUTTON CONTAINER -->
			</div> <!-- ARTICLE CONTENT DIV -->
		</div> <!-- ONE ARTICLE ITEM ENDS -->
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php __('No New Posts'); ?></p>
<?php endif; ?>


		

		



</section> <!-- HOMEPAGE ARTICLE CONTAINER ENDS -->
	</div> <!-- NEW ARTICLE SECTION ENDS -->

	<!-- SPACER DIV RIGHT -->
	<div class="spacer-right-container">
	<hr class="spacer-right-blue"/>
		<hr class="spacer-right-green"/>
	</div>
		<!-- SPACER DIV RIGHT -->

		<!-- FEATURED ARTICLE SECTION --> 
		<div class="featured-article__title-box">
		<div class="background-square-blue"></div>
		<h4 class="featured-article__title">Featured</h4>
		</div>
		<div class="featured-article">

	<?php getFeaturePosts(); ?>

		</div><!-- FEATURED ARTICLE SECTION  --> 

		<!-- SPACER DIV RIGHT -->
	<div class="spacer-left-container">
	<hr class="spacer-left-blue"/>
		<hr class="spacer-left-green"/>
	</div>
		<!-- SPACER DIV RIGHT -->
	




	</div> <!-- CONTENT MARGINS ENDS -->
</div> <!-- MAIN SECTION HOMEPAGE ENDS -->

</main>
<?php
get_footer();
