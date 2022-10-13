<?php
/**
 * Plugin Name:       Plugin CPT y Custom Taxonomies
 * Plugin URI:        https://cafelog.studio
 * Description:       Plugin para crear CPT y CT con código.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Sergio Alvarez
 * Author URI:        https://cafelog.studio
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

/*
Plugin CPT y Custom Taxonomies is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Plugin CPT y Custom Taxonomies is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Plugin CPT y Custom Taxonomies. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

/*Comprobar el plugin creado:
add_filter( 'the_content', 'prueba' );

function prueba($content){
    return "<p>Probando el plugin</p>" . $content;
}
*/

// Damos de alta el CPT: Comic Reviews
function comic_review_setup_post_type(){
 register_post_type( 'cafelog_comic_review' )
}

add_action( 'init', 'comic_review_setup_post_type' );



