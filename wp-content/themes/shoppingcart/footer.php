<?php
/**
 * The template for displaying the footer.
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */

$shoppingcart_settings = shoppingcart_get_theme_options(); ?>
</div><!-- end #content -->
<!-- Footer Start ============================================= -->
<footer id="colophon" class="site-footer" role="contentinfo">
<?php

$footer_column = $shoppingcart_settings['shoppingcart_footer_column_section'];
	if( is_active_sidebar( 'shoppingcart_footer_1' ) || is_active_sidebar( 'shoppingcart_footer_2' ) || is_active_sidebar( 'shoppingcart_footer_3' ) || is_active_sidebar( 'shoppingcart_footer_4' )) { ?>
	<div class="widget-wrap">
		<div class="wrap">
			<div class="widget-area">
			<?php
				if($footer_column == '1' || $footer_column == '2' ||  $footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'shoppingcart_footer_1' ) ) :
						dynamic_sidebar( 'shoppingcart_footer_1' );
					endif;
				echo '</div><!-- end .column'.absint($footer_column). '  -->';
				}
				if($footer_column == '2' ||  $footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'shoppingcart_footer_2' ) ) :
						dynamic_sidebar( 'shoppingcart_footer_2' );
					endif;
				echo '</div><!--end .column'.absint($footer_column).'  -->';
				}
				if($footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'shoppingcart_footer_3' ) ) :
						dynamic_sidebar( 'shoppingcart_footer_3' );
					endif;
				echo '</div><!--end .column'.absint($footer_column).'  -->';
				}
				if($footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'shoppingcart_footer_4' ) ) :
						dynamic_sidebar( 'shoppingcart_footer_4' );
					endif;
					?><div class="widget woocommerce widget_products custom_blg_section">
						<h2>Blog</h2>
						<ul class="product_list_widget">
					<?php
            $args =array(
            'post_type' => 'custom_blogs',
            //'orderby'        => 'name',
            'order'          => 'DESC',
            //'hide_empty'     => 3,
            //'depth'          => 3,
            'posts_per_page' => 3,
            
            );
            $newShortStoriesablog3 = New WP_Query($args);
            ?>
            <!-- Featured Item -->
            <?php
            if( $newShortStoriesablog3-> have_posts()) :
            while($newShortStoriesablog3-> have_posts()) :
            $newShortStoriesablog3 -> the_post();
            ?>
            <div class="blog-entry-side">
									<div class="blog-post">
										<span class="img footer-blog" >
											<?php the_post_thumbnail( 'thumbnail' ); ?>
										</span>
										<div class="desc">
											<h3><?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?></h3>
										</div>
									</div>
								</div>
								<?php endwhile; endif;  wp_reset_query();?>
							</ul>
					</div><?php 
				echo '</div><!--end .column'.absint($footer_column).  '-->';
				}
				?>
			</div> <!-- end .widget-area -->
		</div><!-- end .wrap -->
	</div> <!-- end .widget-wrap -->
	<?php } ?>
	<div class="site-info">
	<div class="wrap">
	<?php do_action('shoppingcart_footer_menu');
	if($shoppingcart_settings['shoppingcart_buttom_social_icons'] == 0):
		do_action('shoppingcart_social_links');
	endif;
	if ( is_active_sidebar( 'shoppingcart_footer_options' ) ) :
		dynamic_sidebar( 'shoppingcart_footer_options' );
	else:
		echo '<div class="copyright">'; ?>
		<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" target="_blank" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name', 'display' ); ?></a> | 
						<?php esc_html_e('© 2019 Noveny Life'); ?>
						 <a title="<?php echo esc_attr__( 'Proudly Designed by ', 'Ayuroma Centre Team.' ); ?>" target="_blank" href="<?php echo esc_url( 'https://www.ayuromacentre.com/' ); ?>"><?php esc_html_e('Proudly Designed by');?>
						 </a> |
						<?php  echo '&copy; ' . date_i18n(__('Y','shoppingcart')) ; ?> 

						<a title="<?php echo esc_attr__( 'Proudly Designed by' );?>" target="_blank" href="<?php echo esc_url( 'https://www.ayuromacentre.com' );?>"><?php esc_html_e('Ayuroma Centre Team'); ?></a>
					</div>
	<?php endif; ?>
			<div style="clear:both;"></div>
		</div> <!-- end .wrap -->
	</div> <!-- end .site-info -->
	<?php
		$disable_scroll = $shoppingcart_settings['shoppingcart_scroll'];
		if($disable_scroll == 0):?>
			<button type="button" class="go-to-top" type="button">
				<span class="screen-reader-text"><?php esc_html_e('Go to top','shoppingcart'); ?></span>
				<span class="icon-bg"></span>
				<span class="back-to-top-text"><i class="fa fa-angle-up"></i></span>
				<i class="fa fa-angle-double-up back-to-top-icon"></i>
			</button>
	<?php endif; ?>
	<div class="page-overlay"></div>
</footer> <!-- end #colophon -->
</div><!-- end .site-content-contain -->
</div><!-- end #page -->
<?php wp_footer(); ?>
</body>
</html>
<script>
	jQuery(window).load(function() {
		jQuery('.main_slider_home .flexslider').flexslider({
    		animation: "slide",
    		animationLoop: true
  		});
  		jQuery('.flexslider').flexslider({
		    animation: "slide",
		    animationLoop: true,
		    itemWidth: 200,
		    itemMargin: 10
		  });
 		
	});
</script>

<script>
if (jQuery("body").hasClass("home")){
	const para = document.getElementById("bgpara");
window.addEventListener('scroll', function () {
    let move = window.pageYOffset;
    bgpara.style.backgroundPositionY = move * 0.5 + 'px';
});}
	else{
		console.log("home page not here")
 	}
 </script>
 <!--
// <?php 
// if(	is_home()){
// 	?>
// <script type="text/javascript">
// 	const para = document.getElementById("bgpara");
// window.addEventListener('scroll', function () {
//     let move = window.pageYOffset;
//     bgpara.style.backgroundPositionY = move * 0.5 + 'px';
// });
// </script>

// <?php
// }?>-->