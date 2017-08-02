<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package GP
 */

/**
 * Header
 */
add_action( 'init', 'register_post_type_header' );

function register_post_type_header() {
	$labels = array(
		'name'               => _x( 'Шапка', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Шапка', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Шапка', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Шапка', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Добавить новую', 'запись', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Добавить новую запись', 'your-plugin-textdomain' ),
		'new_item'           => __( 'Новая запись', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Редактировать запись', 'your-plugin-textdomain' ),
		'view_item'          => __( 'Просмотреть запись', 'your-plugin-textdomain' ),
		'all_items'          => __( 'Все записи', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Поиск записей', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Главные рубрики:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'Записей не найдено.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'Записи в корзине отсутствуют.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Редактирование верхней части сайта.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-admin-home',
		'menu_position'      => 12,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' )
	);

	register_post_type( 'gp_header', $args );
}

// Taxonomy Header
add_action( 'init', 'create_taxonomy_header' );

function create_taxonomy_header(){
	$labels = array(
		'name'              => 'Рубрики',
		'singular_name'     => 'Рубрика',
		'search_items'      => 'Поиск рубрики',
		'all_items'         => 'Все рубрики',
		'parent_item'       => 'Подрубрика',
		'parent_item_colon' => 'Подрубрики:',
		'edit_item'         => 'Редактировать рубрику',
		'update_item'       => 'Обновить рубрику',
		'add_new_item'      => 'Добавить новую рубрику',
		'new_item_name'     => 'Новая рубрика',
		'menu_name'         => 'Рубрики',
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_in_nav_menus'     => false,
		'show_ui'               => true,
		'show_admin_column'     => false,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => true,
	);

	register_taxonomy( 'taxonomy_gp_header', 'gp_header', $args );
}

/**
 * Slider Promo
 */
add_action( 'init', 'register_post_type_slider_promo' );

function register_post_type_slider_promo() {
	$labels = array(
		'name'               => _x( 'Слайдер', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Слайдер', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Слайдер', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Слайдер', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Добавить новый', 'слайд', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Добавить новый слайд', 'your-plugin-textdomain' ),
		'new_item'           => __( 'Новый слайд', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Редактировать слайд', 'your-plugin-textdomain' ),
		'view_item'          => __( 'Просмотреть слайд', 'your-plugin-textdomain' ),
		'all_items'          => __( 'Все слайды', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Поиск слайдов', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Главные рубрики:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'Слайдов не найдено.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'Слайды в корзине отсутствуют.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Редактирование слайдера.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => null,
		'show_ui'            => null,
		'show_in_menu'       => null,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-images-alt',
		'menu_position'      => 14,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' )
	);

	register_post_type( 'gp_slider_promo', $args );
}

// Taxonomy Slider Promo
add_action( 'init', 'create_taxonomy_slider_promo' );

function create_taxonomy_slider_promo(){
	$labels = array(
		'name'              => 'Рубрики',
		'singular_name'     => 'Рубрика',
		'search_items'      => 'Поиск рубрики',
		'all_items'         => 'Все рубрики',
		'parent_item'       => 'Подрубрика',
		'parent_item_colon' => 'Подрубрики:',
		'edit_item'         => 'Редактировать рубрику',
		'update_item'       => 'Обновить рубрику',
		'add_new_item'      => 'Добавить новую рубрику',
		'new_item_name'     => 'Новая рубрика',
		'menu_name'         => 'Рубрики',
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_in_nav_menus'     => false,
		'show_ui'               => true,
		'show_admin_column'     => false,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => true,
	);

	register_taxonomy( 'taxonomy_gp_slider_promo', 'gp_slider_promo', $args );
}


/**
 * Services
 */
add_action( 'init', 'register_post_type_services' );

function register_post_type_services() {
	$labels = array(
		'name'               => _x( 'Услуги', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Услуги', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Услуги', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Услуги', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Добавить новую', 'запись', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Добавить новую запись', 'your-plugin-textdomain' ),
		'new_item'           => __( 'Новая запись', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Редактировать запись', 'your-plugin-textdomain' ),
		'view_item'          => __( 'Просмотреть запись', 'your-plugin-textdomain' ),
		'all_items'          => __( 'Все записи', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Поиск записей', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Главные рубрики:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'Записей не найдено.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'Записи в корзине отсутствуют.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Редактирование верхней части сайта.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-clipboard',
		'menu_position'      => 16,
		'supports'           => array( 'title', 'editor', 'author', 'custom-fields' )
	);

	register_post_type( 'gp_services', $args );
}

// Taxonomy Services
add_action( 'init', 'create_taxonomy_services' );

function create_taxonomy_services(){
	$labels = array(
		'name'              => 'Рубрики',
		'singular_name'     => 'Рубрика',
		'search_items'      => 'Поиск рубрики',
		'all_items'         => 'Все рубрики',
		'parent_item'       => 'Подрубрика',
		'parent_item_colon' => 'Подрубрики:',
		'edit_item'         => 'Редактировать рубрику',
		'update_item'       => 'Обновить рубрику',
		'add_new_item'      => 'Добавить новую рубрику',
		'new_item_name'     => 'Новая рубрика',
		'menu_name'         => 'Рубрики',
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_in_nav_menus'     => false,
		'show_ui'               => true,
		'show_admin_column'     => false,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => true,
	);

	register_taxonomy( 'taxonomy_gp_services', 'gp_services', $args );
}

/**
 * Table
 */
add_action( 'init', 'register_post_type_table' );

function register_post_type_table() {
	$labels = array(
		'name'               => _x( 'Цены', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Цены', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Цены', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Цены', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Добавить новую', 'запись', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Добавить новую запись', 'your-plugin-textdomain' ),
		'new_item'           => __( 'Новая запись', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Редактировать запись', 'your-plugin-textdomain' ),
		'view_item'          => __( 'Просмотреть запись', 'your-plugin-textdomain' ),
		'all_items'          => __( 'Все записи', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Поиск записей', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Главные рубрики:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'Записей не найдено.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'Записи в корзине отсутствуют.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Редактирование верхней части сайта.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-media-spreadsheet',
		'menu_position'      => 17,
		'supports'           => array( 'title', 'editor', 'author', 'custom-fields' )
	);

	register_post_type( 'gp_table', $args );
}

// Taxonomy Table
add_action( 'init', 'create_taxonomy_table' );

function create_taxonomy_table(){
	$labels = array(
		'name'              => 'Рубрики',
		'singular_name'     => 'Рубрика',
		'search_items'      => 'Поиск рубрики',
		'all_items'         => 'Все рубрики',
		'parent_item'       => 'Подрубрика',
		'parent_item_colon' => 'Подрубрики:',
		'edit_item'         => 'Редактировать рубрику',
		'update_item'       => 'Обновить рубрику',
		'add_new_item'      => 'Добавить новую рубрику',
		'new_item_name'     => 'Новая рубрика',
		'menu_name'         => 'Рубрики',
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_in_nav_menus'     => false,
		'show_ui'               => true,
		'show_admin_column'     => false,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => true,
	);

	register_taxonomy( 'taxonomy_gp_table', 'gp_table', $args );
}

/**
 * Advantages
 */
add_action( 'init', 'register_post_type_advantages' );

function register_post_type_advantages() {
	$labels = array(
		'name'               => _x( 'Преимущества', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Преимущества', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Преимущества', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Преимущества', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Добавить новую', 'запись', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Добавить новую запись', 'your-plugin-textdomain' ),
		'new_item'           => __( 'Новая запись', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Редактировать запись', 'your-plugin-textdomain' ),
		'view_item'          => __( 'Просмотреть запись', 'your-plugin-textdomain' ),
		'all_items'          => __( 'Все записи', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Поиск записей', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Главные рубрики:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'Записей не найдено.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'Записи в корзине отсутствуют.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Редактирование верхней части сайта.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-thumbs-up',
		'menu_position'      => 18,
		'supports'           => array( 'title', 'editor', 'author', 'custom-fields' )
	);

	register_post_type( 'gp_advantages', $args );
}

// Taxonomy advantages
add_action( 'init', 'create_taxonomy_advantages' );

function create_taxonomy_advantages(){
	$labels = array(
		'name'              => 'Рубрики',
		'singular_name'     => 'Рубрика',
		'search_items'      => 'Поиск рубрики',
		'all_items'         => 'Все рубрики',
		'parent_item'       => 'Подрубрика',
		'parent_item_colon' => 'Подрубрики:',
		'edit_item'         => 'Редактировать рубрику',
		'update_item'       => 'Обновить рубрику',
		'add_new_item'      => 'Добавить новую рубрику',
		'new_item_name'     => 'Новая рубрика',
		'menu_name'         => 'Рубрики',
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_in_nav_menus'     => false,
		'show_ui'               => true,
		'show_admin_column'     => false,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => true,
	);

	register_taxonomy( 'taxonomy_gp_advantages', 'gp_advantages', $args );
}

/**
 * Reviews
 */
add_action( 'init', 'register_post_type_reviews' );

function register_post_type_reviews() {
	$labels = array(
		'name'               => _x( 'Отзывы', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Отзывы', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Отзывы', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Отзывы', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Добавить новую', 'запись', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Добавить новую запись', 'your-plugin-textdomain' ),
		'new_item'           => __( 'Новая запись', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Редактировать запись', 'your-plugin-textdomain' ),
		'view_item'          => __( 'Просмотреть запись', 'your-plugin-textdomain' ),
		'all_items'          => __( 'Все записи', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Поиск записей', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Главные рубрики:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'Записей не найдено.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'Записи в корзине отсутствуют.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Редактирование верхней части сайта.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-id',
		'menu_position'      => 19,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' )
	);

	register_post_type( 'gp_reviews', $args );
}

// Taxonomy reviews
add_action( 'init', 'create_taxonomy_reviews' );

function create_taxonomy_reviews(){
	$labels = array(
		'name'              => 'Рубрики',
		'singular_name'     => 'Рубрика',
		'search_items'      => 'Поиск рубрики',
		'all_items'         => 'Все рубрики',
		'parent_item'       => 'Подрубрика',
		'parent_item_colon' => 'Подрубрики:',
		'edit_item'         => 'Редактировать рубрику',
		'update_item'       => 'Обновить рубрику',
		'add_new_item'      => 'Добавить новую рубрику',
		'new_item_name'     => 'Новая рубрика',
		'menu_name'         => 'Рубрики',
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_in_nav_menus'     => false,
		'show_ui'               => true,
		'show_admin_column'     => false,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => true,
	);

	register_taxonomy( 'taxonomy_gp_reviews', 'gp_reviews', $args );
}

/**
 * Contacts
 */
add_action( 'init', 'register_post_type_contacts' );

function register_post_type_contacts() {
	$labels = array(
		'name'               => _x( 'Контакты', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Контакты', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Контакты', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Контакты', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Добавить новую', 'запись', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Добавить новую запись', 'your-plugin-textdomain' ),
		'new_item'           => __( 'Новая запись', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Редактировать запись', 'your-plugin-textdomain' ),
		'view_item'          => __( 'Просмотреть запись', 'your-plugin-textdomain' ),
		'all_items'          => __( 'Все записи', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Поиск записей', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Главные рубрики:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'Записей не найдено.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'Записи в корзине отсутствуют.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Редактирование верхней части сайта.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-phone',
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'author', 'custom-fields' )
	);

	register_post_type( 'gp_contacts', $args );
}

// Taxonomy Cantacts
add_action( 'init', 'create_taxonomy_contacts' );

function create_taxonomy_contacts(){
	$labels = array(
		'name'              => 'Рубрики',
		'singular_name'     => 'Рубрика',
		'search_items'      => 'Поиск рубрики',
		'all_items'         => 'Все рубрики',
		'parent_item'       => 'Подрубрика',
		'parent_item_colon' => 'Подрубрики:',
		'edit_item'         => 'Редактировать рубрику',
		'update_item'       => 'Обновить рубрику',
		'add_new_item'      => 'Добавить новую рубрику',
		'new_item_name'     => 'Новая рубрика',
		'menu_name'         => 'Рубрики',
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_in_nav_menus'     => false,
		'show_ui'               => true,
		'show_admin_column'     => false,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => true,
	);

	register_taxonomy( 'taxonomy_gp_contacts', 'gp_contacts', $args );
}