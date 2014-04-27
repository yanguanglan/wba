<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/responsive/footer.php
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

/*
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = responsive_get_options();
?>
<?php responsive_wrapper_bottom(); // after wrapper content hook ?>
</div><!-- end of #wrapper -->
<?php responsive_wrapper_end(); // after wrapper hook ?>

<?php responsive_container_end(); // after container hook ?>

<div id="footer" class="clearfix equalHeight">
	<?php responsive_footer_top(); ?>

	<div id="footer-wrapper">

		<?php get_sidebar( 'footer' ); ?>

		<!--<div class="grid col-940">

			<div class="grid col-540">
				<?php if( has_nav_menu( 'footer-menu', 'responsive' ) ) { ?>
					<?php wp_nav_menu( array(
										   'container'      => '',
										   'fallback_cb'    => false,
										   'menu_class'     => 'footer-menu',
										   'theme_location' => 'footer-menu'
									   )
					);
					?>
				<?php } ?>
			</div>			<!-- end of col-540 -->


			<!--<div class="grid col-380 fit">
				<?php echo responsive_get_social_icons() ?>
			</div>
			<!-- end of col-380 fit -->

		<!--</div>
		<!-- end of col-940 -->
		<?php get_sidebar( 'colophon' ); ?>



	</div>
	<!-- end #footer-wrapper -->
	
</div><!-- end of #container -->

	<?php responsive_footer_bottom(); ?>
</div><!-- end #footer -->

		<div class="copyright">
			<?php esc_attr_e( '&copy;', 'responsive' ); ?> <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>
			</a>
		</div>
		<!-- end of .copyright -->



<?php responsive_footer_after(); ?>

<?php wp_footer(); ?>
</body>
</html>