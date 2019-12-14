 <?php

 get_header();

	global $shoppingcart_settings;

	$shoppingcart_settings = wp_parse_args(  get_option( 'shoppingcart_theme_options', array() ),  shoppingcart_get_option_defaults_values() );

	global $shoppingcart_content_layout;

	if( $post ) {

		$layout = get_post_meta( get_queried_object_id(), 'shoppingcart_sidebarlayout', true );

	}

	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {

		$layout = 'default';

	} ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<header class="page-header">
			<h1 class="page-title"><?php the_title();?></h1>
			<!-- .page-title -->
			<?php shoppingcart_breadcrumb(); ?><!-- .breadcrumb -->
		</header><!-- .page-header -->
		<?php ?>
		<div class="googlemaps_widget">
			<div class="maps-container">
				<?php if ( is_active_sidebar( 'shoppingcart_form_for_contact_page' ) ) :
				dynamic_sidebar( 'shoppingcart_form_for_contact_page' );
			endif;  ?>
			</div>
		</div>
		<div class="blog-main">
			<article  class="post sticky hentry ">
					<div class="post-image-content">
						<figure class="post-featured-image ad_blog_image">
							<?php the_post_thumbnail( 'large' ); ?>
						</figure><!-- end.post-featured-image  -->
					</div><!-- end.post-image-content -->
					<div class="post-all-content">
						<header class="entry-header">
							<div class="entry-meta">
								<span class="posted-on">
									<a href="https://demo.themefreesia.com/shoppingcart/2019/03/22/fashion-model-shoot/" title="8:39 am"><i class="fa fa-calendar-check-o"></i><?php the_date(); ?></a>
								</span>						
							</div>
							<h2 class="entry-title"> 
								<?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
							 </h2> <!-- end.entry-title -->
							<div class="entry-meta">
								<span class="author vcard"><strong>Post By</strong>
									<?php the_field('post_by_blog'); ?>
								</span>
				
								<span class="cat-links">
									<?php the_field('blog_categories'); ?>
								</span> <!-- end .cat-links -->
								<span class="tag-links">
									<?php echo get_the_date(); ?>
								</span> <!-- end .tag-links -->								
					 		</div><!-- end .entry-meta -->
						</header><!-- end .entry-header -->
						<div class="entry-content">
							<p><?php the_content(); ?></p>
						</div> <!-- end .entry-content -->
					</div> <!-- end .post-all-content -->
			</article>
			
		</div>
		</main> <!-- end #main -->

	</div> <!-- #primary -->

	<?php 

	if( 'default' == $layout ) { //Settings from customizer

		if(($shoppingcart_settings['shoppingcart_sidebar_layout_options'] != 'nosidebar') && ($shoppingcart_settings['shoppingcart_sidebar_layout_options'] != 'fullwidth')){ ?>

	<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Secondary', 'shoppingcart' ); ?>">

	<?php }

	}else{ // for page/ post

			if(($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>

	<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Secondary', 'shoppingcart' ); ?>">



		<?php }

		}

		if ( is_active_sidebar( 'shoppingcart_contact_page_sidebar' ) ) :

			dynamic_sidebar( 'shoppingcart_contact_page_sidebar' );

		endif;?>

		<?php 

		if( 'default' == $layout ) { //Settings from customizer

			if(($shoppingcart_settings['shoppingcart_sidebar_layout_options'] != 'nosidebar') && ($shoppingcart_settings['shoppingcart_sidebar_layout_options'] != 'fullwidth')): ?>

	</aside><!-- end #secondary -->

	<?php endif;

		}else{ // for page/post

			if(($layout != 'no-sidebar') && ($layout != 'full-width')){

				echo '</aside><!-- end #secondary -->';

			} 

		} ?>

</div><!-- end .wrap -->



<?php

get_footer();