<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */
    /**
     * Doctype Hook
     * 
     * @hooked coachify_doctype
    */
    do_action( 'coachify_doctype' );
?>

<head itemscope itemtype="https://schema.org/WebSite">
	<?php 
    /**
     * Before wp_head
     * 
     * @hooked coachify_head
    */
    do_action( 'coachify_before_wp_head' ); 
    wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<?php
    wp_body_open();
    
    /**
     * Before Header
     * 
     * @hooked coachify_page_start - 20 
    */
    do_action( 'coachify_before_header' );?>
    
    
    <?php
    /**
     * Before Content
     *
    */
    do_action( 'coachify_after_header' );
    
    ?>
    

    
    
    
    
    
    
    
    <!--HEADER-->
<header class="header-main wow fadeInDown" data-wow-duration=".5s">
    <div class="container">
        
        <div class="header_col">

            <div class="header_left">
                <a href="/clothing">Одяг</a>
                <a href="/collaboration">Колаборація</a>
                <a href="/seasons">Сезони</a>
            </div>
             <a href="/" class="symbiosis-header_logo"><img src="/wp-content/themes/symbiosis/assets/image/logo.svg" alt="logo"></a>
            <div class="header_right">
                <a href="/about-us">Про нас</a>
                <a href="/contacts">Контакти</a>
                <a  class="open-search-modal">Знайти</a>
                <a href="/cart" id="counterCartNav">Кошик
                
                <?php
                    global $woocommerce;
                    
                    $cart_url = wc_get_cart_url();
                    $cart_count = $woocommerce->cart->get_cart_contents_count();
                    
                    if ($cart_count > 0) {
                        echo '<div href="' . esc_url($cart_url) . '" class="cart-icon"><span class="cart-count">(+ ' . esc_html($cart_count) . ')</span></div>';
                    } else {
                        echo '<div href="' . esc_url($cart_url) . '" class="cart-icon"></div>';
                    }
                ?> </a>
            </div>
            <div class="header_buttons">
                <button class="open-search-modal"><img src="/wp-content/themes/symbiosis/assets/icons/search.svg"></button>
                <button>
                    <div class="header_basket">
                        <a href="/cart"> </a>
                        <img src="/wp-content/themes/symbiosis/assets/icons/bag_alt.svg">
                        <span><?php
                    global $woocommerce;
                    
                    $cart_url = wc_get_cart_url();
                    $cart_count = $woocommerce->cart->get_cart_contents_count();
                    
                    if ($cart_count > 0) {
                        echo '<div href="' . esc_url($cart_url) . '" class="cart-icon"><span class="cart-count"> ' . esc_html($cart_count) . '</span></div>';
                    } else {
                        echo '<div href="' . esc_url($cart_url) . '" class="cart-icon"></div>';
                    }
                ?></span>
                    </div>
                </button>
                <button id="openModalHeaderUnique"><img src="/wp-content/themes/symbiosis/assets/icons/menu.svg"></button>
            </div>
            <div id="search-modal" class="modal">
                        <div class="modal-content">
                            <span class="close" id="close-search-modal">&times;</span>
                            <?php echo do_shortcode('[th-aps]'); ?>
                        </div>
                    </div>
                    
                    <script>
                       document.addEventListener("DOMContentLoaded", function () {
                            var searchModal = document.getElementById("search-modal");
                            var searchButtons = document.querySelectorAll(".open-search-modal");
                        
                            searchButtons.forEach(function (button) {
                                button.addEventListener("click", function (event) {
                                    event.preventDefault();
                                    searchModal.style.display = "flex";
                                });
                            });
                        
                            var closeSearchModalButton = document.getElementById("close-search-modal");
                        
                            closeSearchModalButton.addEventListener("click", function () {
                                searchModal.style.display = "none";
                            });
                        
                            window.addEventListener("click", function (event) {
                                if (event.target === searchModal) {
                                    searchModal.style.display = "none";
                                }
                            });
                        });

                        
                        
                        
                 
                    </script>

        </div>

    </div>
</header>

<div id="modalUnique" class="modalUnique">
    <div class="container">
        <div class="modal-content-header">
        <a href="/clothing" class="wow fadeInLeft" data-wow-delay=".0s" data-wow-duration=".3s"><div class="header_modal_flex">
            <span>Одяг</span>
            <span><img src="/wp-content/themes/symbiosis/assets/icons/arrow.svg"></span>
        </div></a>
        <a href="/collaboration" class="wow fadeInLeft" data-wow-delay=".1s" data-wow-duration=".3s"><div class="header_modal_flex">
            <span>Колаборація</span>
            <span><img src="/wp-content/themes/symbiosis/assets/icons/arrow.svg"></span>
        </div></a>
        <a href="/seasons" class="wow fadeInLeft" data-wow-delay=".2s" data-wow-duration=".3s"><div class="header_modal_flex">
            <span>Сезони</span>
            <span><img src="/wp-content/themes/symbiosis/assets/icons/arrow.svg"></span>
        </div></a>
        <a href="/about-us" class="wow fadeInLeft" data-wow-delay=".3s" data-wow-duration=".3s"><div class="header_modal_flex">
            <span>Про нас</span>
            <span><img src="/wp-content/themes/symbiosis/assets/icons/arrow.svg"></span>
        </div></a>
        <a href="/delivery" class="wow fadeInLeft" data-wow-delay=".4s" data-wow-duration=".3s"><div class="header_modal_flex">
            <span>Доставка</span>
            <span><img src="/wp-content/themes/symbiosis/assets/icons/arrow.svg"></span>
        </div></a>
        </div>
    </div>

</div></div>
    