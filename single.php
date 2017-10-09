<?php
/**
 * The template for displaying single post.
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
			<h1 class="single-title"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="row">

		<!-- Main col -->
		<div class="col-12 col-xl-9 push-xl-3">

			<!-- <img class="img-responsive featured-img" src="https://placeimg.com/850/400/any" alt=""> -->

			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'large', array(
					'title'   => get_the_title(),
					'alt'     => get_the_title(),
					'class'   => 'img-responsive featured-img',
				));
			}
			?>

			<div class="article-body">

				<?php the_content(); ?>

				<!-- Social share menu -->
				<div class="article-social">
					<ul class="article-social-menu">
						<li>
							<a class="twitter j-social-btn" data-network="twitter" href="https://twitter.com/share?url=<?php echo esc_url( get_permalink() ); ?>">
								<span class="icon icon-twitter"></span>
							</a>
						</li>
						<li>
							<a class="facebook j-social-btn" data-network="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>">
								<span class="icon icon-facebook"></span>
							</a>
						</li>
						<li>
							<a class="linkedin j-social-btn" data-network="linkedin" href="https://www.linkedin.com/cws/share?url=<?php echo esc_url( get_permalink() ); ?>">
								<span class="icon icon-linkedin"></span>
							</a>
						</li>
					</ul>
				</div>
				<!-- Social share menu -->
			</div>

		</div>
		<!-- / Main col -->


		<!-- Sidebar -->
		<div class="col-12 col-xl-3 pull-xl-9">

			<div class="sidebar">
				<div class="sidebar-newsletter">
					<img src="/wp-content/themes/mob2018/img/website-ingredients-ebook-cover.png" alt="">
					<a href="#" class="btn j-open-sub">Download for free</a>
				</div>

				<div class="sidebar-help">
					<p>Need help with your website?</p>
					<a href="/start-project" class="btn btn-secondary">Let's talk about it</a>
				</div>
			</div>

		</div>
		<!-- / Sidebar -->

	</div><!-- .row -->

</section>


<?php
endwhile;
get_footer();
