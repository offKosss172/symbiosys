<?php
/*
Template Name: prodtag
*/

get_header();?>
<div class="container">
<div class="clothe">
<div class="clothe_title wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".15s">
    <h4>обранний тобою ритм </h4>
</div>

<div class="clothe-teg-season">
    <?php
    $tag = $_GET['tag'];

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 10,
        'paged'          => $paged,
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_tag',
                'field'    => 'slug',
                'terms'    => $tag,
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
get_footer();
?>
