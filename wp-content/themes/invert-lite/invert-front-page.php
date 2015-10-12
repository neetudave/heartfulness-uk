<?php get_header(); ?>
<?php global $invert_shortname; ?>

<?php if(sketch_get_option($invert_shortname."_hide_featured_box") != 'false') { ?>
	<!-- Featured box -->
	<?php include("includes/front-mid-box.php"); ?>
<?php } ?>

<!-- full-division-box -->
<?php  if(sketch_get_option($invert_shortname."_hide_parallax") != 'false') { ?>
<div id="full-division-box">
<div class="full-bg-image full-bg-image-fixed"></div>
	<div class="container full-content-box" >
		<div class="row-fluid">
			<div class="span12">
				<?php if(sketch_get_option($invert_shortname."_para_content_left")) {
					echo sketch_get_option($invert_shortname."_para_content_left");
				} else {
					_e('<div style="color:#fff"><div class="skt-ctabox"><div class="skt-ctabox-content"><h2>Awesome Parallax Section</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. onec consequat malesuada urna, non fringilla purus malesuada eget.Lorem ipsum dolor sit amet, consectetur adipiscing elit. onec consequat malesuada urna, non fringilla purus malesuada eget.Lorem ipsum dolor sit amet, consectetur adipiscing elit. onec consequat malesuada urna, non fringilla purus malesuada eget.</p></div><div class="skt-ctabox-button"><a class="skt-ctabox-button" href="javascript:void(0)">Demo</a></div></div></div>','invert');
				} ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<!-- PAGE EDITER CONTENT -->
<div id="front-page-content" class="skt-section">
	<div class="container">
		<div class="row-fluid"> 
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		</div>
		<div class="border-content-box bottom-space"></div>
	</div>
</div>


<?php  if(sketch_get_option($invert_shortname."_hide_home_blog") != 'false') { ?>
<div id="front-content-box" >
	<div class="container">
		<div class="row-fluid">
		<?php if(sketch_get_option($invert_shortname."_blogsec_title")) { ?>
				<h3 class="inline-border"><?php echo sketch_get_option($invert_shortname."_blogsec_title"); ?></h3>
			<?php } else { ?>
				<h3 class="inline-border"><?php _e('Latest News', 'invert'); ?></h3>
			<?php } ?>
		<h3 class="inline-border"></h3>
		<span class="border_left"></span>
		</br>
		</div>
		<div class="row-fluid">
		<?php $invert_blogno = sketch_get_option($invert_shortname."_blog_no");
		if( !empty($invert_blogno) && ($invert_blogno > 0) ) {
				$invert_lite_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $invert_blogno,'ignore_sticky_posts' => true ) );
		}else{
			   $invert_lite_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => -1,'ignore_sticky_posts' => true ) );			
		}
			?>
			<?php if ( $invert_lite_latest_loop->have_posts() ) : ?>

			<!-- pagination here -->

				<!-- the loop -->
				<?php while ( $invert_lite_latest_loop->have_posts() ) : $invert_lite_latest_loop->the_post(); ?>
					<div class="span4">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
						<div class="continue"><a href="<?php the_permalink(); ?>"><?php _e('Read More &rarr;','invert');?></a></div>		  
					</div>
				<?php endwhile; ?>
				<!-- end of the loop -->

				<!-- pagination here -->

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'invert' ); ?></p>
			<?php endif; ?>
		</div>
 	</div>
</div>
<?php } ?>



<?php if(sketch_get_option($invert_shortname."_hide_callto_action") != 'false') { ?>
<div id="call-to-action-box" class="skt-section">
	<div class="container">
		<div class="call-to-action-block row-fluid">
			<div id="content" class="span12">
				<!-- Featured Area 2 -->
				<div class="skt-ctabox"> 
					<div class="skt-ctabox-content">
						<?php if(sketch_get_option($invert_shortname."_catoac_heading")) { ?><h2><?php echo sketch_get_option($invert_shortname."_catoac_heading"); ?></h2><?php } else { _e('<h2>JOIN THE ULTIMATE AND IRREPLACEABLE EXPERIENCE NOW.</h2>','invert'); } ?>
						<?php if(sketch_get_option($invert_shortname."_catoac_content")) { ?><p><?php echo sketch_get_option($invert_shortname."_catoac_content"); ?></p><?php }  else { _e('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat malesuada urna, non fringilla purus malesuada eget.</p>','invert'); } ?>
					</div>
					<?php if(sketch_get_option($invert_shortname."_catoac_txt")) { ?>
					<div class="skt-ctabox-button">
						<a href="<?php if(sketch_get_option($invert_shortname.'_catoac_link')) { echo esc_url(sketch_get_option($invert_shortname.'_catoac_link')); } ?>" class="skt-ctabox-button"><?php echo sketch_get_option($invert_shortname."_catoac_txt"); ?></a>
					</div>
					<?php } else { ?>
					<div class="skt-ctabox-button">
						<a href="<?php if(sketch_get_option($invert_shortname.'_catoac_link')) { echo esc_url(sketch_get_option($invert_shortname.'_catoac_link')); } ?>" class="skt-ctabox-button"><?php _e("Sign-Up Now", "invert"); ?></a>
					</div>
					<?php }	?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<!-- full-client-box -->
<?php  if(sketch_get_option($invert_shortname."_hide_client_logo") != 'false' ) { ?>
<div id="full-client-box" class="skt-section">
	<div class="container">
		<div class="row-fluid">
		<?php 
			$clientimage =  get_template_directory_uri() . '/images/Sample_Client_Logo.png';
			$clientimage1 =  get_template_directory_uri() . '/images/03.png';
			$clientimage2 =  get_template_directory_uri() . '/images/04.png';
			$clientimage3 =  get_template_directory_uri() . '/images/05.png';
			$clientimage4 =  get_template_directory_uri() . '/images/06.png';
		?>
			<?php if(sketch_get_option($invert_shortname."_clientsec_title")) { ?>
				<h3 class="inline-border"><?php echo sketch_get_option($invert_shortname."_clientsec_title"); ?></h3>
			<?php } else { ?>
				<h3 class="inline-border"><?php _e('Our Partners', 'invert'); ?></h3>
			<?php } ?>
			<span class="border_left"></span>
			<ul class="clients-items clearfix">
				<?php if(sketch_get_option($invert_shortname.'_img1_icon')){ ?>
					<li class="span2"><a href="<?php if(sketch_get_option($invert_shortname.'_img1_link')){ echo esc_url(sketch_get_option($invert_shortname.'_img1_link','invert')); } ?>" title="<?php if(sketch_get_option($invert_shortname.'_img1_title')){ echo sketch_get_option($invert_shortname.'_img1_title','invert'); } ?>"><img alt="client-logo" src="<?php if(sketch_get_option($invert_shortname.'_img1_icon')){ echo sketch_get_option($invert_shortname.'_img1_icon','invert'); } ?>"></a></li>
				<?php } else { ?>
					<li class="span2"><a href="#" title="<?php _e('Client Title','invert'); ?>"><img alt="client-logo" src="<?php echo $clientimage; ?>"></a></li>
				<?php }

				if(sketch_get_option($invert_shortname.'_img2_icon')){ ?>
					<li class="span2"><a href="<?php if(sketch_get_option($invert_shortname.'_img2_link')){ echo esc_url(sketch_get_option($invert_shortname.'_img2_link','invert')); } ?>" title="<?php if(sketch_get_option($invert_shortname.'_img2_title')){ echo sketch_get_option($invert_shortname.'_img2_title','invert'); } ?>"><img alt="client-logo" src="<?php if(sketch_get_option($invert_shortname.'_img2_icon')){ echo sketch_get_option($invert_shortname.'_img2_icon','invert'); } ?> "></a></li>
				<?php } else { ?>
					<li class="span2"><a href="#" title="<?php _e('Client Title','invert'); ?>"><img alt="client-logo" src="<?php echo $clientimage1; ?>"></a></li>
				<?php }

				if(sketch_get_option($invert_shortname.'_img3_icon')){ ?>
					<li class="span2"><a href="<?php if(sketch_get_option($invert_shortname.'_img3_link')){ echo esc_url(sketch_get_option($invert_shortname.'_img3_link','invert')); } ?>" title="<?php if(sketch_get_option($invert_shortname.'_img3_title')){ echo sketch_get_option($invert_shortname.'_img3_title','invert'); } ?>"><img alt="client-logo" src="<?php if(sketch_get_option($invert_shortname.'_img3_icon')){ echo sketch_get_option($invert_shortname.'_img3_icon','invert'); } ?>"></a></li>
				<?php } else { ?>
					<li class="span2"><a href="#" title="<?php _e('Client Title','invert'); ?>"><img alt="client-logo" src="<?php echo $clientimage2; ?>"></a></li>
				<?php }

				if(sketch_get_option($invert_shortname.'_img4_icon')){ ?>
					<li class="span2"><a href="<?php if(sketch_get_option($invert_shortname.'_img4_link')){ echo esc_url(sketch_get_option($invert_shortname.'_img4_link','invert')); } ?>" title="<?php if(sketch_get_option($invert_shortname.'_img4_title')){ echo sketch_get_option($invert_shortname.'_img4_title','invert'); } ?>"><img alt="client-logo" src="<?php if(sketch_get_option($invert_shortname.'_img4_icon')){ echo sketch_get_option($invert_shortname.'_img4_icon','invert'); } ?>"></a></li>
				<?php } else { ?>
					<li class="span2"><a href="#" title="<?php _e('Client Title','invert'); ?>"><img alt="client-logo" src="<?php echo $clientimage3; ?>"></a></li>
				<?php }

				if( sketch_get_option($invert_shortname.'_img5_icon') ) { ?>
					<li class="span2"><a href="<?php if(sketch_get_option($invert_shortname.'_img5_link')){ echo esc_url(sketch_get_option($invert_shortname.'_img5_link','invert')); } ?>" title="<?php if(sketch_get_option($invert_shortname.'_img5_title')){ echo sketch_get_option($invert_shortname.'_img5_title','invert'); } ?>"><img alt="client-logo" src="<?php if(sketch_get_option($invert_shortname.'_img5_icon')){ echo sketch_get_option($invert_shortname.'_img5_icon','invert'); } ?>"></a></li>
				<?php } else { ?>
					<li class="span2"><a href="#" title="<?php _e('Client Title','invert'); ?>"><img alt="client-logo" src="<?php echo $clientimage4; ?>"></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<?php } ?>
<?php get_footer(); ?>