<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Prespa
 */

get_header();
?>

<style>
        /* Global Styles & Resets */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #ffffff;
            background-color: #0e131f; /* Secondary color */
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }
        h1, h2, h3, h4, h5, h6 {
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-weight: 700;
            line-height: 1.2;
            color: #ffffff;
        }
        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }
        a {
            color: #a4ff3d; /* Primary color for links */
            text-decoration: none;
        }
        a:hover {
            color: #d6ff7f; /* Lighter primary for hover */
            text-decoration: underline;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Utility Classes (mimicking common patterns for responsive layout) */
        .container {
            width: 100%;
            padding-right: 1rem;
            padding-left: 1rem;
            margin-right: auto;
            margin-left: auto;
            max-width: 1200px; /* Adjust as needed */
        }
        .d-flex { display: flex; }
        .flex-wrap { flex-wrap: wrap; }
        .justify-content-between { justify-content: space-between; }
        .justify-content-center { justify-content: center; }
        .align-items-center { align-items: center; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .m-0 { margin: 0; }
        .mb-1 { margin-bottom: 0.25rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-3 { margin-bottom: 1rem; }
        .mb-4 { margin-bottom: 1.5rem; }
        .mt-4 { margin-top: 1.5rem; }
        .py-4 { padding-top: 1.5rem; padding-bottom: 1.5rem; }
        .px-3 { padding-left: 1rem; padding-right: 1rem; }
        .p-3 { padding: 1rem; }
        .p-4 { padding: 1.5rem; }
        .rounded { border-radius: 0.5rem; }
        .shadow { box-shadow: 0 4px 8px rgba(0,0,0,0.2); }

        /* Specific Component Styles */
        .top-bar {
            background-color: #f0f0f0;
            height: 2.5rem;
            font-size: 0.875rem;
            color: #000000;
            display: flex;
            align-items: center;
        }
        .top-bar .social-icon {
            color: #0e131f;
            margin-left: 0.5rem;
            font-size: 1rem;
        }
        .top-bar .contact-info {
            margin-left: 1rem;
        }

        .navbar {
            background-color: #0e131f;
            padding: 1rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-brand {
            font-size: 1.5rem;
            color: #ffffff;
            font-weight: 700;
        }
        .navbar-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .nav-item {
            margin-left: 1.5rem;
        }
        .nav-link {
            color: #ffffff;
            font-weight: 400;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #a4ff3d;
            text-decoration: none;
        }
        .specialist-btn {
            background-color: #a4ff3d;
            color: #000000;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .specialist-btn:hover {
            background-color: #d6ff7f;
        }
        .search-bar {
            background-color: #1a1a1a;
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            width: 250px; /* Adjust as needed */
        }
        .search-bar input {
            background: none;
            border: none;
            outline: none;
            color: #ffffff;
            width: 100%;
        }
        .search-bar input::placeholder {
            color: #777777;
        }
        .icon-btn {
            background: none;
            border: none;
            color: #a4ff3d;
            font-size: 1.2rem;
            cursor: pointer;
            margin-left: 0.5rem;
        }

        .breadcrumb-nav {
            background-color: #0e131f;
            padding: 0.75rem 0;
            font-size: 0.9rem;
            color: #777777;
        }
        .breadcrumb-nav a {
            color: #777777;
        }
        .breadcrumb-nav a:hover {
            color: #a4ff3d;
        }
        .breadcrumb-nav span {
            margin: 0 0.5rem;
        }

        .product-detail-section {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            padding: 3rem 0;
        }
        .product-image-gallery {
            flex: 1;
            min-width: 300px;
            max-width: 500px;
            background-color: #1a1a1a;
            border-radius: 1rem;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
        }
        .main-product-image {
            width: 100%;
            height: auto;
            max-width: 400px;
            object-fit: contain;
            margin-bottom: 1.5rem;
        }
        .thumbnail-gallery {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }
        .thumbnail-gallery img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            background-color: #0e131f;
            border: 2px solid #777777;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }
        .thumbnail-gallery img:hover, .thumbnail-gallery img.active {
            border-color: #a4ff3d;
        }

        .product-info {
            flex: 2;
            min-width: 300px;
            background-color: #0e131f;
            padding: 2rem;
            border-radius: 1rem;
        }
        .product-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #a4ff3d;
        }
        .product-tagline {
            font-size: 1.2rem;
            color: #ffffff;
            margin-bottom: 2rem;
        }
        .feature-section {
            margin-bottom: 2rem;
        }
        .feature-section h3 {
            font-size: 1.5rem;
            color: #ffffff;
            margin-bottom: 1rem;
        }
        .feature-section ul {
            list-style: none;
            padding: 0;
        }
        .feature-section li {
            color: #ffffff;
            margin-bottom: 0.5rem;
            font-size: 1rem;
            position: relative;
            padding-left: 1.5rem;
        }
        .feature-section li::before {
            content: '•'; /* Bullet point */
            color: #a4ff3d;
            position: absolute;
            left: 0;
        }

        .product-price {
            font-size: 2.2rem;
            font-weight: 700;
            color: #a4ff3d;
            margin-top: 2rem;
            margin-bottom: 1.5rem;
        }
        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .quantity-selector span {
            font-size: 1.2rem;
            color: #ffffff;
            margin-right: 1rem;
        }
        .quantity-control {
            display: flex;
            align-items: center;
            background-color: #1a1a1a;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .quantity-btn {
            background-color: #a4ff3d;
            color: #000000;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .quantity-btn:hover {
            background-color: #d6ff7f;
        }
        .quantity-display {
            padding: 0.5rem 1rem;
            color: #ffffff;
            font-size: 1.2rem;
            min-width: 50px;
            text-align: center;
        }
        .add-to-cart-btn {
            background-color: #a4ff3d;
            color: #000000;
            padding: 0.8rem 2rem;
            border-radius: 0.5rem;
            font-weight: 700;
            font-size: 1.1rem;
            margin-left: 1.5rem;
            transition: background-color 0.3s ease;
        }
        .add-to-cart-btn:hover {
            background-color: #d6ff7f;
        }
        .stock-info {
            color: #777777;
            font-size: 0.9rem;
            margin-top: 0.5rem;
            margin-left: 1.5rem;
        }
        .email-notify-group {
            display: flex;
            margin-top: 2rem;
        }
        .email-notify-group input {
            flex-grow: 1;
            padding: 0.8rem 1rem;
            border: 1px solid #777777;
            background-color: #1a1a1a;
            color: #ffffff;
            border-radius: 0.5rem;
            margin-right: 1rem;
        }
        .email-notify-group input::placeholder {
            color: #777777;
        }
        .notify-btn {
            background-color: #777777; /* Muted color for notify */
            color: #ffffff;
            padding: 0.8rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .notify-btn:hover {
            background-color: #999999;
        }

        .footer {
            background-color: #0e131f;
            color: #ffffff;
            padding: 3rem 0;
            text-align: center;
        }
        .footer-logo {
            width: 100px; /* Adjust as needed */
            height: auto;
            margin-bottom: 1rem;
        }
        .footer-contact-info {
            font-size: 0.9rem;
            color: #ffffff;
            margin-bottom: 1.5rem;
        }
        .footer-contact-info p {
            margin: 0.2rem 0;
        }
        .footer-contact-info a {
            color: #a4ff3d;
        }
        .footer-links-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 2rem;
        }
        .footer-links-column {
            flex: 1;
            min-width: 180px;
            margin: 0 1rem;
            text-align: left;
        }
        .footer-links-column h5 {
            font-size: 1rem;
            margin-bottom: 1rem;
            color: #a4ff3d;
        }
        .footer-links-column ul li {
            margin-bottom: 0.5rem;
        }
        .footer-links-column a {
            color: #ffffff;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        .footer-links-column a:hover {
            color: #a4ff3d;
        }
        .footer-social-icons {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .footer-social-icons a {
            color: #ffffff;
            margin: 0 0.5rem;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        .footer-social-icons a:hover {
            color: #a4ff3d;
        }
        .footer-copyright {
            color: #777777;
            font-size: 0.85rem;
            margin-top: 1rem;
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
            .navbar-nav, .search-bar, .icon-btn:not(.menu-toggle) {
                display: none; /* Hide some elements on small screens */
            }
            .navbar {
                flex-wrap: wrap;
                justify-content: center;
            }
            .navbar-brand {
                margin-bottom: 1rem;
            }
            .top-bar .contact-info, .top-bar .social-icon:not(:first-child) {
                display: none;
            }
            .top-bar .specialist-btn {
                display: none;
            }
            .product-detail-section {
                flex-direction: column;
                align-items: center;
            }
            .product-image-gallery, .product-info {
                width: 100%;
                max-width: 100%;
                padding: 1.5rem;
            }
            .product-title {
                font-size: 2rem;
            }
            .product-price {
                font-size: 1.8rem;
            }
            .quantity-selector {
                flex-direction: column;
                align-items: flex-start;
            }
            .quantity-control {
                margin-bottom: 1rem;
            }
            .add-to-cart-btn {
                margin-left: 0;
                width: 100%;
            }
            .stock-info {
                margin-left: 0;
                text-align: left;
            }
            .email-notify-group {
                flex-direction: column;
            }
            .email-notify-group input {
                margin-right: 0;
                margin-bottom: 1rem;
            }
            .notify-btn {
                width: 100%;
            }
            .footer-links-group {
                flex-direction: column;
                align-items: center;
            }
            .footer-links-column {
                text-align: center;
                margin-bottom: 1.5rem;
            }
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
            <li class="nav-item"><a href="#" class="nav-link">PRODUCTS</a></li>
            <li class="nav-item"><a href="#" class="nav-link">CLEARANCE SALES</a></li>
            <li class="nav-item"><a href="#" class="nav-link">CONTACT US</a></li>
        </ul>
        <div class="d-flex align-items-center">
            <div class="search-bar">
                <input type="text" placeholder="Keywords, Product Name, etc.">
                <button class="icon-btn">&#x1F50D;</button> <!-- Search icon -->
            </div>
            <button class="icon-btn" style="margin-left: 1rem;">&#x1F464; SIGN IN</button> <!-- User icon -->
            <button class="icon-btn" style="margin-left: 1rem;">&#x1F6CD; VIEW CART</button> <!-- Cart icon -->
        </div>
    </div>
</nav>

<!-- Breadcrumb -->
<div class="breadcrumb-nav">
    <div class="container">
        <?php woocommerce_breadcrumb(); ?>
    </div>
</div>

<!-- Product Detail Section -->
<section class="container product-detail-section">
    <?php
    while ( have_posts() ) :
        the_post();
        // Ensure $product is available and is a WC_Product object
        $product = wc_get_product( get_the_ID() );

        // Check if it's a WooCommerce product and the product object is valid
        if ( $product && is_a( $product, 'WC_Product' ) ) : // Added is_a check for robustness
    ?>
        <div class="product-image-gallery">
            <?php
            // Main Product Image
            echo $product->get_image( 'full', array( 'class' => 'main-product-image' ) );
            ?>
            <div class="thumbnail-gallery">
                <?php
                // This action hook typically displays product thumbnails
                // We need to ensure it's styled correctly by the CSS above
                do_action('woocommerce_product_thumbnails');
                ?>
            </div>
        </div>

        <div class="product-info">
            <h1 class="product-title"><?php the_title(); ?></h1>
            <p class="product-tagline"><?php echo apply_filters('woocommerce_short_description', $post->post_excerpt); ?></p>

            <div class="feature-section">
                <h3>Simple</h3>
                <ul>
                    <li>Eliminate quick installation</li>
                    <li>Easy working mode, set and forget</li>
                    <li>Automatic ON/OFF-Grid switching time &lt;10ms</li>
                </ul>
            </div>

            <div class="feature-section">
                <h3>Efficient</h3>
                <ul>
                    <li>160% PV oversizing, 110% overstock output</li>
                    <li>150-600V wide battery voltage range, 35A fast charge/discharge</li>
                    <li>16A PV current wide adaptation</li>
                </ul>
            </div>

            <div class="feature-section">
                <h3>Intelligent</h3>
                <ul>
                    <li>Smart working logic</li>
                    <li>Generator & heat pump control</li>
                    <li>Mobile & PC platform management</li>
                </ul>
            </div>

            <div class="product-price"><?php echo $product->get_price_html(); ?></div>

            <form class="cart" method="post" enctype="multipart/form-data">
                <div class="d-flex align-items-center mb-3">
                    <span style="font-size: 1.2rem; color: #ffffff; margin-right: 1rem;">Quantity</span>
                    <?php woocommerce_quantity_input(); ?>
                    <button type="submit" class="add-to-cart-btn"><?php esc_html_e('Add to Cart', 'woocommerce'); ?></button>
                </div>
            </form>
            <div class="stock-info"><?php echo wc_get_stock_html( $product ); ?></div>

            <div class="email-notify-group">
                <input type="email" placeholder="your email address">
                <button class="notify-btn">Notify Me</button>
            </div>
        </div>
    <?php
        else :
            // Fallback for non-product single posts if needed, or just display default content
            get_template_part( 'template-parts/content', get_post_type() );
            // Removed theme-specific functions that might not exist or cause issues
            // prespa_auhor_box_markup();
            // prespa_the_post_navigation();
            // prespa_display_related_posts();
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        endif;
    endwhile; // End of the loop.
    ?>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-start" style="text-align: left;">
            <div style="flex: 1; min-width: 250px; margin-bottom: 2rem;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand d-flex align-items-center mb-3">
                    <img src="https://unsplash.com/photos/a-close-up-of-a-solar-panel-on-a-sunny-day-92xL0sK18kY/download?force=true&w=64&h=64" alt="Solarex Logo" style="height: 30px; margin-right: 10px;">
                    SOLAREX
                </a>
                <div class="footer-contact-info">
                    <p>&#x260E; +230 220 0050</p>
                    <p>&#x1F4CD; 191/7, La Tour Koenig, Industrial Park, Port Aux Sables, TROU Mauritius</p>
                    <p>&#x2709; <a href="mailto:energy@unitmount.com">energy@unitmount.com</a></p>
                </div>
            </div>

            <div class="footer-links-group">
                <div class="footer-links-column">
                    <h5>OUR SOLAR SOLUTIONS</h5>
                    <ul>
                        <li><a href="#">Residential Solar</a></li>
                        <li><a href="#">Commercial Solar</a></li>
                        <li><a href="#">Industrial Solar</a></li>
                        <li><a href="#">Solar Inverters</a></li>
                        <li><a href="#">Mounting Systems</a></li>
                    </ul>
                </div>
                <div class="footer-links-column">
                    <h5>OUR PROJECTS</h5>
                    <ul>
                        <li><a href="#">Recent Installations</a></li>
                        <li><a href="#">Case Studies</a></li>
                        <li><a href="#">Upcoming Projects</a></li>
                    </ul>
                </div>
                <div class="footer-links-column">
                    <h5>OUR SERVICES</h5>
                    <ul>
                        <li><a href="#">Consultation</a></li>
                        <li><a href="#">Installation</a></li>
                        <li><a href="#">Maintenance</a></li>
                        <li><a href="#">Energy Audits</a></li>
                    </ul>
                </div>
                <div class="footer-links-column">
                    <h5>FUNDING SOLUTIONS</h5>
                    <ul>
                        <li><a href="#">Financing Options</a></li>
                        <li><a href="#">Government Grants</a></li>
                        <li><a href="#">Investment Plans</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr style="border-color: #777777; margin-top: 2rem; margin-bottom: 1rem;">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <p class="footer-copyright m-0">Copyright © <span id="currentYear"></span> Solarex. Powered by WEB COMPANIONZ</p>
            <div class="footer-social-icons m-0">
                <a href="#" style="color: #ffffff;">&#x1F465;</a> <!-- LinkedIn -->
                <a href="#" style="color: #ffffff;">&#x1F4F7;</a> <!-- Instagram -->
                <a href="#" style="color: #0e131f;">&#x1F426;</a> <!-- Twitter -->
            </div>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update current year in footer
        const currentYearSpan = document.getElementById('currentYear');
        if (currentYearSpan) { // Add check to ensure element exists
            currentYearSpan.textContent = new Date().getFullYear();
        }
    });
</script>

<?php get_footer(); ?>