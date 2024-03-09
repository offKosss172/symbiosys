

<?php
/*
Template Name: contacts
*/
?>

<?php
get_header();?>
 
<div class="collab_margin wow fadeIn" data-wow-duration=".5s" data-wow-delay=".3s">
    <div class="container">
        
        <div Class="contacts-contant-wrapper-symbiosys">
            
        	<div Class="contacts-contant-text-symbiosys">
        	    <div class="rhytm_col_center">
                <div class="rhytm_col_top wow fadeInUp rhytm_fline_page" data-wow-duration=".5s" data-wow-delay=".1s"><div class="contacts_col_center_title">ДЕ НАРОДЖУЄТЬСЯ СТИЛЬ SYMBIOSYS? </div></div>
            </div>
        	    <div  class="product-info">   
            		<h1 class="product-cart-title wow fadeInUp animated" data-wow-duration=".2s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 0.2s; animation-delay: 0.1s; animation-name: fadeInUp;">Наша адреса:</h1>
                    <p>провулок Чайковського, 14, Одеса, Одеська область, 65000</p>
                    <h1 class="product-cart-title wow fadeInUp animated" data-wow-duration=".2s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 0.2s; animation-delay: 0.1s; animation-name: fadeInUp;">Номер телефону:</h1>
                    <p><a href="tel:+380731045000">+38 (073) 104 5000</a></p>
                    <h1 class="product-cart-title wow fadeInUp animated" data-wow-duration=".2s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 0.2s; animation-delay: 0.1s; animation-name: fadeInUp;">Email:</h1>
                    <p><a href="mailto: symbiosisgrp@gmail.com">symbiosisgrp@gmail.com</a></p>
                </div>
        	</div>
        	<div Class="contacts-contant-map-symbiosys">
        	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2747.1125833975366!2d30.7404015!3d46.4860831!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c63184a1488b31%3A0x4da11df7ba47478e!2sSymbiosis!5e0!3m2!1suk!2sua!4v1709595160859!5m2!1suk!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        	</div>
        </div>


        <div class="clothe_title contacts-page-symbiosys wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".15s">
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
</div>


<?php
get_footer();
?>