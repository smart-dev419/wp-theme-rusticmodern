<?php
/**
 * Cogent functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, rusticmodern_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'rusticmodern_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Rustic_Modern
 * @since Rustic Modern 1.0
 */

/*
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/* Tell WordPress to run rusticmodern_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'rusticmodern_setup' );

if ( ! function_exists( 'rusticmodern_setup' ) ):
/**
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override rusticmodern_setup() in a child theme, add your own rusticmodern_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support()        To add support for post thumbnails, custom headers and backgrounds, and automatic feed links.
 * @uses register_nav_menus()       To add support for navigation menus.
 * @uses add_editor_style()         To style the visual editor.
 * @uses load_theme_textdomain()    For translation/localization support.
 * @uses set_post_thumbnail_size()  To set a custom post thumbnail size.
 *
 * @since Rustic Modern 1.0
 */
function rusticmodern_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'rusticmodern', get_template_directory() . '/languages' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'rusticmodern' ),
		'footer' => __( 'Footer Navigation', 'rusticmodern' ),
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', array(
		// Let WordPress know what our default background color is.
		'default-color' => 'f1f1f1',
	) );





	add_image_size( 'rusticmodern-medium', 550, 550, true );

}
endif;

if ( ! function_exists( 'rusticmodern_admin_header_style' ) ) :
/**
 * Style the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in rusticmodern_setup().
 *
 * @since Rustic Modern 1.0
 */
function rusticmodern_admin_header_style() {
?>
<style type="text/css" id="rusticmodern-admin-header-css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If header-text was supported, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

/**
 * Show a home link for our wp_nav_menu() fallback, wp_page_menu().
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Rustic Modern 1.0
 *
 * @param array $args An optional array of arguments. @see wp_page_menu()
 */
function rusticmodern_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'rusticmodern_page_menu_args' );



/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Rustic Modern's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since Rustic Modern 1.2
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 * @since Rustic Modern 1.0
 * @deprecated Deprecated in Rustic Modern 1.2 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function rusticmodern_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'rusticmodern_remove_gallery_css' );

if ( ! function_exists( 'rusticmodern_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own rusticmodern_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Rustic Modern 1.0
 *
 * @param object $comment The comment object.
 * @param array  $args    An array of arguments. @see get_comment_reply_link()
 * @param int    $depth   The depth of the comment.
 */
function rusticmodern_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 40 ); ?>
				<?php printf( __( '%s <span class="says">says:</span>', 'rusticmodern' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
			</div><!-- .comment-author .vcard -->
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'rusticmodern' ); ?></em>
				<br />
			<?php endif; ?>

			<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s at %2$s', 'rusticmodern' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'rusticmodern' ), ' ' );
				?>
			</div><!-- .comment-meta .commentmetadata -->

			<div class="comment-body"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'rusticmodern' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'rusticmodern' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override rusticmodern_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Rustic Modern 1.0
 *
 * @uses register_sidebar()
 */
function rusticmodern_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'rusticmodern' ),
		'id' => 'primary-widget-area',
		'description' => __( 'Add widgets here to appear in your sidebar.', 'rusticmodern' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'rusticmodern' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'An optional secondary widget area, displays below the primary widget area in your sidebar.', 'rusticmodern' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'rusticmodern' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'An optional widget area for your site footer.', 'rusticmodern' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'rusticmodern' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'An optional widget area for your site footer.', 'rusticmodern' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'rusticmodern' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'An optional widget area for your site footer.', 'rusticmodern' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'rusticmodern' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'An optional widget area for your site footer.', 'rusticmodern' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running rusticmodern_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'rusticmodern_widgets_init' );

/**
 * Remove the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using Rustic Modern 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default Rustic Modern styling.
 *
 * @since Rustic Modern 1.0
 */
function rusticmodern_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'rusticmodern_remove_recent_comments_style' );

if ( ! function_exists( 'rusticmodern_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Rustic Modern 1.0
 */
function rusticmodern_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'rusticmodern' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'rusticmodern' ), get_the_author() ) ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'rusticmodern_posted_in' ) ) :
/**
 * Print HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Rustic Modern 1.0
 */
function rusticmodern_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'rusticmodern' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'rusticmodern' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'rusticmodern' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/**
 * Retrieve the IDs for images in a gallery.
 *
 * @uses get_post_galleries() First, if available. Falls back to shortcode parsing,
 *                            then as last option uses a get_posts() call.
 *
 * @since Rustic Modern 1.6.
 *
 * @return array List of image IDs from the post gallery.
 */
function rusticmodern_get_gallery_images() {
	$images = array();

	if ( function_exists( 'get_post_galleries' ) ) {
		$galleries = get_post_galleries( get_the_ID(), false );
		if ( isset( $galleries[0]['ids'] ) )
		 	$images = explode( ',', $galleries[0]['ids'] );
	} else {
		$pattern = get_shortcode_regex();
		preg_match( "/$pattern/s", get_the_content(), $match );
		$atts = shortcode_parse_atts( $match[3] );
		if ( isset( $atts['ids'] ) )
			$images = explode( ',', $atts['ids'] );
	}

	if ( ! $images ) {
		$images = get_posts( array(
			'fields'         => 'ids',
			'numberposts'    => 999,
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'post_mime_type' => 'image',
			'post_parent'    => get_the_ID(),
			'post_type'      => 'attachment',
		) );
	}

	return $images;
}





/**
 *  hide admin bar
 */
add_filter('show_admin_bar', '__return_false');


/**
 *  ACF options
 */
add_filter('acf/options_page/settings', 'my_options_page_settings');

function my_options_page_settings($options){
	$options['title'] = __('Global');
	$options['pages'] = array(
		__('Global')
	);

	return	$options;
}

//define( 'ACF_LITE', true );
get_template_part("inc/advanced-custom-fields/acf");
get_template_part("inc/acf-repeater/acf-repeater");
get_template_part("inc/acf-options-page/acf-options-page");
get_template_part("inc/rm-custom-fields");
get_template_part("inc/gravityforms/gravityforms");

/**
 *  add page or post name to body class
 */
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


function curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}


function custom_read_more() {
    return '... <a class="read-more" href="'.get_permalink(get_the_ID()).'">read more</a>';
}
function excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit, custom_read_more());
}

/*--------------------------------------*/
/*    Clean up Shortcodes
/*--------------------------------------*/			
function wpex_clean_shortcodes($content){   
	$array = array (
		'<p>[' => '[', 
		']</p>' => ']', 
		']<br />' => ']'
	);
	$content = strtr($content, $array);
	return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');










/**
 * Enqueues scripts and styles.
 *
 * @since Rustic Modern 1.0
 */
function rusticmodern_styles_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'rusticmodern-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'rusticmodern-ie', get_template_directory_uri() . '/css/ie/ie.css', array( 'rusticmodern-style' ), '20150930' );
	wp_style_add_data( 'rusticmodern-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'rusticmodern-ie8', get_template_directory_uri() . '/css/ie/ie8.css', array( 'rusticmodern-style' ), '20151230' );
	wp_style_add_data( 'rusticmodern-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'rusticmodern-ie7', get_template_directory_uri() . '/css/ie/ie7.css', array( 'rusticmodern-style' ), '20150930' );
	wp_style_add_data( 'rusticmodern-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'rusticmodern-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'rusticmodern-html5', 'conditional', 'lt IE 9' );






	// Add bootstrap css.
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/library/bootstrap/css/bootstrap.css', array(), '3.3.6' );
	// Add custom normalize css.
	wp_enqueue_style( 'normalize-style', get_template_directory_uri() . '/css/normal.css', array( 'bootstrap-style' ) );


	/** meanmenu plugin **/
	wp_enqueue_style( 'meanmenu-style', get_template_directory_uri() . '/library/meanmenu/meanmenu.css', array( 'normalize-style' ) );
	wp_enqueue_script( 'meanmenu-script', get_template_directory_uri() . '/library/meanmenu/jquery.meanmenu.js', array( 'jquery' ) );
	/** meanmenu plugin **/


	// Add main css.
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.css', array( 'normalize-style' ) );
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ) );


	if( is_page_template( 'page-home.php' ) || is_page( 'home' ) ) { 
	   	wp_enqueue_style( 'home-style', get_template_directory_uri() .'/css/home.css', array( 'main-style' ) );		
	   	wp_enqueue_script( 'home-script', get_template_directory_uri() .'/js/home.js', array( 'main-script' ) );		
	}
	
	if( is_page_template( 'page-blog.php' ) || is_page( 'blog' ) || get_post_type() == 'post' ) { 
	   	wp_enqueue_style( 'blog-style', get_template_directory_uri() .'/css/blog.css', array( 'main-style' ) );		
	}
	
	if( is_page_template( 'page-contact.php' ) || is_page( 'contact' ) ) { 
	   	wp_enqueue_style( 'contact-style', get_template_directory_uri() .'/css/contact.css', array( 'main-style' ) );		
	}
	
	if( is_page_template( 'page-portfolio.php' ) || is_page( 'portfolio' ) ) { 
	   	wp_enqueue_style( 'portfolio-style', get_template_directory_uri() .'/css/portfolio.css', array( 'main-style' ) );		
	   	wp_enqueue_script( 'portfolio-script', get_template_directory_uri() .'/js/portfolio.js', array( 'main-script' ) );		
	}

	if( is_page_template( 'page-team.php' ) || is_page( 'team' ) ) { 
	   	wp_enqueue_style( 'team-style', get_template_directory_uri() .'/css/team.css', array( 'main-style' ) );		
	}
	

	// wp_localize_script( 'rusticmodern-script', 'screenReaderText', array(
	// 	'expand'   => __( 'expand child menu', 'rusticmodern' ),
	// 	'collapse' => __( 'collapse child menu', 'rusticmodern' ),
	// ) );
}
add_action( 'wp_enqueue_scripts', 'rusticmodern_styles_scripts' );

