<?php
/**
 * Plugin Name:     Bwhihub Plugin
 * Description:     Custom plugin for Bwihub site
 * Author:          Myriad
 * Author URI:      myriadweb.com
 * Text Domain:     bwhihub-plugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Bwhihub_Plugin
 */

require plugin_dir_path(__FILE__) . 'includes/MenuFunctions.php';

/*
 * Add scripts and styles
 */
function bwhihub_enqueue_scripts()
{
	if (is_front_page()) {
		wp_enqueue_script('owl-carousel-js', plugin_dir_url(__FILE__) . '/assets/owl.carousel/owl.carousel.js', array('jquery'), FALSE, TRUE);
		wp_enqueue_script('bwhihub-js', plugin_dir_url(__FILE__) . '/assets/scripts/script.js', array('jquery', 'owl-carousel-js'), FALSE, TRUE);
		wp_enqueue_style('owl-carousel-css', plugin_dir_url(__FILE__) . '/assets/owl.carousel/assets/owl.carousel.css', array(), FALSE);
		wp_enqueue_style('owl-theme-css', plugin_dir_url(__FILE__) . '/assets/owl.carousel/assets/owl.theme.default.css', array(), FALSE);
	}
}

// enqueue scripts and styles
add_action('wp_enqueue_scripts', 'bwhihub_enqueue_scripts');

// Your code starts here.
add_action('init', 'people_post_type');
add_action('init', 'portfolio_post_type');

/*
 * people post type
 */
function people_post_type()
{
	register_post_type('people',
		array(
			'labels' => array(
				'name' => __('People'),
				'singular_name' => __('People')
			),
			'public' => TRUE,
			'has_archive' => TRUE,
			'rewrite' => array('slug' => 'team', 'with_front' => FALSE),
			'hierarchical' => TRUE,
			'supports' => array(
				'title',
				'author',
				'custom-fields',
				'editor',
				'thumbnail'
			),
			'not-found' => __('Nothing was found. what to do?'),
			'menu_icon' => 'dashicons-groups'
		)
	);
}


/*
 * portfolio post type
 */
function portfolio_post_type()
{
	register_post_type('portfolio',
		array(
			'labels' => array(
				'name' => __('Portfolio'),
				'singular_name' => __('Portfolio')
			),
			'public' => TRUE,
			'has_archive' => TRUE,
			'rewrite' => array('slug' => 'portfolio', 'with_front' => FALSE),
			'hierarchical' => TRUE,
			'supports' => array(
				'title',
				'author',
				'custom-fields',
				'editor',
				'thumbnail'
			),
			'not-found' => __('Nothing was found. what to do?'),
			'menu_icon' => 'dashicons-portfolio'
		)
	);
}

/*
 * Home page carousel
 */
function bwhihub_carousel()
{
	$output = '';
	$hero_slider = get_field('hero_slider');
	if (have_rows('hero_slider_fields')) {
		$output = '
	    <div class="home-carousel owl-carousel owl-theme">';
		while (have_rows('hero_slider_fields')) : the_row();
			$img = get_sub_field('hero_image');
			$title = get_sub_field('hero_title');
			$subtitle = get_sub_field('hero_subtitle');
			$text = get_sub_field('hero_text');
			$link = get_sub_field('hero_link');
			$output .= '
			<div class="item">
				<img src="' . $img['url'] . '" alt="' . $img['alt'] . '" />
				<div class="hero-content">
					<div class="title">' . $title. '</div>
					<div class="subtitle">' . $subtitle . '</div>
					<div class="text">' . $text . '</div>
					<a href="' . $link['url'] . '" class="btn btn-primary">' . $link['title'] . '</a>
				</div>
			</div>
			';
		endwhile;
		$output .= '</div>';
	}
	return $output;
}
add_shortcode('home_carousel', 'bwhihub_carousel');

/*
 * Featured News
 */
function bwhihub_featured_news()
{
	$output = '';
	$args = array(
		'post_type' => array('post'),
		'post_status' => 'publish',
		'posts_per_page' => 3,
		'paged' => 0,
	);
	$query = new \WP_Query($args);
	if ($query->have_posts()) {
		$output = '<div class="featured-news row">';
		while ($query->have_posts()) {
			$query->the_post();
			$excerpt = get_the_excerpt();
			$output .= '
        <article class="content-item col-sm-4">
          <a href="' . get_the_permalink() . '"><img src="' . get_the_post_thumbnail_url() . '" /></a>
          <div class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></div>
          <time class="updated" datetime="' . get_post_time('c', true) . '">' . get_the_date() . '</time>
          <div class="excerpt">' . $excerpt . '</div>
        </article>
      ';
		}
		$output .= '</div>';
		wp_reset_postdata();
	}
	return $output;
}
add_shortcode('featured_news', 'bwhihub_featured_news');

/*
 * Featured News
 */
function bwhihub_featured_events()
{
	$output = '';
	$args = array(
		'post_type' => array('tribe_events'),
		'post_status' => 'publish',
		'posts_per_page' => 3,
		'paged' => 0,
	);
	$query = new \WP_Query($args);
	if ($query->have_posts()) {
		$output = '<div class="featured-events row">';
		while ($query->have_posts()) {
			$query->the_post();
			$excerpt = get_the_excerpt();
			$date_start = get_post_meta(get_the_ID(), '_EventStartDate', true);
			$date_end = get_post_meta(get_the_ID(), '_EventEndDate', true);
			$venue_id = get_post_meta(get_the_ID(), '_EventVenueID', true);
			if ($venue_id) {
				$venue = 'Location: ' . event_get_venue($venue_id);
			}
			$output .= '
        <article class="content-item col-sm-4">
          <div class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></div>
          <div class="date">'. date('l, F d, Y', strtotime($date_start)) . '</div>
          <div class="time">'. date('g:i A', strtotime($date_start)) . '</div>
          <div class="venue">' . $venue . '</div>
          <div class="excerpt">' . $excerpt . '</div>
        </article>
      ';
		}
		$output .= '</div>';
		wp_reset_postdata();
	}
	return $output;
}
add_shortcode('featured_events', 'bwhihub_featured_events');

function event_get_venue($id) {
	$result = '';
	$args = array(
		'post_type' => array('tribe_venue'),
		'post_status' => 'publish',
		'p' => $id
	);
	$post = get_post($id);
	$result = $post->post_title;
	return $result;
}


/*
 * Search form alter
 */
function bwhihub_search_form($form)
{
	$form = '
	<form role="search" method="get" class="search-form"  action="' . home_url('/') . '" >
	  <i class="fas fa-search search-toggle" aria-hidden="true" data-toggle="collapse" data-target="#search-fields"></i>
	  <div id="search-fields" class="collapse">
		<label class="screen-reader-text" for="s">' . __('Search BWH iHub') . '</label>
		<input type="search" class="search-field" placeholder="Search …" value="' . get_search_query() . '" name="s" />
		<input type="submit" class="search-submit btn" value="' . esc_attr__('Go') . '" />
	  </div>
	</form>';
	return $form;
}
add_filter('get_search_form', 'bwhihub_search_form');

/*
 * Menu Section Header: section header based on root menu parent item
 */
function bwhihub_section_header($title = NULL)
{
	if ($title) {
		return $title;
	} else {
		$entity = get_queried_object();
		if ($entity->term_id) {
			$id = $entity->term_id;
			$type = 'taxonomy';
		} else {
			$id = $entity->ID;
			$type = 'post_type';
		}
		$menu_parent = (new MenuFunctions)->get_menu_parent($id, $type);
		if ($menu_parent) {
			return $menu_parent->title;
		}
	}
}

/*
 * Submenu items for page top section
 */
add_filter( 'wp_nav_menu_objects', array('MenuFunctions', 'wp_nav_menu_objects_sub_menu'), 10, 2 );

function bwhihub_sub_menu()
{
	$output = '';
	$args = array(
		'theme_location' => 'primary_navigation',
		'container_class' => 'submenu-navigation',
		'menu_class' => 'menu-submenu',
		'sub_menu' => true,
		'echo' => FALSE,
	);
	$output = wp_nav_menu($args);

	return $output;
}
add_shortcode('sub_menu', 'bwhihub_sub_menu');

/*
 * Tribe calendar block
 */
function bwhihub_calendar_block() {
	//$assets = tribe_assets();
	$calendar = tribe_show_month();
	$styles = array('tribe-events-full-mobile.min.css', 'tribe-events-full.min.css');
	$style = '/wp-content/plugins/the-events-calendar/src/resources/css/tribe-events-full.min.css';
	$output = '
		<div class="calendar-block">
		<link rel="stylesheet" href="/wp-content/plugins/the-events-calendar/src/resources/css/'. $styles[1] . '" />
		<link rel="stylesheet" href="/wp-content/plugins/the-events-calendar/src/resources/css/'. $styles[0] . '"  />
		' . $calendar . '
		</div>';
	return $output;
}
add_shortcode('bwhihub_calendar_block', 'bwhihub_calendar_block');



/*
 * add media categories
 */
// apply categories to attachments
function add_media_cats() {
	register_taxonomy_for_object_type(
		'category',
		'attachment'
	);
}
//add_action( 'init' , 'add_media_cats' );

function media_type_taxonomy() {
	register_taxonomy(
		'media_type', array('attachment'), array(
			'labels' => array(
				'name' => 'Media Type',
				'singular_name' => 'Media Type',
			),
			'rewrite' => array('slug' => 'media-type', 'with_front' => FALSE),
			'show_admin_column' => TRUE,
			'show_ui' => TRUE,
			'query_var' => TRUE,
			'hierarchical' => FALSE
		)
	);
}
//add_action('init', 'media_type_taxonomy');

//[[START] - Add custom taxonomy dropdown to media library
function media_add_content_category_filter_dropdown()
{
	global $wp_query;

	// check we're in the right place, otherwise return
	$scr = get_current_screen();
	if ( $scr->base !== 'upload' ) return;

	$tax_slug = 'media_type';
	$tax_obj = get_taxonomy( $tax_slug );

	// check if anything has been selected, else set selected to null
	$selected = isset($wp_query->query[$tax_slug]) ? $wp_query->query[$tax_slug] : null;

	wp_dropdown_categories( array(
		'show_option_all'   => __($tax_obj->label . ' - All'),
		'taxonomy'          => $tax_slug,
		'name'              => $tax_obj->name,
		'orderby'           => 'name',
		'selected'          => $selected,
		'hierarchical'      => true,
		'value_field'       => 'slug',
		'hide_empty'        => false
	) );

}
//add_action('restrict_manage_posts', 'media_add_content_category_filter_dropdown');

function bwhihub_custom_posts_filter( $query ){
	$scr = get_current_screen();
	if ( is_admin() && $scr->base == 'upload' && isset($_GET['media_type']) && $_GET['media_type'] != 0) {
		$query->query_vars['tax_query'] = array(
			'taxonomy' => 'media_type',
			'field'    => 'slug',
			'terms'    => 'icon',
		);
		var_dump($query);
	}
	return $query;
}
//add_filter( 'parse_query', 'bwhihub_custom_posts_filter', 10 );

