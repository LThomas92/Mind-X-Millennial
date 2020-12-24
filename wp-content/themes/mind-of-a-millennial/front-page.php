<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mind X Millennial
 */

get_header();
?>

<main>

<div class="main-section-homepage">
	<div class="content-margins">
	
	<section class="homepage-top-section">
	
	<div class="homepage-top-section__left">
	<?php $featured_posts = get_field('featured_article');
	if( $featured_posts ): ?>	
    <ul>
    <?php foreach( $featured_posts as $featured_post ): 
        $permalink = get_permalink($featured_post->ID );
		$title = get_the_title($featured_post->ID );
		$featured_img_url = get_the_post_thumbnail_url($featured_post->ID);
		$date = get_the_date( 'M d', $featured_post->ID );
		$cat = get_category($featured_post->ID)
        ?>
		<a class="featured-article__link" href="<?php echo $permalink;?>">
		<li style="background-image: url(<?php echo $featured_img_url; ?>)" class="featured-article">
		<div class="image-overlay"></div>
		<div class="featured-article__text">
		<h1><?php echo $title;?></h1>
		<p class="featured-article__date"><?php echo $date;?></p>
		</div> <!-- featured article text -->
		
		</li>
		</a>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
	</div> <!--homepage top section left -->

	<div class="homepage-top-section__right">
	<?php $featuredSmalls = get_field('featured_article_small');
	if( $featuredSmalls ): ?>	
    <ul>
    <?php foreach( $featuredSmalls as $featuredSmall ): 
        $permalink = get_permalink($featuredSmall->ID );
		$title = get_the_title($featuredSmall->ID );
		$featured_img_url = get_the_post_thumbnail_url($featuredSmall->ID);
		$date = get_the_date( 'M d', $featuredSmall->ID );
		$cat = get_category($featuredSmall->ID)
        ?>
		<a href="<?php echo $permalink;?>">
		<li style="background-image: url(<?php echo $featured_img_url; ?>)" class="featured-article-small">
		<div class="image-overlay"></div>
		<div class="featured-article-small__text">
		<h1><?php echo $title;?></h1>
		<p class="featured-article-small__date"><?php echo $date;?></p>
		</div> <!-- featured article text -->
		
		</li>
		</a>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
	</div> <!--homepage top section right -->
	</section>

		<div class="homepage-second-heading">
		<?php $secondHeader = get_field('secondary_heading');?>
		<h2><?php echo $secondHeader?></h2>
		</div>

		<?php $args = array(
            'post_type' => 'post',
			'post_status' => array('publish'),
			'category_name' => 'lifestyle',
			'orderby' => 'date',
			'order' => 'ASC',
            'posts_per_page' => 3,
            'facetwp' => true,
            'ignore_sticky_posts' => true
        );
		?>
		
		<?php $the_query = new WP_Query( $args ); ?>
         <?php if ($the_query->have_posts() ) : ?>
            <div class="three-column-grid">
            <?php while ( $the_query->have_posts() ) :
						$the_query->the_post(); 
						$cat = get_the_category();
						$catName = $cat[0]->name;
						$catLink = get_category_link($cat[0]->term_id);
						?>
						
			<div class="three-column-grid__single">
			<a href="<?php the_permalink();?>">
			<figure>
				<?php the_post_thumbnail(); ?>	
				</figure>
			</a>
			<a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
				<div class="cat-date">
					<a href="<?php echo $catLink;?>"><span><?php echo $catName;?></span></a>
					&middot;
				<span><?php echo get_the_date();?></span>
			</div>
			</div> <!-- four column grid single -->
			<?php endwhile;
         endif;?>
	

	

			</div> <!-- four column grid -->
		

	</div> <!-- CONTENT MARGINS ENDS -->
</div> <!-- MAIN SECTION HOMEPAGE ENDS -->

</main>
<?php
get_footer();
