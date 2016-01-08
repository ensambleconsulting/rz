<?php 

// Fetch options stored in $smof_data
global $smof_data;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if(is_plugin_active('woocommerce/woocommerce.php')) {
      global $woocommerce;
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html <?php language_attributes(); ?> class="ie6"> <![endif]-->
<!--[if IE 7]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if IE 8]>    <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<!-- BEGIN head -->
<head>
	
	<!-- Meta Tags -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<?php 
		// Dislay Favicon
		if( $smof_data['favicon_url'] ) { 			
			echo '<link rel="shortcut icon" href="' . esc_textarea($smof_data['favicon_url']) . '" type="image/x-icon" />';
		}
	?>
	
	<?php wp_head(); ?>
	
<!-- END head -->
</head>

<!-- BEGIN body -->
<body <?php body_class('loading woocommerce'); ?>>

	<!-- BEGIN .outer-wrapper -->
	<div class="outer-wrapper">
	
	<!-- BEGIN .site-wrapper -->
	<div class="site-wrapper">

		<div class="site-wrapper-overlay"></div>
	
		<!-- BEGIN .header -->
		<header class="header">
		
			<!-- BEGIN .top-bar -->
			<div class="top-bar clearfix">
			
				<!-- BEGIN .top-bar-wrapper -->
				<div class="top-bar-wrapper">
			
					<!-- BEGIN .social-links -->
					<ul class="social-links">
						<?php echo header_social_icons(); ?>
					<!-- END .social-links -->
					</ul>
					
					<?php // Display WooCommerce links
						if( $smof_data['top-right-chk-acc'] and is_plugin_active('woocommerce/woocommerce.php') ) { 
					?>

<!-- Agregado por papa --> 

<?php $ids = explode("-;-", $_SESSION["products_ids"]);

				$output .= '';
						
					//asort($ids);

				$count = 0;

				foreach( $ids as $id) :
				
					if( $id != "" || $id != NULL ) :

						$serialNo = $count+1;

						$output .= '';

						$count++;

					endif;

				endforeach; ?>



	<!--
<a class="cart-tab" href="#"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count,  'qns'), $woocommerce->cart->cart_contents_count);?></a> -->
	

	<a class="cart-tab" href="#"><?php echo sprintf(_n('%d item', '%d items', $count), $count);?></a>


			
						<?php
							// Get "My Account" page URL
							$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
							if ( $myaccount_page_id ) {
						  		$myaccount_page_url = get_permalink( $myaccount_page_id );
							} 
						?>

						<ul class="top-right-links">
						
						<!--	
							<li class="my-account-link"><a href="<?php echo esc_url($myaccount_page_url); ?>"><?php _e('My Account','qns'); ?></a></li>
						
							<li class="check-out-link"><a href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>"><?php _e('Check Out','qns'); ?></a></li>

							<?php // if ( is_user_logged_in() ) {
							//	echo '<li class="logout-icon"><a href="' . esc_url(wp_logout_url(home_url())) . '">' . __('Logout','qns') . '</a></li>';
							} ?>
							-->
							<li href="<?php echo esc_url( get_permalink(170) ); ?>" ><?php _e('Consulte por estos productos :); ?></li>

						</ul>	

					<?php } ?>
				
				<!-- END .top-bar-wrapper -->
				</div>
			
			<!-- END .top-bar -->
			</div>
		
			<!-- BEGIN #logo-wrapper -->
			<div id="logo-wrapper" class="clearfix">
		
				<?php if( $smof_data['text_logo'] ) : ?>
					<h2 id="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?>
						<span id="tagline"><?php bloginfo( 'description' ); ?></span></a>
					</h2>

				<?php elseif( $smof_data['image_logo'] ) : ?>
					<h2 id="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_textarea($smof_data['image_logo']); ?>" alt="" /></a>
					</h2>

				<?php else : ?>	
					<h2 id="logo">	
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Natural','qns'); ?>
						<span id="tagline"><?php _e('Shop','qns') ?></span></a>
					</h2>
				<?php endif ?>
		
				<!-- BEGIN .mobile-nav -->
				<ul class="mobile-nav clearfix">
				
					<li class="li-mobile-nav"><a href="#"><i class="fa fa-navicon"></i></a></li>
					
					<?php // Display WooCommerce links
						if( is_plugin_active('woocommerce/woocommerce.php') ) { 
					?>
					<li class="li-mobile-cart"><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
					<?php } ?>
					
					<?php if( $smof_data['main_menu_search'] ) {	?>
						<li class="li-mobile-search"><a href="#"><i class="fa fa-search"></i></a></li>
					<?php } ?>
					
				<!-- END .mobile-nav -->
				</ul>
				
			<!-- END #logo-wrapper -->
			</div>
			
			<!-- BEGIN .mobile-search-form -->
			<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobile-search-form mobile-search-form-hide">
				
				<input class="menu-search-field" type="text" onblur="if(this.value=='')this.value='<?php _e('To search, type and hit enter','qns'); ?>';" onfocus="if(this.value=='<?php _e('To search, type and hit enter','qns'); ?>')this.value='';" value="<?php _e('To search, type and hit enter','qns'); ?>" name="s" />
				
				<?php if( $smof_data['menu_search_type'] == 'Product Search' ) {	?>
					<input type="hidden" name="post_type" value="product" />
				<?php } ?>
				
				<ul class="mobile-nav clearfix">
					<li class="li-mobile-search"><a href="#"><i class="fa fa-search"></i></a></li>
				</ul>
		
			<!-- END .mobile-search-form -->
			</form>
		
			<!-- BEGIN #primary-navigation -->
			<nav id="primary-navigation" class="navigation-wrapper fixed-navigation clearfix" role="navigation">
			
				<!-- BEGIN .navigation-inner -->
				<div class="navigation-inner">

					<!-- BEGIN .navigation -->
					<div class="navigation">

						<!-- Main Menu -->
						<?php wp_nav_menu( array(
							'theme_location' => 'primary',
							'container' => false,
							'items_wrap' => '<ul>%3$s</ul>',
							'fallback_cb' => 'wp_main_menu_qns',
							'echo' => true,
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'depth' => 0 )
					 	); ?>
			
					<!-- END .navigation -->
					</div>

					<?php if( $smof_data['main_menu_search'] ) {	?>

						<!-- BEGIN .search-form -->
						<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form">
						
							<i class="fa fa-close close-search"></i>
							<input class="menu-search-field" type="text" onblur="if(this.value=='')this.value='<?php _e('To search, type and hit enter','qns'); ?>';" onfocus="if(this.value=='<?php _e('To search, type and hit enter','qns'); ?>')this.value='';" value="<?php _e('To search, type and hit enter','qns'); ?>" name="s" />

							<?php if( $smof_data['menu_search_type'] == 'Product Search' ) {	?>
								<input type="hidden" name="post_type" value="product" />
							<?php } ?>
					
						<!-- END .search-form -->
						</form>
				
						<i class="fa fa-search search-button"></i>
			
					<?php } ?>
	
				<!-- END .navigation-inner -->
				</div>

			<!-- END #primary-navigation -->
			</nav>
			
		<!-- END .header -->
		</header>