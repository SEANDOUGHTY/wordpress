<!--The Name of the Template-->
<?php
/*
	Template Name: News Page
*/
?>
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<div class="content">
	<section class='row'>
		<!--PAGE CONTENT-->
		<!--Purpose: Displays a small blurb about TAGlab-->
		<div class="row">
			<div class="small-12 small-centered columns paragraph">
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

		<div class="row">					
			<div class='small-12 small-centered columns page-content'>
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<!--The Grid of Posts-->
						<div class="small-10 small-centered columns"  data-equalizer='grid'>
							<!--Accessing the Posts from news_feed-->
							<?php $args = array( 'post_type' => 'news_feed'); ?>
							<?php $loop = new WP_Query( $args ); ?>
							<!--THE LOOP-->
							<!--Purpose: To loop through all given posts of the given Post Type (news_feed)-->
							<!--Condition: The loop will end when there are no more posts-->
							<a href='<?php echo $loop->get_year_link( 2014 ); ?>'>2015</a> 
							<?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
								<!--Card Container-->
								<div class="small-12 medium-4 columns end">
									<div class="small-11 small-centered columns card" data-equalizer-watch='grid'>
										<article class='post' data-equalizer-watch='grid'>
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
										
										<!--The Date-->
										<p class='date'> <?php the_time('F Y'); ?> </p>
											
										<!--CARD CONTENT-->
										<!--Purpose: If there exists content display the content as an excerpt-->
										<div class='card-content'>
											<!--The Title-->
											<h2> <?php the_title();?> </h2>
											<!--The Content-->
											<p> <?php the_excerpt(); ?></p>
											<!--CARD LINK-->
											<!--Purpose: Give the link to the full article-->
											<a href='<?php the_permalink();?>'>Read Full Article</a>
										</div>
										</article>
									</div>
								</div>
							<?php endwhile; ?>
							<!--If the page is blank-->
							<?php else : ?>
								<?php get_template_part( 'content', 'none' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!--Loading the footer.php above each file-->
<?php get_footer(); ?>