<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>


<div class="container">
    
    
    
    <div class="clothe_title wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".15s">
    <h4>Всі товари з категорії детально</h4>
</div>

<div class="clothe-teg-season clother-product-type-sys">
    <?php
    $category_slug = get_query_var('product_cat'); 

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 10,
        'paged'          => $paged,
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category_slug,
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $product_title  = get_the_title();
            $product_price  = wc_get_product(get_the_ID())->get_price();
            $product_image  = get_the_post_thumbnail(get_the_ID(), 'full');

            echo '<div class="clothe_tags_block wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s">';
            echo '<a href="' . esc_url(get_permalink()) . '">' . $product_image . '</a>';
            echo '<div class="clothe_info">' . $product_title . '</div>';
            echo '<div class="clothe_price">' . wc_price($product_price) . '</div>';
            echo '</div>';
        endwhile;
        wp_reset_postdata();

        
        echo '<div class="pagination-block-btn">';
        
        echo paginate_links(array(
            'total' => $query->max_num_pages,
            'prev_next' => false,
        ));
        echo '</div>';

    else :
        echo 'No products found.';
    endif;
    ?>
</div>

    
    
    
    
  <div class="clothe_title wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".15s">
    <h4>також вас можуть зацікавити</h4>
  </div> 
  <div class="clothe_recomendation">
    
        <?php
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 6,
            'orderby'        => 'rand', // Случайный порядок
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $product_title = get_the_title();
                $product_price = wc_get_product(get_the_ID())->get_price();
                $product_image = get_the_post_thumbnail(get_the_ID(), 'full');
        ?>
                <div class="clothe_rec_block wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".1s">
                    <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo $product_image; ?></a>
                    <div class="clothe_info"><?php echo $product_title; ?></div>
                    <div class="clothe_price"><?php echo wc_price($product_price); ?></div>
                </div>
        <?php
            }
            wp_reset_postdata();
        } else {
            echo 'No products found.';
        }
        ?>
    
    </div>
  
    
</div>

<?php
get_footer( 'shop' );
