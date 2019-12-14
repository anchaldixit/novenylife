<?php
/**
 * Template Name: ShoppingCart Template
 *
 * Displays the contact page template.
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */
$shoppingcart_settings = shoppingcart_get_theme_options();

get_header(); ?>
<div class="product-widget-box">
	<div class="product-widget-wrap">
		<div class="wrap">
		<?php 
		if (is_active_sidebar('shoppingcart_template')):

			dynamic_sidebar('shoppingcart_template');

		endif;

		the_content ();  ?>
		</div> <!-- end .wrap -->
	</div> <!-- end .shoppingcart-grid-widget-wrap -->
</div> <!-- end .product-widget-box -->

<?php

if(class_exists('woocommerce')){

	if($shoppingcart_settings['shoppingcart_display_featured_brand'] =='below-widget') {
		do_action('shoppingcart_display_front_page_product_brand'); // Display just before footer column
	}

}
?>
<!-- homepage popup -->
<div class="popup-main">
	<div class="popup-section">
		<div class="popup-image">
			<span class="popup-close">X</span>
			<img src="https://novenylife.com/wp-content/uploads/2019/11/launch-Post-noveny-3.jpg">
		</div>
	</div>
</div>
<!-- end homepage popup-->
<div class="ad_box_wemap">
	<div class="cate_box">
		<div id="bgpara" class="pro_details_main " >
			<div class="pro_detalis_content">
				<div class="pro_cate pro_cate_1">
				<a href="/product-category/essentials-oils/">
					<div class="pro_image_back img_url_1"></div>
				</a>
				</div>
				<div class="pro_cate pro_cate_2">
					<a href="/product-category/cold-pressed-oils/">
						<div class="pro_image_back img_url_2"></div>
					</a>
				</div>
			</div>
			<div class="pro_detalis_content_two">
				<div class="pro_cate pro_cate_3 pro_cate_left">
					<a href="/product-category/aromatherapy-blends/">
						<div class="pro_image_back img_url_3"></div>
					</a>
				</div>
				<div class="pro_cate pro_cate_3 pro_cate_left">
					<a href="/product-category/extracts/">
						<div class="pro_image_back img_url_4"></div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="vl"></div>
	<div class="ad_box-image-right">
		<div class="ad_box-main">
			<div class="ad_box_head">
				<h2>People Love Our Products Because:</h2>
			</div>
			<div class="ad_box_listing">
				<ul>
					<li>Our products are 100% Pure & Natural.</li>
					<li>Our products are certified & specially crafted.</li>
					<li>We produce and distill our products naturally & under proper Standards.</li>
					<li>Our products are high in demand & exported to 32+ countries and growing.</li>
					<li>We have 14 years of experience of cultivation and distillation of Pure Essential Oils.</li>
 					<li>We produce and supply pure & best essential oils to our customers.</li>
					<li>We have 280 tonnes of product processing capacity in our distillery.</li>
					<li>We produce and supply finest and purest natural products at reasonable and competitive price.</li>
					<li>We have standard Benchmarked testing  & quality control R&D institute named ATRIC Ayuroma Technology, Research, Incubation & Innovation Centre).</li>
 					<li>We provide 100% customer satisfaction guarantee policy</li>


				</ul>
			</div>
		</div>
	</div>
</div>
<!-- <div class="container-product-box ad_banner-height">
	<div class="products-box-main">
		<img src="/wp-content/uploads/2019/09/banner-main.jpeg">
	</div>
</div> -->
<?php
if( is_active_sidebar( 'shoppingcart_template_footer_col_1' ) || is_active_sidebar( 'shoppingcart_template_footer_col_2' ) || is_active_sidebar( 'shoppingcart_template_footer_col_3' ) || is_active_sidebar( 'shoppingcart_template_footer_col_4' )) { ?>

	<div class="shoppingcart-template-footer-column">
		<div class="wrap">
			<div class="sc-template-footer-wrap">

				<?php
					for($i =1; $i<= 4; $i++){
						if ( is_active_sidebar( 'shoppingcart_template_footer_col_'.$i ) ) : ?>
							<div class="sc-footer-column">

								<?php dynamic_sidebar( 'shoppingcart_template_footer_col_'.$i ); ?>

							</div>

						<?php endif;
					}
				?>
			</div> <!-- end .sc-template-footer-wrap -->
		</div> <!-- end .wrap -->
	</div> <!-- end .shoppingcart-template-footer-column -->
<?php }

?>


<div class="container-product-box  ad_product_logo">
	<!-- Place somewhere in the <body> of your page -->
	<div class="flexslider carousel">
	  <ul class="slides">
	    <li>
	      <img src="/wp-content/uploads/2019/09/13-2.png" />
	    </li>
	    <li>
	      <img src="/wp-content/uploads/2019/09/12-2.png" />
	    </li>
	    <li>
	      <img src="/wp-content/uploads/2019/09/10-2.png" />
	    </li>
	    <li>
	      <img src="/wp-content/uploads/2019/09/9-2.png" />
	    </li>
	     <li>
	      <img src="/wp-content/uploads/2019/09/5-2.png" />
	    </li>
	    <li>
	      <img src="/wp-content/uploads/2019/09/4-2.png" />
	    </li>
	    <li>
	      <img src="/wp-content/uploads/2019/09/2-2.png" />
	    </li>
	    <li>
	      <img src="/wp-content/uploads/2019/09/logo-icon_brand.png" />
	    </li>
	    <li>
	      <img src="/wp-content/uploads/2019/09/7-2.png" />
	    </li>
	    <li>
	      <img src="/wp-content/uploads/2019/09/8-2.png" />
	    </li>
	    <!-- items mirrored twice, total of 12 -->
	  </ul>
	</div>
</div>

<?php
get_footer();