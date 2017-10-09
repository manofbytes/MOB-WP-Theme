<?php
/**
 * Footer template
 *
 * @package manofbytes
 */

?>

<!-- Footer -->
<footer class="container">
	
	<?php if ( ! is_page( 'start-project' ) ) : ?>
		
		<div class="row">
			<div class="col-12">
				<p class="footer-cta">Ready to start working on your website? <a href="/start-project" class="btn">Let's do this!</a></p>
			</div>
		</div>

	<?php endif; ?>

	<div class="row">
		<div class="col-12">

			<div class="footer-menu">

				<ul class="footer-menu-social">
					<li><a href=""><span class="icon icon-linkedin"></span></a></li>
					<li><a href=""><span class="icon icon-facebook"></span></a></li>
					<li><a href=""><span class="icon icon-twitter"></span></a></li>
				</ul>
				
				<ul class="footer-menu-main">
					<li><a href="/case-studies">Case studies</a></li>
					<li><a href="/about">About</a></li>
					<li><a href="/blog">Blog</a></li>
					<li><a href="/start-project">Start your project</a></li>
				</ul>

				<ul class="footer-menu-secondary">
					<li>Copyright <?php echo esc_html( date( 'Y' ) ); ?> Manofbytes.com</li>
					<li><a href="/terms">Terms</a></li>
					<li><a href="/privacy">Privacy</a></li>
				</ul>

			</div><!-- .footer-menu -->

		</div>
	</div>
</footer>
<!-- / Footer -->


<!-- Mobile menu -->
<div class="mobile-menu">
	<div class="mobile-menu-inside">
		<ul class="mobile-menu-items"></ul>
	</div>
</div>
<!-- / Mobile menu -->


<!-- Ebook modal -->
<div class="ebook-modal">
	<div class="ebook-modal_color-overlay"></div>

	<div class="ebook-modal_content">
		<div class="ebook-img_wrapper">
			<img src="/wp-content/themes/mob2018/img/website-ingredients-ebook-cover.png" alt="">
		</div>

		<div class="ebook-conten_inside">
			<p class="title">Learn how to improve the actions on your website by up to 161%</p>
			<p class="subtitle">Add your email to get the free report</p>

			<form action="" class="landing-page-form" id="mob-subscribe">
				<input type="email" placeholder="Your email address">
				<button type="submit" class="btn" >Download the ebook</button>

				<div class="errors"></div>
			</form>
			
		</div>

		<div class="ebook-modal_success">
			<p class="title">Thank you for joining us!</p>
			<p class="subtitle">Please check your email for the link to your free download</p>
		</div>

		<a href="#" class="close ebook-modal_close">X</a>
	</div>

</div>
<!-- / Ebook modal -->

<?php wp_footer(); ?>

</body>
</html>
