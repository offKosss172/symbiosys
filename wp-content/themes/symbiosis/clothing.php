<?php
/*
Template Name: clothing
*/
?>

<?php
get_header();?>
 


<div class="container">
    <div class="nav_page_fiters-clother">
        <div class="nav-product-type" id="productTypeFilter">
            <?php
            $product_categories = get_terms('product_cat');

            echo '<span class="product-type" data-category="all" class="nav_active">All</span>'; // Кнопка для показа всех товаров

            foreach ($product_categories as $category) {
                echo '<span class="product-type" data-category="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</span>';
            }
            ?>
        </div>
    </div>

    <div class="clothe">
        <div class="clothe_inner" id="productList">
            <?php
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => -1,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $product_title = get_the_title();
                    $product_price = wc_get_product(get_the_ID())->get_price();
                    $product_image = get_the_post_thumbnail(get_the_ID(), 'full');

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
            ?>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    var productTypeFilter = document.getElementById('productTypeFilter');
    var productList = document.getElementById('productList');

    productTypeFilter.addEventListener('click', function (event) {
        var target = event.target;

        // Проверка, является ли кнопка "All" активной
        if (target.getAttribute('data-category') === 'all') {
            // Просто убираем активный класс со всех категорий
            var productTypes = document.querySelectorAll('.product-type');
            productTypes.forEach(function (type) {
                type.classList.remove('nav_active');
            });

            // Вместо вызова AJAX-запроса, покажем все товары, которые были загружены при загрузке страницы
            productList.innerHTML = originalProductList;
        } else {
            // Загрузка товаров для выбранной категории
            loadProducts(target.getAttribute('data-category'));
        }
    });

    function loadProducts(category) {
        var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
        var xhr = new XMLHttpRequest();
        xhr.open('GET', ajaxUrl + '?action=load_products&category=' + category, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                productList.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }

    // Сохраняем изначальный список товаров при загрузке страницы
    var originalProductList = productList.innerHTML;
});



    </script>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    function initWow() {
        if (typeof WOW === 'function') {
            new WOW().init(); // Инициализация WOW.js для новых элементов
        }
    }

    function addClassesToProductTypes() {
        var spans = document.querySelectorAll('.nav-product-type .product-type');
        if (spans.length) {
            spans.forEach(function(span, index) {
                span.classList.add('wow', 'fadeInUp');
                span.setAttribute('data-wow-duration', '.35s');
                var delay = ((index + 1) * 0.1).toFixed(1);
                span.setAttribute('data-wow-delay', delay + 's');
            });
            initWow(); // Переинициализировать WOW.js после добавления классов
        } else {
            setTimeout(addClassesToProductTypes, 500); // Попытка снова, если элементы ещё не загружены
        }
    }

    addClassesToProductTypes(); // Немедленный вызов функции для добавления классов и инициализации WOW.js
});
</script>

<?php get_footer(); ?>