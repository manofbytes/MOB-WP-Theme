<?php
/**
 * The template for case studies acrhive.
 *
 * @package manofbytes
 */

get_header(); ?>


<section class="container">
	<div class="row">
		<div class="col-12">
			<h1 class="page-title">Case studies</h1>
			
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
			?>

				<!-- Case study -->
				<div class="portfolio-item">
					<div class="portfolio-meta">
						<h2><?php the_title(); ?></h2>
						<p class="portfolio-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
						<a href="<?php the_permalink(); ?>" class="btn">View the project</a>
					</div>

					<div class="portfolio-featured">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'full' ); // 1140x400
						}
						?>
					</div>
				</div>
				<!-- / Case study -->

			<?php endwhile; ?>

		</div>
	</div>
</section>

<?php
get_footer();
