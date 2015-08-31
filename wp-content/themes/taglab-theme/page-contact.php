<!--The Name of the Template-->
<?php
/*
	Template Name: Contacts Page
*/
?>
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<!--The Content on Each Page-->
<div class="content">
	<section class='row'>
		<!--PAGE CONTENT-->
		<!--Purpose: Displays a small blurb about TAGlab-->
		<div class="row">
			<div class="small-12 small-centered columns paragraph">
				<div class="small-11 medium-10 small-centered columns">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<!--The Title-->
						<h1 class="small-12 paragraph-title">Contact Us</h1>
						<!--The Paragraph-->
						<div class="small-12 large-9 small-centered columns paragraph-content">
							<p><?php the_content(); ?></p>
						</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>

		<div class="row">					
			<div class="small-11 small-centered columns highlights"  data-equalizer='reel'>
				<div class='small-12 large-10 small-centered columns'>
					<div class="small-12 large-6 columns end">
						<div class="small-11 small-centered columns card">
						<article class='post' data-equalizer-watch='reel'>
							<!--THUMBNAIL-->
							<!--Purpose: If there exists a thumbnail then display the thumbnail-->
							<?php if (has_post_thumbnail()) : ?>
								<?php $thumbnail = '';
						       		  $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    						?>
								<div class="card-thumbnail">
									<div class='card-thumbnail-img' style='background-image: url(<?php echo $thumbnail; ?>); height:12em; '>
											 
									</div>
								</div>	
							<?php endif; ?>
							<!--CARD CONTENT-->
							<!--Purpose: If there exists content display the content as an excerpt-->
							<div class='card-content'>
								<!--The Title-->
								<?php 	$title = get_post_custom_values( 'TitleOfCard' )[0];
										$content = get_post_custom_values( 'ContactCard' )[0];
										$floorPlan = get_post_custom_values( 'FloorPlan' )[0];
										$map = get_post_custom_values( 'Map' )[0];	
								?>
 
								<h2> <?php echo $title;?> </h2>
								<!--The Content-->
								<p> <?php echo $content ?></p>
							</div>
						</article>
						</div>
					</div>
					<div class="small-12 large-6 columns end">
						<div class="small-11 small-centered columns card">
						<article class='post' data-equalizer-watch='reel' >
							<!--THUMBNAIL-->
							<!--Purpose: If there exists a thumbnail then display the thumbnail-->
							<div style='width: 100%; '>
								<div class='card-thumbnail-img' style='margin: auto; '> 
									<img src='<?php echo $floorPlan; ?>' style='height: 100%;'>		 
								</div>
							</div>	
						</article>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">					
			<div class='small-12 large-10 small-centered columns'>
				<div class="small-12 columns end">
					<div class="small-11 small-centered columns card">
						<article class='post'>
							<!--THUMBNAIL-->
							<!--Purpose: If there exists a thumbnail then display the thumbnail-->
							<div style="width: 100%">
								<div class='card-thumbnail-img' style='background-size: cover;'>	
									<img src='<?php echo $map; ?>' style='width: 100%' >
								 
								</div>
							</div>	
						</article>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!--Loading the footer.php above each file-->
<?php get_footer(); ?>