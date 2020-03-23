<?php
    get_header();
?>

    <!-- Content -->
    <?php
        while ( have_posts() ) : the_post();
    ?>
    <section class="content projects">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Category Nav -->
					<div class="cat-nav">
						<div class="row">
							<div class="col-4 col-lg-2">
								<a href="#">
									<div class="thumb-wrppaer active">
										<img src="assets/images/cat1.jpg" alt="Category" class="img-fluid">
										<div class="hover">
											<h6>Cheltenham</h6>
										</div>
									</div>
								</a>
							</div>
							<div class="col-4 col-lg-2">
								<a href="#">
									<div class="thumb-wrppaer">
										<img src="assets/images/cat2.jpg" alt="Category" class="img-fluid">
										<div class="hover">
											<h6>Cheltenham</h6>
										</div>
									</div>
								</a>
							</div>
							<div class="col-4 col-lg-2">
								<a href="#">
									<div class="thumb-wrppaer">
										<img src="assets/images/cat3.jpg" alt="Category" class="img-fluid">
										<div class="hover">
											<h6>Cheltenham</h6>
										</div>
									</div>
								</a>
							</div>
							<div class="col-4 col-lg-2">
								<a href="#">
									<div class="thumb-wrppaer">
										<img src="assets/images/cat4.jpg" alt="Category" class="img-fluid">
										<div class="hover">
											<h6>Cheltenham</h6>
										</div>
									</div>
								</a>
							</div>
							<div class="col-4 col-lg-2">
								<a href="#">
									<div class="thumb-wrppaer">
										<img src="assets/images/cat5.jpg" alt="Category" class="img-fluid">
										<div class="hover">
											<h6>Cheltenham</h6>
										</div>
									</div>
								</a>
							</div>
							<div class="col-4 col-lg-2">
								<a href="#">
									<div class="thumb-wrppaer">
										<img src="assets/images/cat6.jpg" alt="Category" class="img-fluid">
										<div class="hover">
											<h6>Cheltenham</h6>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
					<!-- /.Categroy Nav -->
					<div class="content-wrapper">
						<div class="row">
							<div class="col-lg-7">
								<div class="gallery-section">
									<div class="display-bar">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/loading.gif" alt="loading" class="load-icon">
                                        <?php 
                                            $repeater = get_field('project_images');
                                            $first_row = current($repeater);
                                        ?>
										<img src="<?php echo $first_row['main_image']; ?>" alt="Slider" class="img-fluid img-area">
									</div>
									<div class="row">
                                    <?php
                                        // check if the repeater field has rows of data
                                        if( have_rows('project_images') ):
                                            $counter = 0;
                                            // loop through the rows of data
                                            while ( have_rows('project_images') ) : the_row();
                                            $counter++;
                                    ?>
										<div class="col-3 col-lg-3">
											<div class="gallery-thumb">
												<img src="<?php the_sub_field('thumbnail_image'); ?>" alt="Slider" class="img-fluid" data-src="<?php the_sub_field('main_image'); ?>">
											</div>
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
							<div class="col-lg-5">
								<div class="contents">
									<h3 class="main-head"><?php the_title(); ?></h3>
									<?php the_content(); ?>
									<?php the_field('register'); ?>
								</div>
							</div>
						</div>
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
?>