<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Meshie
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
            <?php meshie_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php
        endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content( sprintf(
            /* translators: %s: Name of current post. */
            wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'meshie' ), array( 'span' => array( 'class' => array() ) ) ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ) );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meshie' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->
   

    
</section><!-- #post-## -->

<section> 
    <?php
if ( ! is_attachment() ) {
    
    meshie_post_list( 'new' );
	
    ///meshie_ad_widget_medium_bottom( 'center' );
}

?>
</section>

