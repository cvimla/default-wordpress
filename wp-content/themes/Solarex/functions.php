<?php
/**
 * Prespa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Prespa
 */

if ( ! defined( 'PRESPA_VERSION' ) ) {
	define( 'PRESPA_VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( ! function_exists( 'prespa_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function prespa_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'prespa', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-header' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );

		// This theme uses wp_nav_menu() in two locations based on theme customizer options.

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'prespa' ),
				'menu-2' => esc_html__( 'Top', 'prespa' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add WooCommerce support to the theme
		add_theme_support( 'woocommerce' );


		/**
		 * Add support for page excerpts.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_post_type_support/
		 */
		add_post_type_support( 'page', 'excerpt' );

		// Set default values for the upload media box
		update_option( 'image_default_align', 'center' );
		update_option( 'image_default_size', 'large' );

	}
endif;
add_action( 'after_setup_theme', 'prespa_setup' );

/**
 * Register widget area
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function prespa_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'prespa' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Widgets in this area will be displayed in the first column in the footer.', 'prespa' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="heading">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'prespa' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Widgets in this area will be displayed in the second column in the footer.', 'prespa' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="heading">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'prespa' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Widgets in this area will be displayed in the third column in the footer.', 'prespa' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="heading">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'prespa' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Widgets in this area will be displayed in the fourth column in the footer.', 'prespa' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="heading">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'prespa' ),
			'id'            => 'sidebar-5',
			'description'   => esc_html__( 'Widgets in this area will be displayed in the fourth column in the footer.', 'prespa' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="heading">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'WooCommerce Sidebar', 'prespa' ),
			'id'            => 'sidebar-2-1',
			'description'   => esc_html__( 'Widgets in this area will be displayed on WooCommerce pages.', 'prespa' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'prespa_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function prespa_scripts() {
	$script_asset = require get_template_directory() . '/build/js/app.asset.php';
	wp_enqueue_style( 'prespa-style', get_template_directory_uri() . '/build/css/main.css', array(), filemtime( get_template_directory() . '/build/css/main.css' ) );
	wp_style_add_data( 'prespa-style', 'rtl', 'replace' );

	wp_enqueue_script( 'prespa-script', get_template_directory_uri() . '/build/js/app.js', $script_asset['dependencies'], $script_asset['version'], true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$js_customizer_options = array(
		'ajax_url'           => esc_url( admin_url( 'admin-ajax.php' ) ),
		'fixed_header'       => prespa_is_fixed_header(),
		'sticky_header'      => prespa_is_sticky_header(),
		'column'             => esc_html( get_theme_mod( 'post_archives_columns', '1' ) ),
		'has_masonry_layout' => esc_html( get_theme_mod( 'post_archives_display', 'grid' ) !== 'grid' ),
	);
	// theme options
	wp_localize_script( 'prespa-script', 'prespa_customizer_object', $js_customizer_options );
}
add_action( 'wp_enqueue_scripts', 'prespa_scripts' );

// Add scripts and styles for backend
function prespa_scripts_admin( $hook ) {
	// Styles
	wp_enqueue_style(
		'prespa-style-admin',
		get_template_directory_uri() . '/admin/css/admin.css',
		'',
		filemtime( get_template_directory() . '/admin/css/admin.css' ),
		'all'
	);
}
add_action( 'admin_enqueue_scripts', 'prespa_scripts_admin' );

// Add scripts and styles to the frontend and to the block editor at the same time
function prespa_block_scripts() {
	wp_enqueue_style( 'prespa-block-styles', get_template_directory_uri() . '/assets/css/core-add.css', '', filemtime( get_template_directory() . '/assets/css/core-add.css' ), 'all' );
	wp_enqueue_script( 'prespa-block-scripts', get_template_directory_uri() . '/assets/js/core-add.js', '', filemtime( get_template_directory() . '/assets/css/core-add.css' ), true );
}
add_action( 'enqueue_block_assets', 'prespa_block_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Theme hooks
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Block Patterns
 */

 require get_template_directory() . '/inc/blocks/block-patterns.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom svg icons
 */
require get_template_directory() . '/assets/svg/svg-icons.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* FILTERING SHORTCODE */

/**
 * Modify the 'Return to shop' button URL to point to '/shop/' instead of '/custom-shop/'
 */
add_filter( 'woocommerce_return_to_shop_redirect', 'solarex_change_return_to_shop_url' );
function solarex_change_return_to_shop_url( $url ) {
	return home_url( '/shop/' );
}


function solarex_product_filter_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => '',
        'min_price' => '',
        'max_price' => '',
        'posts_per_page' => 12,
    ), $atts, 'solarex_product_filters');

    // Check for URL parameters
    $category_filter = isset($_POST['category_filter']) ? sanitize_text_field($_POST['category_filter']) : $atts['category'];
    $min_price = isset($_POST['min_price']) ? floatval($_POST['min_price']) : $atts['min_price'];
    $max_price = isset($_POST['max_price']) ? floatval($_POST['max_price']) : $atts['max_price'];

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => intval($atts['posts_per_page']),
        'post_status' => 'publish',
    );

    // Handle category filtering
    if (!empty($category_filter)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $category_filter,
            ),
        );
    }

    $products = new WP_Query($args);

    ob_start();
    ?>
    
    <div class="products-grid" id="products-grid">
        <?php if ($products->have_posts()) : ?>
            <?php while ($products->have_posts()) : $products->the_post(); ?>
                <div class="product-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', array('class' => 'product-image')); ?>
                        <?php else : ?>
                            <div class="product-image" style="background-color: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: #666;">No Image</div>
                        <?php endif; ?>
                        <h3 class="product-title"><?php the_title(); ?></h3>
                    </a>
                    <p class="product-price">
                        <?php
                        $price = get_post_meta(get_the_ID(), '_price', true);
                        if ($price) {
                            echo '₨' . number_format((float)$price, 2);
                        } else {
                            echo 'Price not available';
                        }
                        ?>
                    </p>
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="view-product-btn">View Product</a>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="no-products">No products found matching your criteria.</div>
        <?php endif; ?>
    </div>
    
    <?php if ($products->max_num_pages > 1) : ?>
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total' => $products->max_num_pages,
                'current' => max(1, get_query_var('paged')), // Ensure current page is correct for pagination
                'prev_text' => '‹ Previous',
                'next_text' => 'Next ›',
            ));
            ?>
        </div>
    <?php endif; ?>
    
    <?php
    wp_reset_postdata();
    
    return ob_get_clean(); // Return the buffered output
}
add_shortcode('solarex_product_filters', 'solarex_product_filter_shortcode');

// AJAX handler for product filtering
function solarex_filter_products_ajax() {
    // Check nonce for security
    if (!wp_verify_nonce($_POST['nonce'], 'filter_products_nonce')) {
        wp_die('Security check failed');
    }
    
    // Get filter parameters
    $category_filter = isset($_POST['category_filter']) ? intval($_POST['category_filter']) : 0;
    $min_price = isset($_POST['min_price']) ? floatval($_POST['min_price']) : 0;
    $max_price = isset($_POST['max_price']) ? floatval($_POST['max_price']) : 0;
    
    // Create a new query for products
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );
    
    // Add category filter if selected
    if ($category_filter > 0) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $category_filter,
            ),
        );
    }
    
    // Add price filter
    if ($min_price > 0 || $max_price > 0) {
        $args['meta_query'] = array(
            array(
                'key'     => '_price',
                'value'   => array($min_price, $max_price),
                'type'    => 'NUMERIC',
                'compare' => 'BETWEEN'
            )
        );
    }
    
    $loop = new WP_Query($args);
    
    if ($loop->have_posts()) {
        echo '<div class="products-grid">';
        
        while ($loop->have_posts()) : $loop->the_post();
            global $product;
            
            echo '<div class="product-card">';
            echo '<a href="' . get_permalink() . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
            echo '<div class="product-image">' . $product->get_image() . '</div>';
            echo '<h3 class="product-title">' . $product->get_name() . '</h3>';
            echo '<span class="price">' . $product->get_price_html() . '</span>';
            echo '</a>';
            echo '<a href="' . esc_url(add_query_arg('add-to-cart', $product->get_id(), home_url('/'))) . '" class="button add_to_cart_button">Add to cart</a>';
            echo '</div>';
        endwhile;
        
        echo '</div>';
    } else {
        echo '<p>No products found matching your criteria.</p>';
    }
    
    wp_reset_postdata();
    wp_die(); // Required to terminate AJAX request properly
}
add_action('wp_ajax_filter_products', 'solarex_filter_products_ajax');
add_action('wp_ajax_nopriv_filter_products', 'solarex_filter_products_ajax');

/**
 * Handle AJAX request for getting min/max prices
 */
function solarex_get_min_max_prices_ajax() {
    // Check nonce for security
    if (!wp_verify_nonce($_POST['nonce'], 'filter_products_nonce')) {
        wp_die('Security check failed');
    }
    
    // Get category filter if provided
    $category_filter = isset($_POST['category_filter']) ? intval($_POST['category_filter']) : 0;
    
    // Build query args
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );
    
    // Add category filter if selected
    if ($category_filter > 0) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $category_filter,
            ),
        );
    }
    
    $loop = new WP_Query($args);
    
    $prices = array();
    
    if ($loop->have_posts()) {
        while ($loop->have_posts()) : $loop->the_post();
            global $product;
            if ($product && $product->is_visible()) {
                $price = $product->get_price();
                if ($price !== '') {
                    $prices[] = $price;
                }
            }
        endwhile;
    }
    
    wp_reset_postdata();
    
    if (!empty($prices)) {
        $min_price = min($prices);
        $max_price = max($prices);
    } else {
        $min_price = 0;
        $max_price = 10000; // Default max price
    }
    
    wp_send_json_success(array('min_price' => $min_price, 'max_price' => $max_price));
}
add_action('wp_ajax_get_min_max_prices', 'solarex_get_min_max_prices_ajax');
add_action('wp_ajax_nopriv_get_min_max_prices', 'solarex_get_min_max_prices_ajax');

function get_max_product_price() {
    global $wpdb;
    $max_price = $wpdb->get_var("
        SELECT MAX(meta_value.meta_value) 
        FROM {$wpdb->posts} AS posts
        LEFT JOIN {$wpdb->postmeta} AS meta_value ON posts.ID = meta_value.post_id
        WHERE posts.post_type = 'product'
        AND posts.post_status = 'publish'
        AND meta_value.meta_key = '_price'
    ");
    return $max_price;
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/* Include Theme Options Page for Admin */
if ( current_user_can( 'manage_options' ) ) {
	require_once 'admin/theme-intro.php';
	require_once get_template_directory() . '/admin/notices.php';
	require_once get_template_directory() . '/admin/welcome-notice.php';
}

/**
 * starter content
 */
require get_template_directory() . '/starter-content/init.php';

function solarex_enqueue_scripts() {
    wp_enqueue_style('solarex-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'));
    wp_enqueue_style('solarex-custom-styles', get_template_directory_uri() . '/assets/css/solarex-custom-styles.css', array(), filemtime(get_template_directory() . '/assets/css/solarex-custom-styles.css'));
    wp_enqueue_style('solarex-dev-woo', get_stylesheet_directory_uri() . '/dev-woo.css', array(), filemtime(get_stylesheet_directory() . '/dev-woo.css'));

    if (is_page_template('page-shop.php') || (class_exists('WooCommerce') && is_woocommerce())) {
        wp_enqueue_style('jquery-ui-css', 'https://code.jquery.com/ui/1.13.2/themes/ui-lightness/jquery-ui.css');
        wp_localize_script('jquery', 'solarex_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
        ));
    }
}
add_action('wp_enqueue_scripts', 'solarex_enqueue_scripts');

function solarex_get_max_product_price() {
    global $wpdb;
    
    $max_price = $wpdb->get_var("
        SELECT MAX(CAST(meta_value AS DECIMAL(10, 2))) 
        FROM {$wpdb->postmeta} 
        WHERE meta_key = '_price' 
        AND meta_value != ''
    ");
    
    return $max_price ? round($max_price) : 1000;
}

function solarex_filter_products_fresh() {
    parse_str($_POST['formData'], $form_data);
    
    $category_filter = isset($form_data['category_filter']) ? intval($form_data['category_filter']) : 0;
    $min_price = isset($form_data['min_price']) ? floatval($form_data['min_price']) : 0;
    $max_price = isset($form_data['max_price']) ? floatval($form_data['max_price']) : solarex_get_max_product_price();
    
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );
    
    if ($category_filter > 0) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $category_filter,
            ),
        );
    }
    
    if ($min_price > 0 || $max_price < solarex_get_max_product_price()) {
        $args['meta_query'] = array(
            array(
                'key'     => '_price',
                'value'   => array($min_price, $max_price),
                'type'    => 'NUMERIC',
                'compare' => 'BETWEEN'
            )
        );
    }
    
    $loop = new WP_Query($args);
    
    if ($loop->have_posts()) {
        echo '<div class="products-grid">';
        
        while ($loop->have_posts()) : $loop->the_post();
            global $product;
            
            echo '<div class="product-card">';
            echo '<a href="' . get_permalink() . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
            echo '<div class="product-image">' . $product->get_image() . '</div>';
            echo '<h3 class="product-title">' . $product->get_name() . '</h3>';
            echo '<span class="price">' . $product->get_price_html() . '</span>';
            echo '</a>';
            
            // Ensure consistent add to cart button display for AJAX loaded products
            if (function_exists('woocommerce_template_loop_add_to_cart')) {
                woocommerce_template_loop_add_to_cart();
            } else {
                // Fallback implementation with proper WooCommerce classes and attributes
                $defaults = array(
                    'quantity' => 1,
                    'class' => implode(' ', array_filter(array(
                        'button',
                        'add_to_cart_button',
                        'product_type_' . $product->get_type(),
                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                        $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart' : ''
                    ))),
                );
                
                $args = apply_filters('woocommerce_loop_add_to_cart_args', $defaults, $product);
                
                if ($product->is_purchasable() && $product->is_in_stock()) {
                    echo sprintf(
                        '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
                        esc_url($product->add_to_cart_url()),
                        esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
                        esc_attr(isset($args['class']) ? $args['class'] : 'button'),
                        isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
                        esc_html($product->add_to_cart_text())
                    );
                }
            }
            
            echo '</div>';
        endwhile;
        
        echo '</div>';
    } else {
        echo '<p>No products found matching your criteria.</p>';
    }
    
    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_filter_products_fresh', 'solarex_filter_products_fresh');
add_action('wp_ajax_nopriv_filter_products_fresh', 'solarex_filter_products_fresh');

function solarex_ajax_add_to_cart() {
    if (!isset($_POST['product_id'])) {
        wp_die();
    }
    
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);
    
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity) && 'publish' === $product_status) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);
        wc_add_to_cart_message(array($product_id => $quantity), true);
        WC_AJAX::get_refreshed_fragments();
    } else {
        wp_send_json_error(array(
            'notices' => wc_get_notices('error')
        ));
        wc_clear_notices();
    }
    
    wp_die();
}
add_action('wp_ajax_woocommerce_add_to_cart', 'solarex_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_add_to_cart', 'solarex_ajax_add_to_cart');
