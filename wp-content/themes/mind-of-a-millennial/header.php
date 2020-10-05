<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name')?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="manifest" href="/site.webmanifest">

    <?php wp_head();?>

</head>
<body <?php body_class(); ?>>

<header>
<nav class="navigation-container">
<div class="logo-box">
<a href="<?php echo site_url();?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Mind of A Millennial Logo" /></a>
</div>

<div class="search-bar-container">
<?php echo get_search_form(); ?>
</div>
<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
            ); ?>

			
            <?php if(is_user_logged_in()) { ?>
<span style="margin-right: 1rem;" class="header-img-icon"><?php echo get_avatar(get_current_user_id(), 50);?></span>
            <?php } else { ?>
				<div style="display: none;"></div>
            <?php } ?>
            
</nav>



<!-- MOBILE NAV -->
<div class="mobile-nav-margins">
		<div class="mobile-nav-icon-container">
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




