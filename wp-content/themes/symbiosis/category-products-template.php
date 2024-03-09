<?php
/*
Template Name: Category Products Template
*/
get_header();

$category_slug = basename(get_permalink());
$args = array(
    'post_type' => 'product',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $category_slug,
        ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        the_title();
        // Дополнительная информация о товаре, если необходимо
    }
} else {
    echo 'Нет товаров в этой категории.';
}

get_footer();
?>
