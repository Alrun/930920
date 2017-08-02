<?php
/**
 * gp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gp
 */

if ( ! function_exists( 'gp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gp, use a find and replace
	 * to change 'gp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gp', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'gp' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'gp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gp_content_width', 640 );
}
add_action( 'after_setup_theme', 'gp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gp_scripts() {
	wp_enqueue_style( 'gp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'gp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'gp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gp_scripts' );

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
 * Подключение файла таксономий.
 */
require get_template_directory() . '/inc/gp-taxonomy.php';


// Отключение добавления тегов <p></p> к записям при выводе
add_filter( 'tiny_mce_before_init', 'customize_tinymce_settings' );
remove_filter( 'the_content', 'wpautop' );

// Отключение функции очистки от тегов <p></p> при переключении редактора в HTML-режим
function customize_tinymce_settings($mceInit) {
	$mceInit['wpautop'] = true;			
	return $mceInit;
}

// Отключение добавления размеров изображений
add_filter ('post_thumbnail_html','no_width_height_html',10,1);

function no_width_height_html($html){
    $pos = strpos($html,'src');
    $html ='<img '.substr($html,$pos);
    return $html;
}


/**
 * remove_menus
 */
add_action('admin_menu', 'remove_menus');

function remove_menus(){
	global $menu;
	$restricted = array(
		//__('Dashboard'), //главная страница админки (консоль);
		__('Posts'), //пункт меню "Записи";
		__('Media'), //пункт меню "Медиафайлы";
		__('Links'), //пункт меню "Ссылки";
		__('Pages'), //пункт меню "Страницы";
		//__('Appearance'), //пункт меню "Внешний вид";
		//__('Tools'), //пункт меню "инструменты";
		//__('Users'), //пользователи;
		//__('Settings'), //меню "Настройки";
		__('Comments'), //комментарии;
		//__('Plugins') //пункт меню "Плагины;
	);
	end ($menu);
	while (prev($menu)){
		$value = explode(' ', $menu[key($menu)][0]);
		if( in_array( ($value[0] != NULL ? $value[0] : "") , $restricted ) ){
			unset($menu[key($menu)]);
		}
	}
}

/**
 * Удаление элементов из Админ бара
 */
add_action('wp_before_admin_bar_render', 'wph_new_toolbar');

function wph_new_toolbar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');    //меню "комментарии"
    $wp_admin_bar->remove_menu('my-account');  //меню "мой профиль"
    // $wp_admin_bar->remove_menu('edit');        //меню "редактировать запись"
    $wp_admin_bar->remove_menu('new-content'); //меню "добавить"
    // $wp_admin_bar->remove_menu('updates');     //меню "обновления"
    // $wp_admin_bar->remove_menu('wp-logo');     //меню "о wordpress"
    // $wp_admin_bar->remove_menu('site-name');   //меню "сайт"
    // $wp_admin_bar->remove_menu('my-sites');    //меню "мои сайты"
}


/**
 * Рубрики в таксономии
 */
add_action('admin_init','taxocol_admin_init');
 
function taxocol_admin_init(){
    $post_types = get_post_types( );
    foreach($post_types as $post_type){
        add_filter('manage_'.$post_type.'_posts_columns','taxocol_taxlist_th');
        add_action('manage_'.$post_type.'_posts_custom_column','taxocol_taxlist_td',10,2);
    }
}
 
function taxocol_taxlist_th($columns){
    global $post_type;
    $postax = get_taxonomies( array( '_builtin'=>false,'object_type'=>array( $post_type ) ), 'objects' );
    foreach($postax as $tax){
        if(!in_array($post_type, $tax->object_type)){
           continue;
        }
        $offset = 0+array_search('author',array_keys($columns));
        $columns = array_slice($columns,0,$offset,true)
             + array($tax->name=>"<div class='$post_type {$tax->name}'>{$tax->labels->name}</div>")
             /*+ array_slice($columns,$offset,NULL,true)*/;
    }
    return $columns;
}
 
function taxocol_taxlist_td($col_name, $post_id){
    global $post_type;
    $post_terms = array();
    $tax = $col_name;
    $postax = get_taxonomies( array( '_builtin'=>false,'object_type'=>array( $post_type ) ), 'objects' );
    if(array_key_exists($tax, $postax)){
        $terms = get_the_terms($post_id, $tax);
        if ( !empty($terms) ) {
            foreach ( $terms as $term ){
                $post_terms[] = "<a href='edit.php?post_type={$post_type}&{$tax}={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $tax, 'edit')) . "</a>";
            }
            echo implode( ', ', $post_terms );
        } else {
            echo '<em>---</em>';
        }
    }
}


function fb_disable_feed() { wp_redirect(get_option('siteurl')); }
add_action('do_feed', 'fb_disable_feed', 1);
add_action('do_feed_rdf', 'fb_disable_feed', 1);
add_action('do_feed_rss', 'fb_disable_feed', 1);
add_action('do_feed_rss2', 'fb_disable_feed', 1);
add_action('do_feed_atom', 'fb_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );