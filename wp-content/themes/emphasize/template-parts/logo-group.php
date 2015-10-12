<?php
/**
 * The logo group for the header 
 * @package Emphasize
 */
?>



   <?php $emphasize_settings = get_option( 'emphasize_settings' ); ?>

<?php if ( $emphasize_settings['logo'] ) : ?>

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home">
        <img id="logo" src="<?php echo esc_url( $emphasize_settings['logo'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>">
    </a> 
    
    

<?php elseif ( get_bloginfo( 'description' ) || get_bloginfo( 'title' ) ) : ?>

    <h1 class="site-title">
        <a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> 
            <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?>
        </a>
    </h1>
    								
	<?php if ( get_bloginfo( 'description' ) ) { ?>
        <h2 class="site-tagline"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></h2>
    <?php } ?>

<?php endif; ?>