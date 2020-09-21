<?php
/**
 * Ample magazine functions and definitions
 *
 * @link https://developer.ample_magazine.org/themes/basics/theme-functions/
 *
 * @package ample_magazine
 */

if ( ! function_exists( 'ample_magazine_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ample_magazine_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on News Miles, use a find and replace
		 * to change 'ample-magazine' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ample-magazine', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.ample_magazine.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'ample-magazine' ),
			'top-menu' => esc_html__( 'Top Menu', 'ample-magazine' ),
			'buttom-menu' => esc_html__( 'Buttom Menu', 'ample-magazine' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		/*
                        * Enable support for Post Formats.
                        *
                        * See: https://codex.wordpress.org/Post_Formats
                        */
		add_theme_support('post-formats', array(
			'image',
			'video',
			'gallery',
			'audio',
		));


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ample_magazine_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.ample_magazine.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_image_size( 'ample-magazine-feature', 549, 465 );
		add_image_size( 'ample-magazine-feature1', 470.5, 280 );
		add_image_size( 'ample-magazine-feature2', 233.75, 182 );
		add_image_size( 'ample-magazine-latest', 230, 153 );
		add_image_size( 'ample-magazine-multicat', 360, 239.5 );
		add_image_size( 'ample-magazine-multicat-small', 100, 75 );
		add_image_size( 'ample-magazine-big-image', 360, 340 );
		add_image_size( 'ample-magazine-small-image', 100, 75 );

		/**
		 * Register support for Gutenberg wide width in your theme
		 */

	       add_theme_support( 'align-wide' );
		
	}
endif;
add_action( 'after_setup_theme', 'ample_magazine_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ample_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ample_magazine_content_width', 640 );
}
add_action( 'after_setup_theme', 'ample_magazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.ample_magazine.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ample_magazine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Advertisement Area', 'ample-magazine' ),
		'id'            => 'advertisement',
		'description'   => esc_html__( 'Add widgets here.', 'ample-magazine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="head-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ample-magazine' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ample-magazine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="head-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	
	
    register_sidebar( array(
        'name'          => esc_html__( 'HomePage Section ', 'ample-magazine' ),
        'id'            => 'home-sections',
        'description'   => esc_html__( 'Add  widgets here what you want in home widgets.', 'ample-magazine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
		'before_title'  => '<h3 class="head-title"><span>',
		'after_title'   => '</span></h3>',
    ) );

	register_sidebar( array(
		'name'          => esc_html__( 'HomePage Section with No Sidebar  ', 'ample-magazine' ),
		'id'            => 'home-sections-2',
		'description'   => esc_html__( 'Add  widgets here what you want in home widgets.', 'ample-magazine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="head-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	register_sidebar(array(
		'name' => esc_html__('Footer1 ', 'ample-magazine'),
		'id' => 'footer1',
		'description' => esc_html__('Add widgets here.', 'ample-magazine'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="head-title"><span>',
		'after_title'   => '</span></h3>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer2 ', 'ample-magazine'),
		'id' => 'footer2',
		'description' => esc_html__('Add widgets here.', 'ample-magazine'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="head-title"><span>',
		'after_title'   => '</span></h3>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer3 ', 'ample-magazine'),
		'id' => 'footer3',
		'description' => esc_html__('Add widgets here.', 'ample-magazine'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="head-title"><span>',
		'after_title'   => '</span></h3>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer4 ', 'ample-magazine'),
		'id' => 'footer4',
		'description' => esc_html__('Add widgets here.', 'ample-magazine'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="head-title"><span>',
		'after_title'   => '</span></h3>',
	));
	register_sidebar( array(
		'name'          => esc_html__( 'Banner Sidebar For Layout 3', 'ample-magazine' ),
		'id'            => 'banner-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'ample-magazine' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="head-title"><span>',
		'after_title'   => '</span></h3>',
	) );

}
add_action( 'widgets_init', 'ample_magazine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ample_magazine_scripts() {
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/assets/fontawesome/css/all.min.css');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css');
	wp_enqueue_style( 'animate', get_template_directory_uri() .'/assets/css/animate.css');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() .'/assets/css/owl.carousel.min.css');
	wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() .'/assets/css/owl.theme.default.min.css');
	wp_enqueue_style( 'ample-magazine-blocks', get_template_directory_uri() .'/assets/css/blocks.min.css');
	wp_enqueue_style( 'ample-magazine-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ample-magazine-media-responsive', get_template_directory_uri() .'/assets/css/media-responsive.css');
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'marquee', get_template_directory_uri() . '/assets/js/marquee.js', array('jquery'), '4.5.0' );
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), '4.5.0' );
	wp_enqueue_script( 'ample-magazine-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'ample-magazine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ample-magazine-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ample_magazine_scripts' );

/*admin enqueue */


if (!function_exists('ample_magazine_admin_css_enqueue_new_post')) :
	function ample_magazine_admin_css_enqueue_new_post($hook)
	{
		if ('post-new.php' != $hook) {
			return;
		}
		wp_enqueue_style('ample-magazine-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '2.0.0');
		
	}
	add_action('admin_enqueue_scripts', 'ample_magazine_admin_css_enqueue_new_post');
endif;

/**
 * Widget assets for image upload
 *
 * @return void
 */




add_action('admin_enqueue_scripts', 'ample_magazine_widgets_backend_enqueue');
function ample_magazine_widgets_backend_enqueue()
{
	wp_register_script('ample-magazine-custom-widgets', get_template_directory_uri() . '/assets/js/widget.js', array('jquery'), true);
	wp_enqueue_media();
	wp_enqueue_script('ample-magazine-custom-widgets');
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';



/**
 * All file loader.
 */
require get_template_directory() . '/inc/ample-themes/fileloader.php';;


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}







/**
 * Utility function to check if a gravatar exists for a given email or id
 * @param int|string|object $id_or_email A user ID,  email address, or comment object
 * @return bool if the gravatar exists or not
 * https://gist.github.com/justinph/5197810#file-validate_gravatar-php
 */

function ample_magazine_validate_gravatar($id_or_email) {
    //id or email code borrowed from wp-includes/pluggable.php
    $email = '';
    if ( is_numeric($id_or_email) ) {
        $id = (int) $id_or_email;
        $user = get_userdata($id);
        if ( $user )
            $email = $user->user_email;
    } elseif ( is_object($id_or_email) ) {
        // No avatar for pingbacks or trackbacks
        $allowed_comment_types = apply_filters( 'get_avatar_comment_types', array( 'comment' ) );
        if ( ! empty( $id_or_email->comment_type ) && ! in_array( $id_or_email->comment_type, (array) $allowed_comment_types ) )
            return false;

        if ( !empty($id_or_email->user_id) ) {
            $id = (int) $id_or_email->user_id;
            $user = get_userdata($id);
            if ( $user)
                $email = $user->user_email;
        } elseif ( !empty($id_or_email->comment_author_email) ) {
            $email = $id_or_email->comment_author_email;
        }
    } else {
        $email = $id_or_email;
    }

    $hashkey = md5(strtolower(trim($email)));
    $uri = 'http://www.gravatar.com/avatar/' . $hashkey . '?d=404';

    $data = wp_cache_get($hashkey);
    if (false === $data) {
        $response = wp_remote_head($uri);
        if( is_wp_error($response) ) {
            $data = 'not200';
        } else {
            $data = $response['response']['code'];
        }
        wp_cache_set($hashkey, $data, $group = '', $expire = 60*5);

    }
    if ($data == '200'){
        return true;
    } else {
        return false;
    }
}
//image define
if ( ! function_exists( 'ample_magazine_post_thumbnail' ) ) :

	function  ample_magazine_post_thumbnail(){

                                            if (has_post_thumbnail()) {
												$image_id = get_post_thumbnail_id();
												$image_url = wp_get_attachment_image_src($image_id, 'large', true);
												?>
												<a href="<?php the_permalink(); ?>"><img class="img-responsive"
																						 src="<?php echo esc_url($image_url[0]); ?>"
																						 alt="<?php the_title_attribute(); ?>"/></a>

											<?php }

}
endif;








/*for sidebar adding options**/

function ample_magazine_names( $classes ) {
	// add 'class-name' to the $classes array
	$sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'ample_magazine_sidebar_layout', true) );
	if (is_singular() && $sidebardesignlayout != "default-sidebar")
	{
		$sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'ample_magazine_sidebar_layout', true) );

	} else
	{
		$sidebardesignlayout = esc_attr(ample_magazine_get_option('ample_magazine_sidebar_layout_option' ));
	}

	$classes[] = $sidebardesignlayout;
	return $classes;

}
add_filter( 'body_class', 'ample_magazine_names' );



/* =====adding menu last and first class==========*/
function ample_magazine_first_and_last_menu_class($items) {
	$items[1]->classes[] = 'first-menu';
	$items[count($items)]->classes[] = 'last-menu';
	return $items;
}
add_filter('wp_nav_menu_objects', 'ample_magazine_first_and_last_menu_class');


/*for description highlight in menu */
/**
 * Add arrows to menu items
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/add-arrows-to-menu-items/
 *
 * @param string $item_output, HTML output for the menu item
 * @param object $item, menu item object
 * @param int $depth, depth in menu structure
 * @param object $args, arguments passed to wp_nav_menu()
 * @return string $item_output
 */

if (!function_exists('ample_magazine_add_menu_description')) :
	function ample_magazine_add_menu_description( $item_output, $item, $depth, $args ) {

		if( 'primary' == $args->theme_location  && $item->description )
			$item_output = str_replace( '</a>', '<span class="menu-description">' . $item->description . '</span></a>', $item_output );

		return $item_output;
	}
endif;
add_filter( 'walker_nav_menu_start_el', 'ample_magazine_add_menu_description', 10, 4 );


/**
 * Post Formats
 *
 * @since  Ample Magazine 0.0.1
 */

if (!function_exists('ample_magazine_post_formats')):
	function ample_magazine_post_formats($post_id)
	{

			$post_formats = get_post_format($post_id);
			switch ($post_formats) {
				case "image":
					$post_formats = "<div class='ample-post-format'><i class='fa fa-image'></i></div>";
					break;
				case "video":
					$post_formats = "<div class='ample-post-format'><i class='fas fa-video'></i></div>";

					break;
				case "gallery":
					$post_formats = "<div class='ample-post-format'><i class='fa fa-camera'></i></div>";
					break;
				case "audio":
					$post_formats = "<div class='ample-post-format'><i class='fa fa-volume-up'></i></div>";
					break;
				default:
					$post_formats = "";
			}

			echo $post_formats;
			//endif;

	}

endif;


/* for breadcumb */
add_filter('bcn_breadcrumb_title', function($title, $type, $id) {
	if ($type[0] === 'home') {
		$title = get_the_title(get_option('page_on_front'));
	}
	return $title;
}, 42, 3);

