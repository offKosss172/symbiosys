<?php
/**
 * Coachify functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Coachify
 */
// AJAX handler to load products based on category
add_action('wp_ajax_load_products', 'load_products');
add_action('wp_ajax_nopriv_load_products', 'load_products');

function load_products() {
    $category = $_GET['category'];

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $product_title = get_the_title();
            $product_price = wc_get_product(get_the_ID())->get_price();
            $product_image = get_the_post_thumbnail(get_the_ID(), 'full');

            // Get product categories for filtering
            $product_categories = get_the_terms(get_the_ID(), 'product_cat');
            $category_classes = '';

            if ($product_categories) {
                foreach ($product_categories as $product_category) {
                    $category_classes .= ' product-category-' . $product_category->slug;
                }
            }

            echo '<div class="clothe_block wow fadeIn' . $category_classes . '" data-wow-delay=".1s" data-wow-duration=".5s">';
            echo '<a href="' . esc_url(get_permalink()) . '">' . $product_image . '</a>';
            echo '<div class="clothe_info">' . $product_title . '</div>';
            echo '<div class="clothe_price">' . wc_price($product_price) . '</div>';
            echo '</div>';
        }
        wp_reset_postdata();
    } else {
        echo 'No products found.';
    }

    wp_die();
}









function my_theme_enqueue_scripts() {
    wp_enqueue_style('animate-css', get_template_directory_uri() . '/assets/css/animate.css');
    wp_enqueue_script('wow-js', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '', true);
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/assets/js/animationscriptstyle.js', array('jquery', 'wow-js'), '', true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');




add_action( 'template_redirect', 'my_custom_redirect' );

function my_custom_redirect() {
  if ( is_checkout() && ! empty( $_GET['order-received'] ) ) {
    $order_id = absint( $_GET['order-received'] );
    $order = wc_get_order( $order_id );

    if ( $order && $order->has_status( 'wc-completed' ) ) {
      wp_redirect( wc_get_checkout_order_received_url( $order ) );
      exit;
    }
  }
}




function my_theme_wow_init() {
    echo '<script>jQuery(document).ready(function($) { new WOW().init(); });</script>';
}
add_action('wp_footer', 'my_theme_wow_init');



// function custom_redirect_rules() {
//     if ( is_shop()) {
//         wp_redirect(home_url('/clothing/'), 301);
//         exit();
//     }
// }
// add_action('template_redirect', 'custom_redirect_rules');



function custom_redirect_rules() {
    if ( is_shop() ) {
        wp_redirect( home_url( '/clothing/' ), 301 );
        exit();
    }

    // Редирект для страниц checkout/order-received
    $request_uri = $_SERVER['REQUEST_URI'];
    $order_received_prefix = '/checkout/order-received';

    if ( strpos( $request_uri, $order_received_prefix ) === 0 ) {
        wp_redirect( home_url( '/checkout-thanks/' ), 301 );
        exit();
    }
}

add_action( 'template_redirect', 'custom_redirect_rules' );




















$coachify_theme_data = wp_get_theme();
if( ! defined( 'COACHIFY_THEME_VERSION' ) ) define( 'COACHIFY_THEME_VERSION', $coachify_theme_data->get( 'Version' ) );
if( ! defined( 'COACHIFY_THEME_NAME' ) ) define( 'COACHIFY_THEME_NAME', $coachify_theme_data->get( 'Name' ) );
if( ! defined( 'COACHIFY_THEME_TEXTDOMAIN' ) ) define( 'COACHIFY_THEME_TEXTDOMAIN', $coachify_theme_data->get( 'TextDomain' ) );   






/**
 * Customizer defaults.
 */
require get_template_directory() . '/inc/defaults.php';

/**
 * Custom Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Standalone Functions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions for selective refresh.
 */
require get_template_directory() . '/inc/partials.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Social Links
 */
require get_template_directory() . '/inc/social-links.php';

/**
 * Typography Functions
 */
require get_template_directory() . '/inc/typography/typography.php';

/**
 * Load google fonts locally
 */
require get_template_directory() . '/inc/class-webfont-loader.php';

/**
 * Dynamic Styles
 */
require get_template_directory() . '/assets/css/style.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Getting Started
*/
require get_template_directory() . '/inc/getting-started/getting-started.php';

/**
 * Add theme compatibility function for elementor if active
*/
if( coachify_is_elementor_activated() ){
	require get_template_directory() . '/inc/elementor-compatibility.php';   
}

if( coachify_is_woocommerce_activated() ){
    require get_template_directory() . '/inc/woocommerce-functions.php';    
}


