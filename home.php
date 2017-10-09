<?php
/**
 * General archive
 *
 * @package manofbytes
 */

get_header(); ?>


<section class="container">
	<div class="row">
		<div class="col-12">
			<h1 class="page-title">Blog</h1>
		</div>
	</div>

	<div class="row">

		<?php
		while ( have_posts() ) :
			the_post();
		?>
		
			<div class="col-12">
				<div class="blog-archive-item">
					<a href="<?php the_permalink(); ?>">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'archive-blog', array(
								'title' => get_the_title(),
								'alt'   => get_the_title(),
							));
						}
						?>
					</a>
					
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					
					<a href="<?php the_permalink(); ?>" class="see">
						Read <span class="icon icon-arrow_right"></span>
					</a>
				</div>
			</div>

		<?php endwhile; ?>
	</div>
</section>

<?php
get_footer();
