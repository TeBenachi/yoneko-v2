<?php
/**
 * @package yoneko child
 */

function yoneko_child_enqueue_styles() {
    $parenthandle = 'yoneko-style';

    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(), 
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'yoneko-child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'yoneko_child_enqueue_styles' );


/* Show Category list on the homepage */
if ( ! function_exists( 'yoneko_category_home' ) ) :
	function yoneko_category_home() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'yoneko' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="posted-on category">' . esc_html__( '%1$s -', 'yoneko' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
endif;

