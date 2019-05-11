<?php
function isMobile() {
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
function isIE11() {
	return preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false);
}

// Responsive Embedded Video ==============================
function wpse_embed_oembed_html( $cache, $url, $attr, $post_ID ) {
    $classes = array();

    // Add these classes to all embeds.
    $classes_all = array(
        'vid-container',
    );

    // Check for different providers and add appropriate classes.

    if ( false !== strpos( $url, 'vimeo.com' ) ) {
        $classes[] = 'vimeo';
    }

    if ( false !== strpos( $url, 'youtube.com' ) ) {
        $classes[] = 'youtube';
    }

    $classes = array_merge( $classes, $classes_all );

    return '<div class="' . esc_attr( implode( $classes, ' ' ) ) . '">' . $cache . '</div>';
}
add_filter( 'embed_oembed_html', 'wpse_embed_oembed_html', 99, 4 );

function dcdl_enqueue_style() {
    wp_enqueue_style( 'core', get_stylesheet_directory_uri() . '/style.css', false ); 
}
    
function dcdl_enqueue_script() {
    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js' );
    wp_enqueue_script( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array( 'jquery' ));
    wp_enqueue_script( 'primary', get_stylesheet_directory_uri() . '/assets/js/script.js', array( 'jquery' ), false );
}
    
add_action( 'wp_enqueue_scripts', 'dcdl_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'dcdl_enqueue_script' );

function theme_prefix_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'title-tag' );

$args = array(
	'flex-width'    => true,
	'width'         => 980,
	'flex-height'    => true,
	'height'        => 200,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
);
add_theme_support( 'custom-header', $args );
?>