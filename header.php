<?php /** @package Meridian_News */ ?>
<!doctype html><html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo( 'charset' ); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class(); ?>><?php wp_body_open(); ?>
<a class="skip-link" href="#main-content"><?php esc_html_e( 'Skip to content', 'meridian-news' ); ?></a>
<header class="site-header"><div class="site-header__inner container">
	<div class="site-branding"><?php if ( has_custom_logo() ) { the_custom_logo(); } else { ?><a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><?php } ?></div>
	<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-navigation"><span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'meridian-news' ); ?></span><span></span><span></span><span></span></button>
	<nav id="site-navigation" class="primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'meridian-news' ); ?>"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => 'meridian_news_menu_fallback' ) ); ?></nav>
	<button class="search-toggle" type="button" aria-expanded="false" aria-controls="site-search"><span class="screen-reader-text"><?php esc_html_e( 'Open search', 'meridian-news' ); ?></span><svg aria-hidden="true" viewBox="0 0 24 24" width="21" height="21"><circle cx="10.75" cy="10.75" r="6.75"></circle><path d="m16 16 4.25 4.25"></path></svg></button>
</div></header>
<div id="site-search" class="search-panel" hidden><div class="container search-panel__inner"><button class="search-close" type="button"><span class="screen-reader-text"><?php esc_html_e( 'Close search', 'meridian-news' ); ?></span>×</button><?php get_search_form(); ?></div></div>
