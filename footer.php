<?php 

// Fetch options stored in $smof_data
global $smof_data;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if(is_plugin_active('woocommerce/woocommerce.php')) {
      global $woocommerce;
}

?>

<!-- BEGIN #footer -->
<footer id="footer" class="clearfix">

	<!-- BEGIN .content-wrapper -->
	<div class="content-wrapper clearfix <?php if ( !is_active_sidebar('footer-widget-area') ) { echo 'no-footer-widgets'; } ?>">
	
		<?php if ( is_active_sidebar('footer-widget-area') ) { ?>	
			<?php dynamic_sidebar( 'footer-widget-area' ); ?>
		<?php } ?>

		<div class="clearboth"></div>
		
		<!-- BEGIN .footer-message -->
		<div class="footer-message clearfix">
		
			<?php if( $smof_data['footer_msg'] ) { ?>
				<p><?php echo $smof_data['footer_msg']; ?></p>
			<?php } ?>
	
			<ul class="social-links-footer clearfix">
				<?php echo footer_social_icons(); ?>
			</ul>
	
		<!-- END .footer-message -->
		</div>

	<!-- END .content-wrapper -->	
	</div>

<!-- END #footer -->
</footer>

<!-- END .site-wrapper -->
</div>

<!-- BEGIN .mobile-menu-wrapper -->
<div class="mobile-menu-wrapper">

<!-- BEGIN .mobile-menu-inner -->
<div class="mobile-menu-inner">
	
	<!-- Main Menu -->
	<?php wp_nav_menu( array(
		'theme_location' => 'primary',
		'container' => false,
		'items_wrap' => '<ul class="mobile-menu">%3$s</ul>',
		'fallback_cb' => 'wp_mobile_menu_qns',
		'echo' => true,
		'before' => '',
		'after' => '',
		'link_before' => '',
		'link_after' => '',
		'depth' => 0 )
 	); ?>
	
	<?php if( is_plugin_active('woocommerce/woocommerce.php') ) {

		// Get "My Account" page URL
		$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
		if ( $myaccount_page_id ) {
	  		$myaccount_page_url = get_permalink( $myaccount_page_id );
		} ?>

		<ul class="mobile-menu">
			<li><a href="<?php echo esc_url($myaccount_page_url); ?>"><?php _e('My Account','qns'); ?></a></li>		
			<li><a href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>"><?php _e('Check Out','qns'); ?></a></li>
			<?php if ( is_user_logged_in() ) {
				echo '<li class="logout-icon"><a href="' . esc_url(wp_logout_url(home_url())) . '">' . __('Logout','qns') . '</a></li>';
			} ?>
		</ul>	

	<?php } ?>
	
	<!-- BEGIN .social-links-footer -->
	<ul class="social-links-footer social-links-mobile clearfix">
		<?php echo footer_social_icons(); ?>
	<!-- END .social-links-footer -->
	</ul>

<!-- END .mobile-menu-inner -->
</div>

<!-- END .mobile-menu-wrapper -->
</div>

<!-- BEGIN .cart-side-wrapper -->
<div class="cart-side-wrapper cart-side-wrapper-expanded">

<!-- BEGIN .mobile-menu-inner -->
<div class="mobile-menu-inner">
	
	<h3><?php _e('Su consulta','qns'); ?></h3>
	<div class="widget_shopping_cart_content"></div>

<!-- END .mobile-menu-inner -->
</div>

<!-- END .cart-side-wrapper -->
</div>

<!-- END .outer-wrapper -->
</div>

<?php wp_footer(); ?>

<!-- END body -->
</body>
</html>