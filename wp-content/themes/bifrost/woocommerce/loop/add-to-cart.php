<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ((!$product->is_in_stock() || !$product->is_purchasable()) && !is_single()) {
    echo sprintf(
        '<a class="o-neuron__post-icon %s product_type_%s" href="%s"><span class="o-neuron-hover-holder__button__cart"><span>%s</span></span></a>',
        'o-neuron-hover-holder__button add_to_cart_button d-flex align-items-center justify-content-center',
        esc_attr($product->get_type()),
        $product->is_type('external') ? esc_url($product->add_to_cart_url()) : esc_url(get_the_permalink()),
        $product->is_type('external') ? esc_html__('Buy Product', 'bifrost') : esc_html__('Read More', 'bifrost')
    );
    return;
} 

echo apply_filters( 'woocommerce_loop_add_to_cart_link',
    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="o-neuron__post-icon ajax_add_to_cart %s product_type_%s"><span class="o-neuron-hover-holder__button__cart">%s</span><span class="o-neuron-hover-holder__button__loader">%s</span><span class="o-neuron-hover-holder__button__added">%s</span></a>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( $product->get_id() ),
        esc_attr( $product->get_sku() ),
        $product->is_purchasable() && $product->is_in_stock() ? 'o-neuron-hover-holder__button add_to_cart_button d-flex align-items-center justify-content-center' : 'h-display-none',
        esc_attr( $product->get_type() ),
        '<span>Add To Cart</span>',
        '<span>Loading...</span>',
        '<span>Added To Cart</span>'
    ),
$product );