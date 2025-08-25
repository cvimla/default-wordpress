<?php
/**
 * Template Name: Sale Products Grid
 */
get_header();
?>


<style>
body {
    background-color: #0e131f;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

.sale-heading {
    text-align: center;
    color: #fff;
    font-size: 3rem;
    margin-top: 0px;
    padding-top: 260px;
    margin-bottom: 40px;
    font-weight: bold;
}

.sale-grid {
    max-width: 1200px;
    margin: 0 auto 80px;
    padding: 0 20px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 30px;
}

.sale-card {
    background: linear-gradient(to bottom, #1a1e29, #0f121c);
    border-radius: 25px;
    padding: 25px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    transition: transform 0.3s ease;
}

.sale-card:hover {
    transform: translateY(-5px);
}

.sale-card img {
    border-radius: 10px;
    margin-bottom: 15px;
    max-height: 180px;
    object-fit: contain;
}

.sale-title {
    font-size: 1.1rem;
    color: #fff;
    margin-bottom: 12px;
    font-weight: 600;
    min-height: 48px;
}

.sale-price {
    margin-bottom: 15px;
}

.sale-price .regular {
    text-decoration: line-through;
    color: #98ff98;
    font-size: 0.95rem;
    display: block;
    margin-bottom: 4px;
}

.sale-price .sale {
    color: #32ff32;
    font-size: 1.1rem;
    font-weight: bold;
}

.view-button {
    background: #7fff00;
    color: #000;
    font-weight: 600;
    padding: 10px 18px;
    border-radius: 20px;
    font-size: 0.9rem;
    text-decoration: none;
    display: inline-block;
    transition: background 0.3s ease;
}

.view-button:hover {
    background: #bfff00;
}
</style>

<!-- Page Heading -->
<h1 class="sale-heading">Clearance Sales</h1>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$sale_products = wc_get_product_ids_on_sale();

$args = array(
    'post_type'      => 'product',
    'post__in'       => $sale_products,
    'posts_per_page' => 12,
    'paged'          => $paged,
);

$loop = new WP_Query($args);

if ($loop->have_posts()) :
    echo '<div class="sale-grid">';

    while ($loop->have_posts()) : $loop->the_post();
        global $product;

        echo '<div class="sale-card">';
        
        echo '<a href="' . get_permalink() . '">';
        echo woocommerce_get_product_thumbnail('medium');
        echo '</a>';

        echo '<h2 class="sale-title">' . get_the_title() . '</h2>';

        // Manual pricing display
        if ($product->is_type('simple')) {
            $regular_price = $product->get_regular_price();
            $sale_price    = $product->get_sale_price();

            if ($sale_price && $sale_price < $regular_price) {
                echo '<div class="sale-price">
                        <span class="regular">' . wc_price($regular_price) . '</span>
                        <span class="sale">' . wc_price($sale_price) . '</span>
                      </div>';
            } else {
                echo '<div class="sale-price"><span class="sale">' . wc_price($regular_price) . '</span></div>';
            }
        } else {
            echo '<div class="sale-price"><span class="sale">' . $product->get_price_html() . '</span></div>';
        }

        echo '<a class="view-button" href="' . get_permalink() . '">View Product</a>';
        echo '</div>';
    endwhile;

    echo '</div>';

    echo '<div style="text-align:center; margin: 40px 0;">';
    the_posts_pagination(array(
        'mid_size'  => 2,
        'prev_text' => __('« Prev'),
        'next_text' => __('Next »'),
    ));
    echo '</div>';

else :
    echo '<p style="text-align:center; color:#fff; font-size: 1.2rem;">No sale products found.</p>';
endif;

wp_reset_postdata();
?>

<?php get_footer(); ?>
