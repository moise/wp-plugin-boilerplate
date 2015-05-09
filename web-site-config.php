<?php

$conf['version'] = (string) '0.1.0';
$conf['menus']   = array(
	'main_menu' => __( 'Menu principale', 'core' ),
);

/*
 * Register navtive custom post types.
 * You can create it also in calling public method $core->cpt($name, $args);
 * See more detail on core.class.php file.
 *
 * @type: array
 */
$conf['cpt']     = array(
	'timeline' => array(
		'labels'             => array(
			'name'               => _x( 'Timeline', 'post type general name', 'fs' ),
			'singular_name'      => _x( 'Timeline', 'post type singular name', 'fs' ),
			'menu_name'          => _x( 'Timeline', 'admin menu', 'fs' ),
			'name_admin_bar'     => _x( 'Timeline', 'add new on admin bar', 'fs' ),
			'add_new'            => _x( 'Aggiungi evento', 'timeline-event', 'fs' ),
			'add_new_item'       => __( 'Aggiungi evento', 'fs' ),
			'new_item'           => __( 'Nuovo evento', 'fs' ),
			'edit_item'          => __( 'Modifica evento', 'fs' ),
			'view_item'          => __( 'Visualizza evento', 'fs' ),
			'all_items'          => __( 'Tutti gli eventi', 'fs' ),
			'search_items'       => __( 'Cerca evento', 'fs' ),
			'parent_item_colon'  => __( 'Evento genitore:', 'fs' ),
			'not_found'          => __( 'Nessun evento trovato.', 'fs' ),
			'not_found_in_trash' => __( 'Nessun evento trovato nel cestino.', 'fs' )
		),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'timeline' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	)
);
