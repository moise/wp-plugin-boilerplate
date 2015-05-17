<?php
/**
 * Plugin configuration files.
 */

$conf = array(
	'version' => '0.1.0',
	'menus'   => array(
		'main_menu' => __( 'Menu principale', 'core' ),
	),
	'styles'  => array(
		'font-awesome' => array(
			'url'          => '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
			'dependencies' => array(),
			'version'      => '4.3.0',
			'admin'        => true
		),
		'admin-custom' => array(
			'url'          => COREURI . '/admin/css/admin-custom.min.css',
			'dependencies' => array(),
			'version'      => '1.0',
			'admin'        => false
		),
	),
	'scripts' => array(
		'theme-admin' => array(
			'url'          => COREURI . '/admin/js/theme-admin.js',
			'dependencies' => array( 'jquery' ),
			'version'      => '0.1.0',
			'footer'       => true
		)
	),
	'cpt'     => array(
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
		),
		'artwork'  => array(
			'labels'             => array(
				'name'               => _x( 'Opere', 'post type general name', 'fs' ),
				'singular_name'      => _x( 'Opera', 'post type singular name', 'fs' ),
				'menu_name'          => _x( 'Opere', 'admin menu', 'fs' ),
				'name_admin_bar'     => _x( 'Opere', 'add new on admin bar', 'fs' ),
				'add_new'            => _x( 'Aggiungi Opera', 'timeline-event', 'fs' ),
				'add_new_item'       => __( 'Aggiungi Opera', 'fs' ),
				'new_item'           => __( 'Nuova', 'fs' ),
				'edit_item'          => __( 'Modifica Opera', 'fs' ),
				'view_item'          => __( 'Visualizza Opera', 'fs' ),
				'all_items'          => __( 'Tutte le Opere', 'fs' ),
				'search_items'       => __( 'Cerca Opera', 'fs' ),
				'parent_item_colon'  => __( 'Opera genitore:', 'fs' ),
				'not_found'          => __( 'Nessuna Operao trovata.', 'fs' ),
				'not_found_in_trash' => __( 'Nessuna Opera trovata nel cestino.', 'fs' )
			),
			'public'             => true,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'opere' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
		),
		'page' => array(),
		'post'     => array(
			'labels' => array(
				'menu_name' => _x( 'News', 'admin menu', 'fs' )
			)
		)
	),
	'tax'     => array(
		array(
			'name'      => 'art',
			'post_type' => array( 'artwork' ),
			'args'      => array(
				'labels'            => array(
					'name'              => _x( 'Tecnica', 'taxonomy general name', 'fs' ),
					'singular_name'     => _x( 'Tecnica', 'taxonomy singular name', 'fs' ),
					'search_items'      => __( 'Cerca Tecnica', 'fs' ),
					'all_items'         => __( 'Tutte le Tecniche', 'fs' ),
					'parent_item'       => __( 'Genitore Tecnica', 'fs' ),
					'parent_item_colon' => __( 'Genitore Tecnica:', 'fs' ),
					'edit_item'         => __( 'Modifica Tecnica', 'fs' ),
					'update_item'       => __( 'Aggiorna Tecnica', 'fs' ),
					'add_new_item'      => __( 'Aggiungi nuova Tecnica', 'fs' ),
					'new_item_name'     => __( 'Nome Tecnica', 'fs' ),
					'menu_name'         => __( 'Tecniche', 'fs' ),
				),
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'tecnica' ),
			),
		),
		array(
			'name'      => 'genre',
			'post_type' => array( 'artwork' ),
			'args'      => array(
				'labels'            => array(
					'name'              => _x( 'Genere', 'taxonomy general name', 'fs' ),
					'singular_name'     => _x( 'Genere', 'taxonomy singular name', 'fs' ),
					'search_items'      => __( 'Cerca Genere', 'fs' ),
					'all_items'         => __( 'Tutti i Generi', 'fs' ),
					'parent_item'       => __( 'Genitore Genere', 'fs' ),
					'parent_item_colon' => __( 'Genitore Genere:', 'fs' ),
					'edit_item'         => __( 'Modifica Genere', 'fs' ),
					'update_item'       => __( 'Aggiorna Genere', 'fs' ),
					'add_new_item'      => __( 'Aggiungi un nuovo Genere', 'fs' ),
					'new_item_name'     => __( 'Nome Genere', 'fs' ),
					'menu_name'         => __( 'Genere', 'fs' ),
				),
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'genere' ),
			),
		)
	)
);

//$conf['scripts'] = array(
//	'main'      => array(
//		'url'          => LIBRARY . '/js/main.js',
//		'dependencies' => array( 'jquery' ),
//		'version'      => '0.1.0',
//		'footer'       => true
//	)
//);