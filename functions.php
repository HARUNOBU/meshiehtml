<?php
/**
 * Mishie functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mishie
 */

if ( ! function_exists( 'meshie_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function meshie_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Mishie, use a find and replace
	 * to change 'meshie' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'meshie', get_template_directory() . '/languages' );
    
    

    //  Include file
    //require_once( get_template_directory() . '/admin/inc/custom-css.php' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'meshie' ),
		'scondry' => esc_html__( 'Scondry', 'meshie' ),
		'sociallinks' => esc_html__( 'Social Links', 'meshie' ),
	) );

	// Custom Headers
    $custom_header_support = array(
      'width'               => 980,
      'height'              => 350,
      'header-text'         => false,
      'default-image'       => get_template_directory_uri() . '/images/header.jpg',
      'admin-head-callback' => 'admin_header_style',
    );
    add_theme_support( 'custom-header', $custom_header_support );
  
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'meshie_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'meshie_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function meshie_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'meshie_content_width', 640 );
}
add_action( 'after_setup_theme', 'meshie_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function meshie_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar-1', 'meshie' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Left Sidebar', 'meshie' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title-left">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar-2', 'meshie' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Right Sidebar', 'meshie' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s voc sidebar-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title-right">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'meshie_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function meshie_scripts() {
	
	
	
	wp_enqueue_style( 'meshie-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'javascript',get_template_directory_uri().'/js/javascript.js',array('jquery'));
  
	wp_enqueue_script( 'meshie-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'meshie-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'meshie-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array(), '20151215', true );
	
	wp_enqueue_script( 'meshie-bootstrap-auto-dropdown', get_template_directory_uri() . '/js/bootstrap-auto-dropdown.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'meshie_scripts' );

if ( ! function_exists( 'meshie_enqueue_styles' ) ) :
function meshie_enqueue_styles() {
    
    
	wp_enqueue_style( 'meshie_bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
    wp_enqueue_style( 'meshie_style', get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'meshie_common', get_template_directory_uri().'/css/Common.css' );
	

    if( mb_ereg( 'MSIE', getenv( 'HTTP_USER_AGENT' ) ) ) {
        wp_enqueue_style( 'meshie_ie', get_template_directory_uri().'/css/ie.css' );
    }

    //wp_enqueue_style( 'meshie_quicksand', '//fonts.googleapis.com/css?family=Quicksand' );
    //wp_enqueue_style( 'cmeshie_font', get_template_directory_uri().'/css/font.css' );
    
    wp_enqueue_style( 'meshie_boxer', get_template_directory_uri().'/plugin/boxer/jquery.fs.boxer.css' );

    if ( strtoupper( get_locale() ) == 'JA' ) {
        wp_enqueue_style( 'meshie_ja', get_template_directory_uri().'/css/ja.css' );
    }

    // Child Theme Style
    if ( is_child_theme() ) {
        wp_enqueue_style( 'meshie_child_style', get_stylesheet_uri() );
    }
}
endif;
add_action( 'wp_enqueue_scripts', 'meshie_enqueue_styles' );
/**
 * Implement the wp-bootstrap-navwalker.
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

if ( ! isset( $content_width ) ) {
    $content_width = 980;
}



// Get category ID
function meshie_category_id($tax='category') {
    global $post;
    $cat_id = 0;
    if (is_single()) {
        $cat_info = get_the_terms($post->ID, $tax);
        if ($cat_info) {
            $cat_id = array_shift($cat_info)->term_id;
        }
    }
    return $cat_id;  
}

// Get category information.
function meshie_category_info($tax='category') {
    global $post;
    $cat = get_the_terms($post->ID, $tax);
    $obj = new stdClass;
    if ($cat) {
        $cat = array_shift($cat);
        $obj->name = $cat->name;
        $obj->slug = $cat->slug;
    } else {
        $obj->name = '';
        $obj->slug = '';
    }
    return $obj;
}


function get_featured_image_url() {
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id,'thumbnail', true);
echo $image_url[0];
}

/* ----------------------------------------------
 * 3.1 - page title
 * filter function for wp_title hook
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_page_title' ) ) :
function meshie_page_title( $title, $sep = true, $seplocation = 'right' ) {
	if ( is_feed() ) {
		return $title;
	}

	global $paged, $page;
	$sep = ' ' . $sep . ' ';

	// If it's a search
	if ( is_search() ) {
		$title = sprintf( __( 'Search Results of " %s "', 'meshie' ), get_search_query() ).$sep;
	}

	// If it's a 404 page
	if ( is_404() ) {
		$title = __( '404 Not found', 'meshie' ).$sep;
	}

	// If there's a year
	if ( is_date() ) {
		if ( is_year() ) {
			$title = get_the_time( __( 'Y', 'meshie' ) ).$sep;
		} elseif ( is_month() ) {
			$title = get_the_time( __( 'F Y', 'meshie' ) ).$sep;
		} elseif ( is_day() ) {
			$title = get_the_time( __( 'F j, Y', 'meshie' ) ).$sep;
		}
	}

	if ( is_search() || is_404() || is_date() ) {
		// Add the blog name
		$title .= apply_filters( 'meshie_wp_title_name', get_bloginfo( 'name', 'display' ) );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title_desc = $sep.$site_description;
			$title .= apply_filters( 'meshie_wp_title_desc', $title_desc );
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title_page = $sep.sprintf( __( 'Page %d', 'meshie' ), max( $paged, $page) );
			$title .= apply_filters( 'meshie_wp_title_page', $title_page );
		}
	}

	return $title;
}
endif;
add_filter( 'wp_title', 'meshie_page_title', 10, 3 );

/* ----------------------------------------------
 * 5.7 - breadcrumb
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_breadcrumb' ) ) :
function meshie_breadcrumb() {
	
	global $wp_query, $post, $page, $paged;

	$itemtype_url = 'http://data-vocabulary.org/Breadcrumb';
	$itemtype = 'itemscope itemtype="'.esc_url( $itemtype_url ).'"';


	$taxonomy_slug = get_query_var( 'taxonomy' );
	$cpt = get_query_var( 'post_type' );

	if ( !is_front_page() && !is_admin() ) : ?>
		<div class="breadcrumb">
			<ol>
			<li <?php echo $itemtype; ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><span itemprop="title"><span class="bread-home"><?php echo __( 'HOME', 'meshie' ); ?></span></span></a></li><li class="breadmark">&gt;</li>

		<?php if ( $taxonomy_slug && is_tax( $taxonomy_slug ) ) :
			$query_tax = get_queried_object();
			$query_tax_parent = $query_tax -> parent;
			$post_types = get_taxonomy( $taxonomy_slug ) -> object_type;
			$cpt = $post_types[0];
		?>
		<li <?php echo $itemtype; ?>><a href="<?php echo get_post_type_archive_link( $cpt ); ?>" itemprop="url"><span itemprop="title"><?php echo esc_html( get_post_type_object( $cpt ) -> label ); ?></span></a></li>
		<li class="breadmark">&gt;</li>
		<?php if ( ! empty( $query_tax_parent ) ) :
			$ancestors = array_reverse( get_ancestors( $query_tax -> term_id, $query_tax -> taxonomy ) );
			foreach( $ancestors as $ancestor ) : ?>
				<li <?php echo $itemtype; ?>><a href="<?php echo get_term_link( $ancestor, $query_tax -> taxonomy ); ?>" itemprop="url"><span itemprop="title"><?php echo esc_html( get_term( $ancestor, $query_tax -> taxonomy ) -> name ); ?></span></a></li>
				<li class="breadmark">&gt;</li>
			<?php endforeach; endif; ?>
		<li><?php echo esc_html( $query_tax -> name ); ?>

		<?php elseif ( $cpt && is_singular( $cpt ) ) :
			$cpt_taxes = get_object_taxonomies( $cpt );

			if ( ! empty( $cpt_taxes ) ) :
				$taxonomy_name = $cpt_taxes[0];
				?>
				<li <?php echo $itemtype; ?>><a href="<?php echo get_post_type_archive_link( $cpt ); ?>" itemprop="url"><span itemprop="title"><?php echo esc_html( get_post_type_object( $cpt ) -> label ); ?></span></a></li>
				<li class="breadmark">&gt;</li>
				<?php
				$taxes = get_the_terms( $post -> ID, $taxonomy_name );
				$count = 0;

				if ( ! empty( $taxes ) ) {
					foreach( $taxes as $tax ) {
						$children = get_term_children( $tax -> term_id, $taxonomy_name ); 

						if ( $children ) {
							if ( $count < count( $children ) ) {
								$count = count( $children );
								$lot_children = $children;
								foreach( $lot_children as $child ) {
									if( is_object_in_term( $post -> ID, $taxonomy_name ) ) {
										$child_tax = get_term( $child, $taxonomy_name );
									}
								}
							}
						} else {
							$child_tax = $tax;
						}
					}
				}

				if( ! empty( $child_tax -> parent ) ) :
					$ancestors = array_reverse( get_ancestors( $child_tax -> term_id, $taxonomy_name ) );

					foreach( $ancestors as $ancestor ) : ?>
						<li <?php echo $itemtype; ?>><a href="<?php echo get_term_link( $ancestor, $taxonomy_name ); ?>" itemprop="url"><span itemprop="title"><?php echo esc_html( get_term( $ancestor, $taxonomy_name ) -> name ); ?></span></a></li>
						<li class="breadmark">&gt;</li>
					<?php endforeach; ?>

					<li <?php echo $itemtype; ?>><a href="<?php echo get_term_link( $child_tax, $taxonomy_name ); ?>" itemprop="url"><span itemprop="title"><?php echo esc_html( $child_tax -> name ); ?></span></a></li>
					<li class="breadmark">&gt;</li>
				<?php endif; ?>
			<?php endif; ?>
		<li><?php the_title_attribute(); ?>

		<?php elseif ( is_page() ) : ?>
		<?php $ancestors = get_post_ancestors( $post -> ID ); ?>
		<?php foreach ( array_reverse( $ancestors ) as $ancestor ) : ?>
		<li <?php echo $itemtype; ?>><a href="<?php echo get_page_link( $ancestor ); ?>" itemprop="url"><span itemprop="title"><?php echo get_the_title( $ancestor ); ?></span></a></li>
		<li class="breadmark">&gt;</li>
		<?php endforeach; ?>
		<li><?php the_title_attribute(); ?>

		<?php elseif ( is_search() ) : ?>
		<li><?php printf( __( 'Search Results of " %s "', 'meshie' ), get_search_query() ); ?>&nbsp;(&nbsp;<?php printf( __( '%d posts', 'meshie' ), esc_html( $wp_query -> found_posts ) ); ?>&nbsp;)

		<?php elseif ( is_404() ) : ?>
		<li><?php _e( '404 Not found', 'meshie' ); ?>

		<?php elseif ( is_attachment() ) : ?>
		<?php if ( $post -> post_parent != 0 ) : ?>
		<li <?php echo $itemtype; ?>><a href="<?php echo get_permalink( $post -> post_parent ); ?>" itemprop="url"><span itemprop="title"><?php echo get_the_title( $post -> post_parent ); ?></span></a></li>
		<li class="breadmark">&gt;</li>
		<?php endif; ?>
		<li><?php the_title_attribute(); ?>

		<?php elseif ( is_single() ) : ?>
		<?php
		$cat = get_the_category();
		if ( ! empty( $cat ) ) {
			$cat = $cat[count( $cat )-1];

			$breadcrumbs = '<li>'.get_category_parents( $cat, true, '</li><li class="breadmark">&gt;</li><li>' ).'</li>';
			$breadcrumbs = str_replace( '</li><li></li>', '</li>', $breadcrumbs );

			$breadcrumbs = preg_replace( '/<a href="([^>]+)">/i', '<a href="\\1" itemprop="url"><span itemprop="title">', $breadcrumbs );
			$breadcrumbs = str_replace( '<li>', '<li '.$itemtype.'>', $breadcrumbs );
			$breadcrumbs = str_replace( '</a>', '</span></a>', $breadcrumbs );
			echo $breadcrumbs;
		} ?>
		<li><?php the_title_attribute(); ?>

		<?php elseif ( is_year() ) : ?>
		<li><?php the_time( __( 'Y', 'meshie' ) ); ?>

		<?php elseif ( is_month() || is_day() ) : ?>
		<li <?php echo $itemtype; ?>><a href="<?php echo get_year_link( get_the_time( 'Y' ) ); ?>" itemprop="url"><span itemprop="title"><?php the_time( __( 'Y', 'meshie' ) ); ?></span></a></li>
		<li class="breadmark">&gt;</li>

		<?php if ( is_month() ) : ?>
		<li><?php the_time( __( 'F', 'meshie' ) ); ?>

		<?php elseif ( is_day() ) : ?>
		<li <?php echo $itemtype; ?>><a href="<?php echo get_year_link( get_the_time( 'm' ) ); ?>" itemprop="url"><span itemprop="title"><?php the_time( __( 'F', 'meshie' ) ); ?></span></a></li>
		<li class="breadmark">&gt;</li>
		<li><?php the_time( __( 'j', 'meshie' ) ); ?>
		<?php endif; ?>

		<?php elseif ( is_category() ) : ?>
		<?php
		$cat = get_queried_object();
		$breadcrumbs = '<li>'.get_category_parents( $cat, true, '</li><li class="breadmark">&gt;</li><li>' ).'</li>';

		$pattern = '/<li><a href=\"([^>]+)\">([^<]+)<\/a><\/li><li class="breadmark">&gt;<\/li><li><\/li>/i';
		$breadcrumbs = preg_replace( $pattern, '', $breadcrumbs );

		$breadcrumbs = preg_replace( '/<a href="([^>]+)">/i', '<a href="\\1" itemprop="url"><span itemprop="title">', $breadcrumbs );
		$breadcrumbs = str_replace( '<li>', '<li '.$itemtype.'>', $breadcrumbs );
		$breadcrumbs = str_replace( '</a>', '</span></a>', $breadcrumbs );

		echo $breadcrumbs; ?>
		<li><?php single_cat_title(); ?>

		<?php elseif ( is_tag() ) : ?>
		<li><?php single_cat_title(); ?>

		<?php elseif ( is_author() ) : ?>
		<li><?php
			if ( get_the_author_meta( 'display_name' ) ) {
				the_author_meta( 'display_name', $post -> post_author );
			} else {
				_e( 'Nothing Found', 'meshie' );
			} ?>
		<?php else : ?>
		<li><?php
			add_filter( 'meshie_wp_title_name', '__return_false' );
			add_filter( 'meshie_wp_title_desc', '__return_false' );
			add_filter( 'meshie_wp_title_page', '__return_false' );
			wp_title( '' ); ?>

		<?php endif;
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$page_num = sprintf( __( 'Page %d', 'meshie' ), max( $paged, $page ) );
			echo ' - '.$page_num;
		} ?></li>
	</ol>
</div>
<?php endif;
}
endif;

/* ----------------------------------------------
 * 5.0 - Copyright
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_footer_copyright' ) ) :
function meshie_footer_copyright() {
	
	$footer_copyright = '';

	// Display of copyright
	
	$footer_copyright = meshie_get_copyright_text();

		

	
	echo $footer_copyright;
}
endif;

// Get the first date of the article
if ( ! function_exists( 'meshie_copyright_first_date' ) ) :
function meshie_copyright_first_date() {
	$args = array(
		'numberposts' => 1,
		'orderby'     => 'post_date',
		'order'       => 'ASC',
	);
	$posts = get_posts( $args );

	foreach ( $posts as $post ) {
		$first_date = $post->post_date;
	}

	$first_date = ( ! empty( $first_date ) ) ? mysql2date( 'Y', $first_date, true ) : '';
	return $first_date;
}
endif;

// Get the latest Date of article
if ( ! function_exists( 'meshie_copyright_last_date' ) ) :
function meshie_copyright_last_date() {
	$last_date = get_lastpostmodified( 'blog' );
	return mysql2date( 'Y', $last_date, true );
}
endif;

// Notation of copyright
if ( ! function_exists( 'meshie_get_copyright_text' ) ) :
function meshie_get_copyright_text() {
	$first_date = meshie_copyright_first_date();
	$last_date = meshie_copyright_last_date();
	$copyright_date = $first_date;

	if ( ! empty( $first_date ) && ( $first_date != $last_date ) ) {
		$copyright_date .= '-'.$last_date;
	} else {
		$copyright_date = $last_date;
	}

	$site_anchor = '<a href="'.esc_url( home_url( '/' ) ).'">'.get_bloginfo( 'name' ).'</a>';
	$copyright_text = sprintf( __( 'Copyright &copy; %1$s %2$s All Rights Reserved.', 'meshie' ), $copyright_date, $site_anchor );

	return $copyright_text;
}
endif;



/* ----------------------------------------------
 * 5.8 - post data list
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_post_list_number' ) ) :
function meshie_post_list_number( $show_num = '' ) {
	$num_class = 'five-column';

	switch ( $show_num ){
		case '4':
			$num_class = 'four-column';
			break;
		case '3':
			$num_class = 'three-column';
			break;
		case '2':
			$num_class = 'two-column';
			break;
	}
	return $num_class;
}
endif;



//-----------------------------------------------
// New Post List

/* ----------------------------------------------
 * 5.8.2 - View Post list
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_post_list' ) ) :
function meshie_post_list( $show_tag ) {
    
    // If the value is 0, use the value of the default
    $show_num = 5;
    $num_class = 'five-column';
	
	

    if ( $show_tag == 'new' ) {
        $my_title = __( 'Blog', 'meshie' );
		     

        $order = 'DESC';
        $order_by = '';
    } elseif ( $show_tag == 'related' ) {
        $my_title = 'Related Entry';

        

        $order = 'ASC';
        $order_by = '';
      
    } else {
        return;
    }

    $my_query = meshie_post_data( $show_num, $show_tag, $order, $order_by );
	
    if ( $my_query -> have_posts() ) : ?>
	<div id="top_info" class="<?php echo $show_tag; ?>-contents common-contents clearfix">
    <h3 id="<?php echo $show_tag; ?>-title" class="common-title"><?php echo esc_attr( $my_title ); ?></h3>
    <ul class="<?php echo $num_class; ?> clearfix" style="list-style:none;">
        <?php while ( $my_query -> have_posts() ) : $my_query -> the_post(); ?>
        <?php $cat_info = meshie_category_info(); ?>
        <li>
            <span class="info_li_inner">
                <span class="news_date"><?php the_time('Y/m/d/'); ?></span>
                <span class="news_category <?php echo esc_attr($cat_info->slug); ?>"><?php echo esc_html($cat_info->name); ?></span>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </span>
        </li>

        <?php endwhile; wp_reset_query(); ?>
    </ul>
</div>
<?php endif;
}
endif;


/* ----------------------------------------------
 * 5.8.3.2 - post data
 * --------------------------------------------*/


/* ----------------------------------------------
 * 5.8.3.2 - post data
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_post_data' ) ) :
function meshie_post_data( $show_num, $show_tag, $order, $order_by ) {
    global $post;
    $tag_ID = '';
    $category_ID = '';

    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

   
    $categories = get_the_category( $post -> ID );
    $category_ID = array();

    foreach( $categories as $category ) {
        array_push( $category_ID, $category -> cat_ID );
    }
      
  

    $args = array(
        'tag__in'             => $tag_ID,
        'category__in'        => $category_ID,
        'post__not_in'        => array( $post -> ID ),
        'posts_per_page'      => $show_num,
        'ignore_sticky_posts' => true,
        'order'               => $order,
        'orderby'             => $order_by,
        'paged'               => $paged,
    );

    $my_query = new WP_Query( $args );
    return $my_query;
}
endif;
/* ----------------------------------------------
 * 5.3 - entry sticky & date
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_entry_dates' ) ) :
function meshie_entry_dates() {
	if (! is_page() ) {
		
		echo '<div class="entry-dates rollover">'."\n";
		if ( ! is_singular() ) {
			echo '<a href="'.get_permalink().'">';
		}

		if ( is_sticky() && ! is_single() && ! is_paged() ) {
			echo '<p class="entry-sticky icon-crown"><span>'.__( 'Attention', 'meshie' ).'</span></p>';
		}
		echo '<div class="burst-12">';
		echo '<div class="hiduke">';
		echo '<time class="entry-date" datetime="'.get_the_date( 'c' ).'">';		
		echo '<span class="entry-year">'.get_the_date( 'Y' ).'</span><span class="entry-month">'.get_the_date( 'm/d' ).'</span>';		
		echo '</time>';		
		echo '</div>';
		echo '</div>';
		if ( ! is_singular() ) {
			echo '</a>'."\n";
		}
		echo '</div>';
		
	}
}
endif;






/* ----------------------------------------------
 * 2.3.1 - comments number
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_get_comments_only_number' ) ) :
function meshie_get_comments_only_number() {
	global $id;
	$comment_cnt = 0;
	$comments = get_approved_comments( $id );
	foreach ( $comments as $comment ) {
		if ( $comment->comment_type === '' ) {
			$comment_cnt++;
		}
	}
	return $comment_cnt;
}
endif;

/* ----------------------------------------------
 * 2.3.2 - pings (trackback + pingback) number
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_get_pings_only_number' ) ) :
function meshie_get_pings_only_number() {
	$trackback_cnt = get_comments_number() - meshie_get_comments_only_number();
	return $trackback_cnt;
}
endif;

/* ----------------------------------------------
 * 2.3.3 - comment
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_theme_comment' ) ) :
function meshie_theme_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	$no_avatars = '';
	if ( ! get_avatar( $comment ) ) {
		$no_avatars = 'no-avatars';
	}
?>
	<li <?php comment_class( $no_avatars ); ?>>
	<article id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<p class="comment-awaiting-moderation"><?php _e( 'This comment is awaiting moderation.', 'meshie' ) ?></p>
		<?php else : ?>
		<div class="comment-author-img"><?php echo get_avatar( $comment, $size='50' ); ?></div>

		<div class="comment-center">
			<div class="comment-author-data">
				<span class="comment-author"><?php comment_author_url_link( comment_author_link() , '', '' ); ?><span class="says">says:</span></span>

				<span class="reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'meshie' ), 'depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?></span>
				<?php edit_comment_link( __( 'Edit', 'meshie' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

			<div class="comment-content">
				<?php comment_text(); ?>
			</div>

			<div class="comment-meta commentmetadata">
				<div class="comment-metadata"><?php comment_date(); ?>&nbsp;<?php comment_time(); ?></div>
			</div>
		</div>
		<?php endif; ?>
	</article>
<?php
}
endif;


/* ----------------------------------------------
 * 3.5.5 - Add class to previous_post_link
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_previous_post_link' ) ) :
function meshie_previous_post_link( $output ) {
	$search = array( 'rel="prev">', '</a>' );
	$replace = array( 'rel="prev"><p class="prev-btn">A</p><p class="prev-link">', '</p></a>' );
	$output = str_replace( $search, $replace, $output );
	return $output;
}
endif;
add_filter( 'previous_post_link', 'meshie_previous_post_link' );

/* ----------------------------------------------
 * 3.5.6 - Add class to next_post_link
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_next_post_link' ) ) :
function meshie_next_post_link( $output ) {
	$search = array( 'rel="next">', '</a>' );
	$replace = array( 'rel="next"><p class="next-link">', '</p><p class="next-btn">A</p></a>' );
	$output = str_replace( $search, $replace, $output );
	return $output;
}
endif;
add_filter( 'next_post_link', 'meshie_next_post_link' );
/* ----------------------------------------------
 * 5.6 - pagination & prevnext-page
 * --------------------------------------------*/

/* ----------------------------------------------
 * 5.6.1 - pagination
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_pagination' ) ) :
function meshie_pagination() {
	global $wp_query, $paged;
	$big = 999999999;

	$pages = $wp_query -> max_num_pages;
	if ( empty( $paged ) ) $paged = 1;

	if ( 1 < $pages ) {
		$mid_size = ( meshie_is_mobile() ) ? 0 : 3 ;
		echo '<div class="pagination clearfix">'."\n";
		echo paginate_links( array(
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $wp_query -> max_num_pages,
			'mid_size'  => $mid_size,
			'prev_text' => '&lsaquo;',
			'next_text' => '&rsaquo;',
			'type'      => 'list'
		) );
		echo '</div>';
	}
}
endif;

/* ----------------------------------------------
 * 5.6.2 - prevnext-page
 * --------------------------------------------*/

if ( ! function_exists( 'meshie_prevnext' ) ) :
function meshie_prevnext( $prevnext_area = '' ) {
	if ( is_single() && ! is_attachment() ) {
		if ( get_previous_post() || get_next_post() ) {
			$prevnext_class = '';

			if ( $prevnext_area == 'footer' ) {
				$prevnext_class = ' prevnext-footer';
			}
			?>
			<div class="prevnext-page<?php echo $prevnext_class; ?>">
				<div class="paging clearfix">
					<?php previous_post_link( '<div class="page-prev clearfix">%link</div>' ); ?>
					<?php next_post_link( '<div class="page-new clearfix">%link</div>' ); ?>
				</div>
			</div>
			<?php
		}
	}
}
endif;


function new_excerpt_mblength($length) {
     return 200; //Set the excerpted character number to 200 characters
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');

function new_excerpt_more() {
	global  $post;
     return '<a href="'. get_permalink($post->ID) . '">' . '<br>'.__( '<<Read more.>>', 'meshie' ). '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'css/editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );