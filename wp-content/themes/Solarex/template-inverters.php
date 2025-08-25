<?php
/**
 * Template Name: Inverters Category
 *
 * This template displays all products in the Inverters category.
 *
 * @package Solarex
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


get_header();


// Get products in the "Inverters" category
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => 'inverters',
        ),
    ),
);

$products = new WP_Query($args);
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

        .hero-section {
            background-color: #0e131f; /* Main background for hero */
            padding: 2rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden; /* For images that might overflow */
        }
        .hero-content {
            z-index: 1;
            position: relative;
        }
        .hero-image-left {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 40%; /* Adjust as needed */
            max-width: 400px;
            height: auto;
            object-fit: contain;
            z-index: 0;
        }
        .hero-image-right {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 30%; /* Adjust as needed */
            max-width: 300px;
            height: auto;
            object-fit: contain;
            z-index: 0;
        }
        .hero-text {
            font-size: 2.5rem;
            font-weight: 700;
            color: #a4ff3d;
            margin-bottom: 0.5rem;
        }
        .hero-subtext {
            font-size: 1.2rem;
            color: #ffffff;
        }

        .breadcrumb-nav {
            background-color: #1a1a1a;
            padding: 0.75rem 0;
            font-size: 0.9rem;
        }
        .breadcrumb-nav a {
            color: #a4ff3d;
        }
        .breadcrumb-nav span {
            margin: 0 0.5rem;
            color: #777777;
        }

        .main-content-layout {
            display: flex;
            flex-wrap: wrap;
            padding: 2rem 0;
        }
        .sidebar {
            width: 100%; /* Full width on small screens */
            padding: 1rem;
            background-color: #0e131f; /* Same as body for seamless look */
        }
        .sidebar-section-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #a4ff3d;
            margin-bottom: 1rem;
        }
        .filter-group {
            margin-bottom: 2rem;
        }
        .filter-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
            color: #ffffff;
            font-size: 0.9rem;
        }
        .filter-item input[type="checkbox"] {
            margin-right: 0.75rem;
            width: 1.2rem;
            height: 1.2rem;
            accent-color: #a4ff3d; /* Green checkbox */
        }
        .price-range-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #777777;
            background-color: #1a1a1a;
            color: #ffffff;
            border-radius: 0.375rem;
            margin-top: 0.5rem;
        }

        .product-grid-container {
            flex-grow: 1;
            padding: 1rem;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #ffffff;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Responsive grid */
            gap: 2rem; /* Gap between product cards */
        }
        .product-card {
            background-color: #1a1a1a; /* Card background */
            border-radius: 1rem;
            box-shadow: 0 0 12px rgba(0,0,0,0.3);
            padding: 1.5rem;
            text-align: center;
            display: flex;
            flex-direction: column;
            height: 100%;
            transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: scale(1.03);
        }
        .product-card-img-container {
            width: 100%;
            padding-bottom: 100%; /* 1:1 aspect ratio */
            position: relative;
            margin-bottom: 1rem;
        }
        .product-card img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 0.5rem;
        }
        .product-card h4 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: #ffffff;
            flex-grow: 1;
        }
        .product-card .price {
            color: #a4ff3d;
            font-weight: 700;
            font-size: 1.15rem;
            display: block;
            margin-bottom: 1rem;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
            margin-bottom: 2rem;
        }
        .pagination-item {
            background-color: #1a1a1a;
            color: #ffffff;
            padding: 0.75rem 1rem;
            margin: 0 0.5rem;
            border-radius: 0.5rem;
        }
        .pagination-item.active {
            background-color: #a4ff3d;
            color: #000000;
        }
        .pagination-item:hover:not(.active) {
            background-color: #2a2a2a;
        }

       
        .footer-links a {
            color: #ffffff;
        }
        .footer-links a:hover {
            color: #a4ff3d;
            text-decoration: none;
        }
        .social-links {
            display: flex;
            margin-top: 1rem;
        }
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            background-color: #0e131f;
            border-radius: 50%;
            margin-right: 0.75rem;
            color: #ffffff;
            font-size: 1.2rem;
        }
        .social-links a:hover {
            background-color: #a4ff3d;
            color: #000000;
        }
        .copyright {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid #333;
            font-size: 0.9rem;
            color: #777777;
        }

        /* Responsive Adjustments */
        @media (min-width: 768px) {
            .sidebar {
                width: 250px; /* Fixed width on larger screens */
            }
            .main-content-layout {
                flex-wrap: nowrap; /* Keep sidebar and main content in one line */
            }
        }

        .icon-btn {
            background: none;
            border: none;
            color: #ffffff;
            font-size: 1.2rem;
            cursor: pointer;
        }
        .search-bar {
            display: flex;
            align-items: center;
        }
        .search-bar input {
            padding: 0.5rem;
            border: 1px solid #777777;
            background-color: #1a1a1a;
            color: #ffffff;
            border-radius: 0.375rem;
        }
        .search-bar button {
            margin-left: 0.5rem;
        }
    </style>

<body>

    <!-- Page Heading -->
    <h1 class="sale-heading">Our Best Inverters</h1>

    <!-- Main Content -->
    <div class="container main-content-layout">

        <!-- Product Grid -->
        <main class="product-grid-container">
            <div class="section-header">
                <h2 class="section-title">Inverters</h2>
            </div>
            
            <div class="product-grid mb-4">
                <?php if ($products->have_posts()) : ?>
                    <?php while ($products->have_posts()) : $products->the_post(); ?>
                        <?php 
                        global $product;
                        $price = $product->get_price();
                        $regular_price = $product->get_regular_price();
                        ?>
                        <div class="product-card">
                            <div class="product-card-img-container">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('woocommerce_thumbnail', array('alt' => get_the_title())); ?>
                                <?php else : ?>
                                    <img src="https://placehold.co/300x300/1a1a1a/ffffff?text=Inverter" alt="Inverter">
                                <?php endif; ?>
                            </div>
                            <h4><?php the_title(); ?></h4>
                            <span class="price">
                                <?php if ($price) : ?>
                                    <?php if ($regular_price && $regular_price != $price) : ?>
                                        <del>Rs. <?php echo number_format((float)$regular_price, 2); ?></del>
                                        Rs. <?php echo number_format((float)$price, 2); ?>
                                    <?php else : ?>
                                        Rs. <?php echo number_format((float)$price, 2); ?> onwards
                                    <?php endif; ?>
                                <?php else : ?>
                                    Price not available
                                <?php endif; ?>
                            </span>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p>No inverters found.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>


</body>
    <?php get_footer(); ?>
</html>