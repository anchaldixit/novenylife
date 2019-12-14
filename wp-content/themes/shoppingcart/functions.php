<?php
/**
 * Display all shoppingcart functions and definitions
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */

/************************************************************************************************/
if ( ! function_exists( 'shoppingcart_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shoppingcart_setup() {
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
			$content_width=1170;
	}

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('post-thumbnails');
	add_image_size( 'shoppingcart-product-cat-image', 512, 512, true );
	add_image_size( 'shoppingcart-featured-brand-image', 400, 200, true );
	add_image_size( 'shoppingcart-grid-product-image', 420, 420, true );
	add_image_size( 'shoppingcart-popular-post', 75, 75, true );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'top-menu' => __( 'Top Menu', 'shoppingcart' ),
		'primary' => __( 'Main Menu', 'shoppingcart' ),
		'catalog-menu' => __( 'Catalog Menu', 'shoppingcart' ),
		'social-link'  => __( 'Add Social Icons Only', 'shoppingcart' ),
	) );

	/* 
	* Enable support for custom logo. 
	*
	*/ 
	add_theme_support( 'custom-logo', array(
		'flex-width' => true, 
		'flex-height' => true,
	) );

	add_theme_support( 'gutenberg', array(
			'colors' => array(
				'#f77426',
			),
		) );
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	//Indicate widget sidebars can use selective refresh in the Customizer. 
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Switch default core markup for comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form', 'comment-list', 'gallery', 'caption',
	) );



	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat' ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'shoppingcart_custom_background_args', array(
		'default-color' => '#ffffff',
		'default-image' => '',
	) ) );

	add_editor_style( array( 'css/editor-style.css') );

	if ( class_exists( 'WooCommerce' ) ) {

		/**
		 * Load WooCommerce compatibility files.
		 */
			
		require get_template_directory() . '/woocommerce/functions.php';

	}


}
endif; // shoppingcart_setup
add_action( 'after_setup_theme', 'shoppingcart_setup' );

/***************************************************************************************/
function shoppingcart_content_width() {
	if ( is_page_template( 'page-templates/gallery-template.php' ) || is_attachment() ) {
		global $content_width;
		$content_width = 1920;
	}
}
add_action( 'template_redirect', 'shoppingcart_content_width' );

/***************************************************************************************/
if(!function_exists('shoppingcart_get_theme_options')):
	function shoppingcart_get_theme_options() {
	    return wp_parse_args(  get_option( 'shoppingcart_theme_options', array() ), shoppingcart_get_option_defaults_values() );
	}
endif;

/***************************************************************************************/
require get_template_directory() . '/inc/customizer/shoppingcart-default-values.php';
require get_template_directory() . '/inc/settings/shoppingcart-slider-functions.php';
require get_template_directory() . '/inc/settings/shoppingcart-functions.php';
require get_template_directory() . '/inc/settings/shoppingcart-common-functions.php';

/************************ ShoppingCart Sidebar  *****************************/
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/popular-posts.php';

if ( class_exists('woocommerce')) {
	require get_template_directory() . '/inc/widgets/widgets-functions/grid-column-widget.php';
}

/************************ ShoppingCart Customizer  *****************************/
require get_template_directory() . '/inc/customizer/functions/sanitize-functions.php';
require get_template_directory() . '/inc/customizer/functions/register-panel.php';

function shoppingcart_customize_register( $wp_customize ) {
if(!class_exists('ShoppingCart_Plus_Features')){
	class ShoppingCart_Customize_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
			<a title="<?php esc_html_e( 'Review Us', 'shoppingcart' ); ?>" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/shoppingcart/' ); ?>" target="_blank" id="about_shoppingcart">
			<?php esc_html_e( 'Review Us', 'shoppingcart' ); ?>
			</a><br/>
			<a href="<?php echo esc_url( 'https://themefreesia.com/theme-instruction/shoppingcart/' ); ?>" title="<?php esc_html_e( 'Theme Instructions', 'shoppingcart' ); ?>" target="_blank" id="about_shoppingcart">
			<?php esc_html_e( 'Theme Instructions', 'shoppingcart' ); ?>
			</a><br/>
			<a href="<?php echo esc_url( 'https://tickets.themefreesia.com/' ); ?>" title="<?php esc_html_e( 'Support Tickets', 'shoppingcart' ); ?>" target="_blank" id="about_shoppingcart">
			<?php esc_html_e( 'Support Tickets', 'shoppingcart' ); ?>
			</a><br/>
		<?php
		}
	}
	$wp_customize->add_section('shoppingcart_upgrade_links', array(
		'title'					=> __('Important Links', 'shoppingcart'),
		'priority'				=> 1000,
	));
	$wp_customize->add_setting( 'shoppingcart_upgrade_links', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new ShoppingCart_Customize_upgrade(
		$wp_customize,
		'shoppingcart_upgrade_links',
			array(
				'section'				=> 'shoppingcart_upgrade_links',
				'settings'				=> 'shoppingcart_upgrade_links',
			)
		)
	);
}	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'shoppingcart_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'shoppingcart_customize_partial_blogdescription',
		) );
	}
	
	require get_template_directory() . '/inc/customizer/functions/design-options.php';
	require get_template_directory() . '/inc/customizer/functions/theme-options.php';
	require get_template_directory() . '/inc/customizer/functions/color-options.php' ;
	require get_template_directory() . '/inc/customizer/functions/featured-content-customizer.php' ;
	if ( class_exists( 'WooCommerce' ) ) {

		require get_template_directory() . '/inc/customizer/functions/frontpage-features.php' ;

	}
}
if(!class_exists('ShoppingCart_Plus_Features')){
	// Add Upgrade to Plus Button.
	require_once( trailingslashit( get_template_directory() ) . 'inc/upgrade-plus/class-customize.php' );

	/************************ TGM Plugin Activatyion  *****************************/
	require get_template_directory() . '/inc/tgm/tgm.php';
}

if ( ! function_exists('custom_blogs') ) {

// Register Custom Post Type
function custom_blogs() {

	$labels = array(
		'name'                  => _x( 'custom_blogs', 'Post Type General Name', 'Custom blogs' ),
		'singular_name'         => _x( 'blogs_details', 'Post Type Singular Name', 'Custom blogs' ),
		'menu_name'             => __( 'Blogs', 'Custom blogs' ),
		'name_admin_bar'        => __( 'Custom_Blogs', 'Custom blogs' ),
		'archives'              => __( 'custom_blogs', 'Custom blogs' ),
		'attributes'            => __( 'Item Attributes', 'Custom blogs' ),
		'parent_item_colon'     => __( 'Parent Item:', 'Custom blogs' ),
		'all_items'             => __( 'All Items', 'Custom blogs' ),
		'add_new_item'          => __( 'Add New Item', 'Custom blogs' ),
		'add_new'               => __( 'Add New', 'Custom blogs' ),
		'new_item'              => __( 'New Item', 'Custom blogs' ),
		'edit_item'             => __( 'Edit Item', 'Custom blogs' ),
		'update_item'           => __( 'Update Item', 'Custom blogs' ),
		'view_item'             => __( 'View Item', 'Custom blogs' ),
		'view_items'            => __( 'View Items', 'Custom blogs' ),
		'search_items'          => __( 'Search Item', 'Custom blogs' ),
		'not_found'             => __( 'Not found', 'Custom blogs' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'Custom blogs' ),
		'featured_image'        => __( 'Featured Image', 'Custom blogs' ),
		'set_featured_image'    => __( 'Set featured image', 'Custom blogs' ),
		'remove_featured_image' => __( 'Remove featured image', 'Custom blogs' ),
		'use_featured_image'    => __( 'Use as featured image', 'Custom blogs' ),
		'insert_into_item'      => __( 'Insert into item', 'Custom blogs' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'Custom blogs' ),
		'items_list'            => __( 'Items list', 'Custom blogs' ),
		'items_list_navigation' => __( 'Items list navigation', 'Custom blogs' ),
		'filter_items_list'     => __( 'Filter items list', 'Custom blogs' ),
	);
	$args = array(
		'label'                 => __( 'custom_blogs', 'Custom blogs' ),
		'description'           => __( 'Blogs', 'Custom blogs' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'custom_blogs', $args );

}
add_action( 'init', 'custom_blogs', 0 );

}
/** 
* Render the site title for the selective refresh partial. 
* @see shoppingcart_customize_register() 
* @return void 
*/ 
function shoppingcart_customize_partial_blogname() { 
bloginfo( 'name' ); 
} 

/** 
* Render the site tagline for the selective refresh partial. 
* @see shoppingcart_customize_register() 
* @return void 
*/ 
function shoppingcart_customize_partial_blogdescription() { 
bloginfo( 'description' ); 
}
add_action( 'customize_register', 'shoppingcart_customize_register' );
/******************* ShoppingCart Header Display *************************/
function shoppingcart_header_display(){
	$shoppingcart_settings = shoppingcart_get_theme_options();

$header_display = $shoppingcart_settings['shoppingcart_header_display'];

		if ($header_display == 'header_logo' || $header_display == 'show_both') {
			shoppingcart_the_custom_logo();
		}
		if ($header_display == 'header_text' || $header_display == 'show_both') {
			echo '<div id="site-detail">';
				if (is_home() || is_front_page()){ ?>
					<h1 id="site-title"> <?php }else{?> <h2 id="site-title"> <?php } ?>
					<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_html(get_bloginfo('name', 'display'));?>" rel="home"> <?php bloginfo('name');?> </a>
					<?php if(is_home() || is_front_page()){ ?>
					</h1>  <!-- end .site-title -->
					<?php } else { ?> </h2> <!-- end .site-title --> <?php }

					$site_description = get_bloginfo( 'description', 'display' );
					if ($site_description){?>
						<div id="site-description"> <?php bloginfo('description');?> </div> <!-- end #site-description -->
				<?php }
			echo '</div>'; // end #site-detail
		}

}
add_action('shoppingcart_site_branding','shoppingcart_header_display');

if ( ! function_exists( 'shoppingcart_the_custom_logo' ) ) : 
 	/** 
 	 * Displays the optional custom logo. 
 	 * Does nothing if the custom logo is not available. 
 	 */ 
 	function shoppingcart_the_custom_logo() { 
		if ( function_exists( 'the_custom_logo' ) ) { 
			the_custom_logo(); 
		}
 	} 
endif;

require get_template_directory() . '/inc/front-page/front-page-features.php';

/************** YITH_WCWL *************************************/
if ( function_exists( 'YITH_WCWL' ) ) {
	function shoppingcart_update_wishlist_count(){
		wp_send_json( YITH_WCWL()->count_products() );
	}
	add_action( 'wp_ajax_update_wishlist_count', 'shoppingcart_update_wishlist_count' );
	add_action( 'wp_ajax_nopriv_update_wishlist_count', 'shoppingcart_update_wishlist_count' );
}


/************** Add to cart ajax autoload *************************************/
add_filter( 'woocommerce_add_to_cart_fragments', 'shoppingcart_woocommerce_add_to_cart_fragment' );

function shoppingcart_woocommerce_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
			<div class="sx-cart-views">
				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="wcmenucart-contents">
					<i class="fa fa-shopping-basket"></i>
					<span class="cart-value"><?php echo wp_kses_data ( WC()->cart->get_cart_contents_count() ); ?></span>
				</a>
				<div class="my-cart-wrap">
					<div class="my-cart"><?php esc_html_e('Total', 'shoppingcart'); ?></div>
					<div class="cart-total"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></div>
				</div>
			</div>
	<?php

	$fragments['div.sx-cart-views'] = ob_get_clean();

	return $fragments;
}
function woocommerce_variable_add_to_cart(){
    global $product, $post;

    $variations = find_valid_variations();

    // Check if the special 'price_grid' meta is set, if it is, load the default template:
    if ( get_post_meta($post->ID, 'price_grid', true) ) {
        // Enqueue variation scripts
        wp_enqueue_script( 'wc-add-to-cart-variation' );

        // Load the template
        wc_get_template( 'single-product/add-to-cart/variable.php', array(
                'available_variations'  => $product->get_available_variations(),
                'attributes'            => $product->get_variation_attributes(),
                'selected_attributes'   => $product->get_variation_default_attributes()
            ) );
        return;
    }

    // Cool, lets do our own template!
    ?>
    <table class="variations variations-grid" cellspacing="0">
        <tbody>
            <?php
            foreach ($variations as $key => $value) {
                if( !$value['variation_is_visible'] ) continue;
            ?>
            <tr>
				 <td class="ad_img_size">
                     <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
					 <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
                </td>
                <td>
                    <?php foreach($value['attributes'] as $key => $val ) {
                        $val = str_replace(array('-','_'), ' ', $val);
                        printf( '<span class="attr attr-%s">%s</span>', $key, ucwords($val) );
                    } ?>
                </td>
                <td>
                    <?php echo $value['price_html'];?>
                </td>
                <td>
                    <?php if( $value['is_in_stock'] ) { ?>
                    <form class="cart" action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" method="post" enctype='multipart/form-data'>
                        <?php woocommerce_quantity_input(); ?>
                        <?php
                        if(!empty($value['attributes'])){
                            foreach ($value['attributes'] as $attr_key => $attr_value) {
                            ?>
                            <input type="hidden" name="<?php echo $attr_key?>" value="<?php echo $attr_value?>">
                            <?php
                            }
                        }
                        ?>
                        <button type="submit" class="single_add_to_cart_button btn btn-primary"><span class="glyphicon glyphicon-tag"></span> Add to cart</button>
                        <input type="hidden" name="variation_id" value="<?php echo $value['variation_id']?>" />
                        <input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" />
                        <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $post->ID ); ?>" />
                    </form>
                    <?php } else { ?>
                        <p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
}
function find_valid_variations() {
    global $product;

    $variations = $product->get_available_variations();
    $attributes = $product->get_attributes();
    $new_variants = array();

    // Loop through all variations
    foreach( $variations as $variation ) {

        // Peruse the attributes.

        // 1. If both are explicitly set, this is a valid variation
        // 2. If one is not set, that means any, and we must 'create' the rest.

        $valid = true; // so far
        foreach( $attributes as $slug => $args ) {
            if( array_key_exists("attribute_$slug", $variation['attributes']) && !empty($variation['attributes']["attribute_$slug"]) ) {
                // Exists

            } else {
                // Not exists, create
                $valid = false; // it contains 'anys'
                // loop through all options for the 'ANY' attribute, and add each
                foreach( explode( '|', $attributes[$slug]['value']) as $attribute ) {
                    $attribute = trim( $attribute );
                    $new_variant = $variation;
                    $new_variant['attributes']["attribute_$slug"] = $attribute;
                    $new_variants[] = $new_variant;
                }

            }
        }

        // This contains ALL set attributes, and is itself a 'valid' variation.
        if( $valid )
            $new_variants[] = $variation;

    }

    return $new_variants;
}
function addsingle(){ ?>
	<div class="ad_product-benefits">
		<h2><?php the_field('description_heading'); ?></h2>
		<?php
	 	if( have_rows('product_details') ): ?>
			<div class="ad_product-single col-md-12">
				<?php while( have_rows('product_details') ): the_row(); 
					
					$image = get_sub_field('product_Image');
					$content = get_sub_field('product_content');
					?>
					<div class="col-md-4 ad_product-imformession">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
						<?php echo $content; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; 
		?>
		</div><?php
		}
add_action('woocommerce_after_single_product_summary','addsingle');

//single product page how to used section
function easystrong(){ ?>
	<div class="ad_product_easywaystouse">
		<h2><?php the_field('easy_ways_to_use_heading'); ?></h2>
		<?php
	 	if( have_rows('easy_ways_to_use') ): ?>
			<div class="ad_easywaystouse col-md-12">
				<?php while( have_rows('easy_ways_to_use') ): the_row(); 
					
					$image = get_sub_field('easy_ways_to_use_image');
					$content = get_sub_field('easy_ways_to_use_text');
					?>
					<div class="col-md-4 ad_easywaystouse-imfor">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
						<?php echo $content; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; 
		?>
		</div><?php
		}
add_action('woocommerce_after_single_product_summary','easystrong');
?>
<?php
function easystrongsss(){ ?>
	<div class="ad_product_easywaystouse">
		<h2><?php the_field('noveny_strong_heading'); ?></h2>
		<?php
	 	if( have_rows('noveny_strong_section') ): ?>
			<div class="ad_easywaystouse col-md-12">
				<?php while( have_rows('noveny_strong_section') ): the_row(); 
					
					$strongimage = get_sub_field('noveny_strong_image');
					$contentstrong = get_sub_field('noveny_strong_content');
					?>
					<div class="col-md-4 ad_easywaystouse-imfor">
						<img src="<?php echo $strongimage['url']; ?>" alt="<?php echo $strongimage['alt'] ?>" />
						<?php echo $contentstrong; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; 
		?>
		</div><?php
		}
add_action('woocommerce_after_single_product_summary','easystrongsss');

?>
<?php
function new_excerpt_more($more) {
    global $post;
    return '... <a href="'. get_permalink($post->ID) . '">Continue Reading</a>.';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>