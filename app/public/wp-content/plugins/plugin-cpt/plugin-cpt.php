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
 * Text Domain:       cafelog
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

    $labels = array(
        'name' => __( 'Reseñas', 'cafelog' ),
        'singular_name' => __('Reseña', 'cafelog'),
        'add_new' => __('Añadir reseña', 'cafelog'),
        'add_new_item' => __('Añadir nueva reseña', 'cafelog'),
        'edit_item' => __('Editar reseña', 'cafelog'),
        'new_item' => __('Nueva reseña', 'cafelog'),
        'view_item' => __('Ver reseña', 'cafelog'),
        'view_items' => __('Ver reseñas', 'cafelog'),
        'search_items' => __('Buscar reseñas', 'cafelog'),
        'not_found' => __('No se encontraron reseñas', 'cafelog'),
        'not_found_in_trash' => __('Ninguna reseña encontrada en la papelera', 'cafelog'),
        //'parent_item_colon'
        'all_items' => __('Todas las reseñas', 'cafelog'),
        //'archives'
        //'attributes'
        'insert_into_item' => __('Insertar en la reseña', 'cafelog'),
        //'uploaded_to_this_item'
        //'featured_image'
        //'set_featured_image'
        //'remove_featured_image'
        //'use_featured_image'
        //'menu_name' => __('Reseñas de cómics', 'cafelog')
        'filter_items_list' => __('Lista de reseñas filtradas', 'cafelog'),
        'items_list_navigation' => __('Navegación por el listado de reseñas', 'cafelog'),
        'items_list' => __('Lista de reseñas', 'cafelog'),
        //'name_admin_bar' => __('Cualquiera', 'cafelog')
    );

    $args = array(
        'public' => true,
        'labels' => $labels,
        //'exclude_from_search' => false, //default: opuesto a 'public'
        //'public_queryable' => true, //default: coge el valor de 'public'
        //'show_ui' => true, //default: coge el valor de 'public'
        //'show_in_nav_menus' => true, //default: coge el valor de 'public'. En el backen de WP se tiene que activar en opciones, para que aparezca en Aparencia -> Menú
        //'show_in_menu' => true, //default: coge el valor de 'show_ui'
        //'show_in_admin_bar' => true, //default: 'show_in_menu'
        'menu_position' => 5,
        'menu_icon' => 'dashicons-star-half',
        'hierarchical' => false,
        'supports' => array(
            'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions'
        ),
        'has_archive' => true, //hacer flush con los enlaces permanentes.
        'rewrite' => array(
            'slug' => __('reviews', 'cafelog'), //hacer flush con los enlaces permanentes.
        ),
        //'can_export' => true, //default: true
    );

 register_post_type( 'cafelog_comic_review', $args );
};

add_action( 'init', 'comic_review_setup_post_type' );

//Flushing Rewrite on Activation/Deactivation (plugin)
register_deactivation_hook(__FILE__, 'flush_rewrite_rules');
register_activation_hook(__FILE__, 'cafelog_rewrite_flush');

//Flushing Rewrite on swith theme
//add_action( 'after_switch_theme', 'cafelog_rewrite_flush' );

function cafelog_rewrite_flush(){
    comic_review_setup_post_type();
    // Limpia las reglas de reescritura (enlace permanentes)
    // Actualiza el fichero .htaccess
    flush_rewrite_rules();
}



