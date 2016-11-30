<?php
/**
 * The Content-top template
 * @package   meshie
 * @copyright Copyright (c) 2014 Mignon Style
 * @license   GNU General Public License v2.0
 * @since     meshie 1.0
 */
?>
<?php if ( is_search() || is_archive() ) : ?>
<header id="content-header">
	<div id="content-top">
		<h1 class="page-title">
		<?php
		$cpt = get_post_type_object( get_post_type() );
		$taxonomy_names = get_post_taxonomies();
		$taxonomy_names = ( ! empty( $taxonomy_names ) ) ? $taxonomy_names[0] : '';

		if ( ! empty( $cpt ) && is_post_type_archive( $cpt ) ) {
			printf( __( 'Post Type : %s', 'meshie' ), esc_html( $cpt -> label ) );
		} elseif ( ! empty( $taxonomy_names ) && is_tax( $taxonomy_names ) ) {
			$query_tax = get_queried_object();
			printf( __( 'Category : %s', 'meshie' ), esc_html( $query_tax -> name ) );
		} elseif ( is_search() ) {
			printf( __( 'Search Results of "%s"', 'meshie' ), '<span class="search-str">' . get_search_query() . '</span>' );
		} elseif ( is_category() ) {
			printf( __( 'Category : %s', 'meshie' ), single_cat_title( '' , false ) );
		} elseif ( is_tag() ) {
			printf( __( 'Tag : %s', 'meshie' ), single_tag_title( '' , false ) );
		} elseif ( is_year() ) {
			the_time( __( 'Y', 'meshie' ) );
		} elseif ( is_month() ) {
			the_time( __( 'F Y', 'meshie' ) );
		} elseif ( is_day() ) {
			the_time( __( 'F j, Y', 'meshie' ) );
		} elseif ( is_author() ) {
			printf( __( 'Author : %s', 'meshie' ), get_the_author() );
		} else {
			_e( 'Archives', 'meshie' );
		}
		?>
		</h1>
		<p><?php printf( __( '%d posts', 'meshie' ), absint( $wp_query->found_posts ) ); ?></p>
	</div><!-- /content-top -->
</header><!-- /content-header -->
<?php endif; ?>
