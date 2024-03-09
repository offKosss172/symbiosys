<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div class="assortment container">

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>



	<div class="right-part-singleproduct-page product-info right-block">
	
 
    <h1 class="product-cart-title wow fadeInUp" data-wow-duration=".2s" data-wow-delay=".1s"><?php echo esc_html($product->get_name()); ?></h1>
    <p class="product-cart-product_summary"><?php echo wp_kses_post($product->get_description()); ?></p>
    <!-- <a class="product-cart-modal-table-size" id="ModalSizeTableBtn">таблиця розмірів</a> -->
    
    <div class="size-chart-container wow fadeInUp" data-wow-duration=".2s" data-wow-delay=".5s">
        <a href="#">таблиця розмірів</a>
        <button><img src="/wp-content/themes/symbiosis/assets/icons/Filter_alt.svg" alt="Icon"></button>
    </div>


  <div class="number-buttons-container wow flipInY" data-wow-delay=".2s">
    <?php
    $sizes = wc_get_product_terms($product->get_id(), 'pa_size', array('fields' => 'all'));
    if ($sizes) {
        foreach ($sizes as $size) {
            echo '<span class="attribute-label"><label name="size"><input type="radio" name="size" value="' . esc_attr($size->slug) . '"> ' . esc_html($size->name) . '</label></span>';
        }
    }
    ?>
</div>

<div class="color-selection-container wow flipInX" data-wow-delay=".4s">
    <?php
    $colors = wc_get_product_terms($product->get_id(), 'pa_color', array('fields' => 'all'));
    if ($colors) {
        foreach ($colors as $color) {
           echo '<span class="attribute-label"><label name="color" value="' . esc_attr($color->slug) . '" style="background-color: ' . esc_attr($color->slug) . '";><input type="radio" name="color" value="' . esc_attr($color->slug) . '"></label></span>';

        }
    }
    ?>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {

  var sizeRadioButtons = document.querySelectorAll('input[type="radio"][name="size"]');
  
  sizeRadioButtons.forEach(function(radioButton) {
    radioButton.addEventListener('change', function() {
      sizeRadioButtons.forEach(function(btn) {
        btn.parentNode.classList.remove('selected-radio-size');
      });
      
      if (radioButton.checked) {
        radioButton.parentNode.classList.add('selected-radio-size');
      }
    });
  });
  
  var colorRadioButtons = document.querySelectorAll('input[type="radio"][name="color"]');
  
  colorRadioButtons.forEach(function(radioButton) {
    radioButton.addEventListener('change', function() {
      colorRadioButtons.forEach(function(btn) {
        btn.parentNode.classList.remove('selected-radio-color');
      });
      

      if (radioButton.checked) {
        radioButton.parentNode.classList.add('selected-radio-color');
      }
    });
  });
});
</script>



 <script>
        jQuery(document).ready(function($) {
            // Обработка изменений в выборе размера
            $('input[name="size"]').change(function() {
                var selectedSize = $(this).val();
                $('#pa_size').val(selectedSize).change();
            });

            // Обработка изменений в выборе цвета
            $('input[name="color"]').change(function() {
                var selectedColor = $(this).val();
                $('#pa_color').val(selectedColor).change();
            });
        });
    </script>
	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		 // functions.php
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>
</div>



	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>


</div>
</div>
<style>
    .unique-modal-background123 {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
        z-index: 100;
    height: 100vh;
    background-color: rgba(0,0,0,0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
}

.unique-modal-content123 img {
    max-width: 90%;
    max-height: 80vh;
}

.unique-modal-content123 {
    position: relative;
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-items: flex-start;
}

.unique-modal-close123 {
    position: relative;
    top: 10px;
}

</style>
<div class="unique-modal-background123" style="display:none;">
    <div class="unique-modal-content123">
        <img src="/wp-content/themes/symbiosis/assets/image/Assorment/size.png" alt="Модальное окно">
        <button class="unique-modal-close123">Закрити фотографію</button>
    </div>
</div>


<script>
document.querySelector('.size-chart-container').addEventListener('click', function() {
    document.querySelector('.unique-modal-background123').style.display = 'flex';
});

document.querySelector('.unique-modal-close123').addEventListener('click', function() {
    document.querySelector('.unique-modal-background123').style.display = 'none';
});
</script>
<?php do_action( 'woocommerce_after_single_product' ); ?>
<script>
// Получаем блоки по классу
var price = document.querySelector('.product-cart-price');
var quantity = document.querySelector('.quantity');

// Запоминаем родительский элемент блока с ценой
var parentDiv = price.parentNode;

// Перемещаем блоки
parentDiv.insertBefore(quantity, price);


document.addEventListener("DOMContentLoaded", function() {
    const targetElementSelector = '.entry-summary';
    const elementToMoveSelector = 'ol.flex-control-nav.flex-control-thumbs';
    const config = { childList: true, subtree: true };
    let observer;

    function moveElement() {
        const elementToMove = document.querySelector(elementToMoveSelector);
        const targetElement = document.querySelector(targetElementSelector);

        if (window.innerWidth > 800 && elementToMove && targetElement) {
            targetElement.after(elementToMove);
            // Если элемент успешно перемещён, отключаем наблюдатель, так как он больше не нужен
            if(observer) {
                observer.disconnect();
            }
        }
    }

    const callback = function(mutationsList, observer) {
        for(let mutation of mutationsList) {
            if (mutation.type === 'childList') {
                moveElement();
            }
        }
    };

    observer = new MutationObserver(callback);

    observer.observe(document.body, config);
});




document.addEventListener("DOMContentLoaded", function() {
    var element = document.querySelector('.product-cart-product_summary');
    if (element) {
        element.classList.add('wow', 'fadeInUp');
        element.setAttribute('data-wow-duration', '.2s');
        element.setAttribute('data-wow-delay', '.3s');
    }
});

document.addEventListener("DOMContentLoaded", function() {
    var element = document.querySelector('.quantity');
    if (element) {
        element.classList.add('wow', 'fadeInUp');
        element.setAttribute('data-wow-duration', '.2s');
        element.setAttribute('data-wow-delay', '.5s');
    }
});


document.addEventListener("DOMContentLoaded", function() {
    var element = document.querySelector('.woocommerce-Price-amount');
    if (element) {
        element.classList.add('wow', 'fadeInUp');
        element.setAttribute('data-wow-duration', '.2s');
        element.setAttribute('data-wow-delay', '.7s');
    }
});

document.addEventListener("DOMContentLoaded", function() {
    var selector = '.woocommerce-variation-add-to-cart';
    var element = document.querySelector(selector);
    if (element) {
        element.classList.add('wow', 'fadeInUp');
        element.setAttribute('data-wow-duration', '.3s');
        element.setAttribute('data-wow-delay', '.8s');
    }
});

document.addEventListener("DOMContentLoaded", function() {
    var selector = '.woocommerce-message';
    var element = document.querySelector(selector);
    if (element) {
        element.classList.add('wow', 'fadeInLeft');
        element.setAttribute('data-wow-duration', '.3s');
        element.setAttribute('data-wow-delay', '.5s');
    }
});

document.addEventListener('DOMContentLoaded', function () {

  var quantityInputs = document.querySelectorAll('.quantity .qty');

  quantityInputs.forEach(function(quantityInput) {
 
    var minusBtn = document.createElement('button');
    minusBtn.innerText = '-';
    minusBtn.type = 'button';
    minusBtn.classList.add('minus');
    minusBtn.onclick = function() {
      var currentVal = parseInt(quantityInput.value, 10);
      if (currentVal > 1) {
        quantityInput.value = currentVal - 1;
      }
    };

    var plusBtn = document.createElement('button');
    plusBtn.innerText = '+';
    plusBtn.type = 'button';
    plusBtn.classList.add('plus');
    plusBtn.onclick = function() {
      var currentVal = parseInt(quantityInput.value, 10);
      var maxVal = quantityInput.max ? parseInt(quantityInput.max, 10) : Infinity;
      if (currentVal < maxVal) {
        quantityInput.value = currentVal + 1;
      }
    };


    quantityInput.parentNode.insertBefore(minusBtn, quantityInput);
    quantityInput.parentNode.insertBefore(plusBtn, quantityInput.nextSibling);
  });
});


document.querySelector('.quantity .plus').addEventListener('click', function () {
  var input = document.querySelector('.quantity input.qty');
  var value = parseInt(input.value, 10);
  value = isNaN(value) ? 1 : value;
  value++;
  input.value = value;
});

document.querySelector('.quantity .minus').addEventListener('click', function () {
  var input = document.querySelector('.quantity input.qty');
  var value = parseInt(input.value, 10);
  value = isNaN(value) ? 1 : value;
  value = value > 1 ? value - 1 : 1;
  input.value = value;
});

</script>