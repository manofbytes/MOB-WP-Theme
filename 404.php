<?php
/**
 * 404 Page
 *
 * @package manofbytes
 */

get_header(); ?>

<section class="container">
	<div class="row">
		<div class="col-12">
			<h1 class="page-title">Oups...</h1>
		</div>
	</div>

	<div class="row page-content">
		<div class="col-12 col-md-8 offset-md-2">
			
			<p>The page you were looking for is not here. The link you clicked on is probably broke or outdated.</p>

			<p>While you're here, how about some...</p>

		</div>
	</div>


	<!-- Blog -->
	<div class="row">
		<div class="col-12">
			<h3 class="homepage-blog-section-title">Websites and marketing tips</h3>
		</div>
	</div>

	<div class="row">

		<?php
		// WP_Query arguments.
		$args = array(
			'post_type' => array( 'post' ),
			'posts_per_page' => 3,
		);

		$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query -> the_post();
		?>

			<div class="col-12 col-md-4">
				<a href="<?php the_permalink(); ?>" class="homepage-blogpost">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'thumbnail', array(
							'title' => get_the_title(),
							'alt'   => get_the_title(),
						));
					}
					?>

					<h4 class="hb-title">
						<?php echo esc_html( strlen( get_the_title() ) > 50 ? substr( get_the_title(), 0, 50 ) . '...' : get_the_title() ); ?>
					</h4>

					<span class="hb-readmore">
						Read <span class="icon icon-arrow_right"></span>
					</span>
				</a>
			</div>
			
		<?php
			endwhile;
			endif;
			wp_reset_postdata();
		?>

	</div>

	<div class="row">
		<div class="col-12 more-blog">
			<a href="">More from the blog <span class="icon icon-arrow_right"></span></a>
		</div>
	</div>
	<!-- / Blog -->

</section>

<?php
get_footer();
