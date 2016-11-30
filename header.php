<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Meshie
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="padding-top: 20px; padding-bottom: 70px;">
<div class="container-fluid">
  
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'meshie' ); ?></a>

	<header id="masthead" class="site-header">
    <div class="row">
      <div class="col-md-6">
   		
		 <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>

		<?php 
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; ?></p>
			<?php
			endif; ?>      
         </a>          
      </div>
      <div class="col-md-6"></div>
    </div>
    <?php if ( is_front_page()  ) : ?>
    	<div class="jumbotron hero-1">   
	 
    	</div>
    <?php elseif (is_page())  : ?>
    	<div class="jumbotron hero-2">
      
      
    	</div>
    <?php elseif (is_single())  : ?>
       	<div class="jumbotron hero-3">      
      
    	</div> 
    <?php elseif (is_archive())  : ?>
       	<div class="jumbotron hero-4">      
      
    	</div> 
    <?php else  : ?>
       	<div class="jumbotron hero-5">     
      
    	</div> 
    <?php endif;  ?>
  
	<nav class="navbar navbar-default navbar-custom">
     	<div class="container-fluid">
           
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'meshie' ); ?></button>
			 
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'div','menu_class' => '"nav navbar-nav','menu_id' => 'primary-menu','fallback_cb' => 'wp_bootstrap_navwalker::fallback','walker' => new wp_bootstrap_navwalker() ) ); ?>
            
        </div>
	</nav><!-- #site-navigation -->
    <div  class="breadcrumb">
		<?php meshie_breadcrumb(); ?>
	</div><!-- /header-bottom -->
	</header><!-- #masthead -->

	
