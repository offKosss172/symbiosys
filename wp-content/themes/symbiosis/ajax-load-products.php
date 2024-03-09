<?php
// ajax-load-products.php

// Подключаем WordPress
require_once('../../../wp-load.php');

// Проверяем, пришел ли AJAX-запрос
if (isset($_POST['category'])) {
    $category = sanitize_text_field($_POST['category']);

    // Здесь вы можете выполнить ваш запрос на выборку товаров по категории
    // и вернуть данные в нужном формате (HTML, JSON и т.д.)

    // Пример: получение 10 товаров по выбранной категории
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 10,
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
            $product_title  = get_the_title();
            $product_price  = wc_get_product(get_the_ID())->get_price();
            $product_image  = get_the_post_thumbnail(get_the_ID(), 'full');

            echo '<div class="clothe_block wow fadeIn" data-wow-delay=".1s" data-wow-duration=".5s">';
            echo '<a href="' . esc_url(get_permalink()) . '">' . $product_image . '</a>';
            echo '<div class="clothe_info">' . $product_title . '</div>';
            echo '<div class="clothe_price">' . wc_price($product_price) . '</div>';
            echo '</div>';
        }
        wp_reset_postdata();
    } else {
        echo 'No products found.';
    }

    // Обязательно завершаем выполнение скрипта
    wp_die();
} else {
    // Если нет данных о категории, выводим ошибку
    echo 'Invalid request.';
}
?>
