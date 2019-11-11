<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/*
 * Adjust excerpt length
 */
function bwhihub_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', __NAMESPACE__ . '\\bwhihub_custom_excerpt_length');

/*
 * Portfolio list
 */
function bwhihub_portfolio_grid() {
    // title, image, content,
    $output = '';
    $args = array(
        'post_type' => array('portfolio'),
        'post_status' => 'publish',
        'posts_per_page' => 0,
        'paged' => 0,
    );
    $query = new \WP_Query($args);
    if ($query->have_posts()) {
        ?>
        <div class="portfolio-grid row">
        <?php
        while ( $query->have_posts() ) {
            $query->the_post();
            print \App\template('partials.content-portfolio');
        }
        wp_reset_postdata();
        ?>
        </div>
        <?php
    }
}
add_shortcode('portfolio_grid', __NAMESPACE__ . '\\bwhihub_portfolio_grid');

/*
 * Portfolio list
 */
function bwhihub_people_grid() {
    // title, image, content,
    $output = '';
    $args = array(
        'post_type' => array('people'),
        'post_status' => 'publish',
        'posts_per_page' => 0,
        'paged' => 0,
    );
    $query = new \WP_Query($args);
    if ($query->have_posts()) {
        ?>
        <div class="people-grid row">
            <?php
            while ( $query->have_posts() ) {
                $query->the_post();
                print \App\template('partials.content-people');
            }
            wp_reset_postdata();
            ?>
        </div>
        <?php
    }
}
add_shortcode('people_grid', __NAMESPACE__ . '\\bwhihub_people_grid');
