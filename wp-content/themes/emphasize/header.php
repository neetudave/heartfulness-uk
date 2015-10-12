<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Emphasize
 */
 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="hfeed site" style="color:<?php echo esc_attr(get_theme_mod( 'main_content_text', '#6F6F6F' )); ?>;">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'emphasize' ); ?></a>
            


    <header id="masthead" class="site-header" role="banner">

    <div class="header-bg" style="background-color: <?php echo esc_attr(get_theme_mod( 'header_bgcolour', '#ffffff' )); ?>; background-image: url(<?php if (get_header_image() != '') : ?><?php header_image(); ?>
	<?php endif; ?>);">
        
        <div class="site-branding">  
            <?php get_template_part( 'template-parts/logo-group' ); ?>    
        </div><!-- .site-branding -->
        
        <nav id="site-navigation" class="site-navigation primary-navigation" role="navigation">
            <div class="toggle-container visible-xs visible-sm hidden-md hidden-lg">
              <button class="menu-toggle"><?php esc_html_e( 'Menu', 'emphasize' ); ?></button></div>
            
            <?php if ( has_nav_menu( 'primary' ) ) {																			
                    wp_nav_menu( array( 							
                        'theme_location' => 'primary', 
                        'menu_class' => 'nav-menu'
                                                    
                    ) ); } else {
                
                    wp_nav_menu( array(															
                        'container' => '',
                        'menu_class' => '',
                        'title_li' => ''							
                        ));							
                   } 
                ?>                    
          </nav> 
          </div>
    <div id="header-footer"></div>    
    
    <?php if( get_theme_mod( 'hide_shadow' ) == '') { ?>
		<?php // If no banners are published - display the header shadow
            if (  ! is_active_sidebar( 'full-banner'  )) 	
            echo '<div id="shadow"><img src="' . esc_url( get_template_directory_uri() ) . '/images/shadow.png" alt="shadow"/></div>';	
        ?>
     <?php } ?>
    
    </header>  
        
   	<?php get_sidebar( 'full-banner' ); ?>
   	<?php get_sidebar( 'cta' ); ?>
                                   
    <div id="content" class="site-content">  

	<?php get_sidebar( 'top' ); ?>