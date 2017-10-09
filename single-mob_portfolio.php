<?php
/**
 * The template for displaying single case study.
 *
 * @package manofbytes
 */

get_header();

while ( have_posts() ) :
	the_post();
?>

<section class="container">
	<div class="row">
		<div class="col-12">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-8 offset-md-2 portfolio-content">
			<?php the_content(); ?>
		</div>
	</div>
</section>

<?php
endwhile;
get_footer();
