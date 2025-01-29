<?php 


add_action( '__after_menu_items' , 'spark_woocommerce_menu_cart' );

function spark_woocommerce_menu_cart( ) {
  // If we're not on the home page, do nothing
if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
	
	return false;

	ob_start();
		global $woocommerce;
		$viewing_cart = esc_attr__('View your shopping cart', 'spark-theme');
		$start_shopping = esc_attr__('Start shopping', 'spark-theme');
		$cart_url =  esc_url( wc_get_cart_url() );
		$shop_page_url = esc_url( get_permalink( wc_get_page_id( 'shop' ) ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = esc_html(  $cart_contents_count  );
		$cart_total = esc_html( $woocommerce->cart->get_cart_total() );
			if ($cart_contents_count == 0) {
				$menu_item = '<div class="col-md-1 col-xs-3 cartCol">  <a href="'. esc_url( home_url('') ) .'/shop" class="cart" title="'. $start_shopping .'"> ';
			} else {
				$menu_item = '<div class="col-md-1 col-xs-3 cartCol">  <a href="'. esc_url( home_url('') ) .'/cart" class="cart" title="'. $viewing_cart .'">';
			}


			$menu_item .= '<span class="count">'. $cart_contents .'</span> ';

			$menu_item .= '<i class="fa fa-shopping-cart"></i>';

			$menu_item .= '</a> </div>';
			
		echo $menu_item;
}
