<?php
/** Shared presentation helpers. @package Meridian_News */
defined( 'ABSPATH' ) || exit;
function meridian_news_posted_on() {
	$published = get_the_date(); $modified = get_the_modified_date();
	printf( '<span class="post-meta__date"><time datetime="%1$s">%2$s</time>%3$s</span>', esc_attr( get_the_date( DATE_W3C ) ), esc_html( $published ), $modified !== $published ? sprintf( ' <span class="screen-reader-text">%s </span><time datetime="%s">%s</time>', esc_html__( 'Updated', 'meridian-news' ), esc_attr( get_the_modified_date( DATE_W3C ) ), esc_html( $modified ) ) : '' );
}
function meridian_news_categories() { $categories = get_the_category(); if ( $categories ) { printf( '<a class="eyebrow" href="%s">%s</a>', esc_url( get_category_link( $categories[0]->term_id ) ), esc_html( $categories[0]->name ) ); } }
function meridian_news_reading_time() { $words = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', get_the_ID() ) ) ); printf( esc_html( _n( '%s minute read', '%s minutes read', max( 1, (int) ceil( $words / 220 ) ), 'meridian-news' ) ), number_format_i18n( max( 1, (int) ceil( $words / 220 ) ) ) ); }
function meridian_news_pagination() { the_posts_pagination( array( 'mid_size' => 1, 'prev_text' => __( 'Previous', 'meridian-news' ), 'next_text' => __( 'Next', 'meridian-news' ), 'screen_reader_text' => __( 'Posts navigation', 'meridian-news' ) ) ); }
function meridian_news_excerpt() { if ( has_excerpt() ) { the_excerpt(); } else { echo '<p>' . esc_html( wp_trim_words( wp_strip_all_tags( get_the_content() ), 24 ) ) . '</p>'; } }
function meridian_news_menu_fallback() { echo '<ul class="menu"><li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Create a menu', 'meridian-news' ) . '</a></li></ul>'; }
function meridian_news_related_posts() {
	$categories = wp_get_post_categories( get_the_ID() ); $tags = wp_get_post_tags( get_the_ID(), array( 'fields' => 'ids' ) );
	$args = array( 'post_type' => 'post', 'posts_per_page' => 6, 'post__not_in' => array( get_the_ID() ), 'ignore_sticky_posts' => true );
	if ( $categories ) { $args['category__in'] = $categories; } elseif ( $tags ) { $args['tag__in'] = $tags; }
	$query = new WP_Query( $args );
	if ( ! $query->have_posts() && ( $categories || $tags ) ) { unset( $args['category__in'], $args['tag__in'] ); $query = new WP_Query( $args ); }
	return $query;
}
