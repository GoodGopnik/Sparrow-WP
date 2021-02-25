<?php 

show_admin_bar(false);

add_action( 'wp_enqueue_scripts', 'style_theme' );
add_action( 'wp_footer', 'scripts_theme' );
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
add_action( 'widgets_init', 'register_my_widgets' );
add_action('init', 'my_post_init');
add_action( 'init', 'create_taxonomy' );
add_theme_support( 'post-thumbnails' );

add_action( 'wp_ajax_send_mail', 'send_mail' );
add_action( 'wp_ajax_nopriv_send_mail', 'send_mail' );

function send_mail() {
	$contactName = $_POST['contactName'];
	$contactEmail = $_POST['contactEmail'];
	$contactSubject = $_POST['contactSubject'];
	$contactMessage = $_POST['contactMessage'];
	$to = get_option( 'admin_email' );
	

// удалим фильтры, которые могут изменять заголовок $headers
remove_all_filters( 'wp_mail_from' );
remove_all_filters( 'wp_mail_from_name' );

$headers = array(
	'From: Me Myself <me@example.net>',
	'content-type: text/html',
	'Cc: John Q Codex <jqc@wordpress.org>',
	'Cc: iluvwp@wordpress.org', // тут можно использовать только простой email адрес
);

wp_mail( $to, $contactSubject, $contactMessage, $headers );
wp_die();
}


function register_my_widgets(){

	register_sidebar( array(
		'name'          => 'Blog',
		'id'            => "sidebar_blog",
		'description'   => 'sidebar blog',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => "</h5>\n"
	) );
}

function style_theme() {
    wp_enqueue_style( 'style', get_stylesheet_uri());
    wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css' );
    wp_enqueue_style( 'layout', get_template_directory_uri() . '/assets/css/layout.css' );
    wp_enqueue_style( 'media-queries', get_template_directory_uri() . '/assets/css/media-queries.css' );
}

function scripts_theme() {
    wp_deregister_script( 'jquery' );

    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');

    wp_enqueue_script( 'jquery' );

    wp_enqueue_script( 'jquery.flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', ['jquery'], null, true);

    wp_enqueue_script( 'doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js', ['jquery'], null, true );

    wp_enqueue_script( 'init', get_template_directory_uri() . '/assets/js/init.js', ['jquery'], null, true  );

    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', null, null, false );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], null, true);
}

function theme_register_nav_menu() {
	register_nav_menu( 'top-menu', 'Меню в шапке' );
    register_nav_menu( 'bot-menu', 'Меню в подвале' );
    register_nav_menu( 'top-menu-blog', 'Меню для блога' );
}

function my_post_init(){
	register_post_type('post_Blog', array(
		'labels'             => array(
			'name'               => 'Посты', // Основное название типа записи
			'singular_name'      => 'Пост', // отдельное название записи типа Book
			'add_new'            => 'Добавить пост',
			'add_new_item'       => 'Добавить новый пост',
			'edit_item'          => 'Редактировать пост',
			'new_item'           => 'Новый пост',
			'view_item'          => 'Посмотреть пост',
			'search_items'       => 'Найти пост',
			'not_found'          => 'Постов не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Посты'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-welcome-write-blog',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt')
	) );


	register_post_type('post_portfolio', array(
		'labels'             => array(
			'name'               => 'Портфолио', // Основное название типа записи
			'singular_name'      => 'Портфолио', // отдельное название записи типа Book
			'add_new'            => 'Добавить работу',
			'add_new_item'       => 'Добавить новую работу',
			'edit_item'          => 'Редактировать работу',
			'new_item'           => 'Новая работа',
			'view_item'          => 'Посмотреть работу',
			'search_items'       => 'Найти работу',
			'not_found'          => 'Работ не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Портфолио'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'taxonomies'         => array('skills'),
		'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-drumstick',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt')
	) );
	
}

function create_taxonomy(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'skills', [ 'post_portfolio' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Навыки',
			'singular_name'     => 'Навык',
			'search_items'      => 'найти навыкт',
			'all_items'         => 'Все навыки',
			'view_item '        => 'Смотреть навыки',
			'parent_item'       => 'Родительский навык',
			'parent_item_colon' => 'Родительский навык:',
			'edit_item'         => 'Изменить навык',
			'update_item'       => 'Обновить навык',
			'add_new_item'      => 'Добавить новый навык',
			'new_item_name'     => 'Новое имя навыка',
			'menu_name'         => 'Навыки',
		],
		'description'           => 'Навыки которые использовались в работе над проектом', // описание таксономии
		'public'                => true,
		'hierarchical'          => false,
		'rewrite'               => true,
	] );
}

add_filter( 'excerpt_length', function(){
	return 50;
} );


