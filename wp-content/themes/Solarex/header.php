<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prespa
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	
	
 <script>
        function initMap() {
            // The location (latitude, longitude)
            var location = {lat: -20.173239865947398, lng: 57.453838998584494};

            // Create the map centered on the location
            var map = new google.maps.Map(document.getElementById('mapon'), {
                zoom: 17,
                center: location,
				// mapTypeControl: false,
				// fullscreenControl: false,
				streetViewControl: false,
            });
			
			
			// Custom marker icon
			var customIcon = {
				url: "https://solarex.mu/wp-content/themes/Solarex/assets/img/pinip.png", // Replace with your custom marker URL
				scaledSize: new google.maps.Size(50, 50), // Adjust size
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(25, 50) // Adjust anchor point
			};

			// Add a custom marker at the location
			var marker = new google.maps.Marker({
				position: location,
				map: map,
				icon: customIcon
			});
			
        }
    </script>

    <!-- Load the Google Maps JavaScript API -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnEAYKsou4b8VUtQSSz3GfMIeqYrVQSuk&callback=initMap">
    </script>
    

	
</head>

<body <?php body_class(); 
prespa_schema_microdata( 'body' );
?>>
	

	
	
<?php do_action( 'wp_body_open' );
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'prespa' ); ?></a>
	<header id="masthead" class="site-header" role="banner" <?php prespa_schema_microdata( 'header' ); ?>>
	<?php
	if ( prespa_has_secondary_menu() ) : ?>
		<nav id="top-navigation" class="top-menu site-menu" aria-label=<?php _e('Secondary navigation', 'prespa')?>>
			<div class="header-content-wrapper">
				<?php
				/**
				 * prespa_top menu_hook
				 *
				 * @since 1.0.0
				 * @hooked prespa_top_menu
				*/
				do_action( 'prespa_top_menu_hook' );
				/**
				 * prespa_social icons_hook
				 *
				 * @since 1.0.4
				 * @hooked prespa_social_icons_header
				*/
				do_action( 'prespa_social_icons_hook' ); ?>
			</div>
			<div class="green-block">
			<h2>SPECIALIST EPCM</h2>
				<p>ENGINEERING, PROCUREMENT AND PROJECT MANAGEMENT CONTRACTOR</p>
			</div>
		</nav>
		<?php endif; ?>
		<div class="main-navigation-container">
			<div class="header-content-wrapper">
				<div class="site-branding">
					<?php the_custom_logo();
					prespa_dark_mode_logo();
					if ( display_header_text() == true ) : ?>
					<div class="site-meta">
						<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php prespa_schema_microdata( 'site-title' ); ?> rel="home"><?php bloginfo( 'name' ); ?></a></div>
						<?php if ( get_bloginfo( 'description', 'display' ) || is_customize_preview() ) :
							?>
							<p class="site-description" <?php prespa_schema_microdata( 'site-description' ); ?>><?php echo get_bloginfo( 'description', 'display') // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="main-navigation" class="main-navigation site-menu" aria-label="<?php _e('Main navigation', 'prespa')?>" <?php prespa_schema_microdata( 'menu' ); ?>>
					<button class="menu-toggle" data-toggle="collapse" aria-controls="site-menu" aria-expanded="false" aria-label="<?php _e('Toggle Navigation', 'prespa')?>">
						<span class="menu-toggle-icon">
							<input class="burger-check" id="burger-check" type="checkbox"><label for="burger-check" class="burger"></label>
						</span>
					</button>
					<?php
					/**
					 * prespa_primary_menu_hook
					 * 
					 * @since 1.0.0
					 * @hooked prespa_primary_menu
					 */
					do_action( 'prespa_primary_menu_hook' ); ?>
				</nav><!-- #site-navigation -->
				
			</div>
		</div>
	<?php
	/**
	 * prespa_header_image_hook
	 * 
	 * @since 1.1.2
	 * @hooked prespa_header_image
	 */
	do_action( 'prespa_header_image_hook' ); ?>
	</header><!-- #masthead -->
	<?php if ( class_exists( 'WooCommerce' ) && !prespa_topmenu_has_wc_items() ) : /*Woocommerce fixed menu */ ?>
	<div id="scroll-cart" class="topcorner">
		<ul>
			<?php
				/**
				 * prespa_fixed_menu_hook
				 * 
				 * @since 1.0.0
				 * @hooked prespa_woocommerce_my_account
				 * @hooked prespa_woocommerce_header_cart
				 */
				do_action( 'prespa_fixed_menu_hook' ); ?>
		</ul>
	</div>
	<?php endif; ?>
</original_code>```
