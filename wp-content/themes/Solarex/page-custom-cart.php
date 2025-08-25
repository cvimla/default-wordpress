<?php
/**
 * Template Name: Solarex Custom Cart
 *
 * This is the template for the WooCommerce Cart page with Solarex design.
 *
 * @package Solarex
 */

get_header();

// Ensure WordPress environment is loaded if this file is accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>


<body>



    <!-- Main Content Area for Cart -->
    <section class="container py-4">
        <?php
        // This will render the WooCommerce cart content using the shortcode
        echo do_shortcode('[woocommerce_cart]');
        ?>
    </section>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update current year in footer
            const currentYearSpan = document.getElementById('currentYear');
            if (currentYearSpan) { // Add check to ensure element exists
                currentYearSpan.textContent = new Date().getFullYear();
            }
        });
    </script>
</body>
<?php get_footer(); ?>