<?php
/** Theme setup. @package Meridian_News */
defined( 'ABSPATH' ) || exit;
function meridian_news_setup() {
	load_theme_textdomain( 'meridian-news', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-logo', array( 'height' => 72, 'width' => 280, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style', 'search-form' ) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	register_nav_menus( array( 'primary' => __( 'Primary Menu', 'meridian-news' ), 'footer' => __( 'Footer Menu', 'meridian-news' ) ) );
	add_image_size( 'meridian-news-hero', 1400, 820, true );
	add_image_size( 'meridian-news-card', 720, 480, true );
}
add_action( 'after_setup_theme', 'meridian_news_setup' );
function meridian_news_content_width() { $GLOBALS['content_width'] = apply_filters( 'meridian_news_content_width', 760 ); }
add_action( 'after_setup_theme', 'meridian_news_content_width', 0 );
function meridian_news_widgets_init() {
	register_sidebar( array( 'name' => __( 'Blog sidebar', 'meridian-news' ), 'id' => 'blog-sidebar', 'description' => __( 'Optional widgets shown below the editorial sidebar components.', 'meridian-news' ), 'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">', 'after_widget' => '</section>', 'before_title' => '<h2 class="sidebar-title">', 'after_title' => '</h2>' ) );
}
add_action( 'widgets_init', 'meridian_news_widgets_init' );
function meridian_news_comment_form_defaults( $defaults ) { $defaults['class_submit'] = 'button'; return $defaults; }
add_filter( 'comment_form_defaults', 'meridian_news_comment_form_defaults' );
