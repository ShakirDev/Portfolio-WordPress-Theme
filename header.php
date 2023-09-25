<?php

/**
 * The header for our theme
 * @package webmanit
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'webmanit'); ?></a>
		<header id="masthead" class="site-header">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-xl">
					<!-- Logo and Toggler Button -->
					<?php
					if (has_custom_logo()) :
						the_custom_logo();
					else :
					?>
						<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<img src="<?php echo get_template_directory_uri(); ?>/img/wmit-logo.png" alt="<?php bloginfo('name'); ?>" style="width: 10%; height: auto;" />
						</a>
					<?php endif; ?>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'webmanit'); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Navigation Menu -->
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<span class="close-menu">&times;</span>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'container'      => false,
								'menu_class'     => 'navbar-nav',
								'fallback_cb'    => '__return_false',
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'          => 2,
								'walker'         => new WP_Bootstrap_Navwalker()
							)
						);
						?>
					</div>
				</div>
			</nav>
		</header><!-- #masthead -->
	</div>
</body>

</html>