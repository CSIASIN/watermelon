<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Watermelon_Wordpress_Theme
 */

get_header();
?>

	<main id="primary" class="site-main container">
<?php echo wm_breadcrumb(); ?>

<div class="p-5 mb-4 bg-body-tertiary rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Oops! That page can&rsquo;t be found.</h1>
        <p class="col-md-8 fs-4">It looks like nothing was found at this location. Maybe try one of the links below or a search?</p> 
		
		<a class="btn btn-primary btn-lg" href="<?= esc_url(home_url()); ?>" role="button"><?php esc_html_e('Back Home &raquo;', 'wm'); ?></a>
    </div>
</div>

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wm' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wm' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'wm' ); ?></h2>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					$wm_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'wm' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$wm_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>
<a class="btn btn-outline-primary" href="<?= esc_url(home_url()); ?>" role="button"><?php esc_html_e('Back Home &raquo;', 'bootscore'); ?></a>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
