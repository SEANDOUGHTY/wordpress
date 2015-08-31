<!--The Project Page-->
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<!--The Content on the Project Page-->
<div class="content">
	<section class='row'>
			<!-- Grey Box -->
			<div class="row greybox">
				<!-- Large White Box -->
				<div class="small-11 large-9 small-centered columns card paragraph">
					<!-- Intro text -->
					<div class="small-11 large-10 small-centered columns about-intro">
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
							$isCurrent = false;
							if(has_term('current','status')){
								$isCurrent = true;	
							}	
					?>	
				<?php endwhile; endif; ?>
														
				<!-- Large White Box -->
				<div class="small-11 large-9 small-centered columns card">
					<!--THUMBNAIL-->
					<!--Purpose: If there exists a thumbnail then display the thumbnail-->
					<?php if (has_post_thumbnail()) : ?>
						<?php $thumbnail = '';
							  $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    				?>
					<!--<div class="card-thumbnail">
							<div class='card-thumbnail-img' style='background-image: url(<?php echo $thumbnail; ?>); height: 12em;'>
							</div>
						</div>-->	
					<?php endif; ?>
					
					<!-- Project Intro -->
					<div class="small-11 large-9 small-centered columns about-intro">
						<h1 class="small-12 paragraph-title" style='font-weight: 600;'><?php echo $s; ?></h1>
						<div class="small-12 medium-10 small-centered columns paragraph-content">
							<h3><?php echo $e; ?></h3>
						</div>
					</div>

					<!-- Project Description Content -->
					<div class="small-11 large-9 small-centered columns paragraph-content">
						<?php the_content(); ?>
					</div>

					<!-- Project Related Contents -->
					<div class="small-11 large-9 small-centered columns paragraph">
						<div class='row'>
							<h3>Publications</h3>
							<!-- Publications Content -->
							<div class="small-12 small-centered columns paragraph" data-equalizer='reel'>
								<!--Accessing the Posts from publications-->
								<?php $args = array( 'post_type' => 'publications',	'posts_per_page' => '-1'); ?>
								<?php $loop = new WP_Query( $args ); ?>
								<?php $PublicationCounter = 0; ?>
								<!--THE LOOP-->
								<!--Purpose: To loop through all given posts of the given Post Type-->
								<!--Condition: The loop will end when there are no more posts-->
								<?php if ($loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
									<!--If the Post is related to the project then Display-->
									<?php if(has_term($title,'related_projects')): ?>
									<?php $PublicationCounter = $PublicationCounter +1;?>
										<div class="small-12 medium-6 large-4 columns end">
											<div class="small-12 medium-11 small-centered columns card Publication" data-equalizer-watch='reel'>
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
								<?php if($PublicationCounter == 0): ?>
									<center><p> There are no publications for this project </p></center>
								<?php endif; ?>
							</div>
						</div><!-- End Publications Content -->
					</div>
					
					<!-- Sponsors Content -->
					<div class='row'>
						<div class="small-11 large-9 small-centered columns paragraph">
							<h3>Sponsors</h3>
							<div class="small-12 small-centered columns">
								<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
								<!--Accessing the Posts from sponspors-->
								<?php $args = array( 'post_type' => 'sponsors',	'posts_per_page' => '-1', 'orderby'=> 'title', 'order' => 'ASC' ); ?>
								<?php $loop = new WP_Query( $args ); ?>
								<?php $cardNum = 0; ?>
								<!--THE LOOP-->
								<!--Purpose: To loop through all given posts of the given Post Type (sponsors)-->
								<!--Condition: The loop will end when there are no more posts-->
								<?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
									<?php if(has_term($title,'related_projects')): ?>
										<?php $cardNum = $cardNum + 1; ?>			
										<!--Card Container-->
										<li>
											<div class="small-11 small-centered columns card" data-equalizer-watch='grid'>
												<article class='post' data-equalizer-watch='grid'>
												<!--THUMBNAIL-->
												<!--Purpose: If there exists a thumbnail then display the thumbnail-->
												<?php if (has_post_thumbnail()) : ?>
													<?php $sponsor = '';
					 									  $sponsor = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    											?>
			    									<?php $link = get_post_custom_values( 'Link' )[0]; ?>
													<center>
														<a href='#' data-reveal-id="myModal<?php echo $cardNum; ?>"><img src='<?php echo $sponsor; ?>' style='background-size: contain;'></a>
														<div id="myModal<?php echo $cardNum; ?>" class="reveal-modal medium " data-reveal aria-labelledby="modalTitle<?php echo $cardNum; ?>" aria-hidden="true" role="dialog">
															<h2 id="modalTitle<?php echo $cardNum; ?>"><?php the_title(); ?></h2>
															<p><?php
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
															<a class='card-link' href='<?php echo $link; ?>'>Read More</a>
															<a class="close-reveal-modal" aria-label="Close">&#215;</a>
														</div>	
													</center>
												<?php endif; ?>
												</article>
											</div>
										</li>	
									<?php endif; ?>	
								<?php endwhile; ?>
								<!--If the page is blank-->
								<?php else : ?>
									<?php get_template_part( 'content', 'none' ); ?>
								<?php endif; ?>
								</ul>
								<?php if($cardNum == 0): ?>
									<center><p> There are no sponsors for this project </p></center>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<!-- People Content -->
					<!-- If a Past Project then disply all team members -->
					<?php if(!$isCurrent): ?>
						<div class="small-11 large-9 small-centered columns paragraph">
							<div class='row'>
								<h3>The Team</h3>
								<div class="small-12 small-centered columns" data-equalizer='team'>
								<!--Accessing the Posts from people-->
								<?php $args = array( 'post_type' => 'people',	'posts_per_page' => '-1', 'orderby'   => 'menu_order', 'order' => 'ASC'); ?>
								<?php $loop = new WP_Query( $args ); ?>
								<?php $PeopleCounter = 0; ?>
								<!--THE LOOP-->
								<!--Purpose: To loop through all given posts of the given Post Type-->
								<!--Condition: The loop will end when there are no more posts-->
								<?php if ($loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
									<!--If the Post is related to the project then Display-->
									<?php if(has_term($title,'related_projects')): ?>
										<?php $PeopleCounter = $PeopleCounter + 1; ?>
										<div class="small-12 medium-6 large-4 columns end">
											<a href='<?php the_permalink(); ?>'>
											<div class="small-12 medium-11 small-centered columns card" data-equalizer-watch='team' style='padding: 2em 0em 0em 0em;'>
												<article class='post' data-equalizer-watch='team'>
													<!--SELFIE-->
													<!--Purpose: If there exists a selfie then display the selfie-->
													<?php $selfie = 'http://www.cs.toronto.edu/~seandoughty/taglab/wp-content/uploads/2015/07/no-mug.png';?>
													<?php if (has_post_thumbnail()) : ?>
														<?php $selfie = '';
								 							  $selfie = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    												?>
													<?php endif; ?>
													<div style='width: 100%;'>
														<div class='card-thumbnail-img'>
															<img src='<?php echo $selfie; ?>' style='background-size: contain;'>
														</div>
													</div>	
													<!--The Title-->
													<div style='padding: 0em 0em;'><center><h2><?php the_title(); ?></h2></center></div>
												</article>
											</div>
											</a>
										</div>
									<?php endif; ?>
								<?php endwhile; endif; ?>
								<?php if($PeopleCounter == 0): ?>
									<center><p> The TAGteam went missing!!! </p></center>
								<?php endif; ?>
							</div>
						</div>
					<!-- Else it is a Current Project so display the team followed by alumni who worked on the project -->
					<?php else: ?>
						<!--Current Members-->
						<div class="small-11 large-9 small-centered columns paragraph">
							<div class='row'>
								<h3>The Team</h3>
								<div class="small-12 small-centered columns" data-equalizer='team'>
								<!--Accessing the Posts from people-->
								<?php $args = array( 'post_type' => 'people',	'posts_per_page' => '-1', 'orderby'   => 'menu_order', 'order' => 'ASC'); ?>
								<?php $loop = new WP_Query( $args ); ?>
								<?php $PeopleCounter = 0; ?>
								<!--THE LOOP-->
								<!--Purpose: To loop through all given posts of the given Post Type-->
								<!--Condition: The loop will end when there are no more posts-->
								<?php if ($loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
									<!--If the Post is related to the project then Display-->
									<?php if(has_term($title,'related_projects') && (has_term('current','type') || has_term('collaborators','type'))): ?>
										<?php $PeopleCounter = $PeopleCounter + 1; ?>
										<div class="small-12 medium-6 large-4 columns end">
											<a href='<?php the_permalink(); ?>'>
											<div class="small-12 medium-11 small-centered columns card" data-equalizer-watch='team' style='padding: 2em 0em 0em 0em;'>
												<article class='post' data-equalizer-watch='team'>
													<!--SELFIE-->
													<!--Purpose: If there exists a selfie then display the selfie-->
													<?php $selfie = 'http://www.cs.toronto.edu/~seandoughty/taglab/wp-content/uploads/2015/07/no-mug.png';?>
													<?php if (has_post_thumbnail()) : ?>
														<?php $selfie = '';
								 							  $selfie = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    												?>
													<?php endif; ?>
													<div style='width: 100%;'>
														<div class='card-thumbnail-img'>
															<img src='<?php echo $selfie; ?>' style='background-size: contain;'>
														</div>
													</div>	
													<!--The Title-->
													<div style='padding: 0em 0em;'><center><h2><?php the_title(); ?></h2></center></div>
												</article>
											</div>
											</a>
										</div>
									<?php endif; ?>
								<?php endwhile; endif; ?>
								<?php if($PeopleCounter == 0): ?>
									<center><p> There is no one working on this project currently </p></center>
								<?php endif; ?>
								</div>
							</div>
							<!--Alumni-->
							<div class='row'>
								<h3>Alumni</h3>
								<div class="small-12 small-centered columns" data-equalizer='team'>
								<!--Accessing the Posts from people-->
								<?php $args = array( 'post_type' => 'people',	'posts_per_page' => '-1', 'orderby'   => 'menu_order', 'order' => 'ASC'); ?>
								<?php $loop = new WP_Query( $args ); ?>
								<?php $PeopleCounter = 0; ?>
								<!--THE LOOP-->
								<!--Purpose: To loop through all given posts of the given Post Type-->
								<!--Condition: The loop will end when there are no more posts-->
								<?php if ($loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
									<!--If the Post is related to the project then Display-->
									<?php if(has_term($title,'related_projects') && !has_term('current','type')): ?>
										<?php $PeopleCounter = $PeopleCounter + 1; ?>
										<div class="small-12 medium-6 large-4 columns end">
											<a href='<?php the_permalink(); ?>'>
											<div class="small-12 medium-11 small-centered columns card" data-equalizer-watch='team' style='padding: 2em 0em 0em 0em;'>
												<article class='post' data-equalizer-watch='team'>
													<!--SELFIE-->
													<!--Purpose: If there exists a selfie then display the selfie-->
													<?php $selfie = 'http://www.cs.toronto.edu/~seandoughty/taglab/wp-content/uploads/2015/07/no-mug.png';?>
													<?php if (has_post_thumbnail()) : ?>
														<?php $selfie = '';
								 							  $selfie = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    												?>
													<?php endif; ?>
													<div style='width: 100%;'>
														<div class='card-thumbnail-img'>
															<img src='<?php echo $selfie; ?>' style='background-size: contain;'>
														</div>
													</div>	
													<!--The Title-->
													<div style='padding: 0em 0em;'><center><h2><?php the_title(); ?></h2></center></div>
												</article>
											</div>
											</a>
										</div>
									<?php endif; ?>
								<?php endwhile; endif; ?>
								<?php if($PeopleCounter == 0): ?>
									<center><p> There were no almuni who worked on this project </p></center>
								<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div><!-- End Large White Box -->

			<!-- Other Projects -->
			<div class="small-11 large-9 small-centered columns paragraph">
				<div class='row'>
					<h3>Other Projects</h3>
					<div class="small-12 small-centered columns projectsbox" data-equalizer='projects'>
						<!--Accessing the Posts from projects-->
						<?php $args = array( 'post_type' => 'projects', 'orderby' => 'rand'); ?>
						<?php $loop = new WP_Query( $args ); ?>
						<?php $c = 0; ?>
						<!--THE LOOP-->
						<!--Purpose: To loop through all given posts of the given Post Type (projects)-->
						<!--Condition: The loop will end when there are no more posts-->
						<?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts() && $c < 3) : $loop -> the_post(); ?>
							<?php $T = get_the_title();?>
							<?php if($title!=$T):?>
								<?php $c = $c + 1; ?>
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