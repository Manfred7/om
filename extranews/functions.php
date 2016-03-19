<?php

if ( !function_exists( 'optionsframework_init' ) ) :

/*-----------------------------------------------------------------------------------*/
/* Options Framework Theme
/*-----------------------------------------------------------------------------------*/

	/* Set the file path based on whether the Options Framework Theme is a parent theme or child theme */

	if ( get_stylesheet_directory() == get_template_directory() ) {
		define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');
	} else {
		define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');
	}

	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');

endif;

/*  Add a custom script to the admin panel */
if ( !function_exists( 'optionsframework_custom_scripts' ) ) :
	function optionsframework_custom_scripts() { ?>
		<script type="text/javascript">
		jQuery(document).ready(function() {

			jQuery('#example_showhidden').click(function() {
		  		jQuery('.section.hidden').fadeToggle(400);
			});

			if (jQuery('#example_showhidden:checked').val() !== undefined) {
				jQuery('.section.hidden').show();
			}

		});
		</script> <?php
	}
	add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');
endif;

/*-----------------------------------------------------------------------------------*/
/* Add Theme Shortcodes
/*-----------------------------------------------------------------------------------*/
include("functions/shortcodes.php");

/*-----------------------------------------------------------------------------------*/
/* Add Multiple Thumbnail Support
/*-----------------------------------------------------------------------------------*/
include("functions/multi-post-thumbnails.php");

/*-----------------------------------------------------------------------------------*/
/* Add Theme Functions
/*-----------------------------------------------------------------------------------*/
include("functions/extra-functions.php");

/*-----------------------------------------------------------------------------------*/
/* Add Editor Style
/*-----------------------------------------------------------------------------------*/
add_editor_style();

/*-----------------------------------------------------------------------------------*/
/* Localize Wordpress Ajax
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'ag_ajax' ) ) :
	function ag_ajax() {
	     wp_localize_script( 'function', 'ag_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	}
	add_action('template_redirect', 'ag_ajax');
endif;

/*-----------------------------------------------------------------------------------*/
/* Register Widget Sidebars
/*-----------------------------------------------------------------------------------*/

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Top Area',
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h4 style="display:none;">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => 'Home Sidebar',
		'id' => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'sidebar-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => 'Single Post Sidebar',
		'id' => 'sidebar-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => 'Page Sidebar',
		'id' => 'sidebar-5',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => 'Contact Sidebar',
		'id' => 'sidebar-6',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => 'Footer Left',
		'id' => 'sidebar-7',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer Center',
		'id' => 'sidebar-8',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer Right',
		'id' => 'sidebar-9',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}

/*-----------------------------------------------------------------------------------*/
/*	Add Widget Shortcode Support
/*-----------------------------------------------------------------------------------*/

add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');

// Add the News Custom Widget
include("functions/widget-news.php");
// Add the Contact Custom Widget
include("functions/widget-contact.php");
// Add the Social Counter Tabs Widget
include("functions/widget-tab.php");
// Add the Ad Widgets
include("functions/widget-ad125.php");
include("functions/widget-ad480.php");
// Add the Custom Fields for Video Posts
include("functions/customfields.php");

/*-----------------------------------------------------------------------------------*/
/*	Register and load common JS
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'ag_register_js' ) ) :
	function ag_register_js() {
		if (!is_admin()) {

			wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', 'jquery', '1.3.5', true);
			wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', 'jquery', '2.5.3', false);
			wp_register_script('validation', get_template_directory_uri() . '/js/jquery.validation.js', 'jquery', '1.7', true);
			wp_register_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.min.js', 'jquery', '1.3', true);
			wp_register_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', 'jquery', '3.1.6', true);
			wp_register_script('superfish', get_template_directory_uri() . '/js/jquery.superfish.min.js', 'jquery', '1.4.8', true);
			wp_register_script('imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', 'jquery', '3.1.8', true);
			wp_register_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', 'jquery', '2.2.0', true);
			wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', '1.1', true);
			wp_register_script('koottam', get_template_directory_uri() . '/js/jquery.koottam.min.js', 'jquery', '1.0', true);
			wp_register_script('nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.pack.js', 'jquery', '3.2', true);
			wp_register_script('tipsy', get_template_directory_uri() . '/js/jquery.tipsy.min.js', 'jquery', '1.0.0a', true);

			wp_enqueue_script('jquery');
			wp_enqueue_script('modernizr');
			wp_enqueue_script('validation');
			wp_enqueue_script('easing');
			wp_enqueue_script('superfish');
			wp_enqueue_script('prettyPhoto');
			wp_enqueue_script('imagesloaded');
			wp_enqueue_script('isotope');
			wp_enqueue_script('fitvids');
			wp_enqueue_script('koottam');
			wp_enqueue_script('nivo-slider');
			wp_enqueue_script('tipsy');

			$variables_array = array(
				'ajaxurl'                    => admin_url( 'admin-ajax.php' ),
				'get_template_directory_uri' => get_template_directory_uri(),
				'nonce'                      => wp_create_nonce( 'tw-ajax-nonce' ),
				'options' => array(
					'slideshowTrans'     => of_get_option( 'of_slideshow_trans' ) ? of_get_option( 'of_slideshow_trans' ) : 'random',
					'autoplayDelay'      => of_get_option( 'of_post_autoplay_delay' ) ? of_get_option( 'of_post_autoplay_delay' ) . '000' : '7000',
					'homeAutoPlay'       => of_get_option( 'of_home_autoplay' ) ? of_get_option( 'of_home_autoplay' ) : false,
					'homeAutoPlayDelay'  => of_get_option( 'of_home_autoplay_delay' ) ? of_get_option( 'of_home_autoplay_delay' ) . '000' : '7000',
					'homeSlideshowTrans' => of_get_option( 'of_home_slideshow_trans' ) ? of_get_option( 'of_home_slideshow_trans' ) : 'random',
					'reviewStyle'        => of_get_option( 'of_review_style' ) ? of_get_option( 'of_review_style' ) : 'percentage',
					'sidebarWidth'       => of_get_option( 'of_sidebar_width' ) ? of_get_option( 'of_sidebar_width' ) : 'default',
					'prettyPhotoSkin'    => of_get_option( 'of_prettyphoto_skin' ) ? of_get_option( 'of_prettyphoto_skin' ) : 'light_square',
				),
				'translations' => array(
					'comment'  => __( 'Comment', 'framework' ),
					'comments' => __( 'Comments', 'framework' )
				)
			);
			wp_localize_script( 'custom', 'tw', $variables_array );

			wp_enqueue_script('custom');
		}
	}
	add_action('init', 'ag_register_js');
endif;

/*-----------------------------------------------------------------------------------*/
/*	Register Stylesheets
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'tw_register_stylesheets' ) ) :
	function tw_register_stylesheets() {
		global $wp_styles;

		// Get theme version info
		$themewich_theme_info = wp_get_theme();

		wp_register_style( 'style', get_stylesheet_uri(), false , $themewich_theme_info->Version );

		wp_enqueue_style( "ie7", get_template_directory_uri() . "/css/ie7.css", false, 'ie7', "all" );
		wp_enqueue_style( "ie8", get_template_directory_uri() . "/css/ie8.css", false, 'ie8', "all" );
		$wp_styles->add_data( "ie7", 'conditional', 'IE 7' );
		$wp_styles->add_data( "ie8", 'conditional', 'IE 8' );

		wp_enqueue_style('style');
	}
	add_action( 'wp_enqueue_scripts', 'tw_register_stylesheets' );
endif;

/**
 * Adds inline styles from custom css box after theme styles
 * @return string
 */
if ( ! function_exists( 'themewich_custom_css' ) ) :
	function themewich_custom_css() {

		include( "functions/theme-options-styles.php" );

		$styles = get_theme_options_styles();

		wp_add_inline_style( 'style', $styles );
	}

	add_action( 'wp_enqueue_scripts', 'themewich_custom_css' );
endif;

/*-----------------------------------------------------------------------------------*/
/* Register Navigation
/*-----------------------------------------------------------------------------------*/

add_theme_support('menus');

if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
          'main_nav_menu' => 'Main Navigation Menu'
        )
    );
      register_nav_menus(
        array(
          'top_nav_menu' => 'Top Bar Navigation Menu'
        )
    );

	// remove menu container div
	function my_wp_nav_menu_args( $args = '' ) {
	    $args['container'] = false;
	    return $args;
	}
	add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
}

/*-----------------------------------------------------------------------------------*/
/* Render Title Tag
/*-----------------------------------------------------------------------------------*/

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );

/**
 * Fallback for older versions
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function themewich_render_title() {
?>
<title><?php wp_title( '-', true, 'right' ); ?></title>
<?php
    }
    add_action( 'wp_head', 'themewich_render_title' );
endif;


/*-----------------------------------------------------------------------------------*/
/*	Change Default Excerpt Length and add Formatting
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'closeUnclosedTags' ) ) :
	function closeUnclosedTags($unclosedString){
	  preg_match_all("/<([^\/]\w*)>/", $closedString = $unclosedString, $tags);
	  for ($i=count($tags[1])-1;$i>=0;$i--){
	    $tag = $tags[1][$i];
	    if (substr_count($closedString, "</$tag>") < substr_count($closedString, "<$tag>")) $closedString .= "</$tag>";
	  }
	  return $closedString;
	}
endif;

if ( !function_exists( 'ag_wp_trim_excerpt' ) ) :
	function ag_wp_trim_excerpt($text) {
		global $post;
		$raw_excerpt = $text;
		if ( '' == $text ) {
		    //Retrieve the post content.
		    $text = get_the_content('');

		    //Delete all shortcode tags from the content.
		    $text = strip_shortcodes( $text );

		    $text = apply_filters('the_content', $text);
		    $text = str_replace(']]>', ']]&gt;', $text);

		    $allowed_tags = '<p>,<em>,<strong>,<b>,<ul>,<li>,<ol>,<blockquote>'; /*** Add the allowed HTML tags separated by a comma.***/
		    $text = strip_tags($text, $allowed_tags);

		    $excerpt_word_count = 40; /*** change the excerpt word count to any integer you like.***/
		    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);

		    $excerpt_end = '... <span class="more-link"><a href="'. get_permalink($post->ID) . '" class="more-link">'.__('Read More', 'framework').'</a></span>'; /*** change the excerpt endind to something else.***/
		    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);

		    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
		    if ( count($words) > $excerpt_length ) {
		        array_pop($words);
		        $text = implode(' ', $words);
		        $text = $text . $excerpt_more;
				$text = closeUnclosedTags($text); //close any unclosed tags
		    } else {
		        $text = implode(' ', $words);
		    }

		}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
	}
	remove_filter('get_the_excerpt', 'wp_trim_excerpt');
	add_filter('get_the_excerpt', 'ag_wp_trim_excerpt');
endif;

if ( !function_exists( 'all_excerpts_get_more_link' ) ) :
	function all_excerpts_get_more_link($post_excerpt) {
		global $post;
		if (preg_match('<span class="more-link">', $post_excerpt)) {
		return $post_excerpt;
		}
		else {
		return $post_excerpt . '<span class="more-link"><a href="'. get_permalink($post->ID) . '" class="more-link">'.__('Read More', 'framework').'</a></span>';
		}
	}
	add_filter('wp_trim_excerpt', 'all_excerpts_get_more_link');
endif;

/*-----------------------------------------------------------------------------------*/
/*	Set Max Content Width (use in conjuction with ".blogpost .featuredimage img" css)
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) ) $content_width = 620;

/*-----------------------------------------------------------------------------------*/
/*	Automatic Feed Links
/*-----------------------------------------------------------------------------------*/

if(function_exists('add_theme_support')) {
    add_theme_support('automatic-feed-links');
    //WP Auto Feed Links
}

/*------------------------------------------------------------------------------*/
/*	Remove More Link Anchor
/*------------------------------------------------------------------------------*/

if ( !function_exists( 'remove_more_jump_link' ) ) :
	function remove_more_jump_link($link) {
		$offset = strpos($link, '#more-');
		if ($offset) {
			$end = strpos($link, '"',$offset);
		}
		if ($end) {
			$link = substr_replace($link, '', $offset, $end-$offset);
		}
		return $link;
	}

	add_filter('the_content_more_link', 'remove_more_jump_link');
endif;


/*-----------------------------------------------------------------------------------*/
/*	Add Browser Detection Body Class
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'ag_browser_body_class' ) ) :
	function ag_browser_body_class($classes) {
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

		if($is_lynx) $classes[] = 'lynx';
		elseif($is_gecko) $classes[] = 'gecko';
		elseif($is_opera) $classes[] = 'opera';
		elseif($is_NS4) $classes[] = 'ns4';
		elseif($is_safari) $classes[] = 'safari';
		elseif($is_chrome) $classes[] = 'chrome';
		elseif($is_IE) $classes[] = 'ie';
		else $classes[] = 'unknown';

		if($is_iphone) $classes[] = 'iphone';
		return $classes;
	}
	add_filter('body_class','ag_browser_body_class');
endif;


/*-----------------------------------------------------------------------------------*/
/*	Configure WP2.9+ Thumbnails
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 56, 56, true ); // Normal post thumbnails
	add_image_size( 'blog', 314, 160, true ); // Blog thumbnail
	add_image_size( 'blogonecol', 420, 215, true ); // Blog One Column thumbnail
	add_image_size( 'tinyfeatured', 50, 50, true ); // Tiny Featured thumbnail
	add_image_size( 'smallrecfeatured', 320, 158, true ); // Small Rectangle Featured thumbnail
	add_image_size( 'smallrecfeaturedindex', 358, 158, true ); // Small Rectangle Featured thumbnail
	add_image_size( 'smallfeatured', 320, 316, true ); // Small Featured thumbnail
	add_image_size( 'largefeatured', 642, 316, true ); // Large Featured thumbnail
	add_image_size( 'post', 700, 325, true ); // Portfolio Large thumbnail
	add_image_size( 'postnc', 700, '', false ); // Portfolio Large thumbnail
}

if (class_exists('MultiPostThumbnails')) {

   if ( $thumbnum = of_get_option('of_thumbnail_number') ) { $thumbnum = ($thumbnum + 1); } else { $thumbnum = 7;}
   $counter1 = 2;

	while ($counter1 < ($thumbnum)) {

		switch ($counter1) {
			case (2) : $countername = 'second'; break;
			case (3) : $countername = 'third'; break;
			case (4) : $countername = 'fourth'; break;
			case (5) : $countername = 'fifth'; break;
			case (6) : $countername = 'sixth'; break;
			default : $countername = $counter1;
		}

	new MultiPostThumbnails(
		array(
			'label' => 'Slide ' . $counter1,
			'id' => $countername . '-slide',
			'post_type' => 'post'
		));

	$counter1++;

	}
}

/*-----------------------------------------------------------------------------------*/
/*	Comment Reply Javascript Action
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'mytheme_enqueue_comment_reply' ) ) :
	function mytheme_enqueue_comment_reply() {
	    // on single blog post pages with comments open and threaded comments
	    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	        // enqueue the javascript that performs in-link comment reply fanciness
	        wp_enqueue_script( 'comment-reply' );
	    }
	}
	// Hook into wp_enqueue_scripts
	add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_comment_reply' );
endif;

/*------------------------------------------------------------------------------*/
/*	Comments Template
/*------------------------------------------------------------------------------*/

if ( !function_exists( 'ag_comment' ) ) :
	function ag_comment($comment, $args, $depth) {

	    $isByAuthor = false;

	    if($comment->comment_author_email == get_the_author_meta('email')) {
	        $isByAuthor = true;
	    }

	    $GLOBALS['comment'] = $comment; ?>
	   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	   <div id="comment-<?php comment_ID(); ?>" class="singlecomment">
	        <p class="commentsmetadata">
	        	<cite><?php comment_date('F j, Y'); ?></cite>
	        </p>
	    	<div class="author">
	            <div class="reply"><?php echo comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'])); ?></div>
	            <div class="name"><?php comment_author_link() ?></div>
	        </div>
	      <?php if ($comment->comment_approved == '0') : ?>
	         <p class="moderation"><?php _e('Your comment is awaiting moderation.', 'framework') ?></p>
	      <?php endif; ?>
	        <div class="commenttext">
	            <?php comment_text() ?>
	        </div>
		</div>
	<?php
	}
endif;


/*-----------------------------------------------------------------------------------*/
/*	Load Text Domain
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'theme_init' ) ) :
	function theme_init(){
	    load_theme_textdomain('framework', get_template_directory() . '/lang');
	}
	add_action ('init', 'theme_init');
endif;

/*-----------------------------------------------------------------------------------*/
/*	Add Shortcode Buttons to WYSIWIG
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'add_ag_shortcodes' ) ) :
	function add_ag_shortcodes() {
	   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  {

	   	 //Add "button" button
	     add_filter('mce_external_plugins', 'add_plugin_button');
	     add_filter('mce_buttons', 'register_button');

	     //Add "divider" button
	     add_filter('mce_external_plugins', 'add_plugin_divider');
	     add_filter('mce_buttons', 'register_divider');

	     //Add "slider" button
	     add_filter('mce_external_plugins', 'add_plugin_slider');
	     add_filter('mce_buttons', 'register_slider');

		 //Add "tabs" button
	     add_filter('mce_external_plugins', 'add_plugin_featuredfulltabs');
	     add_filter('mce_buttons', 'register_featuredfulltabs');

		 //Add "lightbox" button
	     add_filter('mce_external_plugins', 'add_plugin_lightbox');
	     add_filter('mce_buttons', 'register_lightbox');

		 //Add "shortcodes" buttons - 3rd row

		 add_filter('mce_external_plugins', 'add_plugin_onehalf');
	     add_filter('mce_buttons_3', 'register_onehalf');

		 add_filter('mce_external_plugins', 'add_plugin_onehalflast');
	     add_filter('mce_buttons_3', 'register_onehalflast');

		 add_filter('mce_external_plugins', 'add_plugin_onethird');
	     add_filter('mce_buttons_3', 'register_onethird');

		 add_filter('mce_external_plugins', 'add_plugin_onethirdlast');
	     add_filter('mce_buttons_3', 'register_onethirdlast');

		 add_filter('mce_external_plugins', 'add_plugin_twothird');
	     add_filter('mce_buttons_3', 'register_twothird');

		 add_filter('mce_external_plugins', 'add_plugin_twothirdlast');
	     add_filter('mce_buttons_3', 'register_twothirdlast');

		 add_filter('mce_external_plugins', 'add_plugin_onefourth');
	     add_filter('mce_buttons_3', 'register_onefourth');

		 add_filter('mce_external_plugins', 'add_plugin_onefourthlast');
	     add_filter('mce_buttons_3', 'register_onefourthlast');

		 add_filter('mce_external_plugins', 'add_plugin_threefourth');
	     add_filter('mce_buttons_3', 'register_threefourth');

		 add_filter('mce_external_plugins', 'add_plugin_threefourthlast');
	     add_filter('mce_buttons_3', 'register_threefourthlast');

		 add_filter('mce_external_plugins', 'add_plugin_onefifth');
	     add_filter('mce_buttons_3', 'register_onefifth');

		 add_filter('mce_external_plugins', 'add_plugin_onefifthlast');
	     add_filter('mce_buttons_3', 'register_onefifthlast');

		 add_filter('mce_external_plugins', 'add_plugin_twofifth');
	     add_filter('mce_buttons_3', 'register_twofifth');

		 add_filter('mce_external_plugins', 'add_plugin_twofifthlast');
	     add_filter('mce_buttons_3', 'register_twofifthlast');

		 add_filter('mce_external_plugins', 'add_plugin_threefifth');
	     add_filter('mce_buttons_3', 'register_threefifth');

		 add_filter('mce_external_plugins', 'add_plugin_threefifthlast');
	     add_filter('mce_buttons_3', 'register_threefifthlast');

		 add_filter('mce_external_plugins', 'add_plugin_fourfifth');
	     add_filter('mce_buttons_3', 'register_fourfifth');

		 add_filter('mce_external_plugins', 'add_plugin_fourfifthlast');
	     add_filter('mce_buttons_3', 'register_fourfifthlast');

		 add_filter('mce_external_plugins', 'add_plugin_onesixth');
	     add_filter('mce_buttons_3', 'register_onesixth');

		 add_filter('mce_external_plugins', 'add_plugin_onesixthlast');
	     add_filter('mce_buttons_3', 'register_onesixthlast');

		 add_filter('mce_external_plugins', 'add_plugin_fivesixth');
	     add_filter('mce_buttons_3', 'register_fivesixth');

		 add_filter('mce_external_plugins', 'add_plugin_fivesixthlast');
	     add_filter('mce_buttons_3', 'register_fivesixthlast');

	   }
	}
	add_action('init', 'add_ag_shortcodes');
endif;

function register_button($buttons) {
   array_push($buttons, "button");
   return $buttons;
}
function add_plugin_button($plugin_array) {
   $plugin_array['button'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}
function register_divider($buttons) {
   array_push($buttons, "divider");
   return $buttons;
}
function add_plugin_divider($plugin_array) {
   $plugin_array['divider'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}
function register_slider($buttons) {
   array_push($buttons, "slider");
   return $buttons;
}
function add_plugin_slider($plugin_array) {
   $plugin_array['slider'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}
function register_featuredfulltabs($buttons) {
   array_push($buttons, "featuredfulltabs");
   return $buttons;
}
function add_plugin_featuredfulltabs($plugin_array) {
   $plugin_array['featuredfulltabs'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}
function register_lightbox($buttons) {
   array_push($buttons, "lightbox");
   return $buttons;
}
function add_plugin_lightbox($plugin_array) {
   $plugin_array['lightbox'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}
function register_onehalf($buttons) {
   array_push($buttons, "onehalf");
   return $buttons;
}
function add_plugin_onehalf($plugin_array) {
   $plugin_array['onehalf'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}
function register_onehalflast($buttons) {
   array_push($buttons, "onehalflast");
   return $buttons;
}
function add_plugin_onehalflast($plugin_array) {
   $plugin_array['onehalflast'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}
function register_onethird($buttons) {
   array_push($buttons, "onethird");
   return $buttons;
}
function add_plugin_onethird($plugin_array) {
   $plugin_array['onethird'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}
function register_onethirdlast($buttons) {
   array_push($buttons, "onethirdlast");
   return $buttons;
}
function add_plugin_onethirdlast($plugin_array) {
   $plugin_array['onethirdlast'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}
function register_twothird($buttons) {
   array_push($buttons, "twothird");
   return $buttons;
}
function add_plugin_twothird($plugin_array) {
   $plugin_array['twothird'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}
function register_twothirdlast($buttons) {
   array_push($buttons, "twothirdlast");
   return $buttons;
}
function add_plugin_twothirdlast($plugin_array) {
   $plugin_array['twothirdlast'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

// one fourth buttons

function register_onefourth($buttons) {
   array_push($buttons, "onefourth");
   return $buttons;
}
function add_plugin_onefourth($plugin_array) {
   $plugin_array['onefourth'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

function register_onefourthlast($buttons) {
   array_push($buttons, "onefourthlast");
   return $buttons;
}
function add_plugin_onefourthlast($plugin_array) {
   $plugin_array['onefourthlast'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}


// three fourth buttons

function register_threefourth($buttons) {
   array_push($buttons, "threefourth");
   return $buttons;
}
function add_plugin_threefourth($plugin_array) {
   $plugin_array['threefourth'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

function register_threefourthlast($buttons) {
   array_push($buttons, "threefourthlast");
   return $buttons;
}
function add_plugin_threefourthlast($plugin_array) {
   $plugin_array['threefourthlast'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

// one fifth buttons

function register_onefifth($buttons) {
   array_push($buttons, "onefifth");
   return $buttons;
}
function add_plugin_onefifth($plugin_array) {
   $plugin_array['onefifth'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

function register_onefifthlast($buttons) {
   array_push($buttons, "onefifthlast");
   return $buttons;
}
function add_plugin_onefifthlast($plugin_array) {
   $plugin_array['onefifthlast'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

// two fifth buttons

function register_twofifth($buttons) {
   array_push($buttons, "twofifth");
   return $buttons;
}
function add_plugin_twofifth($plugin_array) {
   $plugin_array['twofifth'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

function register_twofifthlast($buttons) {
   array_push($buttons, "twofifthlast");
   return $buttons;
}
function add_plugin_twofifthlast($plugin_array) {
   $plugin_array['twofifthlast'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

// three fifth buttons

function register_threefifth($buttons) {
   array_push($buttons, "threefifth");
   return $buttons;
}
function add_plugin_threefifth($plugin_array) {
   $plugin_array['threefifth'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

function register_threefifthlast($buttons) {
   array_push($buttons, "threefifthlast");
   return $buttons;
}
function add_plugin_threefifthlast($plugin_array) {
   $plugin_array['threefifthlast'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

// four fifth buttons

function register_fourfifth($buttons) {
   array_push($buttons, "fourfifth");
   return $buttons;
}
function add_plugin_fourfifth($plugin_array) {
   $plugin_array['fourfifth'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

function register_fourfifthlast($buttons) {
   array_push($buttons, "fourfifthlast");
   return $buttons;
}
function add_plugin_fourfifthlast($plugin_array) {
   $plugin_array['fourfifthlast'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

// one sixth buttons

function register_onesixth($buttons) {
   array_push($buttons, "onesixth");
   return $buttons;
}
function add_plugin_onesixth($plugin_array) {
   $plugin_array['onesixth'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

function register_onesixthlast($buttons) {
   array_push($buttons, "onesixthlast");
   return $buttons;
}
function add_plugin_onesixthlast($plugin_array) {
   $plugin_array['onesixthlast'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

// five sixth buttons

function register_fivesixth($buttons) {
   array_push($buttons, "fivesixth");
   return $buttons;
}
function add_plugin_fivesixth($plugin_array) {
   $plugin_array['fivesixth'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

function register_fivesixthlast($buttons) {
   array_push($buttons, "fivesixthlast");
   return $buttons;
}
function add_plugin_fivesixthlast($plugin_array) {
   $plugin_array['fivesixthlast'] = get_template_directory_uri().'/js/ag_customcodes.js';
   return $plugin_array;
}

if ( !function_exists( 'parse_shortcode_content' ) ) :
	function parse_shortcode_content( $content ) {

	    /* Parse nested shortcodes and add formatting. */
	    $content = trim( wpautop( do_shortcode( $content ) ) );

	    /* Remove '</p>' from the start of the string. */
	    if ( substr( $content, 0, 4 ) == '</p>' )
	        $content = substr( $content, 4 );

	    /* Remove '<p>' from the end of the string. */
	    if ( substr( $content, -3, 3 ) == '<p>' )
	        $content = substr( $content, 0, -3 );

	    /* Remove any instances of '<p></p>'. */
	    $content = str_replace( array( '<p></p>' ), '', $content );

	    return $content;
	}
endif;

/**
 * Include Updater script
 */
include("functions/theme-updater.php");

/**
 * Get Username and API Key from Theme Options
 */
$username = of_get_option('of_tf_username');
$api = of_get_option('of_tf_api');

if ($username && $username != '') {
    define('THEMEFOREST_USERNAME',$username);
}
if ($api && $api != '') {
    define('THEMEFOREST_APIKEY', $api);
}

/**
 * Required plugins
 */
if ( file_exists( dirname( __FILE__ ) . '/functions/class-tgm-plugin-activation.php' ) ) {
	require_once( dirname( __FILE__ ) . '/functions/class-tgm-plugin-activation.php' );
}

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function tw_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Include ZenCache
		array(
			'name'     => 'ZenCache',
			'slug'     => 'zencache',
			'version'  => '150218',
			'required' => false,
		),

		// Include Better WordPress Minify
		array(
			'name'     => 'Better WordPress Minify',
			'slug'     => 'bwp-minify',
			'version'  => '1.3.3',
			'required' => false,
		),

		// Include advanced custom fields plugin
		array(
			'name'                  => 'SocialFans Counter', // The plugin name
			'slug'                  => 'socialfans-counter', // The plugin slug (typically the folder name)
			'source'                => get_template_directory_uri() . '/functions/plugins/socialfans-counter.zip', // The plugin source
			'required'              => true, // If false, the plugin is only 'recommended' instead of required
			'version'               => '4.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
		)

	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
			'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
			'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
			'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	tgmpa( $plugins, $config );

}

add_action( 'tgmpa_register', 'tw_register_required_plugins' );
function del_number_url_morkovin(){
	$link = $_SERVER['REQUEST_URI'];

	preg_match("/^(.+)\/([0-9]+)$/", $link, $matches);

	if(is_single() and $matches[2])
	{
		global $wp_query;
		$wp_query->set_404();
		status_header(404);
	}
}
add_action('wp', 'del_number_url_morkovin', -10);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head','rel_canonical');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3);
delete_option( 'gform_pending_installation' );