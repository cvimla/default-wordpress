<?php
get_header();

$max_price = 0;
if (function_exists('solarex_get_max_product_price')) {
    $max_price = solarex_get_max_product_price();
}
?>

<style>
    /* Interactive Price Slider Styling */
    .price-filter-section {
        margin-top: 30px;
        padding: 20px;
        background: #1a1a1a;
        border-radius: 8px;
    }
    
    .price-slider-container {
        margin: 20px 0;
        position: relative;
    }
    
    #price-range-slider {
        width: 100%;
        height: 8px;
        background: #ddd;
        border-radius: 4px;
        position: relative;
        margin: 30px 0 15px 0;
        border: 1px solid #999;
    }
    
    #price-range-slider .ui-slider-range {
        background: #a4ff3d;
        border-radius: 4px;
        height: 100%;
    }
    
    #price-range-slider .ui-slider-handle {
        width: 20px;
        height: 20px;
        background: #0e131f;
        border: 2px solid #a4ff3d;
        border-radius: 50%;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        margin-left: -10px;
        cursor: pointer;
        z-index: 2;
        box-shadow: 0 0 5px rgba(0,0,0,0.5);
    }
    
    #price-range-slider .ui-slider-handle:focus {
        outline: none;
        box-shadow: 0 0 8px #a4ff3d;
    }
    
    #price-range-slider .ui-slider-handle:hover {
        background: #1a1a1a;
    }
    
    .slider-labels {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        color: #ffffff;
        font-weight: bold;
    }
    
    #price-range-display {
        display: block;
        text-align: center;
        margin-top: 15px;
        font-weight: bold;
        color: #ffffff;
    }
    
    .filter-button {
        background: #a4ff3d;
        color: #000;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
        margin-top: 20px;
    }
    
    .filter-button:hover {
        background: #d6ff7f;
    }
    
    /* Enhanced product card styling */
    .product-card {
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 30px;
        text-align: center;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }
    
    .product-image {
        margin-bottom: 15px;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .product-image img {
        max-width: 100%;
        max-height: 100%;
        height: auto;
        object-fit: contain;
    }
    
    .product-title {
        font-size: 18px;
        margin: 15px 0;
        color: #333;
        font-weight: 600;
    }
    
    .price {
        font-weight: bold;
        color: #333;
        display: block;
        margin: 15px 0;
        font-size: 18px;
    }
    
    .price del {
        color: #999;
        font-size: 0.9em;
    }
    
    .price ins {
        background: none;
        color: #e74c3c;
        font-weight: bold;
        text-decoration: none;
    }
    
    /* Add to Cart button styling */
    .add_to_cart_button {
        background: #a4ff3d;
        color: #000;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        margin-top: 15px;
        transition: all 0.3s ease;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .add_to_cart_button:hover {
        background: #d6ff7f;
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    
    .add_to_cart_button:active {
        transform: translateY(0);
    }
    
    .add_to_cart_button.added {
        display: none;
    }
    
    .added_to_cart {
        background: #a4ff3d;
        color: #000;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        text-decoration: none;
        display: inline-block;
        margin-top: 15px;
        transition: all 0.3s ease;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
</style>

<!-- Top Bar -->
<div class="top-bar">
    <div class="container d-flex justify-content-between align-items-center" style="height: 100%;">
        <div class="d-flex align-items-center">
            <span style="color: #000000; margin-right: 0.5rem;">&#x260E; CALL TODAY</span>
            <span style="color: #000000;">+230 220 0050</span>
            <span style="color: #000000; margin-left: 1.5rem; margin-right: 0.5rem;">&#x1F4CD;</span>
            <span style="color: #000000;">191/7, La Tour Koenig, Industrial Park, Port Aux Sables, TROU Mauritius</span>
        </div>
        <div class="d-flex align-items-center">
            <a href="#" class="social-icon" style="color: #0e131f;">&#x1F465;</a> <!-- LinkedIn -->
            <a href="#" class="social-icon" style="color: #0e131f;">&#x1F4F7;</a> <!-- Instagram -->
            <a href="#" class="social-icon" style="color: #0e131f;">&#x1F426;</a> <!-- Twitter -->
        </div>
        <a href="#" class="specialist-btn">SPECIALIST EPCM</a>
</div>
</div>

<!-- Navbar -->
<nav class="navbar">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand d-flex align-items-center">
            <img src="https://unsplash.com/photos/a-close-up-of-a-solar-panel-on-a-sunny-day-92xL0sK18kY/download?force=true&w=64&h=64" alt="Solarex Logo" style="height: 30px; margin-right: 10px;">
            SOLAREX
        </a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="nav-link">PRODUCTS</a></li>
            <li class="nav-item"><a href="#" class="nav-link">CLEARANCE SALES</a></li>
            <li class="nav-item"><a href="#" class="nav-link">CONTACT US</a></li>
        </ul>
        <div class="d-flex align-items-center">
            <div class="search-bar">
                <input type="text" placeholder="Keywords, Product Name, etc.">
                <button class="icon-btn">&#x1F50D;</button> <!-- Search icon -->
            </div>
            <button class="icon-btn" style="margin-left: 1rem;">&#x1F464; SIGN IN</button> <!-- User icon -->
            <button class="icon-btn" style="margin-left: 1rem;" onclick="window.location.href='<?php echo wc_get_cart_url(); ?>'">&#x1F6CD; VIEW CART</button> <!-- Cart icon -->
        </div>
    </div>
</nav>

<!-- Breadcrumb -->
<div class="breadcrumb-nav">
    <div class="container">
        <?php woocommerce_breadcrumb(); ?>
    </div>
</div>

<div class="shop-container">
    <div class="shop-wrapper">
        <!-- Left Sidebar -->
        <aside class="shop-sidebar">
            <h1 class="sidebar-title">Select<br>Models</h1>
            
            <form id="product-filter-form">
                <div class="filter-section">
                    <!-- All Products Filter -->
                    <div class="filter-item">
                        <input type="radio" name="category_filter" value="" id="all_products" checked>
                        <label for="all_products">ALL</label>
                    </div>
                    
                    <!-- Dynamic Category Filters -->
                    <?php
                    // Get product categories
                    $categories = get_terms( array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                        'parent' => 0 // Only top-level categories
                    ) );
                    
                    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                        foreach ( $categories as $category ) {
                            echo '<div class="filter-item">';
                            echo '<input type="radio" name="category_filter" value="' . esc_attr( $category->term_id ) . '" id="cat_' . esc_attr( $category->term_id ) . '">';
                            echo '<label for="cat_' . esc_attr( $category->term_id ) . '">' . esc_html( $category->name ) . '</label>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>

                <!-- Interactive Price Slider Section -->
                <div class="price-filter-section">
                    <h3>Price Range</h3>
                    <div class="price-slider-container">
                        <div id="price-range-slider"></div>
                        <div class="slider-labels">
                            <span>₨0</span>
                            <span>₨<?php echo number_format($max_price); ?></span>
                        </div>
                        <span id="price-range-display">₨0 - ₨<?php echo number_format($max_price); ?></span>
                        <input type="hidden" name="min_price" id="min_price" value="0">
                        <input type="hidden" name="max_price" id="max_price" value="<?php echo $max_price; ?>">
                    </div>
                    <button type="submit" class="filter-button">FILTER PRODUCTS</button>
                </div>
            </form>
        </aside>

        <!-- Products Section -->
        <main class="products-section">
            <div class="section-header">
                <h2 class="page-title">Our Products</h2>
            </div>

            <div class="loading-spinner" id="loading-spinner" style="display: none;">
                Loading products...
            </div>

            <div id="products-container">
                <?php
                // Get current category filter
                $current_category = isset($_GET['category_filter']) ? intval($_GET['category_filter']) : 0;
                
                // Create a new query for products
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                );
                
                // Add category filter if selected
                if ($current_category > 0) {
                    $args['product_cat'] = get_term_by('id', $current_category, 'product_cat')->slug;
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
                        
                        // Display price with strikethrough for sale products
                        echo '<span class="price">' . $product->get_price_html() . '</span>';
                        
                        echo '</a>';
                        
                        // Ensure WooCommerce functions are available and properly display add to cart button
                        if (function_exists('woocommerce_template_loop_add_to_cart')) {
                            woocommerce_template_loop_add_to_cart();
                        } else {
                            // Fallback to manual button creation with better error handling
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
                    echo '<p>No products found</p>';
                }
                wp_reset_postdata();
                ?>
            </div>
        </main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
jQuery(document).ready(function($) {
    // Initialize an interactive price slider with draggable knob
    if ($("#price-range-slider").length) {
        $("#price-range-slider").slider({
            range: true, // Two knobs for min and max
            min: 0,
            max: <?php echo $max_price; ?>,
            values: [0, <?php echo $max_price; ?>], // Start with both knobs at ends
            slide: function(event, ui) {
                $("#price-range-display").text("₨" + ui.values[0] + " - ₨" + ui.values[1]);
                $("#min_price").val(ui.values[0]);
                $("#max_price").val(ui.values[1]);
            }
        });
        $("#price-range-display").text("₨0 - ₨<?php echo number_format($max_price); ?>");
        $("#min_price").val(0);
        $("#max_price").val(<?php echo $max_price; ?>);
    }
    
    // Handle form submission for filtering
    $('#product-filter-form').on('submit', function(e) {
        e.preventDefault();
        filterProducts();
    });
    
    // Handle immediate filtering when category is selected
    $('input[name="category_filter"]').on('change', function() {
        filterProducts();
    });
    
    // Function to filter products
    function filterProducts() {
        // Show loading spinner
        $('#loading-spinner').show();
        
        // Get form data
        var formData = $('#product-filter-form').serialize();
        
        // AJAX request to filter products
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'filter_products_fresh',
                formData: formData
            },
            success: function(response) {
                // Hide loading spinner
                $('#loading-spinner').hide();
                
                // Update products container with filtered results
                $('#products-container').html(response);
                
                // Re-bind add to cart functionality for AJAX loaded products
                bindAddToCartButtons();
            },
            error: function(xhr, status, error) {
                // Hide loading spinner
                $('#loading-spinner').hide();
                
                console.log('AJAX Error: ' + error);
                alert('Something went wrong. Please try again.');
            }
        });
    }
    
    // Bind add to cart functionality for dynamically loaded products
    function bindAddToCartButtons() {
        // Handle add to cart buttons for AJAX loaded products
        $('.add_to_cart_button').off('click').on('click', function(e) {
            e.preventDefault();
            
            var $thisbutton = $(this);
            var product_id = $thisbutton.data('product_id');
            
            // Try to get product ID from URL if not in data attribute
            if (!product_id) {
                var urlParams = new URLSearchParams($thisbutton.attr('href'));
                product_id = urlParams.get('add-to-cart');
            }
            
            if (!product_id) {
                return;
            }
            
            var data = {
                action: 'woocommerce_add_to_cart',
                product_id: product_id
            };
            
            // Trigger WooCommerce event
            $(document.body).trigger('adding_to_cart', [$thisbutton, data]);
            
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response.error && response.product_url) {
                        window.location = response.product_url;
                        return;
                    }
                    
                    if (response.success) {
                        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                    } else {
                        console.log('Add to cart error');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Add to cart error: ' + error);
                }
            });
        });
    }
    
    // Bind add to cart buttons on initial page load
    bindAddToCartButtons();
    
    // Handle added to cart event
    $(document.body).on('added_to_cart', function() {
        $('.add_to_cart_button.added').hide();
    });
});
</script>

<?php get_footer(); ?>