<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Watermelon_Wordpress_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> data-bs-theme="light">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

        <style>
        <?php
        $csspath = get_template_directory_uri() . '/css/bootstrap.min.css';

        $css = file_get_contents($csspath);
        echo $css;

        ?>
    </style>
	    <script>
        var ajaxurl = "<?php echo admin_url("admin-ajax.php") ?>";
        var themeurl = "<?php echo get_template_directory_uri() ?>";
        var homeurl = "<?php echo home_url() ?>";
        var loginurl = "<?php echo wp_login_url(get_permalink()); ?>";
    </script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wm' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$wm_description = get_bloginfo( 'description', 'display' );
			if ( $wm_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $wm_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wm' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	
	
	<header id="masthead" class="<?= apply_filters('bootscore/class/header', 'sticky-top bg-body-tertiary'); ?> site-header">

    <?php do_action( 'bootscore_after_masthead_open' ); ?>
    
    <nav id="nav-main" class="navbar <?= apply_filters('bootscore/class/header/navbar/breakpoint', 'navbar-expand-lg'); ?>">

      <div class="<?= apply_filters('bootscore/class/container', 'container', 'header'); ?>">
        
        <?php do_action( 'bootscore_before_navbar_brand' ); ?>
        
        <!-- Navbar Brand -->
        <a class="<?= apply_filters('bootscore/class/header/navbar-brand', 'navbar-brand'); ?>" href="<?= esc_url(home_url()); ?>">
          <img src="<?= esc_url(apply_filters('bootscore/logo', get_stylesheet_directory_uri() . '/assets/img/logo/logo.svg', 'default')); ?>" alt="<?php bloginfo('name'); ?> Logo" class="d-td-none">
          <img src="<?= esc_url(apply_filters('bootscore/logo', get_stylesheet_directory_uri() . '/assets/img/logo/logo-theme-dark.svg', 'theme-dark')); ?>" alt="<?php bloginfo('name'); ?> Logo" class="d-tl-none">
        </a>  
        
        <?php do_action( 'bootscore_after_navbar_brand' ); ?>

        <!-- Offcanvas Navbar -->
        <div class="offcanvas offcanvas-<?= apply_filters('bootscore/class/header/offcanvas/direction', 'end', 'menu'); ?>" tabindex="-1" id="offcanvas-navbar">
          <div class="offcanvas-header <?= apply_filters('bootscore/class/offcanvas/header', '', 'menu'); ?>">
            <span class="h5 offcanvas-title"><?= apply_filters('bootscore/offcanvas/navbar/title', __('Menu', 'bootscore')); ?></span>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body <?= apply_filters('bootscore/class/offcanvas/body', '', 'menu'); ?>">

            <!-- Bootstrap 5 Nav Walker Main Menu -->
            <?php //get_template_part('template-parts/header/main-menu');
// Bootstrap 5 Nav Walker
wp_nav_menu(array(
  'theme_location' => 'main-menu',
  'container'      => false,
  'menu_class'     => '',
  'fallback_cb'    => '__return_false',
  'items_wrap'     => '<ul id="bootscore-navbar" class="navbar-nav ' . apply_filters('bootscore/class/header/navbar-nav', 'ms-auto') . ' %2$s">%3$s</ul>',
  'depth'          => 2,
  'walker'         => new bootstrap_5_wp_nav_menu_walker()
)); ?>
            <!-- Top Nav 2 Widget -->
            <?php if (is_active_sidebar('top-nav-2')) : ?>
              <?php dynamic_sidebar('top-nav-2'); ?>
            <?php endif; ?>

          </div>
        </div>

        <div class="header-actions <?= apply_filters('bootscore/class/header-actions', 'd-flex align-items-center'); ?>">

          <!-- Top Nav Widget -->
          <?php if (is_active_sidebar('top-nav')) : ?>
            <?php dynamic_sidebar('top-nav'); ?>
          <?php endif; ?>

          <?php
          if (class_exists('WooCommerce')) :
            get_template_part('template-parts/header/actions', 'woocommerce');
          else :
            get_template_part('template-parts/header/actions');
          endif;
          ?>

          <!-- Navbar Toggler -->
          <button class="<?= apply_filters('bootscore/class/header/button', 'btn btn-outline-secondary', 'nav-toggler'); ?> <?= apply_filters('bootscore/class/header/navbar/toggler/breakpoint', 'd-lg-none'); ?> <?= apply_filters('bootscore/class/header/action/spacer', 'ms-1 ms-md-2', 'nav-toggler'); ?> nav-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar" aria-label="<?php esc_attr_e( 'Toggle main menu', 'bootscore' ); ?>">
            <?= apply_filters('bootscore/icon/menu', '<i class="fa-solid fa-bars"></i>'); ?> <span class="visually-hidden-focusable">Menu</span>
          </button>
          
          <?php do_action( 'bootscore_after_nav_toggler' ); ?>

        </div><!-- .header-actions -->

      </div><!-- .container -->

    </nav><!-- .navbar -->

    <?php
    if (class_exists('WooCommerce')) :
      get_template_part('template-parts/header/collapse-search', 'woocommerce');
    else :
      get_template_part('template-parts/header/collapse-search');
    endif;
    ?>

    <!-- Offcanvas User and Cart -->
    <?php
    if (class_exists('WooCommerce')) :
      get_template_part('template-parts/header/offcanvas', 'woocommerce');
    endif;
    ?>

    <?php do_action( 'bootscore_before_masthead_close' ); ?>
    
  </header><!-- #masthead -->
