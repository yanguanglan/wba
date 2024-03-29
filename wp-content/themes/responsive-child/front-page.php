<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Site Front Page
 *
 * Note: You can overwrite front-page.php as well as any other Template in Child Theme.
 * Create the same file (name) include in /responsive-child-theme/ and you're all set to go!
 * @see            http://codex.wordpress.org/Child_Themes and
 *                 http://themeid.com/forum/topic/505/child-theme-example/
 *
 * @file           front-page.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/front-page.php
 * @link           http://codex.wordpress.org/Template_Hierarchy
 * @since          available since Release 1.0
 */

/**
 * Globalize Theme Options
 */
$responsive_options = responsive_get_options();
/**
 * If front page is set to display the
 * blog posts index, include home.php;
 * otherwise, display static front page
 * content
 */
if ( 'posts' == get_option( 'show_on_front' ) && $responsive_options['front_page'] != 1 ) {
	get_template_part( 'home' );
} elseif ( 'page' == get_option( 'show_on_front' ) && $responsive_options['front_page'] != 1 ) {
	$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );
	$template = ( $template == 'default' ) ? 'index.php' : $template;
	locate_template( $template, true );
} else {

	get_header();

	//test for first install no database
	$db = get_option( 'responsive_theme_options' );
	//test if all options are empty so we can display default text if they are
	$empty = ( empty( $responsive_options['home_headline'] ) && empty( $responsive_options['home_subheadline'] ) && empty( $responsive_options['home_content_area'] ) ) ? false : true;
	?>

	<div id="featured" class="grid col-940">

		<div id="featured-content" class="grid col-460">

			<h1 class="featured-title">
				<?php
				if ( isset( $responsive_options['home_headline'] ) && $db && $empty ) {
					echo $responsive_options['home_headline'];
				} else {
					_e( 'Hello, World!', 'responsive' );
				}
				?>
			</h1>

			<h2 class="featured-subtitle">
				<?php
				if ( isset( $responsive_options['home_subheadline'] ) && $db && $empty )
					echo $responsive_options['home_subheadline'];
				else {
					_e( 'Your H2 subheadline here', 'responsive' );
				}
				?>
			</h2>

			<?php
			if ( isset( $responsive_options['home_content_area'] ) && $db && $empty ) {
				echo do_shortcode( wpautop( $responsive_options['home_content_area'] ) );
			} else {
				?>
				<!--<p>
					<?php _e( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image
					or even YouTube video if you like.', 'responsive' ); ?>
				</p>-->

			<?php
			}

			if ( $responsive_options['cta_button'] == 0 ): ?>

				<div class="call-to-action">

					<a href="<?php echo $responsive_options['cta_url']; ?>" class="blue button">
						<?php
						if ( isset( $responsive_options['cta_text'] ) && $db )
							echo $responsive_options['cta_text'];
						else
							_e( 'Call to Action', 'responsive' );
						?>
					</a>

				</div><!-- end of .call-to-action -->

			<?php endif; ?>

		</div>
		<!-- end of .col-460 -->

		<!--<div id="featured-image" class="grid col-460 fit">

			<?php $featured_content = ( !empty( $responsive_options['featured_content'] ) ) ? $responsive_options['featured_content'] : '<img class="aligncenter" src="' . get_template_directory_uri() . '/core/images/featured-image.png" width="440" height="300" alt="" />'; ?>

			<?php echo do_shortcode( wpautop( $featured_content ) ); ?>

		</div>-->
		<!-- end of #featured-image -->
            <div id="widgets" class="home-widgets">
        <div class="grid-right latest_news">
        
 		<div id="home_widget_1" class="grid-right fit">
			<?php responsive_widgets(); // above widgets hook ?>

			<?php if( !dynamic_sidebar( 'home-widget-1' ) ) : ?>
				<div class="widget-wrapper">

					<div class="widget-title-home"><h3><?php _e( 'Home Widget 1', 'responsive' ); ?></h3></div>
					<div
						class="textwidget"><?php _e( 'This is your first home widget box. To edit please go to Appearance > Widgets and choose 6th widget from the top in area 6 called Home Widget 1. Title is also manageable from widgets as well.', 'responsive' ); ?></div>

				</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-1 ?>                       
                        

        </div><!-- end of .col-300 -->
            </div>
	</div><!-- end of #featured -->

	<?php
	//get_sidebar( 'home' );
	get_footer();
}
?>
