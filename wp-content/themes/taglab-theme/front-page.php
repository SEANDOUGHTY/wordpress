<?php
/*	Name: Front-Page
 *	Purpose: To build the front-page (HOMEPAGE) of the website 
 */
?>
<!--Get the code from the header.php file-->
<?php get_header(); ?>
<div class="content">
	<section class='row'>
		<!--HOME HEADER-->
		<!--Purpose: Displays the HOME page banner with the TAGlab logo and name-->
		<div class="home-header">
			<div class='row'>
				<div class="small-12 columns">
					<!--The Logo-->
					<img src="<?php echo get_template_directory_uri() . '/img/Logo/taglab_logo.png'?>">
					<!--The Name-->
					<h5>Technologies for Aging Gracefully</h5>
				</div>
			</div>
		</div>
		
		<!--HOMEPAGE CONTENT-->
		<!--Purpose: Displays a small blurb about TAGlab-->
		<div class="row">
			<div class="small-12 small-centered columns paragraph">
				<div class="small-12 medium-8 small-centered columns">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<!--The Title-->
						<h1 class="small-12 paragraph-title"><?php the_title(); ?></h1>
						<!--The Paragraph-->
						<div class="small-12 medium-9 small-centered columns paragraph-content">
							<p><?php the_content(); ?></p>
						</div>
					<?php endwhile; endif;?>
				</div>
			</div>
		</div>
			
		<!--HIGHLIGHT REEL-->
		<!--Purpose: Displays at most 3 highlights from TAGlab (Articles or Publications)-->
		<div class="row">	
			<div class="small-12 small-centered columns highlights" data-equalizer='reel'>
				<!--HIGHLIGHTS TITLE-->
				<h1>Highlights</h1>
				<div class="small-10 small-centered columns" >
					<!--Accessing the Posts from news_feed and publications-->
					<?php $args = array( 'post_type' => array('news_feed','publications')); ?>
					<?php $loop = new WP_Query( $args ); ?>
					<?php $c = 0; ?>
					<!--THE LOOP-->
					<!--Purpose: To loop through all given posts of the given Post Type-->
					<!--Condition: The loop will end when there are no more posts or there are 3 highlights -->
					<?php if ($loop -> have_posts() ) : while ( $loop -> have_posts() && $c < 3) : $loop -> the_post(); ?>
						<!--If the Post is a Highlight then Display-->
						<?php if(has_term('highlight','connection')): ?>
							<?php $c = $c + 1; ?> 
							<div class="small-12 medium-4 columns end">
								<div class="small-11 small-centered columns card" data-equalizer-watch='reel'>
									<article class='post' data-equalizer-watch='reel'>
										<!--THUMBNAIL-->
										<!--Purpose: If there exists a thumbnail then display the thumbnail-->
										<?php if (has_post_thumbnail()) : ?>
											<?php $thumbnail = '';
									        	  $thumbnail = get_the_post_thumbnail($post->ID,'featured');
    										?>
											<div class="card-thumbnail">
												<div class='card-thumbnail-img' >
													 <?php echo $thumbnail; ?>
												</div>
											</div>	
										<?php endif; ?>
										<!--CARD CONTENT-->
										<!--Purpose: If there exists content display the content as an excerpt-->
										<div class='card-content'>
											<!--The Date-->
											<p class='date'> <?php the_time('F Y'); ?> </p>
											<!--The Title-->
											<h2> <?php the_title();?> </h2>
											<!--The Content-->
											<p> <?php the_excerpt(); ?></p>
										</div>
										<!--CARD LINK-->
										<!--Purpose: Give the link to the full article-->
										<a href='<?php the_permalink();?>'>Read Full Article</a>
									</article>
								</div>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</div>
<!--Get the code from the footer.php file-->
<?php get_footer(); ?>