<?php
/*

Template Name: Cart Page
*/

get_header();


defined( 'ABSPATH' ) || exit;
$th_shop_mania_woo_cart_crosssell_enable = get_theme_mod('th_shop_mania_woo_cart_crosssell_enable',true);

do_action( 'woocommerce_before_cart' ); ?>
<div class="th-cartpage-wrapper">
<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">



	<div class="basket">
    <div class="container">
        <div class="basket_tr wow fadeIn" data-wow-delay=".1s">
            <span class="item">Товар</span>
            <span class="description">Опис</span>
            <span class="color">Колір</span>
            <span class="price">Ціна</span>
            <span class="size">Розмір</span>
            <span class="quantity">Кількість</span>
        </div>


		<tbody>
			<!--<thead>-->
		 <!--       <tr>-->
   <!--     			<th class="product-remove">&nbsp;</th>-->
   <!--     			<th class="product-thumbnail">&nbsp;</th>-->
   <!--     			<th class="product-name"><?php _e( 'Product', 'th-shop-mania' ); ?></th>-->
   <!--     			<th class="product-remove">&nbsp;</th>-->
   <!--     			<th class="product-thumbnail">&nbsp;</th><th class="product-remove">&nbsp;</th>-->
   <!--     			<th class="product-thumbnail">&nbsp;</th>-->
   <!--     			<th class="product-subtotal"><?php _e( 'Total', 'th-shop-mania' ); ?></th>-->
		 <!--          </tr>-->
	  <!--          </thead>-->
	
	

	
	
	
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">


						<td class="product-thumbnail">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo wp_kses_post($thumbnail); // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), wp_kses_post($thumbnail) ); // PHPCS: XSS ok.
						}
						?>
						
						</td>

						<td class="product-content">
						    
						    <div class="product-name">
                                <?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;' ); ?>
                            </div>

						    
                            <div class="product-color">
                                <?php
                                $attribute_slug = 'pa_color'; 
                                $term = get_the_terms($product_id, $attribute_slug);
                            
                                if (!empty($term) && !is_wp_error($term)) {
                                    $term_description = term_description($term[0]->term_id, $attribute_slug);
                                    if (!empty($term_description)) {
                                        echo ($term_description);
                                    } else {
                                        echo esc_html__('N/A', 'your-theme-textdomain');
                                    }
                                } else {
                                    echo esc_html__('N/A', 'your-theme-textdomain');
                                }
                                ?>
                            </div>


						    
						    
							<div class="product-top">
							
							
							

								<div class="product-price product-subtotal">
									<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
									?>
									
								</div>
							</div>

                            <div class="product-size">
                                <?php
                                
                                $product_size = wc_get_product($_product->get_id())->get_attribute('pa_size');
                            
                                echo '<script>console.log("' . esc_js($product_size) . '")</script>';
                            
                                if (!empty($product_size)) {
                                    echo esc_html($product_size);
                                } else {
                                    echo esc_html__('N/A', 'your-theme-textdomain');
                                }
                                ?>
                            </div>


							<div class="product-bottom">
								<div class="product-qty">
    									<?php
    						if ( $_product->is_sold_individually() ) {
    							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
    						} else {
    							$product_quantity = woocommerce_quantity_input(
    								array(
    									'input_name'   => "cart[{$cart_item_key}][qty]",
    									'input_value'  => $cart_item['quantity'],
    									'max_value'    => $_product->get_max_purchase_quantity(),
    									'min_value'    => '0',
    									'product_name' => $_product->get_name(),
    								),
    								$_product,
    								false
    							);
    						}
    
    						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
    						?>
							</div>
								
						</div>

						</td>

					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr>
				<td colspan="6" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<label for="coupon_code"></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="промокод" /> <button type="submit" id="applyCouponeS" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'th-shop-mania' ); ?>">ПРОМОКОД</button>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'th-shop-mania' ); ?>"><?php esc_html_e( 'Update cart', 'th-shop-mania' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>







<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals">
	<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<div class="cart-collaterals-cust"> <span><h4 class="total-bascet_text" >ще трішки і буде стиль...</h4></span> <span><?php wc_cart_totals_order_total_html(); ?></span> <span id="cartCounterSymbi"><?php
$total_items = WC()->cart->get_cart_contents_count();

if ($total_items > 0) {
    echo  esc_html($total_items) ;
} else {
    echo 'Your cart is empty';
}
?></span> </div>
 

	<table cellspacing="0" class="shop_table shop_table_responsive">

		<tr class="cart-subtotal">
			<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>


			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>
			



		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>
		
		

			<tr class="shipping">
				<th><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
			</tr>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php
		if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = '';

			if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
				/* translators: %s location. */
				$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
			}

			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
				foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					?>
					<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
						<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
					<?php
				}
			} else {
				?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
					<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
				<?php
			}
		}
		?>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	</table>





	<div class="wc-proceed-to-checkout">
	    
	    
	    
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>


	</div>
	
	<div class="basket_down">
    
    <p class="wow fadeInUp" data-wow-delay=".3s">Доставка та податки <br> розраховуються при<br> розміщенні замовлення.</p>
</div>
	

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

		



</div>
</div>
</div>

</div></div>




<?php 
if ($th_shop_mania_woo_cart_crosssell_enable || (!function_exists('th_shop_mania_pro_load_plugin'))) {
	do_action( 'woocommerce_after_cart' );
	} ?>

<script>

</script>

<?php
get_footer();
?>
