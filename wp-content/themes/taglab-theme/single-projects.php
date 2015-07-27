<!--The Project Page-->
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<!--The Content on the Publications Page-->
<div class="content">
	<section class='row'>
			<!-- Grey Box -->
			<div class="row greybox">
				<!-- Large White Box -->
				<div class="small-9 small-centered columns card paragraph">
					<!-- Intro text -->
					<div class="small-11 medium-10 large-8 small-centered columns about-intro">
						<h1 class="small-12 paragraph-title">Our Projects</h1>
						<div class="small-12 medium-11 small-centered columns paragraph-content">
							<p>The TAGteam consists of talented individuals with backgrounds in computer science, engineering, human-computer interaction, human factors, graphic and interface design, psychology and sociology.</p>
						</div>
					</div>
				</div>
								
				<?php if ( have_posts() ) : while ( have_posts()) : the_post(); ?>
					<?php 	$title = get_the_title(); 
							$s = strtok($title, ":");
							$e = strtok("");
							$postID = get_the_ID();
							the_meta();
					?>	
				<?php endwhile; endif; ?>
														
				<!-- Large White Box -->
				<div class="small-9 small-centered columns card">
					<!--THUMBNAIL-->
					<!--Purpose: If there exists a thumbnail then display the thumbnail-->
					<?php if (has_post_thumbnail()) : ?>
						<?php $thumbnail = '';
							  $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    				?>
						<div class="card-thumbnail">
							<div class='card-thumbnail-img' style='background-image: url(<?php echo $thumbnail; ?>); height: 12em;'>
							</div>
						</div>	
					<?php endif; ?>
					
					<!-- Project Intro -->
					<div class="small-11 medium-10 large-8 small-centered columns about-intro">
						<h1 class="small-12 paragraph-title"><?php echo $s; ?></h1>
						<div class="small-12 medium-9 small-centered columns paragraph-content">
							<h3><?php echo $e; ?></h3>
						</div>
					</div>

					<!-- Project Description Content -->
					<div class="small-9 small-centered columns paragraph-content">
						<?php the_content(); ?>
					</div>

					<div class="small-9 small-centered columns paragraph">
						<div class='row'>
							<h3>Publications</h3>
							<!-- Publications Content -->
							<div class="small-12 small-centered columns paragraph" data-equalizer='reel'>
								<!--Accessing the Posts from publications-->
								<?php $args = array( 'post_type' => array('publications')); ?>
								<?php $loop = new WP_Query( $args ); ?>
								<!--THE LOOP-->
								<!--Purpose: To loop through all given posts of the given Post Type-->
								<!--Condition: The loop will end when there are no more posts-->
								<?php if ($loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
									<!--If the Post is related to the project then Display-->
									<?php if(has_term($title,'related_projects')): ?>
										<div class="small-12 medium-6 large-4 columns end">
											<div class="small-11 small-centered columns card Publication" data-equalizer-watch='reel'>
												<article class='post' data-equalizer-watch='reel'>
													<!--CARD CONTENT-->
													<!--Purpose: If there exists content display the content as an excerpt-->
													<div class='card-content'>
														<!--The Title-->
														<h2> <?php the_title();?> </h2>
														<!--The Content-->
														<p> <?php
															if (is_sticky()) {
  																global $more;    // Declare global $more (before the loop).
  																$more = 1;       // Set (inside the loop) to display all content, including text below more.
  																the_content();
															} else {
  																global $more;
  																$more = 0;
  																the_content('Read the rest of this entry »');
															}
														?></p>
													</div>
												</article>
											</div>
										</div>
									<?php endif;?>
								<?php endwhile; endif; ?>
							</div>
						</div><!-- End Publications Content -->
					</div>
					
										<!-- Sponsors Content -->
					<div class='row'>
						<div class="small-9 small-centered columns paragraph">
							<h3>Sponsors</h3>
							<div class="small-12 small-centered columns">
								<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
									<!--THE LOOP-->
									<!--Purpose: To loop through all given posts of the given Post Type-->
									<!--Condition: The loop will end when there are no more posts-->			 
  									<?php foreach( get_post_custom_values( 'image', $postID ) as $key => $value) { ?>
									<!--If the Post is related to the project then Display-->
										<li>
											<!--ICON-->
											<!--Purpose: If there exists a icon then display the icon-->
											<img src='<?php echo $value ?>' style='height:12em;'>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>


					<!-- People Content -->
					<div class="small-9 small-centered columns paragraph">
						<div class='row'>
							<h3>The Team</h3>
							<div class="small-12 small-centered columns" data-equalizer='team'>
							<!--Accessing the Posts from people-->
							<?php $args = array( 'post_type' => array('people')); ?>
							<?php $loop = new WP_Query( $args ); ?>
							<!--THE LOOP-->
							<!--Purpose: To loop through all given posts of the given Post Type-->
							<!--Condition: The loop will end when there are no more posts-->
							<?php if ($loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
								<!--If the Post is related to the project then Display-->
								<?php if(has_term($title,'related_projects')): ?>
									<div class="small-6 medium-4 columns">
										<a href='<?php the_permalink(); ?>'>
										<div class="small-11 small-centered columns card" data-equalizer-watch='team'>
											<article class='post' data-equalizer-watch='team'>
												<!--SELFIE-->
												<!--Purpose: If there exists a selfie then display the selfie-->
												<?php if (has_post_thumbnail()) : ?>
													<?php $selfie = '';
							 							  $selfie = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    											?>
													<div class="card-thumbnail">
														<div class='card-thumbnail-img' style='background-image: url(<?php echo $selfie; ?>); height: 15em;'>
														</div>
													</div>	
												<?php endif; ?>
												<!--The Title-->
												<div><center><h2><?php the_title(); ?></h2></center></div>
											</article>
										</div>
										</a>
									</div>
								<?php endif; ?>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
			</div><!-- End Large White Box -->
			
			<!-- Other Projects -->
			<div class="small-9 small-centered columns paragraph">
				<div class='row'>
					<h3>Other Projects</h3>
					<div class="small-12 large-12 small-centered columns projectsbox" data-equalizer='projects'>
						<!--Accessing the Posts from projects-->
						<?php $args = array( 'post_type' => 'projects'); ?>
						<?php $loop = new WP_Query( $args ); ?>
						<?php $c = 0; ?>
						<!--THE LOOP-->
						<!--Purpose: To loop through all given posts of the given Post Type (projects)-->
						<!--Condition: The loop will end when there are no more posts-->
						<?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts() && $c < 3) : $loop -> the_post(); ?>
							<?php $T = get_the_title();?>
							<?php if($title!=$T):?>
								<!--Card Container-->
								<div class="small-12 medium-6 large-4 columns end">
									<div class="small-11 small-centered columns card" data-equalizer-watch='projects'>
										<article class='post' data-equalizer-watch='projects'>
											<!--THUMBNAIL-->
											<!--Purpose: If there exists a thumbnail then display the thumbnail-->
											<?php if (has_post_thumbnail()) : ?>
												<?php $other = '';
													  $other = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    										?>
												<div class="card-thumbnail">
													<div class='card-thumbnail-img' style='background-image: url(<?php echo $other; ?>); height: 12em;'>
													</div>
												</div>	
											<?php endif; ?>
										
											<!--CARD CONTENT-->
											<!--Purpose: If there exists content display the content as an excerpt-->
											<div class='card-content'>
												<!--The Title-->
												<h2> <?php the_title();?> </h2>
												<!--CARD LINK-->
												<!--Purpose: Give the link to the full article-->
												<a class='card-link' href='<?php the_permalink();?>'>Explore</a>
											</div>
										</article>
									</div>
								</div>
							<?php endif; ?>
						<?php endwhile; endif;?>
					</div>
				</div>
			</div>
		</div><!-- End Grey Box -->
	</section>
</div>
<!--Loading the footer.php above each file-->
<?php get_footer(); ?><!--The Name of the Template-->