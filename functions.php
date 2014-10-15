<?php

function mobile_detected($agents) {
    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
    foreach($agents as $agent)
    {
        if(strpos($userAgent,strtolower($agent)) !== false)
            return true;
    }
    return false;
}

function pr_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery.js', false, '1.7.1', true );
	wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', false, '1.7.1', true );
	wp_register_script( 'main', get_template_directory_uri() . '/js/script.js', false, '1.7.1', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/vendor/custom.modernizr.js', false, '2.6.2', false );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'foundation' );
	wp_enqueue_script( 'main' );
	wp_enqueue_script( 'modernizr' );
}
add_action( 'wp_enqueue_scripts', 'pr_scripts' );

if ( ! isset( $content_width ) )
	$content_width = 1120;

// Register Theme Features
function side()  {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );	
	add_filter('show_admin_bar', '__return_false');
	add_theme_support( 'post-thumbnails' );	
	set_post_thumbnail_size( 1090, 613, true );
	add_image_size( 'large', 1090, 613, true );
	add_image_size( 'slider', 623, 350, true );
	add_image_size( 'thumb', 250, 250, true );
	add_image_size( 'header', 1090, 250, true );
	add_image_size( 'news', 340, 340 );
	$formats = array( 'image' );
	add_theme_support( 'post-formats', $formats );
	$background_args = array(
		'default-color'          => '',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args );
	$header_args = array(
		'default-image'          => '',
		'width'                  => 0,
		'height'                 => 0,
		'flex-width'             => false,
		'flex-height'            => false,
		'random-default'         => false,
		'header-text'            => false,
		'default-text-color'     => '',
		'uploads'                => true,
	);
	add_theme_support( 'custom-header', $header_args );
}
add_action( 'after_setup_theme', 'side' );

add_theme_support( 'menus' ); 

register_nav_menus( array(
	'main-menu' => 'Main Menu' // registers the menu in the WordPress admin menu editor
) );

function oembed_hd( $html, $url, $attr, $post_id ) {
	if ( strpos ( $html, 'feature=oembed' ) !== false )
		return str_replace( 'feature=oembed', 'feature=oembed&rel=0&vq=hd1080', $html );
	else
		return $html;
}
add_filter('embed_oembed_html', 'oembed_hd', 10, 4 );

// Register Custom Post Type
function what_we_do() {
	$labels = array(
		'name'                => _x( 'What We Do', 'Post Type General Name', 'side' ),
		'singular_name'       => _x( 'What We Do', 'Post Type Singular Name', 'side' ),
		'menu_name'           => __( 'What We Do', 'side' ),
		'parent_item_colon'   => __( 'Parent Category:', 'side' ),
		'all_items'           => __( 'All Categories', 'side' ),
		'view_item'           => __( 'View Category', 'side' ),
		'add_new_item'        => __( 'Add New Category', 'side' ),
		'add_new'             => __( 'New Category', 'side' ),
		'edit_item'           => __( 'Edit Category', 'side' ),
		'update_item'         => __( 'Update Category', 'side' ),
		'search_items'        => __( 'Search categories', 'side' ),
		'not_found'           => __( 'No categories found', 'side' ),
		'not_found_in_trash'  => __( 'No categories found in Trash', 'side' ),
	);
	$args = array(
		'label'               => __( 'what-we-do', 'side' ),
		'description'         => __( 'Side delivers amazing character performances that give your productions the edge.', 'side' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'what-we-do', $args );
}
add_action( 'init', 'what_we_do', 0 );

function home_slider() {
	$labels = array(
		'name'                => _x( 'Slider', 'Post Type General Name', 'side' ),
		'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'side' ),
		'menu_name'           => __( 'Slider', 'side' ),
		'parent_item_colon'   => __( 'Parent Slider:', 'side' ),
		'all_items'           => __( 'All Sliders', 'side' ),
		'view_item'           => __( 'View Slider', 'side' ),
		'add_new_item'        => __( 'Add New Slider', 'side' ),
		'add_new'             => __( 'New Slider', 'side' ),
		'edit_item'           => __( 'Edit Slider', 'side' ),
		'update_item'         => __( 'Update Slider', 'side' ),
		'search_items'        => __( 'Search sliders', 'side' ),
		'not_found'           => __( 'No sliders found', 'side' ),
		'not_found_in_trash'  => __( 'No sliders found in Trash', 'side' ),
	);
	$args = array(
		'label'               => __( 'slider', 'side' ),
		'description'         => __( 'Slider images', 'side' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'slider', $args );
}
add_action( 'init', 'home_slider', 0 );

function twitter()  {
	$args = array(
		'id'            => 'tweets',
		'name'          => __( 'Twitter', 'side' ),
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'twitter' );

function wwd_images( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Extra info',
		'pages' => array('what-we-do'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'What We Do image 1',
				'desc' => '',
				'type' => 'file',
				'id' => $prefix . 'wwd1'
			),	
			array(
				'name' => 'What We Do image 1 title',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'wwdt1'
			),	
			array(
				'name' => 'What We Do image 2',
				'desc' => '',
				'type' => 'file',
				'id' => $prefix . 'wwd2'
			),		
			array(
				'name' => 'What We Do image 2 title',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'wwdt2'
			),
			array(
				'name' => 'What We Do image 3',
				'desc' => '',
				'type' => 'file',
				'id' => $prefix . 'wwd3'
			),	
			array(
				'name' => 'What We Do image 3 title',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'wwdt3'
			),
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'wwd_images' );

function page_title( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'meta',
		'title' => 'Page Title',
		'pages' => array('page'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Page Title',
				'desc' => '',
				'type' => 'text',
				'id' => $prefix . 'test_title'
			)
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'page_title' );

add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'metabox/init.php' );
	}
}

function slider_project() {
    p2p_register_connection_type( array(
        'name' => 'slider_project', 
        'from' => 'slider',
        'to' => 'projects',
    ) );
}
add_action( 'p2p_init', 'slider_project' );

function what_we() {
    p2p_register_connection_type( array(
        'name' => 'what_we', 
        'from' => 'what-we-do',
        'to' => 'page',
    ) );
}
add_action( 'p2p_init', 'what_we' );

function foundation_nav_bar() {
    wp_nav_menu(array( 
    	'container' => false,
    	'container_class' => '',
    	'menu' => 'Main Menu',
    	'menu_class' => 'nav-bar',         // this adds the Foundation nav-bar class to the menu
    	'theme_location' => 'main-menu',
    	'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'depth' => 2,                      // Foundation Nav Bar only supports 2 levels
    	'fallback_cb' => 'main_nav_fb',    // this uses the below function to list pages as a menu
		'walker' => new nav_walker()       // this calls the walker for Foundation classes and descriptions
	));
}

function main_nav_fb() {
	echo '<ul class="nav-bar">';
	wp_list_pages(array(
		'depth'        => 0,
		'child_of'     => 0,
		'exclude'      => '',
		'include'      => '',
		'title_li'     => '',
		'echo'         => 1,
		'authors'      => '',
		'sort_column'  => 'menu_order, post_title',
		'link_before'  => '',
		'link_after'   => '',
		'walker'       => new page_walker(),
		'post_type'    => 'page',
		'post_status'  => 'publish' 
	));
	echo '</ul>';
}
class nav_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		$class_names = $value = '';
 
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		if (in_array( 'current-menu-item', $classes )){$classes[]= 'active';}
		if ($args->has_children){$classes[] = 'has-flyout';}
 
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';
 
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
 
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ! empty( $item->description ) ? ' class="has-desc"' : '';
 
		$description  = ! empty( $item->description ) ? '<span class="nav-desc">'.esc_attr( $item->description ).'</span>' : '';
 
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $description.$args->link_after;
           	if ( $args->has_children && $depth == 0 ) {
               		$item_output .= '</a><a href="#" class="flyout-toggle"><span> </span></a>';
           	 } else {
                	$item_output .= '</a>';
            	}
		$item_output .= $args->after;
 
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
    function end_el(&$output, $item, $depth) {
        $output .= "</li>\n";
    }
			
	function start_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu flyout\">\n";
	}
    function end_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent</ul>\n";
    }
				
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		}
		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}  	
	
} /* end nav walker */
class page_walker extends Walker_Page {
	function start_el(&$output, $page, $depth, $args, $current_page) {
		
	$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		extract($args, EXTR_SKIP);
		$classes = array('page_item', 'page-item-'.$page->ID);
		if ( !empty($current_page) ) {
			$_current_page = get_page( $current_page );
			if ( isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors) )
				$classes[] = 'current_page_ancestor';
			if ( $page->ID == $current_page )
				$classes[] = 'current_page_item active';
			elseif ( $_current_page && $page->ID == $_current_page->post_parent )
				$classes[] = 'current_page_parent';
		} elseif ( $page->ID == get_option('page_for_posts') ) {
			$classes[] = 'current_page_parent';
		}
		if ( get_children( $page->ID ) )
			$classes[] = 'has-flyout';
		
		$classes = implode(' ', apply_filters('page_css_class', $classes, $page));
		
		$output .= $indent . '<li class="' . $classes . '"><a href="' . get_page_link($page->ID) . '" title="' . esc_attr( wp_strip_all_tags( $page->post_title ) ) . '">' . $args['link_before'] . $page->post_title . $args['link_after'] . '</a>';
 
	}
    function end_el(&$output, $item, $depth) {
        $output .= "</li>\n";
    }
	
    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu flyout\">\n";
    }
    function end_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent</ul>\n";
    }
	
}

function annointed_admin_bar_remove() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

function remove_footer_admin () {
	echo '&copy; '. date('Y') . ' Side UK Ltd. All rights reserved.';
}
add_filter('admin_footer_text', 'remove_footer_admin');

function custom_colors() {
   echo '<style type="text/css">
           #cuar_dashboard_addons{display:none !important}
           #cuar_dashboard_marvinlabs{display:none !important}
         </style>';
}
add_action('admin_head', 'custom_colors');

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/img/Side-Logo.png);
            padding-bottom: 30px;
            background-size: 316px 213px;
            width: 316px;
            height: 213px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function wpfa_login_form( $args ) {
    $defaults = shortcode_atts( array(
        'echo'              => true,
        'redirect'          => site_url( '/wp-admin/' ),
        'form_id'           => 'loginform',
        'label_username'    => __( 'Username' ),
        'label_password'    => __( 'Password' ),
        'label_remember'    => __( 'Remember Me' ),
        'label_log_in'      => __( 'Log In' ),
        'id_username'       => 'user_login',
        'id_password'       => 'user_pass',
        'id_remember'       => 'rememberme',
        'id_submit'         => 'wp-submit',
        'remember'          => true,
        'value_username'    => NULL,
        'value_remember'    => false
    ), $args, 'wpfa_login' );
    $login_args = wp_parse_args( $args, $defaults );
    wp_login_form( $login_args );
}
add_shortcode( 'wpfa_login', 'wpfa_login_form' );