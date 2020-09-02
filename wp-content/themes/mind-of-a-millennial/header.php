<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php bloginfo('name')?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <?php wp_head();?>
</head>
<body>

<nav class="navigation-container">
<div class="logo-box">
<a href="<?php echo site_url();?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/Millennial_Logo.png" alt="Mind of A Millennial Logo" /></a>
</div>

<div class="search-bar-container">
<?php echo get_search_form(); ?>
</div>

<?php

$news_id = get_cat_ID( 'news' );
$news_link = get_category_link( $news_id );

$music_id = get_cat_ID( 'music' );
$music_link = get_category_link( $music_id );

$sports_id = get_cat_ID( 'sports' );
$sports_link = get_category_link( $sports_id );

$tvmovies_id = get_cat_ID( 'TV/Movies' );
$tvmovies_link = get_category_link( $tvmovies_id );

$lifestyle_id = get_cat_ID( 'lifestyle' );
$lifestyle_link = get_category_link( $lifestyle_id );
?>
<ul class="navigation-list">
<a href="<?php echo site_url();?>"><li class="navigation-list__item">Home</li></a>
<a href="<?php echo esc_url( $news_link ); ?>"><li class="navigation-list__item">News</li></a>
<a href="<?php echo esc_url( $sports_link ); ?>"><li class="navigation-list__item">Sports</li></a>
<a href="<?php echo esc_url( $music_link ); ?>"><li class="navigation-list__item">Music</li></a>
<a href="<?php echo esc_url( $tvmovies_link ); ?>"><li class="navigation-list__item">TV/Movies</li></a>
<a href="<?php echo esc_url( $lifestyle_link ); ?>"><li class="navigation-list__item">Lifestyle</li></a>
<?php if(is_user_logged_in()) { ?>
    <a href="<?php echo wp_logout_url();?>"><li class="navigation-list__item"><span style="white-space:nowrap">Sign Out</span></li></a>
    <li style="border-bottom: none;" class="navigation-list__item"> <span class="header-img-icon"><?php echo get_avatar(get_current_user_id(), 50);?></li>
<?php } else { ?>
    <a href="<?php echo wp_login_url();?>"><li class="navigation-list__item">Sign In</li></a>
<?php } ?>

</ul>
</nav>
<hr class="nav-2nd-line"/>

