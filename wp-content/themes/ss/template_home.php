<?php

/**
 * Template Name: Front Page
 */


get_header();
?>


<!-- Slider -->
<section class="slider">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div id="slider_home" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
                        <?php
                            // check if the repeater field has rows of data
                            if( have_rows('home_carousel', 'option') ):
                                $counter = 0;
                                // loop through the rows of data
                                while ( have_rows('home_carousel', 'option') ) : the_row();
                                $counter++;
                        ?>
                                <li data-target="#slider_home" data-slide-to="<?php echo $counter-1; ?>" class="<?php if($counter == 1){ echo "active"; } ?>"></li>
                        <?php 
                                endwhile;

                            else :
                        
                                echo "No Rows Found";
                        
                            endif;
                        ?>
						</ol>
						<div class="carousel-inner">
                            <?php
                                // check if the repeater field has rows of data
                                $counter = 0;
                                if( have_rows('home_carousel', 'option') ):
                                    // loop through the rows of data
                                    while ( have_rows('home_carousel', 'option') ) : the_row();
                                    $counter++;
                                    // echo $image = get_sub_field('image');
                            ?>
							<div class="carousel-item <?php echo $counter; ?> <?php if($counter == 1){ echo "active"; } ?>">
								<img src="<?php the_sub_field('image'); ?>" class="d-block w-100" alt="slider">
                            </div>
                            <?php 
                                    endwhile;

                                else :
                            
                                    echo "No Rows Found";
                            
                                endif;
                            ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.Slider -->

    <!-- Content -->
    <?php
        while ( have_posts() ) : the_post();
    ?>
	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="content-wrapper">
						<?php the_content(); ?>
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