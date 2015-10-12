<?php global $invert_shortname; ?>
<div id="featured-box" class="skt-section">
  <div class="container">
	<div class="mid-box-mid row-fluid">
		<!-- Featured Box 1 -->
		<div class="mid-box span4">
			<div class="skt-iconbox iconbox-top">
				<div class="iconbox-icon skt-animated small-to-large skt-viewport">
					<?php if(sketch_get_option($invert_shortname.'_fb1_first_part_image')) { ?>
					<a href="<?php if(sketch_get_option($invert_shortname."_fb1_first_part_link")) { echo esc_url(sketch_get_option($invert_shortname."_fb1_first_part_link")); } ?>" title="FB-first">
						<img class="skin-bg" src="<?php  echo sketch_get_option($invert_shortname.'_fb1_first_part_image','invert'); ?>" alt="boximg"/>
					</a>
					<?php
					}
					else { ?><i class="fa fa-group"></i><?php  } ?>
				</div>
				<div class="iconbox-content">
					<h4><?php if(sketch_get_option($invert_shortname."_fb1_first_part_heading")) { echo sketch_get_option($invert_shortname."_fb1_first_part_heading"); } else { _e('Business Strategy','invert'); } ?></h4>
					<p><?php if(sketch_get_option($invert_shortname."_fb1_first_part_content")) { echo sketch_get_option($invert_shortname."_fb1_first_part_content"); } else { _e('Get focused from your target consumers and increase your business with Web portal Design and Development.','invert'); } ?></p>
				</div>			
				<div class="clearfix"></div>
			</div>
		</div>

		<!-- Featured Box 2 -->
		<div class="mid-box span4">
			<div class="skt-iconbox iconbox-top">
				<div class="iconbox-icon skt-animated small-to-large skt-viewport">
					<?php if(sketch_get_option($invert_shortname.'_fb2_second_part_image')) { ?>
					<a href="<?php if(sketch_get_option($invert_shortname."_fb2_second_part_link")) { echo esc_url(sketch_get_option($invert_shortname."_fb2_second_part_link")); } ?>" title="FB-second">
						<img class="skin-bg" src="<?php  echo sketch_get_option($invert_shortname.'_fb2_second_part_image','invert'); ?>" alt="boximg"/>
					</a>
					<?php } else { ?><i class="fa fa-shield"></i><?php  } ?>
				</div>
				<div class="iconbox-content">
					<h4><?php if(sketch_get_option($invert_shortname."_fb2_second_part_heading")) { echo sketch_get_option($invert_shortname."_fb2_second_part_heading"); } else { _e('Quality Products','invert'); }  ?></h4>
					<p><?php if(sketch_get_option($invert_shortname."_fb2_second_part_content")) { echo sketch_get_option($invert_shortname."_fb2_second_part_content"); } else { _e('Products with the ultimate features and functionality that provide the complete satisfaction to the clients.','invert'); } ?></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		
		<!-- Featured Box 3 -->
		<div class="mid-box span4" >
			<div class="skt-iconbox iconbox-top">
				<div class="iconbox-icon skt-animated small-to-large skt-viewport">
					<?php if(sketch_get_option($invert_shortname.'_fb3_third_part_image')) { ?>
					<a href="<?php if(sketch_get_option($invert_shortname."_fb3_third_part_link")) { echo esc_url(sketch_get_option($invert_shortname."_fb3_third_part_link")); } ?>" title="FB-third">
						<img class="skin-bg" src="<?php  echo sketch_get_option($invert_shortname.'_fb3_third_part_image','invert'); ?>" alt="boximg"/>
					</a>				
					<?php } else { ?><i class="fa fa-desktop"></i><?php } ?>
				</div>			
				<div class="iconbox-content">
					<h4><?php if(sketch_get_option($invert_shortname."_fb3_third_part_heading")) { echo sketch_get_option($invert_shortname."_fb3_third_part_heading"); } else { _e('Best Business Plans','invert'); }  ?></h4>
					<p><?php if(sketch_get_option($invert_shortname."_fb3_third_part_content")) { echo sketch_get_option($invert_shortname."_fb3_third_part_content"); } else { _e('Based on the client requirement, different business plans suits and fulfill your business and cost requirement.','invert'); } ?></p>
				</div>			
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
  </div>
</div>