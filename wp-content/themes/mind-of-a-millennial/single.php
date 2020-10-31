<?php
get_header();
$photocred = get_field('photo_credit');
?>



<?php if (have_posts()) : while (have_posts()) : the_post(); 
$tags = get_the_terms(get_the_ID(), 'post_tag');
?>

<main>

<div style="flex: 1;" class="single-post-container">
    <section class="single-post-main-content">
        <div class="content-margins">

		<div class="single-thumbnail">
		<?php the_post_thumbnail('full'); ?>
</div>

<div class="single-post-share-icons-container">
    <p class="single-post__photo-credit">Photo Credit | <?php echo $photocred?></p>
             <ul class="single-post-share-icons">
                 <li>
                 <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
                    <a title="Share this post on Twitter" target="_blank" href="http://twitter.com/share?url=<?php echo urlencode(get_permalink($post->ID)); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.svg" alt="1" class="single-post__share-icon-img"/></a>
                 </li>
               <li>
                <a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink($post->ID)); ?>" title="Share this post on Facebook" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg" alt="1" class="single-post__share-icon-img"/></a>
                 </li>
            </ul> 
        </div>

       
    </div> <!-- SINGLE POST MARGINS -->
  
   
    <div class="single-post-meta-text">
        <div class="content-margins">
            <h2 class="single-post__title"><?php the_title();?></h2>
       <?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?>
        <div class="single-post-author-date">
            <p class="single-post-author-name">By <?php echo get_author_name();?></p>
            <p class="single-post-date"><?php echo the_date();?></p>
        </div>
        <p class="single-post-category"><?php echo get_the_category( $id )[0]->name; ?></p>
        </div> <!-- SINGLE POST META MARGINS -->
    </div> <!-- SINGLE POST META TEXT -->
        <div class="content-margins">
            <div class="single-post__content">
            <?php the_content();?> 

            </div> <!-- SINGLE POST MAIN CONTENT -->
                </div>
                <?php endwhile; ?>
<?php endif; ?>

<!-- POST TAGS SECTION -->
<div class="content-margins">
<ul class="post-tags-list">
<?php $categories = get_categories(); ?>
<?php foreach($tags as $tag) {
echo '<li class="post-tags-list__tags-item"><a href="' . get_category_link($tag->term_id) . '">' . $tag->name . '</a></li>';
} ?>
</ul>



</div> <!-- CONTENT MARGINS -->

<!-- POST TAGS SECTION -->
    </section>

    

    

    
    <aside class="related-posts-section">
        <h5 class="related-posts-section__title">Related Articles</h5>
       <?php $cats_of_post= get_the_category();

if($cats_of_post){
     $cat_id = (int) $cats_of_post['0']->term_id;
     $related = get_posts(array(
          'numberposts'     => 4,
          'category'        => $cat_id,
          'orderby'         => 'post_date',
          'order'           => 'DESC',
          'post__not_in' => array( $post->ID )
      ));

      global $post;
      $temp_post = $post;?>

      <?php if( $related ): ?>
            
              <?php foreach ($related as $post): ?>

                <article class="related-posts-section__item">
                <a class="related-posts-section__item__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <a href="<?php the_permalink();?>"><div class="related-posts-section__item__img-container">
                <?php the_post_thumbnail(); ?>
                </div> 
                </a><!-- RELATED POSTS IMG CONTAINER -->
                </article>
                 
               <?php endforeach; ?>

      <?php else: //No posts ?>
           <p><?php _e('Sorry, there are no other related articles written under this category.'); ?></p>

      <?php endif; ?>
      <?php $post = $temp_post; ?>
      </div>
<?php }//Endif no $cats_of_post ?>



<!-- DISPLAY ADS HERE -->



<!-- DISPLAY ADS HERE -->


    </aside>

<div class="comments-section">
    <?php comments_template();?>
</div>


</div> <!-- SINGLE POST CONTAINER ENDS -->

</main>


<?php
get_footer();
