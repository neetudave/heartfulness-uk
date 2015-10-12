<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Emphasize
 */

/**
 * Lets create a nice numbered paging nav
 * More Info: http://codex.wordpress.org/Function_Reference/paginate_links
 */
 if ( ! function_exists( 'emphasize_paging_nav' ) ) :
function emphasize_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'add_fragment'       => '>>>>',
		'prev_text' => '<span class="arrow arrow-left"></span>',
		'next_text' => '<span class="arrow arrow-right"></span>',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'emphasize' ); ?></h1>
		<div class="pagination loop-pagination">
			<?php echo $links; ?>
		</div>
	</nav>
	<?php
	endif;
}
endif;

/**
 * Display navigation for posts that are split into multiple pages when applicable.
 */
 
if ( ! function_exists( 'emphasize_multipage_nav' ) ) :
function emphasize_multipage_nav() {
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' .  esc_html__( 'Page Continued:', 'emphasize' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' .  esc_html__( 'Page', 'emphasize' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
}
endif;

/**
 * Display navigation to next/previous post when applicable.
 */
if ( ! function_exists( 'emphasize_post_nav' ) ) :
function emphasize_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h3 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'emphasize' ); ?></h3>
			<div class="nav-links">			
             	<?php previous_post_link( esc_html_x( 'Previous Article: %link', '','emphasize' ), '%title' ); ?>
             		<br/>
            	<?php next_post_link( esc_html_x( 'Next Article: %link', '', 'emphasize' ), '%title' ); ?>           
		</div>
	</nav>
	<?php
}
endif;

/**
 * Display navigation to next/previous Images when on the attachment page
 *
 */
if ( ! function_exists( 'emphasize_attachment_nav' ) ) :

function emphasize_attachment_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	?>
	
		<h1 class="screen-reader-text"><?php esc_html_e( 'Photo Navigation', 'emphasize' ); ?></h1>
		<div class="attachment-nav clearfix">
			<?php
			previous_image_link( false, '<span class="previous-image"><span class="genericon genericon-previous"></span></span>' );
			next_image_link( false, '<span class="next-image"><span class="genericon genericon-next"></span></span>' );
			?>
		</div>
	
	<?php
}
endif;


if ( ! function_exists( 'emphasize_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function emphasize_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s" itemprop="datePublished">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Published on %s', 'post date', 'emphasize' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'emphasize' ),
		'<span class="bypostauthor author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url"><span itemprop="name">' . esc_html( get_the_author() ) . '</span></a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline" itemprop="author" itemscope="" itemtype="http://schema.org/Person"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'emphasize_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function emphasize_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'emphasize' ) );
		if ( $categories_list && emphasize_categorized_blog() ) {
			printf( '<span class="cat-links" itemprop="genre">' .  esc_html__( 'Posted in: %1$s', 'emphasize' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'emphasize' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' .  esc_html__( 'Tagged With: %1$s', 'emphasize' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link(  esc_html__( 'Leave a comment', 'emphasize' ),  esc_html__( '1 Comment', 'emphasize' ),  esc_html__( '% Comments', 'emphasize' ) );
		echo '</span>';
	}

}
endif;

if ( ! function_exists( 'emphasize_archive_titles' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function emphasize_archive_titles( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( '%s', 'emphasize' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Articles Tagged with %s', 'emphasize' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Articles by %s', 'emphasize' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Articles for %s ', 'emphasize' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'emphasize' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Articles for %s', 'emphasize' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'emphasize' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Articles for %s', 'emphasize' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'emphasize' ) ) );
	} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
		$title = esc_html_x( 'Asides', 'post format archive title', 'emphasize' );
	} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
		$title = esc_html_x( 'Galleries', 'post format archive title', 'emphasize' );
	} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
		$title = esc_html_x( 'Images', 'post format archive title', 'emphasize' );
	} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
		$title = esc_html_x( 'Videos', 'post format archive title', 'emphasize' );
	} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
		$title = esc_html_x( 'Quotes', 'post format archive title', 'emphasize' );
	} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
		$title = esc_html_x( 'Links', 'post format archive title', 'emphasize' );
	} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
		$title = esc_html_x( 'Statuses', 'post format archive title', 'emphasize' );
	} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
		$title = esc_html_x( 'Audio', 'post format archive title', 'emphasize' );
	} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
		$title = esc_html_x( 'Chats', 'post format archive title', 'emphasize' );
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'emphasize' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'emphasize' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = ( '');
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );
	

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'emphasize_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function emphasize_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;


/**
 * Display an optional post thumbnail.
 *
 */

if ( ! function_exists( 'emphasize_featured_image' ) ) :

function emphasize_featured_image() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
		?>
	</a>

	<?php endif; // End is_singular()
}
endif;




/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function emphasize_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'emphasize_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'emphasize_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so emphasize_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so emphasize_categorized_blog should return false.
		return false;
	}
}



/**
 * Print the attached image with a link to the next attached image.
 * Maximum width is 1280 pixels for this theme.
 */
if ( ! function_exists( 'emphasize_the_attached_image' ) ) :

function emphasize_the_attached_image() {
	$post                = get_post();

	$attachment_size     = apply_filters( 'emphasize_attachment_size', array( 1140, 1140 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Flush out the transients used in emphasize_categorized_blog.
 */
function emphasize_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'emphasize_categories' );
}
add_action( 'edit_category', 'emphasize_category_transient_flusher' );
add_action( 'save_post',     'emphasize_category_transient_flusher' );
