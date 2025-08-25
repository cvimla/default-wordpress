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

    // Handle price filtering
    if (!empty($min_price) || !empty($max_price)) {
        $args['meta_query'] = array('relation' => 'AND');

        if (!empty($min_price)) {
            $args['meta_query'][] = array(
                'key' => '_price',
                'value' => $min_price,
                'compare' => '>=',
                'type' => 'NUMERIC'
            );
        }

        if (!empty($max_price)) {
            $args['meta_query'][] = array(
                'key' => '_price',
                'value' => $max_price,
                'compare' => '<=',
                'type' => 'NUMERIC'
            );
        }
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



/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
 * Handle AJAX request for getting min/max prices
 */
function solarex_get_min_max_prices_ajax() {
    // Check nonce for security
    if (!wp_verify_nonce($_POST['nonce'], 'filter_products_nonce')) {
        wp_send_json_error('Security check failed');
    }
    
    // Get category filter if provided
    $category_filter = isset($_POST['category_filter']) ? intval($_POST['category_filter']) : 0;
    
    // Build query args
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_key' => '_price',
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
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
                if ($price !== '' && is_numeric($price)) {
                    $prices[] = (float)$price;
                }
            }
        endwhile;
    }
    
    wp_reset_postdata();
    
    $response = array();
    
    if (!empty($prices)) {
        $response['min_price'] = floor(min($prices));
        $response['max_price'] = ceil(max($prices));
    } else {
        $response['min_price'] = 0;
        $response['max_price'] = 10000; // Default max price
    }
    
    // Add some padding to the price range
    $range_padding = max(10, ($response['max_price'] - $response['min_price']) * 0.1);
    
    $response['min_price'] = max(0, $response['min_price'] - $range_padding);
    $response['max_price'] += $range_padding;
    
    wp_send_json_success($response);
}
add_action('wp_ajax_get_min_max_prices', 'solarex_get_min_max_prices_ajax');
add_action('wp_ajax_nopriv_get_min_max_prices', 'solarex_get_min_max_prices_ajax');

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

/**
 * Enqueue scripts and styles
 */
function solarex_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('solarex-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'));

    // Enqueue custom styles
    wp_enqueue_style('solarex-custom-styles', get_template_directory_uri() . '/assets/css/solarex-custom-styles.css', array(), filemtime(get_template_directory() . '/assets/css/solarex-custom-styles.css'));

    // Enqueue dev WooCommerce style
    wp_enqueue_style('solarex-dev-woo', get_stylesheet_directory_uri() . '/dev-woo.css', array(), filemtime(get_stylesheet_directory() . '/dev-woo.css'));

    // Enqueue main script
    wp_enqueue_script('solarex-navigation', get_template_directory_uri() . '/js/navigation.js', array(), filemtime(get_template_directory() . '/js/navigation.js'), true);

    // Enqueue shop scripts (conditionally)
    if (is_page_template('page-shop.php') || (class_exists('WooCommerce') && is_woocommerce())) {
        // Enqueue jQuery UI components
        wp_enqueue_script('jquery-ui-slider');
        wp_enqueue_style('jquery-ui-style', 'https://code.jquery.com/ui/1.13.2/themes/ui-lightness/jquery-ui.css', array(), '1.13.2');

        // Enqueue shop-specific script
        wp_enqueue_script('solarex-shop-scripts', get_template_directory_uri() . '/assets/js/solarex-shop-scripts.js', array('jquery', 'jquery-ui-slider'), filemtime(get_template_directory() . '/assets/js/solarex-shop-scripts.js'), true);

        // Localize script with AJAX URL and nonce
        wp_localize_script('solarex-shop-scripts', 'solarex_shop_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('filter_products_nonce')
        ));
    }
}
add_action('wp_enqueue_scripts', 'solarex_enqueue_scripts');
?>
