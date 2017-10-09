<?php
/**
 * Template name: Start project page
 *
 * @package manofybtes
 */

get_header();

// Include CF7 sctripts.
if ( function_exists( 'wpcf7_enqueue_scripts' ) && function_exists( 'wpcf7_enqueue_styles' ) ) {
	wpcf7_enqueue_scripts();
	wpcf7_enqueue_styles();
}

while ( have_posts() ) :
	the_post();
?>

<section class="container">
	<div class="row">
		<div class="col-12">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="row page-content">
		<div class="col-12 col-md-8">
			
			<div class="project-form-wrapper">
				<?php the_content(); ?>
			</div>

		</div>

		<div class="col-12 col-md-3 offset-md-1">
		
			<div class="start-about">
				<img src="/wp-content/themes/mob2018/img/headshot.jpg" alt="">
				<p>I would love to hear from you! Please fill out this form and I'll get in touch with you shortly.</p>
			</div>

			<div class="testimonial testimonial-project">
				<p class="testimonial-text">
					<span class="icon icon-quotes"></span>
					<span class="tt-text">If you are looking to work with a professional trusty person, this is the guy. He helped me solve every problem I had, giving me his time and efforts. I am very happy with the results!
					</span>
				</p>
				<p class="testimonial-author">Mauro Cattelan</p>
			</div>

		</div>
	</div>

</section>

<?php
endwhile;
get_footer();
