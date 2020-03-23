<?php

/**
 * Template Name: Contact Page
 */


get_header();
?>

<!-- Content -->
    <?php
        while ( have_posts() ) : the_post();
    ?>
	<section class="content contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="content-wrapper contact-wrapper">
						<h4><?php the_field('page_headline'); ?></h4>
						<div class="contact-info">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<div class="col-lg-10 offset-lg-1">
					<div class="img-wrapper">
						<img src="<?php the_field('map'); ?>" alt="Image" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.Content -->
    <?php
        endwhile; 
    ?>

<?php
get_footer();