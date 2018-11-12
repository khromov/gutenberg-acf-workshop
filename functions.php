<?php
function twenty_seventeen_child_theme_enqueue_child_styles() {
$parent_style = 'parent-style'; 
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 
		'child-style', 
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version') );
	}
add_action( 'wp_enqueue_scripts', 'twenty_seventeen_child_theme_enqueue_child_styles' );

/*Write here your own functions */

/* -------- ACF Gutenberg start ---------- */

add_action('acf/init', 'khromov_register_blocks');
function khromov_register_blocks() {

  if( function_exists('acf_register_block') ) {

    acf_register_block(array(
        'name'              => 'khromov-factbox',
        'title'             => __('Fact box'),
        'description'       => __('A factbox block'),
        'render_template'   => 'blocks/factbox.php',
        //'render_callback' => 'khromov_block_factbox_callback',
        'category'          => 'layout',
        'icon'              => 'editor-table',
        'mode'              => 'preview',
        'keywords'          => array( 'factbox', 'box', 'fact' ),
    ));

    acf_register_block(array(
        'name'              => 'khromov-quote',
        'title'             => __('ACF Quote'),
        'description'       => __('A quote'),
        'render_template'   => 'blocks/quote.php',
        'category'          => 'common',
        'icon'              => 'format-quote',
        'mode'              => 'preview',
        'keywords'          => array( 'quote', 'quotation' ),
    ));
  }
}

add_action( 'enqueue_block_editor_assets', 'khromov_gutenberg_styles' );
add_action( 'wp_enqueue_scripts', 'khromov_gutenberg_styles');
function khromov_gutenberg_styles() {
  wp_enqueue_style( 'khromov-block-quote',
      get_theme_file_uri( '/blocks-css/quote.css' ),
      false,
      '1.0',
      'all' );

  wp_enqueue_style( 'khromov-block-factbox',
      get_theme_file_uri( '/blocks-css/factbox.css' ),
      false,
      '1.0',
      'all' );
}

/* -------- ACF Gutenberg end ---------- */