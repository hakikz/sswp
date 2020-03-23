<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap.min.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/plugin/animate.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
		wp_body_open();
	?>
	<!-- Header -->
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 offset-lg-5">
					<a href="#">
						<div class="logo-wrapper">
							<img src="<?php the_field('logo', 'option'); ?>" alt="Logo" class="img-fluid">
						</div>
					</a>
				</div>
				<div class="col-lg-12">
					<nav class="navbar navbar-expand-lg navbar-light ">
						<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <?php
                                wp_nav_menu( array( 
                                    'menu' => 'primary',
                                    'theme_location' => 'primary_menu',
                                    'menu_class'      => 'navbar-nav mr-auto',
                                ) );
                            ?>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- /.Header -->