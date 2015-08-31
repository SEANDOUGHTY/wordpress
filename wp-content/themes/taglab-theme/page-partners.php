<!--The Name of the Template-->
<?php
/*
	Template Name: Partners Page
*/
?>
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<!--The Content on the Partners Page-->
<div class="content">
	<section class='row'>
		<!--PAGE CONTENT-->
		<!--Purpose: Displays a small blurb about the Page-->
		<div class="row">
			<div class="small-12 small-centered columns paragraph">
				<div class="small-11 medium-10 small-centered columns">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<!--The Title-->
						<h1 class="small-12 paragraph-title">Our Partners</h1>
						<!--The Paragraph-->
						<div class="small-12 medium-10 small-centered columns paragraph-content">
							<p><?php the_content(); ?></p>
						</div>
					<?php endwhile; endif; ?>
				</div>				
			</div>
		</div>

		<!-- Partner Logos -->
		<div class="small-12 small-centered columns partners-logoBox">
			<!--Current Sponsors-->
			<div class="row">					
				<div class="small-11 medium-8 small-centered columns"  data-equalizer='grid'> 
					<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
					<!--Accessing the Posts from sponspors-->
					<?php $args = array( 'post_type' => 'sponsors',	'posts_per_page' => '-1', 'orderby'=> 'title', 'order' => 'ASC' ); ?>
					<?php $loop = new WP_Query( $args ); ?>
					<?php $cardNum = 0; ?>
					<!--THE LOOP-->
					<!--Purpose: To loop through all given posts of the given Post Type (sponsors)-->
					<!--Condition: The loop will end when there are no more posts-->
					<?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
					<?php if(has_term("current",'status')): ?>
						<?php $cardNum = $cardNum + 1; ?>			
						<!--Card Container-->
						<li>
							<div class="small-11 small-centered columns card" style='height: 12em;' data-equalizer-watch='grid'>
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
					<?php endif;?>
					<?php endwhile; ?>
					<!--If the page is blank-->
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
					</ul>
					<?php if($cardNum == 0): ?>
						<center><p> There are no current sponsors </p></center>
					<?php endif; ?>
				</div>
			</div>
			<!--Past Sponsors-->
			<div class="row">					
				<div class="small-11 medium-8 small-centered columns card-past-sponsors"  data-equalizer='past'> 
					<div class='card-content'><h3> Past Sponsors </h3></div>
					<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
					<!--Accessing the Posts from sponspors-->
					<?php $args = array( 'post_type' => 'sponsors',	'posts_per_page' => '-1', 'orderby'=> 'title', 'order' => 'ASC' ); ?>
					<?php $loop = new WP_Query( $args ); ?>
					<?php $cardNum = 0; ?>
					<!--THE LOOP-->
					<!--Purpose: To loop through all given posts of the given Post Type (sponsors)-->
					<!--Condition: The loop will end when there are no more posts-->
					<?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
					<?php if(!has_term("current",'status')): ?>
						<?php $cardNum = $cardNum + 1; ?>			
						<!--Card Container-->
						<li>
							<div class="small-11 small-centered columns" data-equalizer-watch='past'>
								<article class='post' data-equalizer-watch='past'>
									<!--THUMBNAIL-->
									<!--Purpose: If there exists a thumbnail then display the thumbnail-->
									<?php if (has_post_thumbnail()) : ?>
										<?php $sponsor = '';
					 						  $sponsor = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    								?>
	    								<?php $link = get_post_custom_values( 'Link' )[0]; ?>
										<center>
												<a href='<?php echo $link; ?>'><?php the_title(); ?></a>
										</center>
									<?php endif; ?>
								</article>
							</div>
						</li>
					<?php endif;?>
					<?php endwhile; ?>
					<!--If the page is blank-->
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
					</ul>
					<?php if($cardNum == 0): ?>
						<center><p> There are no current sponsors </p></center>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</div>
<!--Loading the footer.php above each file-->
<?php get_footer(); ?><!--The Name of the Template-->