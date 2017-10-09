<?php
/**
 * Homepage
 *
 * @package manofbytes
 */

get_header(); ?>


<!-- Main body -->
<section class="container">
	
	<!-- Homepage hero -->
	<div class="row">
		<div class="col-12">

			<div class="hero">
				<h1>Beautiful and functional websites</h1>
				<h2>that you can proudly show to your next clients and win them over.</h2>

				<a href="/start-project" class="btn">Start your project</a>
			</div>

		</div>
	</div>
	<!-- Homepage hero -->


	<!-- Testimonial -->
	<div class="row">
		<div class="col-12">

			<div class="testimonial">
				<p class="testimonial-text">
					If you are looking to work with a professional trusty person, this is the guy. He helped me solve every problem I had, giving me his time and efforts. I am very happy with the results!
					<span class="icon icon-quotes"></span>
				</p>
				<p class="testimonial-author">Mauro Cattelan, maurocattelan.com</p>
				
			</div>

		</div>
	</div>
	<!-- / Testimonial -->


	<!-- Subscription box -->
	<div class="row">
		<div class="col-12">

			<div class="sub-box">
				<img src="/wp-content/themes/manofbytes/img/website-ingredients-ebook-cover.png" alt="">
				<p class="sub-box-text">Find out how you can increase the actions on your website by up to 161%</p>
				<a href="#" class="btn j-open-sub">Get the free guide</a>
			</div>

		</div>
	</div>
	<!-- / Subscription box -->


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
				$query->the_post();
		?>

			<div class="col-12 col-md-4">
				<a href="<?php the_permalink(); ?>" class="homepage-blogpost">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail(
							'thumbnail', array(
								'title'     => get_the_title(),
								'alt'       => get_the_title(),
							)
						);
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
	</div><!-- .row -->

	<div class="row">
		<div class="col-12 more-blog">
			<a href="/blog">More from the blog <span class="icon icon-arrow_right"></span></a>
		</div>
	</div>
	<!-- / Blog -->

</section>
<!-- / Main body -->

<?php
get_footer();
