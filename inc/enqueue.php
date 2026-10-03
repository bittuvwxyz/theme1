<?php
/** Asset loading. @package Meridian_News */
defined( 'ABSPATH' ) || exit;
function meridian_news_assets() {
	$version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'meridian-news-style', get_stylesheet_uri(), array(), $version );
	wp_enqueue_style( 'meridian-news-main', get_template_directory_uri() . '/assets/css/main.css', array( 'meridian-news-style' ), $version );
	wp_enqueue_style( 'meridian-news-components', get_template_directory_uri() . '/assets/css/components.css', array( 'meridian-news-main' ), $version );
	wp_enqueue_style( 'meridian-news-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array( 'meridian-news-components' ), $version );
	wp_enqueue_script( 'meridian-news-main', get_template_directory_uri() . '/assets/js/main.js', array(), $version, array( 'in_footer' => true ) );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action( 'wp_enqueue_scripts', 'meridian_news_assets' );
