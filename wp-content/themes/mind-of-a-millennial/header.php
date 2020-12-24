<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name')?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="manifest" href="/site.webmanifest">

    <?php wp_head();?>

</head>
<body <?php body_class(); ?>>

<div class="search-overlay-container">
<img class="search-close" src="<?php echo get_template_directory_uri(); ?>/img/close-blue.svg" alt="Close Icon" />
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label>
        <input style="line-height: 4rem" type="search" class="search-field" placeholder="Find Something..." value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="search-submit"></button>
		</label>
</form>

<h4 class="popular-search-terms__title">Popular search terms</h4>
<ul class="popular-search-terms">
<li>Sports</li>
<li>NBA</li>
<li>NFL</li>
<li>Dating</li>
<li>Millennial</li>
<li>Lifestyle</li>
<li>Music</li>
<li>Russell Westbrook</li>
<li>LeBron James</li>
<li>Millennial Dating Series</li>
<li>Fictional Fridays</li>
<li>Social Media</li>
</ul>

</div> <!-- search overlay container -->
<header>
<nav class="navigation-container">
<div class="logo-box">
<a href="<?php echo site_url();?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/x-mas-logo.png" alt="Mind of A Millennial Logo" /></a>
</div>


<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
            ); ?>

		

			<?php if(is_user_logged_in()) { ?>
				<img class="search-icon" src="<?php echo get_template_directory_uri(); ?>/img/search.svg" alt="Search Icon" />
<span style="margin-right: 1rem;" class="header-img-icon"><?php echo get_avatar(get_current_user_id(), 50);?></span>
			<?php } else { ?>
				<img class="search-icon" src="<?php echo get_template_directory_uri(); ?>/img/search.svg" alt="Search Icon" />
				<div style="display: none;"></div>
            <?php } ?>
            
</nav>



<!-- MOBILE NAV -->
<div class="mobile-nav-margins">
		<div class="mobile-nav-icon-container">
		<img class="search-icon-mobile" src="<?php echo get_template_directory_uri(); ?>/img/search.svg" alt="Search Icon" />
		<div class="hamburger-menu-icon"></div>
		<div class="close-btn"></div>
		      
		</div> <!-- MOBILE NAV ICON CONTAINER -->
		<div class="mobile-nav">
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
            ); ?>



		</div> <!-- MOBILE NAV -->
        </div> <!-- MOBILE NAV MARGINS -->
        
        </header>




