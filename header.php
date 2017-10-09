<?php
/**
 * Header template
 *
 * @package manofbytess
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Favicons -->
	<!-- iOS / Android -->
	<?php $theme_path = esc_url( get_stylesheet_directory_uri() ); ?>

	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $theme_path; ?>/favicons/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $theme_path; ?>/favicons/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $theme_path; ?>/favicons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $theme_path; ?>/favicons/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo $theme_path; ?>/favicons/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $theme_path; ?>/favicons/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="<?php echo $theme_path; ?>/favicons/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php echo $theme_path; ?>/favicons/favicon-16x16.png" sizes="16x16" />
	
	<!-- IE Metro -->
	<meta name="application-name" content="&nbsp;"/>
	<meta name="msapplication-TileColor" content="#f6f6f6" />
	<meta name="msapplication-TileImage" content="<?php echo esc_html( $theme_path ); ?>/favicons/mstile-144x144.png" />

	<?php get_template_part( 'inc/analytics' ); ?>
	<?php get_template_part( 'inc/fb-pixel' ); ?>
</head>
<body>


<!-- Nav -->
<nav class="top">	
	<div class="container">
		<a href="/" class="logo">
			<span class="icon icon-mob-logo_colorless"></span>
		</a>

		<ul class="menu">
			<li><a href="/case-studies">Case studies</a></li>
			<li><a href="/about">About</a></li>
			<li><a href="/blog">Blog</a></li>
			<li><a href="/start-project">Start your project</a></li>
		</ul>

		
		<a href="" class="hamburger"><span></span></a>
		
	</div>
</nav>
<!-- / Nav -->
