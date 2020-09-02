<?php
/**
 * Theme Functions
 */

function sde_2020_scripts() {
	// wp_enqueue_style( 'sde_2020-style', get_stylesheet_uri() );

	$manifest = json_decode(file_get_contents('dist/assets.json', true));
	$main = $manifest->main;

	wp_enqueue_style( 'sde_2020-style', get_template_directory_uri() . $main->css, false, null );

	wp_enqueue_script('sde_2020-js', get_template_directory_uri() . $main->js, ['jquery'], null, true);


	wp_enqueue_script( 'sde_2020-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'sde_2020-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sde_2020_scripts' );
    

//POST THUMBNAIL FUNCTION 
add_theme_support( 'post-thumbnails' );


function getFeaturePosts(){ ?>              
             
                <?php
                $default_thumbnail = 'https://img.techbrij.com/techbrij%20logo.gif';
                $featured_query = new WP_Query('showposts=1&orderby=rand&category_name=featured');
                while ($featured_query->have_posts()) : $featured_query->the_post(); ?>

            <?php $image_id = get_post_thumbnail_id(); ?>
            <?php $image_attributes = wp_get_attachment_image_src( $image_id, 'full');  ?>
                 
            <div class="featured-article-item">
            <div class="featured-article-item__content-container">
            <div class="featured-article-item__title-container">
            <a style="text-decoration: none" href="<?php the_permalink();?>"><h3 class="featured-article-item__title"><?php the_title()?></h3></a>

            <p class="featured-article-item__date"><?php echo the_date(); ?></p>
            <div class="featured-article-item__excerpt"><?php echo the_excerpt();?></div>
            <p class="featured-article-item__category"><?php
				$category = get_the_category(); 
				echo $category[1]->cat_name;
                ?></p>
                  <p class="featured-article-item__author">By <?php echo get_author_name();?></p>
                </div>
              

            </div> <!-- FEATURED ARTICLE ITEM CONTENT CONTAINER -->

        <div class="featured-article-item__img-container">
                            <img class="featured-article-item__img" src="<?php echo $image_attributes[0]; ?>" alt="<?php the_title(); ?>" />
                            
                            </div> <!-- FEATURED ARTICLE ITEM IMG CONTAINER -->
                         </div>   <!-- FEATURED ARTICLE ITEM -->       
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
<?php } ?>


<?php 
add_action('admin_init', 'redirectSubsToFrontEnd');

function redirectSubsToFrontEnd() {
    $ourCurrentUser = wp_get_current_user();
    if(count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}
?>

<?php 
add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar() {
    $ourCurrentUser = wp_get_current_user();
    if(count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
        show_admin_bar(false);
    }
}
?>


<?php
function custom_blockusers_init() {
  if ( is_user_logged_in() && is_admin() && !current_user_can( 'administrator' ) ) {
    wp_redirect( home_url() );
    exit;
  }
}
add_action( 'init', 'custom_blockusers_init' ); // Hook into 'init'

?>


<?php add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl() {
    return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
}

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle() {
    return get_bloginfo('name');
}

//Replace style-login.css with the name of your custom CSS file
function my_custom_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
}

//This loads the function above on the login page
add_action( 'login_enqueue_scripts', 'my_custom_login_stylesheet' );

?>


<?php add_filter('the_content', function($content) {
	return str_replace(array("<iframe", "</iframe>"), array('<div class="iframe-container"><iframe', "</iframe></div>"), $content);
});

add_filter('embed_oembed_html', function ($html, $url, $attr, $post_id) {
	if(strpos($html, 'youtube.com') !== false || strpos($html, 'youtu.be') !== false){
  		return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
	} else {
	 return $html;
	}
}, 10, 4);


add_filter('embed_oembed_html', function($code) {
  return str_replace('<iframe', '<iframe class="embed-responsive-item" ', $code);
}); ?>