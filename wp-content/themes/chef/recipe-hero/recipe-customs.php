<?php
/**
 * Recipe Hero Compatibility 
 *
 * @package Chef
 */

if ( !class_exists( 'RecipeHero' ) )
	return;

/**
 * Remove default content wrappers
*/
remove_action( 'recipe_hero_before_main_content', 'recipe_hero_output_content_wrapper' );
remove_action( 'recipe_hero_after_main_content', 'recipe_hero_output_content_wrapper_end' );

/**
 * Add the wrappers for the theme
*/
add_action('recipe_hero_before_main_content', 'gourmet_recipe_wrapper_before', 10);
add_action('recipe_hero_after_main_content', 'gourmet_recipe_wrapper_after', 10);

function gourmet_recipe_wrapper_before() {
   echo '<div id="primary" class="content-area">';
      echo '<main id="main" class="site-main" role="main">';
}

function gourmet_recipe_wrapper_after() {
      echo '</main>';
   echo '</div>';
}

/**
 * Remove recipe details from archives
*/
remove_action( 'recipe_hero_archive_recipe_content', 'recipe_hero_output_archive_details', 50 );

/**
 * Move recipes taxonomies below excerpt
*/
remove_action( 'recipe_hero_archive_recipe_content', 'recipe_hero_output_archive_tax', 40 );
add_action( 'recipe_hero_archive_recipe_content', 'recipe_hero_output_archive_tax', 70 );